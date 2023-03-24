<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\ElseIf_;

class hdealer_keeper extends Model
{
    protected $fillable =["hdealer_id","keeper_id","productId","keeper_price","offered_price","amout","status"];


    public function getStatusAttribute($val){

        if($val == 0){
            return'معلق' ;
        }elseif($val == 1){
            return'تمت الموافقة' ;

        }elseif($val == 2){

            return'مرفوض' ;
        }


    }

    // هاد التابع شغال بصفحة النحال قسم طلبات شراء العسل
    // هوي الي بيجيب اسماء ومعلومات التجار
    // بالكنترولر KeeperController
    // التابع honeyorders

      public function honyDealer()
    {
        return $this->belongsTo('App\User','hdealer_id','id');

    }

    // هاد التابع مستخدم بصفحة التاجر تبع العسل
    // الصفحة الي بشوف فيها تاجر العسل طلبات الشراء الي بعتها للنحالة ليشتري عسل
    // رح تلاقيه بالكنترولر HdealerKeeperController
    // رح تلاقيه بالتابع  hdealer_h_orders


    public function keepers()
    {
        return $this->belongsTo('App\User','keeper_id','id');

    }



}
