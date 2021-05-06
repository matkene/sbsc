<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Coupon;

class ProductController extends Controller
{
    //Create the Product items
    public function getProduct(){
    $products = Product::all();
    $coupons = Coupon::all();

    return view('welcome')->withProducts($products)->withCoupons($coupons);
    }
}
