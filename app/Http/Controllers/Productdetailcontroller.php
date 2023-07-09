<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Productdetailcontroller extends Controller
{
    public function detail_product($id)
    {
        $valid = decrypt($id);
        $product = Product::with('productdetail.product')->find($valid);

        $pageData['page_title']      = 'Product Detail';
        $pageData['data']            = Product::with('productdetail.product')->find($valid);
        $pageData['related_product'] = Product::where('product_category_id', $product->productdetail->product_category_id)->get() != NULL ? Product::where('product_category_id', $product->productdetail->product_category_id)->get() : NULL ;
        // dd($pageData['related_product']);

        return view('user.product', $pageData);
    }
}
