<?php

namespace App\Http\Controllers;
use App\User;
use App\hproduct;
use App\k_has_p;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class KHasPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product=hproduct::find($id);
        $proName = $product->Product_name;
        $pro_id = $product->id;

         $lolos=k_has_p::where('hproducts_id',$id)->with(['keeperinfo'=> function ($q){
            $q->select('id','name','email','prof_pic'); }])->paginate(5);;


         return view('front.khasp',compact('lolos','pro_id','proName'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'price'=>'numeric|min:6',
            'amount'=>'numeric|min:6'
           ],[
            'price.min'=>'الرجال ادخال سعر اكبر من 6',
            'price.numeric'=>'الرجال ادخال سعر مرقم  ',
            'amount.numeric'=>'الرجال ادخال كمية مرقمة',
            'amount.min'=>'الرجاء ادخال كمية اكبر من 6'

           ]);

        $exists=  k_has_p::where(['user_id'=> $request->userId,
                        'hproducts_id'=>$request->select_product ])->first();
        if($exists){

            return redirect()->back()->with('fail', 'المنتج موجود مسبقا الرجاء التعديل عليه');

        }else{



        $k_add= k_has_p::create([

            'user_id' => $request->userId,
            'hproducts_id' => $request->select_product,
            'amount' => $request->amount,
            'price' => $request->price,

        ]);

        return redirect()->back()->with('message', 'تمت اضافة المنتج بنجاح');

    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\k_has_p  $k_has_p
     * @return \Illuminate\Http\Response
     */
    public function show(k_has_p $k_has_p)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\k_has_p  $k_has_p
     * @return \Illuminate\Http\Response
     */
    public function edit(k_has_p $k_has_p)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\k_has_p  $k_has_p
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {    $this->validate($request,[
        'price'=>'numeric|min:6',
        'amount'=>'numeric|min:6'
       ],[
        'price.min'=>'الرجال ادخال سعر اكبر من 6',
        'price.numeric'=>'الرجال ادخال سعر مرقم  ',
        'amount.numeric'=>'الرجال ادخال كمية مرقمة',
        'amount.min'=>'الرجاء ادخال كمية اكبر من 6'

       ]);
        $id=$request->id;
        $theProduct =k_has_p::findOrFail($id);
        $theProduct->update([
            'amount'=>$request->amount,
            'price'=>$request->price,
        ]);

        return redirect()->back()->with('message', 'تم تعديلالمنتج بنجاح');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\k_has_p  $k_has_p
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $the_product=k_has_p::find( $request->id);
        if($the_product){
        $the_product->delete();




      return redirect()->back()->with('message', 'تم حذف المنتج بنجاح');
    }

    }
}
