<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use App\Events\Visit;
use DB;
use Hash;
class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function activusers(Request $request)
{
$data = User::where('status','1')->orderBy('id','DESC')->paginate(5);
return view('front.dashboard.users.active1',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}

public function unactivusers(Request $request)
{
$data = User::where('status','0')->orderBy('id','DESC')->paginate(5);
return view('front.dashboard.users.unactive1',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();
return view('users.create',compact('roles'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles' => 'required'
]);
$input = $request->all();
$input['password'] = Hash::make($input['password']);
$user = User::create($input);
$user->assignRole($request->input('roles'));
return redirect()->route('users.index')
->with('success','User created successfully');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('users.edit',compact('user','roles','userRole'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'password' => 'same:confirm-password',
'roles' => 'required'
]);
$input = $request->all();
if(!empty($input['password'])){
$input['password'] = Hash::make($input['password']);
}else{
$input = array_except($input,array('password'));
}
$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('roles'));
return redirect()->route('users.index')
->with('success','User updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
   $id=  $request->id;
User::find($id)->delete();
return redirect()->back()->with('message', 'ت حذف المستخدم بنجاح');


}

public function disactive($id){

    $usera= User::find($id);
    if($usera){
        $usera->update([
            "status"=>'0'

        ]);

        return redirect()->back()->with('message', 'تم الغاء تفعيل المستخدم بنجاح');

    }
}
        public function active($id){
            $usera= User::find($id);
            if($usera){
                $usera->update([
                    "status"=>'1'

                ]);

                return redirect()->back()->with('message', 'تم  تفعيل المستخدم بنجاح');

            }
        }

        public function visitkeeper($id) {

              $user=User::find($id);
              event( new  Visit($user));

              return redirect()->route('keepers_hony', [$id]);


        }

        public function visitAccesDealer($id) {

            $user=User::find($id);
            event( new  Visit($user));

            return redirect()->route('dealer_acces', [$id]);


      }



}


