<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class SupplierController extends Controller
{
    public function add_supplier(){
        return view('admin.supplier.add_supplier');
    }
    //insert
    public function save_supplier(Request $request){
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_des'] = $request->supplier_des;
        $data['supplier_status'] = $request->supplier_status;
        $data['supplier_phone'] = $request->supplier_phone;
        $data['supplier_address'] = $request->supplier_address;

        DB::table('tbl_supplier')->insert($data);
        Session('message','Bạn đã thêm nhà cung cấp thành công !');
        return Redirect::to('/all-supplier');
    }

    public function all_supplier(){
        $all_supplier = DB::table('tbl_supplier')->get();
        return view('admin.supplier.all_supplier')->with('all_supplier',$all_supplier);
    }

    // update status
    public function active_supplier($supplier_id){
        DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->update(['supplier_status'=>0]);
        Session::put('message','Không còn nhập vật liệu ở đơn vị này !');
        return Redirect::to('/all-supplier');
    }

    public function unactive_supplier($supplier_id){
        DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->update(['supplier_status'=>1]);
        Session::put('message','Tiếp tục nhập vật liệu ở đơn vị này !');
        return Redirect::to('/all-supplier');
    }

    // update all

    public function edit_supplier($supplier_id){
        $edit_sup = DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->get();
        return view('admin.supplier.edit_supplier')->with('edit_sup',$edit_sup);
    }

    public function update_supplier(Request $request,$supplier_id){
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_des'] = $request->supplier_des;
        $data['supplier_phone'] = $request->supplier_phone;
        $data['supplier_address'] = $request->supplier_address;

        DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->update($data);
        Session::put('message','Bạn đã sửa thông tin nhà cung cấp thành công !');
        return Redirect::to('/all-supplier');
    }

    // delete

    public function delete_supplier($supplier_id){
        DB::table('tbl_supplier')->where('supplier_id',$supplier_id)->delete();
        Session::put('message','Bạn đã xóa nhà cung cấp thành công !');
        return Redirect::to('/all-supplier');
    }

     //category detail

   public function supplier_detail($supplier_id){
    $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
    $sup_product = DB::table('tbl_supplier')->orderBy('supplier_id','desc')->get();

    $pro_product = DB::table('tbl_product')->join('tbl_supplier','tbl_product.supplier_id','=','tbl_supplier.supplier_id')
    ->where('product_status','1')->where('tbl_product.supplier_id',$supplier_id)->orderBy('product_id','desc')->get();

    foreach ($cate_product as $key => $cate_pro) {
        $pro_product_count = DB::table('tbl_product')
                                ->where('product_status', '1')
                                ->where('category_id', $cate_pro->category_id)
                                ->count();
        $cate_pro->product_count = $pro_product_count;
    }

    return view('pages.supplier.supplier_detail')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
    ->with('sup_product',$sup_product)->with('pro_product_count', $pro_product_count);

   }

}
