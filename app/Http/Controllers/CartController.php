<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{


    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 111);

        $data = array();
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['qty'] = $quantity;
        $data['price'] = $product_info->product_price;
        $data['weight'] =$product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        // sét thuế
        Cart::setGlobalTax(0);
        return Redirect::to('show_cart');
        // Cart::destroy();
        // echo 'huy thanh cong';
    }

    public function show_cart(){
        return view('pages.cart.cart_detail');

    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('show_cart');

    }



    public function update_cart_quantity_add(Request $request){
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;

        Cart::update($rowId,$quantity +1);
        return Redirect()->back();

    }
    public function update_cart_quantity_minus(Request $request){
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;

        Cart::update($rowId,$quantity -1);
        return Redirect()->back();

    }

    //cart ajax

    public function delete_cart_ajax($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
        else{
            return Redirect()->back();
        }
    }
    // update quantity
    public function update_qty_ajax_plus($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key =>$item){
                if($item['session_id'] == $session_id){
                    $cart[$key]['product_qty'] ++;
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
        else{
            return Redirect()->back();
        }
    }

    public function update_qty_ajax_minus($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key =>$item){
                if($item['session_id'] == $session_id){
                    if($cart[$key]['product_qty'] > 1){
                        $cart[$key]['product_qty'] --;
                    }
                    else{
                        Session::put('cart',$cart);
                         return Redirect()->back();
                    }
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
        else{
            return Redirect()->back();
        }
    }


    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = session::get('cart');

        if ($cart == true) {
            $product_exists = false;

            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    // Tìm thấy sản phẩm trong giỏ hàng, cập nhật số lượng
                    $cart[$key]['product_qty'] += $data['cart_product_qty'];
                    $product_exists = true;
                    break;
                }
            }

            if (!$product_exists) {
                // Không tìm thấy sản phẩm trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
                $cart[] = [
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_price' => $data['cart_product_price'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                ];
            }
        } else {
            // Giỏ hàng rỗng, thêm sản phẩm mới vào giỏ hàng
            $cart[] = [
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_price' => $data['cart_product_price'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
            ];
        }

        Session::put('cart', $cart);
        Session::save();

    }

    public function gio_hang(){
        Cart::destroy();
        return view('pages.cart.cart_ajax');

    }

    public function check_coupon(Request $request){
        $data = $request->all();
    //     print_r($data);
    //    return Redirect::to('/gio_hang');

        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_vaiable =0;
                    if($is_vaiable ==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_codition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                         }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_codition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return Redirect()->back();
                }

            }else{
                return Redirect()->back();

            }
        }
    }

