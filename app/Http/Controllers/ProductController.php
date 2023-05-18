<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{

    // dashboard view
    public function add_product(){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();
        return view('admin.product.add_product')->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product);
    }

    public function all_product(){

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id', '=' ,'tbl_category_product.category_id')
        ->join('tbl_supplier','tbl_product.supplier_id', '=' ,'tbl_supplier.supplier_id')
        ->orderBy('product_id','desc')->get();

        return view('admin.product.all_product')->with('all_product',$all_product);
    }

    public function edit_product($product_id){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->orderBy('product_id','desc')->get();

        return view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product);
    }
    // contoller
    //insert
    public function save_product(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_des'] = $request->product_des;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        $data['category_id'] = $request->cate_product;
        $data['supplier_id'] = $request->sup_product;


        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_name_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            // upload vào folder
            $get_image->move('public/uploads/product',$get_name_image);
            $data['product_image'] = $get_name_image;

            DB::table('tbl_product')->insert($data);
            Session::put('messager','Thêm sản phẩm thành công !');
            return Redirect::to('/add-product');
        }
        $data['product_image'] ='';
        DB::table('tbl_product')->insert($data);
        Session::put('messager','Thêm sản phẩm thành công !');
        return Redirect::to('/all-product');

    }


    // update

    public function active_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('/all-product');
    }

    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('/all-product');
    }

    public function update_product(Request $request,$product_id){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_des'] = $request->product_des;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->cate_product;
        $data['supplier_id'] = $request->sup_product;


        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_name_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            // upload vào folder
            $get_image->move('public/uploads/product',$get_name_image);
            $data['product_image'] = $get_name_image;

            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('messager','Sửa sản phẩm thành công !');
            return Redirect::to('/all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('messager','Sửa sản phẩm thành công !');
        return Redirect::to('/all-product');
    }

    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('messager','Sửa sản phẩm thành công !');
        return Redirect::to('/all-product');

    }

    //product detail

    public function product_detail($product_id){
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->where('product_id',$product_id)->orderBy('product_id','desc')->where('product_status','1')->get();

        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.product.product_detail')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product);

    }


}
