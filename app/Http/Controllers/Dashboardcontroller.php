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
		
		if( Auth::user() && Auth::user()->user_role != 'Administrator'){
			$pageData['activeCart']    = Cart::where(['status' => 1, 'user_id' => Auth::user()->id])->get();
			$pageData['countUserCart'] = Cart::where('user_id', '=', Auth::user()->id)->count();
		}else {
			$pageData['activeCart']    = 'You dint have any cart';
			$pageData['countUserCart'] = 0;
		}
		
	    if (Auth::user() && Auth::user()->user_role == 'Administrator') {
			return redirect(route('dashboard.admin.index'));
	    } else {
	        return view('user.index', $pageData);
	    }
	}

}

