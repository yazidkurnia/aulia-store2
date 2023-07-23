<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Cart;
use DB;

class Checkoutcontroller extends Controller
{
    // NOTE:: controller function

    // NOTE:: ajax result function
    public function storeCheckout(Request $request)
    {
        $transactionCode = $request->transaction_code;

        // NOTE:: melakukan pengecekan terhadap kode transaksi
        $oldCheckout = Checkout::where('transaction_code', $transactionCode)->first();

        if ($oldCheckout) {
            // do :: penolakan terhadap transaksi
            return response()->json([
                'status_code' => 200,
                'status_message' => ['Failed', 'Transaction failed the transaction code have been used'],
            ]);
        }else{
            // do :: lanjutkan trasaksi
            // NOTE:: lakukan proses pengurangan stok dari item
            // get item to check out

            $itemCheckout = Cart::where(['status' => 1, 'order_status' => 1])->get();

            // dd($itemCheckout);
            DB::beginTransaction(function() {
                $itemCheckout->order_code = $transactionCode;
                $itemCheckout->save();
                // NOTE:: get stock
                $getStock = Stock::where('item_id', $itemCheckout->id)->first();
            });

            return response()->json([
                'status_code' => 200,
                'status_maessage' => ['Success', 'Success checkout'],
                'data' => $itemCheckout
                // 'data' => $data
            ]);
        }
    }
}
