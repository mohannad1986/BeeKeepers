<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class k_has_p extends Model
{



    protected $fillable = [
        'user_id', 'hproducts_id', 'amount','price'
        ];

    // بصفحة عسلي
    //  هاد بيجبلي انا كمربي نحل شو عندي منتجات
    // بكنترولر الكيبر كونترولر بتابع  keeperproducts
    public function hproduct(){

        return $this->belongsTo('App\hproduct','hproducts_id','id');

    }

//    هاد التابع هلا انشاءناه  مشان صفحة كل نوع عسل شو عندو  نحالة مالكين الو
// بكنترولر KHasPController
// بتابع  index

    public function keeperinfo()
    {
        return $this->belongsTo('App\User','user_id','id');

    }

}
