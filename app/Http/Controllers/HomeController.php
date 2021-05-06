<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Coupon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $coupons = Coupon::all();
        return view('home')->withProducts($products)->withCoupons($coupons);
    }
}
