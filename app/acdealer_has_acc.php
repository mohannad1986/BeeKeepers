<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acdealer_has_acc extends Model
{


    protected $fillable =["user_id","accessory_id","amount","price"];


// الان هاذا التابع لصفحة تاجر امستلزمات ليشوف فيها مستلزماتو الي بيملكا
// هاد التابع بيربط بيمن اسم المستلزم بمودل المستلزمات
// زالكمية والسعر بمودل اسكسس ديلرز هاس اكسسوري
public function accessories(){

    return $this->belongsTo('App\accessories','accessory_id','id');

}

// ---------------------------------------------------------------
//    هاد التابع بعد ما اضغط على نوع من الاسسوري بروح ع صفحة بتعرض التجار الي عندن ياه
// هاد التابع بيجيب اسماء التجار الي عندن هالاكسسوري ومعلوماتهم
// بتلاقيه مطبق في الكنترولر  AcdealerHasAccController
// بتابع الاندكس

    public function allAccesDealers()
    {
        return $this->belongsTo('App\User','user_id','id');

    }



}
