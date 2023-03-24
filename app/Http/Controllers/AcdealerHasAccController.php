<?php

namespace App\Http\Controllers;

use App\acdealer_has_acc;
use App\accessories;
use Illuminate\Http\Request;

class AcdealerHasAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $access=accessories::find($id);
        $accesName =$access->Product_name;
        $acces_id = $access->id;

        $lolos=acdealer_has_acc::where('accessory_id',$id)->with(['allAccesDealers'=> function ($q){
            $q->select('id','name','email','prof_pic'); }])->get();

            return view('front.accessorydealers',compact('lolos','acces_id','accesName'));

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
    {
        $this->validate($request,[
            'price'=>'numeric|min:3',
            'amount'=>'numeric|min:3'
           ],[
            'price.numeric'=>'الرجال ادخال سعر حقيقي',
            'price.min'=>'الرجال ادخال سعر اكبر من 3',


            'amount.numeric'=>'الرجاء ادخال كمية حقيقية',
            'amount.min'=>'الرجاء ادخال كمية اكبر من 3',



           ]);

        $exists= acdealer_has_acc::where(['user_id'=> $request->userId,
                        'accessory_id'=>$request->select_accessorie ])->first();
        if($exists){

            return redirect()->back()->with('fail', 'المنتج موجود مسبقا الرجاء التعديل عليه');

        }else{



        acdealer_has_acc::create([

            'user_id' => $request->userId,
            'accessory_id' => $request->select_accessorie,
            'amount' => $request->amount,
            'price' => $request->price,

        ]);

        return redirect()->back()->with('message', 'تمت اضافة المنتج بنجاح');

    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\acdealer_has_acc  $acdealer_has_acc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hasacces=acdealer_has_acc::where('user_id',$id)-> with('accessories')->get();
        $all_accessories= accessories::select('id','Product_name')->get();
        return view('front.acces_dealer.dealeraccessories',compact('hasacces','all_accessories')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\acdealer_has_acc  $acdealer_has_acc
     * @return \Illuminate\Http\Response
     */
    public function edit(acdealer_has_acc $acdealer_has_acc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\acdealer_has_acc  $acdealer_has_acc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {    $this->validate($request,[
        'price'=>'numeric|min:3',
        'amount'=>'numeric|min:3'
       ],[
        'price.numeric'=>'الرجال ادخال سعر حقيقي',
        'price.min'=>'الرجال ادخال سعر اكبر من 3',


        'amount.numeric'=>'الرجاء ادخال كمية حقيقية',
        'amount.min'=>'الرجاء ادخال كمية اكبر من 3'



       ]);
        $id=$request->id;
        $theProduct =acdealer_has_acc::findOrFail($id);
        $theProduct->update([
            'amount'=>$request->amount,
            'price'=>$request->price,
        ]);

        return redirect()->back()->with('message', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\acdealer_has_acc  $acdealer_has_acc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $the_product=acdealer_has_acc::find( $request->id);
        if($the_product){
        $the_product->delete();




      return redirect()->back()->with('message', 'تم حذف المنتج بنجاح');
    }
    }
}
