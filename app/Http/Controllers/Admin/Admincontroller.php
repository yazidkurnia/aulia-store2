<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class Admincontroller extends Controller
{
    public function index()
    {
    	$pageData['page_name'] = 'Dashboard';
        return view('admin.index');
    }
}
