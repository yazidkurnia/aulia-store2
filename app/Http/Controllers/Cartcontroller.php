<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Auth;
use DB;

class Cartcontroller extends Controller
{
    public function index()
    {
        $pageData['cartList'] = Cart::select(
            'carts.id as cart_id',
            'products.id as product_id',
            'carts.product_id as product_from_cart',
            'productdetails.id as productdetail_id',
            'productimages.id as productimage_id',
            'carts.*',
            'products.*',
            'productdetails.*',
            'productimages.*'
        )
        ->where('carts.user_id', Auth::user()->id)
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('productdetails', 'products.id', '=', 'productdetails.product_id')
        ->leftJoin('productimages', 'products.id', '=', 'productimages.product_id')
        ->get();
    
    
        $pageData['page_title'] = 'User Cart';
        $pageData['activeCart'] = Cart::where('status', '=', 1)->get();
        // dd($pageData['cartList']);

        return view('user.cartlist', $pageData);
    }

    public function add_to_cart(Request $request){
        DB::beginTransaction();
        try{
            Cart::create([
                'user_id'    => Auth::user()->id,
                'product_id' => decrypt($request->productid),
                'totalqty'   => 0,
                'status'     => 1
            ]);
            DB::conmit();
            $status = TRUE;
            // return redirect(route('dashboard.user.cart.list'));
            return response()->json($status);
        }catch(Exception $error){
            DB::rollback();
            $status = FALSE;
            return response()->json($status);
        }
    }

    public function update_status_order(Request $request)
    {
        /**
         * NOTE:: the request is fill with value from id and status
         *        id have been encrypt so to get the value
         *        decryot first
         */
        $validId = decrypt($request->id);
        if($validId == NULL)
        {
            return response()->json([
                'status_message' => 'Success',
                'status_order' => $validId
            ]);
        } else {
            $cart = Cart::find($validId);
            $cart->order_status;
            $cart->save();
    
            return response()->json([
                'status_message' => 'Success',
                'status_order' => $validId,
                'data' => $cart
            ]);
        }
    }

}
