<?php

namespace App\Http\Controllers;

use App\hproduct;
use App\accessories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products= hproduct::all();
       $accessories=accessories::all();
       return view('front.first',compact('products','accessories'));

    }
    public function show()
    {
        $products= hproduct::all();
        return view('front.dashboard.product.hproduct',compact('products'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
        $this->validate($request,[
            // |unique:hproducts
            'Product_name'=>'required|string|unique:hproducts|min:5',
            'description'=>'required|string|min:5',
           ],[
            'Product_name.required'=>'الرجال ادخال اسم المنتج',
            'Product_name.unique'=>' اسم المنتج موجود مسبقا ',

            'Product_name.string'=>'الرجاء جعل الاسم  مناسب',
            'Product_name.min'=>'الاسم قصير جدا',
            'Product_name.required'=>' الرجاء ادخال وصف',
            'description.min'=>'  الوصف قصي حدا',

           ]);
           if($request->hasFile('photo')){
            $image = $request->file('photo');
            $exten = $image->getClientOriginalExtension();
            $img_name= time().'.'.$exten;
            $request->photo->move(public_path('assets/dash/img/hproducts/'),$img_name);
             }else{ $img_name='';}

        $honey=  hproduct::create([

            "Product_name"=>$request->Product_name  ,
            "description"=>$request->description  ,
            "p_photo"=> $img_name,

        ]);

        if( $honey){
            return redirect()->back()->with('message', 'تمت اضافة المنتج بنجاح');

        }
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
     * @param  \App\hproduct  $hproduct
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hproduct  $hproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(hproduct $hproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hproduct  $hproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
         $id= $request->id;
        $this->validate($request,[
            'Product_name'=>'required|string|unique:hproducts,Product_name,'.$id.',id|min:5',
            'description'=>'required|string|min:5',
           ],[
            'Product_name.required'=>'الرجال ادخال اسم المنتج',
            'Product_name.string'=>'الرجاء جعل الاسم  مناسب',
            'Product_name.min'=>'الاسم قصير جدا',
            'Product_name.unique'=>' اسم المنتج موجود مسبقا',
            'Product_name.required'=>' الرجاء ادخال وصف',
            'description.min'=>'  الوصف قصي حدا',

           ]);

          $product= hproduct::find($request->id);
          if($product){
          $product->update([
            "Product_name"=>$request->Product_name,
            "description"=>$request->description,

          ]);
          return redirect()->back()->with('message', 'تمت تعديل المنتج بنجاح');


        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hproduct  $hproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $honey=hproduct::find($request->id);
       if($honey){

        Storage::disk('hproducts')->delete($honey->p_photo);
        // Storage::delete(public_path('assets/dash/img/hproducts'.$honey->p_photo));
        $honey->delete();
        return redirect()->back()->with('message', 'تم حذف النتج بنجاح');


       }

    }
}
