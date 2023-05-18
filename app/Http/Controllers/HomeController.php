<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->where('product_status','1')->take(8)->inRandomOrder()->get();

        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.home')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product);

    }


}
