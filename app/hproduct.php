<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hproduct extends Model
{

    protected $fillable = [
        'Product_name', 'description', 'p_photo'
        ];

    public function keeperHas()
    {
        return $this->hasOne('App\k_has_p','hproducts_id');
    }




}
