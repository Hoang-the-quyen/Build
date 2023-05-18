<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('pages.checkout.login_checkout');

    }

    public function register_checkout(){
        return view('pages.checkout.register_checkout');
    }

    public function checkout(){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->orderBy('product_id','desc')->where('product_status','1')->get();

        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.checkout.show_checkout')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product);

    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->orderBy('product_id','desc')->where('product_status','1')->get();

        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.checkout.payment')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product);

    }

    public function order_place(Request $request){
        // inser payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ sử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // insert order
        $data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total(0);
        $order_data['order_status'] = 'Đang chờ sử lý';
        $order_id =DB::table('tbl_order')->insertGetId($order_data);
        // inser order detail
        $content = Cart::content();
        foreach($content as $v_content){
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $v_content->id;
            $order_detail_data['product_name'] = $v_content->name;
            $order_detail_data['product_price'] = $v_content->price;
            $order_detail_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insert($order_detail_data);
        }
        if( $request->payment_option==1){
            echo '<script>alert("Bạn đã đặt hàng thành công!");</script>';

        }
        elseif( $request->payment_option==2){
            Cart::destroy();
            echo '<script>alert("Bạn đã đặt hàng thành công!");</script>';
            $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
            $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

            $pro_product = DB::table('tbl_product')->orderBy('product_id','desc')->where('product_status','1')->get();

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
        else{
            echo 'Thanh toán ví điện tử';
        }
    }
}
