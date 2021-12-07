<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompanyExport;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyUser;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','search','officers','company']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
       return view('index');
    }
    
    /**
     * Get Profile Page
     */
    public function profile(){
      return view('profile');
    }

    /**
     * Search Page
     */
    public function search(Request $request){

       $header = [
          "authorization: 4d7c5b9d-3ff3-472d-80a7-3e44cee9563d",
          "content-type: application/json",
          "accept: application/json",
       ];
        
        $q = $request->q;
        $items_per_page = 10;
        $page = $request->page ?? 0;
        $start_index    = $items_per_page * $page;

        $companies = $this->fetch('https://api.companieshouse.gov.uk/search/officers','GET',['q'=>$q,'items_per_page'=>$items_per_page,'start_index'=>$start_index],$header);

        $data = [
          'companies' => $companies ?? array()
        ];

        return view('search',$data);
    }

    /**
     * Search Officer Page
     */
    public function officers($id){
      
      $header = [
         "authorization: 4d7c5b9d-3ff3-472d-80a7-3e44cee9563d",
         "content-type: application/json",
         "accept: application/json",
      ];

       $officer = $this->fetch('https://api.companieshouse.gov.uk/officers/'.$id.'/appointments','GET',[],$header);
       if($officer->items){
        $storeCompanyData     = [];
        $storeUserCompanyData = [];
        $compamyNumbers       = [];
        foreach($officer->items as $item){
          array_push($compamyNumbers,$item->appointed_to->company_number); 
          array_push($storeCompanyData,[
             'company_number' => $item->appointed_to->company_number,
             'address'        => $item->address->address_line_1 .','. $item->address->locality .','. $item->address->region .','. $item->address->country,
             'owners_name'    => $item->appointed_to->company_name
          ]);
          array_push($storeUserCompanyData,[
            'user_id'  => \Auth::id(),
            'company_number' => $item->appointed_to->company_number
          ]);
        }
          DB::beginTransaction();
        try{
          Company::whereIn('company_number',$compamyNumbers)->delete();
          CompanyUser::where('user_id',\Auth::id())->whereIn('company_number',$compamyNumbers)->delete();
          Company::insert($storeCompanyData);
          CompanyUser::insert($storeUserCompanyData);
          DB::commit();
        }catch(\Exception $e){
          DB::rollback();
        }
      }

       $data = [
         'officer' => $officer ?? array(),
         'id'      => $id
       ];

       return view('officer',$data);
   }

    /**
     * Search Company Page
     */
    public function company($id){
      $header = [
         "authorization: 4d7c5b9d-3ff3-472d-80a7-3e44cee9563d",
         "content-type: application/json",
         "accept: application/json",
      ];
       $company = $this->fetch('https://api.companieshouse.gov.uk/company/'.$id,'GET',[],$header);
       $officer = $this->fetch('https://api.companieshouse.gov.uk/company/' . $id .'/officers','GET',[],$header);
       $data = [
         'company' => $company,
         'officer' => $officer ?? array()
       ];
       return view('company',$data);
   }

   public function export($companyNumber=null){
    if($companyNumber){
      $companies = Company::where('company_number',$companyNumber)->get();
    }else{
      $compamyNumbers = CompanyUser::where('user_id',Auth::id())->get();
      $companies = Company::where('company_number',array_column($companies->toarray(),'company_number'))->get();
    }
    return Excel::download(new CompanyExport($companies->toarray()), 'companies-'.date('Y-M-d').'.xlsx');
   }

   public function portfolio(){
      $companyNumbers = CompanyUser::where('user_id',Auth::id())->get();
      $companies      = Company::whereIn('company_number',array_column($companyNumbers->toarray(),'company_number'))->get();
      $data = ['companies' => $companies];
      return view('portfolio',$data);
   }


}
