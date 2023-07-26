<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\Stock;
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
           foreach ($itemCheckout as $key => $value) {
                DB::beginTransaction();
                // NOTE:: update order code of cart
                $value->order_code = $transactionCode;
                $value->save();
       
                // NOTE:: get summary of total stock by item id
                $totalStockByProductId = Stock::where('item_id', $value->product_id)->sum('total_stock');
                // NOTE:: do operation to stock
                Stock::where('item_id', $value->product_id)
                     ->update(['total_stock' => $totalStockByProductId - $value->totalqty]);
                
                DB::commit();
            }

            
            return response()->json([
                'status_code' => 200,
                'status_maessage' => ['Success', 'Success checkout'],
                'data' => $itemCheckout
                // 'data' => $data
            ]);
        }
    }
}
