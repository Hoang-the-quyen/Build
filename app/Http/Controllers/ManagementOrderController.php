<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();
class ManagementOrderController extends Controller
{
    public function management_order(Request $request){

       $view_order = DB::table('tbl_order')->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment_id')
       ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->orderBy('order_id','desc')->get();

        return view('admin.order.management_order')->with('view_order',$view_order);
    }

    public function management_order_detail($order_id){
        $view_order_detail_customer = DB::table('tbl_order')->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')->where('order_id',$order_id)->get();
        $view_order_detail = DB::table('tbl_order_detail')->join('tbl_order','tbl_order_detail.order_id','=','tbl_order.order_id')->where('tbl_order_detail.order_id',$order_id)->get();
        return view('admin.order.management_order_detail')->with('view_order_detail_customer',$view_order_detail_customer)->with('view_order_detail',$view_order_detail);
    }
}
