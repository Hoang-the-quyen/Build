<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function add_category(){
        return view('admin.add_category_product');
    }

    public function all_category(){
        $all_category_product = DB::table('tbl_category_product')->get();
        return view('admin.all_category_product')->with('all_category_product',$all_category_product);
    }

    public function save_category(Request $request){
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_des'] = $request->category_des;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category_product')->insert($data);

        Session::put('message','bạn đã thêm danh mục thành công.');
        return Redirect::to('/add-category-product');
    }

    public function active_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Bạn đã kích hoạt trạng thái ẩn danh mục');
        return Redirect::to('/all-category-product');
    }

    public function unactive_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Bạn đã kích hoạt trạng thái hiện danh mục');
        return Redirect::to('/all-category-product');
    }

    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        return view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    }

    public function update_category_product(Request $request,$category_product_id){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_des'] = $request->category_des;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','cập nhật danh mục thành công');
        return Redirect::to('/all-category-product');

    }

    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Bạn đã xóa danh mục thành công');
        return Redirect::to('/all-category-product');
    }

   //category detail

   public function category_detail($category_id){
    $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
    $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

    $pro_product = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    ->where('product_status','1')->where('tbl_product.category_id',$category_id)->orderBy('product_id','desc')->get();

    foreach ($cate_product as $key => $cate_pro) {
        $pro_product_count = DB::table('tbl_product')
                                ->where('product_status', '1')
                                ->where('category_id', $cate_pro->category_id)
                                ->count();
        $cate_pro->product_count = $pro_product_count;
    }

    return view('pages.category.category_detail')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
    ->with('sup_product',$sup_product)->with('pro_product_count', $pro_product_count);

   }

   

}
