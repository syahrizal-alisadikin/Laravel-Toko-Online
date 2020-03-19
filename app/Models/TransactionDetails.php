<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionDetails extends Model
{
    use softDeletes ;

    protected $table = 'transaction_details';

    protected $fillable = [
       'transactions_id','product_id'
    ];

    protected $hidden = [

    ];

   
    public function transaction()
    {
       return $this->belongsTo(Transaction::class, 'transactions_id','id');
    }

    public function product()
    {
       return $this->belongsTo(Product::class, 'product_id','id');
    }

}
