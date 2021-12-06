<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','search']);
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

        $companies = $this->fetch('https://api.companieshouse.gov.uk/search','GET',['q'=>$q,'items_per_page'=>$items_per_page,'start_index'=>$start_index],$header);

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
      
       $data = [
         'officer' => $officer ?? array()
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



}
