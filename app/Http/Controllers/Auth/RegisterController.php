<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     *
     */

    //  هي ح اعملا تعليق
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/first';
    // protected $redirectTo = '/front.rigester';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//  هاد انا ضفتوووو
    // protected function redirectTo()
    // {

    //     return redirect()->back()->with('message', 'الرجاء انتظار موافقة الادمن لتتمكن من الدخول');
    // }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ],[
           'name.required'=>'يرجى ادخال اسم مستخدم',
           'name.unique'=>' هذا الاسم محجوز مسبقا',

           'email.string'=>'  الرجاء ادخال صيغة ايميل',

           'password.required'=>' الرجاء ادخال كلمة مرور',
           'password.confirmed'=>' كبمة المرور غير متطابقة',



        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data)
    {
         $rname= $data['TYPE'];
        //  -----------
        switch ($rname) {
            case "1":
                $rname='keeper';
              break;
            case "2":
                $rname='honey';
              break;
              case "3":
                $rname='accessories';
              break;

          }

        // --------------------
        if(request()->hasFile('avatar')){
            $image = request()->file('avatar');
            $exten = $image->getClientOriginalExtension();
            $img_name= time().'.'.$exten;
            request()->avatar->move(public_path('assets/dash/img/avatar/'),$img_name);
             }else{ $img_name='';}

        // --------------
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles_name'=>[$rname],
            'prof_pic'=> $img_name,


        ]);

     $role = Role::select('id')->where('name',$rname)->first();
     $user->assignRole($role->id);
     return $user;


    }


}
