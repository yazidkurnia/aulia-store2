<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Productdetail;
use Auth;
use DB;

/**
 * to create a function remember to create it 
 * with single prosses only 
 **/

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
            // 'carts.qty as qtyOfCart'
        )
        ->where('carts.user_id', Auth::user()->id)
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('productdetails', 'products.id', '=', 'productdetails.product_id')
        ->leftJoin('productimages', 'products.id', '=', 'productimages.product_id')
        ->get();

        $pageData['page_title'] = 'User Cart';
        $pageData['activeCart'] = Cart::where('status', '=', 1)->get();
        $pageData['countUserCart'] = Cart::where('user_id', '=', Auth::user()->id)->count();

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

    public function min_to_cart(Request $request){}

    public function update_status_order(Request $request)
    {
        /**
         * NOTE:: the request is fill with value from id and status
         *        id have been encrypt so to get the value
         *        decryot first
         */
        $validId = decrypt($request->id);

        // NOTE:: get data cart and product
        $cart = Cart::find($validId);

        if($validId == NULL)
        {
            return response()->json([
                'status_message' => 'Failed',
                'status_code' => 500
            ]);
        } else {
            if ($request->status == 1) {
                $cart->order_status = $request->status;
                $cart->save();
            }else{
                $cart->order_status = $request->status;
                $cart->save();
            }

            // NOTE:: get active cart with order status = 1
            $cartToOrder =  Cart::select(
                'carts.id as cart_id',
                'carts.totalqty as qtyOfCart',
                'productdetails.prise as productprice'
            )
            ->where(['carts.user_id' => Auth::user()->id,'carts.order_status' => 1])
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->leftJoin('productdetails', 'productdetails.product_id', '=', 'products.id')
            ->get();

            return response()->json([
                'status_message' => 'Success',
                'status_code' => 200,
                'data' => $cartToOrder
            ]);
        }
    }

    public function get_active_order()
    {
        $cartToOrder = Cart::where(['carts.user_id' => Auth::user()->id, 'cars.order_status' => 1])->get();
        dd($cartToOrder);
    }

    /*
    * @param : array id
    */
    public function add_cart_qty(Request $request)
    {
        $cart          = Cart::find($request->id);
        $productDetail = Productdetail::where('product_id', $cart->product_id)->get();
        $subtotal      = $productDetail[0]->prise * $request->qty;

        // NOTE:: do update cart qty and subtotal
        $cart->totalqty = $request->qty;
        $cart->subtotal = $subtotal;
        $cart->save();

        return response()->json([
            'status_message' => 'Success',
            'status_code'    => 200
        ]);
    }

    public function getBill()
    {
        $getCartByOrderStatusActive = Cart::where(['user_id' => Auth::user()->id, 'order_status' => 1])->get();
        $countItem                  = Cart::where(['user_id' => Auth::user()->id, 'order_status' => 1])->count();
        $total                      = [];
        $i                          = 0;
        $totalPrice                 = 0;

        foreach($getCartByOrderStatusActive as $v)
        {
            $total[] += $v->subtotal;
        }

        for ($i=0; $i < count($total); $i++) { 
            $totalPrice += $total[$i];
            // $totalPrice += $total[$i];
        }

        $data = array(
            'subtotal' => number_format($totalPrice, 2, '.', '.'),
            'totalqty' => $countItem
        );

        return response()->json([
            'status_message' => 'Success',
            'status_code'    => 200,
            'data'           => $data
        ]);
    }

}
