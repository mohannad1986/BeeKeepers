<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return view('front.landing');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/first', 'HproductController@index')->middleware('CheckActive')->name('first');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/hony', function () {

    return view('hony');
});
// الراوت الخاص بالرولرز
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    });

// الراوت الي بياخدني على عرض اصحاب العسل المحدد
Route::get('/howner/{id}','KHasPController@index')->name('howner');
// ----
Route::get('44', function () {
    return view('khasp');
})->name('44');;

Route::get('55', function () {
    return view('khasprrr');
})->name('55');;

// ---------- اروت تاجر يطلب عسل  هاد الاجاكس-------------

Route::post('/orderh', 'HdealerKeeperController@store')->name('orderh');
// --------------------------------------

// الاوت الي بياخد النحال ع صفحة منلو
Route::get('/keeper/{id}','KeeperController@index2')->name('keeper');

// راوت االرفض من النحال على طلب تاجر العسل في صفحة النحال موجود

Route::post('/refuse_order', 'HdealerKeeperController@refuse')->name('refuse_order');

// راوت قبول الطلب من المقدم للنحال من التاجر في صفحة النحال
Route::get('/accept_order/{id}','HdealerKeeperController@accept')->name('accept_order');

// راوت النحال يضيف منتج عسل تابع له في صفحة النحال

Route::post('/keeper_add_h', 'KHasPController@store')->name('keeper_add_h');

// روات النحال يعدل معلومات منتج -- موجود في صفحة النحال
Route::post('/keeper_update_h', 'KHasPController@update')->name('keeper_update_h');



Route::get('keeper2', function () {
    return view('keeper2');
})->name('test2');

// الراوت الذي ياخذ النحال الى --صفحة عسله ومنتجاته
Route::get('/keepers_hony/{id}','KeeperController@keeperproducts')->name('keepers_hony');
Route::get('/keepers_hony/{id}','KeeperController@keeperproducts')->name('keepers_hony');

// الراوت الذي ياخذ النحال الى  طلبات وعروض الشراء منه
Route::get('/keepers_h_order/{id}','KeeperController@honeyorders')->name('keepers_h_order');

Route::get('/keepers_acces_order/{id}','KeeperController@keeper_acces_orders')->name('keepers_acces_order');

// الراوت الذي يحذف فيه النحال العسل تبعو في صفحة النحال موجود قسم عسلي

Route::post('/keeperDeleteHoney', 'KHasPController@destroy')->name('keeperDeleteHoney');

// ========================== قسم المستلزمااات ======================

// هاد الراوت بياخدني من الصفحة الرئيسية لصفحة تجار المستلزمااات

Route::get('/accesOwners/{id}','AcdealerHasAccController@index')->name('accesOwners');

// هاد راوت طلب  مستلزمات بعد ماتفوت ع صفحة الستلزم وشوفي الو تجار بتطلب هالغرض

Route::post('/order_acces', 'AccdealerKeepersController@create')->name('order_acces');

// هاد راوت بالناف بار اسمو طلبات شراء مستلزمات بيعرض لتاجر المستلزمات شو جايه طلبات شراء
Route::get('/accDealer_order/{id}','AccdealerKeepersController@show')->name('accDealer_order');

// هاد الراوت بصفحة طلبات الشراء الخاص بالتاجر تبع الاكسسري
Route::get('/accept_ACCorder/{id}','AccdealerKeepersController@accept')->name('accept_ACCorder');
Route::Post('/refuse_ACCorder','AccdealerKeepersController@refuse')->name('refuse_ACCorder');

// هلا الراوت الي بياخدني  ; كتاجر اسككري ع صفحة الاكسسريز الي عندي
Route::get('/dealer_acces/{id}','AcdealerHasAccController@show')->name('dealer_acces');

// هذا الراوت في صفحة الاكسسري ديلر بيضيف فيه التاجر اكسسسري الو
Route::post('/dealer_add_acces', 'AcdealerHasAccController@store')->name('dealer_add_acces');
// هذا الراوت في نفس صفحة الاكسسري الي بيملكها الاكسسري ديلر وهوي لحذف اكسسري
Route::post('/dealer_delete_acces', 'AcdealerHasAccController@destroy')->name('dealer_delete_acces');

Route::post('/accdealer_update_acc', 'AcdealerHasAccController@update')->name('acdealer_has_acc');

// --------- ما يخص تاجر العسل
Route::get('/dealer_honey_orders/{id}','HdealerKeeperController@hdealer_h_orders')->name('dealer_honey_orders');

// ********************************************************************
// ************************** الداش بور *******************
// ********************************************************************

// الراوت الي بياخدني عالمستخمين المفعلين  موجود بالسايد بار
Route::get('/active_users','UserController@activusers')->name('active_users');
//  الراوت الي بصفحة اليوزر الي بيخلين حول اليوزر لغير فعال
Route::get('/dis_active/{id}','UserController@disactive')->name('dis_active');

// عرض المسنخدمين غير المفعلين موجود بالسايد بار
Route::get('/unactive_users','UserController@unactivusers')->name('unactive_users');
// تفعيل المستخدمين موجود بالداش بورد صفخة المتخدمين الغير مفعلين
Route::get('/active/{id}','UserController@active')->name('active');
Route::post('/destroy','UserController@destroy')->name('destroy');

// ***********
// عرض مننتجات العسل
Route::get('/hproducts','HproductController@show')->name('hproducts');

// تعديل المنتجات موجود هالراوت بالمودل بصفحة المنتجات لتعديل منتج
Route::post('/update_honey','HproductController@update')->name('update_honey');
// اضافة منتج  عسل

Route::post('/create_honey','HproductController@create')->name('create_honey');
Route::post('/destroy_honey','HproductController@destroy')->name('destroy_honey');

// من السايد بار بياخدني عالمستلزمااات
Route::get('/accessories','AccessoriesController@index')->name('accessories');
// تعديل في المتجر
Route::post('/update_accesso','AccessoriesController@update')->name('update_accesso');
// اضاافة اكسسوريييز

Route::post('/create_accesso','AccessoriesController@create')->name('create_accesso');
// حذف عسل
Route::post('/destroy_accesso','AccessoriesController@destroy')->name('destroy_accesso');


// ***********************************************************************************
// *********************************************************************************

Route::get('/visitkeeper/{id}','UserController@visitkeeper')->name('visitkeeper');
Route::get('/visitAccesDealer/{id}','UserController@visitAccesDealer')->name('visitAccesDealer');



































