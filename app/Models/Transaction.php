<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use softDeletes ;

    protected $table = 'transactions';

    protected $fillable = [
       'uuid','name','email','number','addres','transaction_total','transaction_status'
    ];

    protected $hidden = [

    ];

    public function details ()
    {
       return $this->hasMany(TransactionDetails::class, 'transactions_id') ;
    }
   
}
