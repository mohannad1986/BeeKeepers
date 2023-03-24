<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accdealer_keepers extends Model
{
    protected $fillable =["acdealer_id","keeper_id","accessoryId","offered_price","amout","status"];

    public function getStatusAttribute($val){

        if($val == 0){
            return'معلق' ;
        }elseif($val == 1){
            return'تمت الموافقة' ;

        }elseif($val == 2){

            return'مرفوض' ;
        }
    }


    // في صفحة تجار المستلزمات  قسم طلبات شراء المسلتزمات

    // هاد التابع ليجبلي معلومات النحالين الي طلبو مستلزمات من تجار المسلتزمات
    // بتلاقيه بالكنترولر   AccdealerKeepersController
    // بقسم show
    // الراوت الي بنادي عليه accDealer_order/{id} موجود بالناف بار

    public function keepersOrderAcces()
    {
        return $this->belongsTo('App\User','keeper_id','id');

    }

    // هاد مستخدم بملف النحال صفحة طلبات شراء قدمتها انا كنحال
    // بيظهرلي اسم ومعلومات تاجر المستلزمات الي انا طلبت منو
    // مع معلومات الغرض المطلبوووب
    // بكنترولر النحال بتلاقيه بتابع اسمو keeper_acces_orders

    public function accesdealers()
    {
        return $this->belongsTo('App\User','acdealer_id','id');

    }




}
