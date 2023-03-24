<?php

namespace App\Http\Controllers;

use App\accessories;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= accessories::all();
        return view('front.dashboard.product.accessary',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $this->validate($request,[
            // |unique:hproducts
            'Product_name'=>'required|string|unique:accessories|min:5',
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
        $request->photo->move(public_path('assets/dash/img/accessory/'),$img_name);
         }else{ $img_name='';}
        $acess= accessories::create([

            "Product_name"=>$request->Product_name  ,
            "description"=>$request->description  ,
            "p_photo"=> $img_name,

        ]);


        if($acess){
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
     * @param  \App\accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function show(accessories $accessories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function edit(accessories $accessories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id= $request->id;
        $this->validate($request,[
            'Product_name'=>'required|string|unique:accessories,Product_name,'.$id.',id|min:5',
            'description'=>'required|string|min:5',
           ],[
            'Product_name.required'=>'الرجال ادخال اسم المنتج',
            'Product_name.string'=>'الرجاء جعل الاسم  مناسب',
            'Product_name.min'=>'الاسم قصير جدا',
            'Product_name.unique'=>' اسم المنتج موجود مسبقا',
            'Product_name.required'=>' الرجاء ادخال وصف',
            'description.min'=>'  الوصف قصي حدا',

           ]);

          $product= accessories::find($request->id);
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
     * @param  \App\accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $acces=accessories::find($request->id);
       if($acces){

        $acces->delete();
        return redirect()->back()->with('message', 'تم حذف النتج بنجاح');
       }

    }
}
