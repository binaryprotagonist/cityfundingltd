<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Plan;

class PlanController extends Controller
{

   public function index(){
       $plans = Plan::all();
       $data = array('plans'=>$plans);
       return view('plan.index',$data);
   }

   public function show($id){
      $plan = Plan::find($id);
      $data = array('plan'=>$plan);
      return view('plan.show',$data);
   }
}
