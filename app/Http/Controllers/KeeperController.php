<?php

namespace App\Http\Controllers;
use App\User;
use App\k_has_p;
use App\hproduct;
use App\hdealer_keeper;
use App\accdealer_keepers;
use Illuminate\Http\Request;

class KeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function keeperproducts($id)

    {
        $hasproducs=k_has_p::where('user_id',$id)-> with('hproduct')->get();
        $all_h_products= hproduct::select('id','Product_name')->get();
        return view('front.keeper.keeperproducts',compact('hasproducs','all_h_products')) ;
    }

    public function honeyorders($id){




        $orders =hdealer_keeper::where('keeper_id',$id)->with(['honyDealer'=> function ($q){
          $q->select('id','name','email','prof_pic'); }])->get();

        return view('front.keeper.honeyorders',compact('orders')) ;

    }

    // هاد بيجيب للنحال شو قدم هوي طلبات شراء لمستلزمات
    // مع معلومات التاجر الي قدملو طلب الشراء
    public function keeper_acces_orders($id){

        $orders =accdealer_keepers::where('keeper_id',$id)->with(['accesdealers'=> function ($q){
          $q->select('id','name','email','prof_pic'); }])->get();


        return view('front.keeper.orderskeepermade',compact('orders')) ;

    }







}
