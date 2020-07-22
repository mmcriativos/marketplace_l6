<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'image'
    ];

    //PERTENCE A UM PRODUTO
    public function product()
    {
        return $this->belongsTo(Product::class); 
    }
}
