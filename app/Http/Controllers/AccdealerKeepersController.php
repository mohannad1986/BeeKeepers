<?php

namespace App\Http\Controllers;
use App\User;
use App\Notifications;

use App\accdealer_keepers;
use App\acdealer_has_acc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class AccdealerKeepersController extends Controller
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
    public function create(request $request)
    {
        $this->validate($request,[
            'offered_price'=>'numeric|min:3|max:'. $request->ordered_price.'',
            'ordered_amount'=>'numeric|min:3|max:'. $request->amount.''
           ],[
            'offered_price.min'=>'الرجاء ادخال سعر اكبر من 3',
            'offered_price.numeric'=>'الرجاء ادخال سعر',
            'offered_price.max'=>'عرض السعر يجب ان يكون اقل او يساوي سعر التاجر',


            'ordered_amount.min'=>'الرجاء ادخال كمية اكبر من 3',
            'ordered_amount.numeric'=>'الرجاء ادخال كمية ',
            'ordered_amount.max'=>'الكمية يجب ان تكون اقل او تساوي الكمية المتوفرة',


           ]);


            accdealer_keepers::create([
                'acdealer_id'=>$request->accesdealerid,
                'keeper_id' =>$request->keeperid,
                'accessoryId'=>$request->accessoryId,
                'offered_price' =>$request->offered_price,
                'amout' =>$request->ordered_amount ,

            ]);

            $user = User::find($request->accesdealerid);
            $dealerId= $user ->id;

            Notification::send($user,new \App\Notifications\keeperorderacces($dealerId));

            return redirect()->back()->with('message', 'تم تقديم طلب الشرتء بنجاح');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accdealer_keepers  $accdealer_keepers
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function show($id)
    {
        $orders =accdealer_keepers::where('acdealer_id',$id)->with(['keepersOrderAcces'=> function ($q){
            $q->select('id','name','email','prof_pic'); }])->get();

          return view('front.acces_dealer.acces_orders',compact('orders')) ;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accdealer_keepers  $accdealer_keepers
     * @return \Illuminate\Http\Response
     */
    public function edit(accdealer_keepers $accdealer_keepers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accdealer_keepers  $accdealer_keepers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accdealer_keepers $accdealer_keepers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\accdealer_keepers  $accdealer_keepers
     * @return \Illuminate\Http\Response
     */
    public function destroy(accdealer_keepers $accdealer_keepers)
    {
        //
    }


    public function accept($id)
    {
        $order =accdealer_keepers::find($id);
        $ordered_amount= $order->amout;
        $acdealer_id=$order->acdealer_id;
        $accessory_id=$order->accessoryId ;
        $accdealer_has_pro= acdealer_has_acc::where('user_id',$acdealer_id)->where('accessory_id',$accessory_id)->first();
        $theproduct_amount=$accdealer_has_pro->amount ;
        $lasted_amount= $theproduct_amount- $ordered_amount;

        $order->update([
            "status"=>'1'
        ]);
        $accdealer_has_pro->update([
            "amount"=>$lasted_amount,
        ]);
        return redirect()->back()->with('message', 'تم قبول الطلب بنجاح');
    }


    public function refuse(Request $request)
    {
        $id= $request->id;
        $order = accdealer_keepers::find($id);
        $order->update([
            "status"=>'2'

        ]);

        return redirect()->back()->with('message', 'تم رفض الطلب بنجاح');


    }
}
