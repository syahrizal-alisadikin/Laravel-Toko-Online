<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use softDeletes ;

    protected $table = 'product_galleries';

    protected $fillable = [
       'product_id','photo','is_default'
    ];

    protected $hidden = [

    ];

    public function product ()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
