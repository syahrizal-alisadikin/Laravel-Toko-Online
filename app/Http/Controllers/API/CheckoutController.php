<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use App\Http\Controllers\Controller;
use App\http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product)
        {
            $details[] = new TransactionDetails([
                'transactions_id' => $transaction->id,
                'product_id' => $product,
            ]);

            Product::find($product)->decrement('quantity');
        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
