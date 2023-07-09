<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class DashboardController extends Controller
{
   public function index()
	{
	    $pageData['page_title'] = 'Product Page';
	    $pageData['data'] = Product::with('productdetail.product')->get();
		
		if(Auth::user()->user_role != 'Administrator'){
			$pageData['activeCart'] = Cart::where(['status' => 1, 'user_id' => Auth::user()->id])->get();
		}else {
			$pageData['activeCart'] = 'You dint have any cart';
		}
		
	    if (Auth::user() && Auth::user()->user_role == 'Administrator') {
			return redirect(route('dashboard.admin.index'));
	    } else {
			// $pageData['activeCart'] = Cart::where(['status' => 1, 'user_id' => Auth::user()->id])->get();
	        return view('user.index', $pageData);
	    }
	}

}

