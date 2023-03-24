<?php

namespace App\Http\Controllers;

use App\hdealer_keeper;
use App\User;
use App\Notifications;
use App\k_has_p;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

// use Illuminate\Notifications\Notification;



class HdealerKeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {    $this->validate($request,[
        'offered_price'=>'numeric|min:3|max:'. $request->ordered_price.'',
        'ordered_amount'=>'numeric|min:3|max:'. $request->amount.''
       ],[
        'offered_price.min'=>'الرجاء ادخال سعر اكبر من 3',
        'offered_price.numeric'=>'الرجاء ادخال سعر',
        'offered_price.max'=>'عرض السعر يجب ان يكون اقل او يساوي سعر النحال',


        'ordered_amount.min'=>'الرجاء ادخال كمية اكبر من 3',
        'ordered_amount.numeric'=>'الرجاء ادخال كمية ',
        'ordered_amount.max'=>'الكمية يجب ان تكون اقل او تساوي الكمية المتوفرة',


       ]);


         hdealer_keeper::create([
            'hdealer_id'=>$request->DealerId,
            'keeper_id' =>$request->keeperid,
            'productId'=>$request->productId,
            'offered_price' =>$request->offered_price,
            'amout' =>$request->ordered_amount ,

        ]);

        $user = User::find($request->keeperid);
         $keeperID= $user ->id;

        Notification::send($user,new \App\Notifications\DealerOrderHony($keeperID));




        return redirect()->back()->with('message', 'تم تقديم طلب الشرتء بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hdealer_keeper  $hdealer_keeper
     * @return \Illuminate\Http\Response
     */
    public function show(hdealer_keeper $hdealer_keeper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hdealer_keeper  $hdealer_keeper
     * @return \Illuminate\Http\Response
     */
    public function edit(hdealer_keeper $hdealer_keeper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hdealer_keeper  $hdealer_keeper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hdealer_keeper $hdealer_keeper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hdealer_keeper  $hdealer_keeper
     * @return \Illuminate\Http\Response
     */
    public function destroy(hdealer_keeper $hdealer_keeper)
    {
        //
    }


    public function refuse(Request $request)
    {
        $id= $request->id;
        $order =  hdealer_keeper::find($id);
        $order->update([
            "status"=>'2'

        ]);

        return redirect()->back()->with('message', 'تم رفض الطلب بنجاح');


    }

    public function accept($id)
    {
        $order =  hdealer_keeper::find($id);
        $ordered_amount= $order->amout;
        $keeper_id=$order->keeper_id;
        $product_id=$order->productId;
        $k_has_pro= k_has_p::where('user_id', $keeper_id)->where('hproducts_id', $product_id)->first();
        $theproduct_amount= $k_has_pro->amount ;
        $lasted_amount= $theproduct_amount- $ordered_amount;

        $order->update([
            "status"=>'1'
        ]);
        $k_has_pro->update([
            "amount"=>$lasted_amount,
        ]);
        return redirect()->back()->with('message', 'تم قبول الطلب بنجاح');
    }
//   هادا التابع  خاص بالتاجر تبع العسل
// بصفحتو بيظهرلوشو ارسل طلبات شراء عسل للنحالة
// بتلاقي زرو بالسايد بار طلبات شراء قدمتها كتاجر يعني
// والصفحة تبعو بمجلد تاجر العسل

    public function hdealer_h_orders($id){

        $orders =hdealer_keeper::where('hdealer_id',$id)->with(['keepers'=> function ($q){
          $q->select('id','name','email','prof_pic'); }])->get();
          return view('front.h_dealer.ordersdealermade',compact('orders')) ;

        }






}
