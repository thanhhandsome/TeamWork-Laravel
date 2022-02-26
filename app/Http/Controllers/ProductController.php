<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Sanphamreq;
use App\hinhanh;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Carbon;
session_start();

class ProductController extends Controller
{    
   
    public function edit_product($product_id)
    {
        $edit_product = DB::table('sanpham')->where('masp',$product_id)->get();
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$cate_brand);

        return view ('admin_layout')->with('admin.edit_product',$manager_product);
    
    }
    public function all_product()
    {   
        $all_product = DB::table('sanpham')
        ->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->paginate(5);
        
        $manager_product = view('admin.all_product')
        ->with('all_product',$all_product);
        

        return view ('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function add_product()
    {   
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        
        return view ('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }
    public function save_product(Sanphamreq $request)
    {
        $data = array();
        $data['masp'] = $request->product_id;
        $data['tensp'] = $request->product_name;
        $data['soluong'] = $request->product_qty;
        // $data['sanphamdaban'] = $request->product_sold;
        $data['gia'] = $request->product_price;
        $data['hinh'] = $request->product_img;
        $data['mota'] = $request->product_img;
        $data['mota'] = $request->product_inf;
        $data['mansx'] = $request->product_mansx;
        $data['maloai'] = $request->product_maloai;
    
        
        $get_img = $request->file('product_img');
        if($get_img !='' )
        {   $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_name_img;
            $get_img->move('public/frontend/img',$new_img);
            $data['hinh'] = $new_img;
            DB ::table('sanpham')->insert($data);
            Session()->put('message','Them san pham thanh cong');
            return Redirect::to('add-product');
        }

         $data['hinh']='NULL';
         DB::table('sanpham')->insert($data);
         Session()->put('message','Them san pham thanh cong');
         return Redirect::to('add-product');
    }
    public function update_product($product_id,Request $request)
    {   
        $validated = $request->validate([
            'product_name' => 'required|max:250',
            'product_img' => 'mimes:jpg,jpeg,png|max:2048',
            
        ],[
            'product_name.required'=>'Vui lòng không bỏ trống tên sản phẩm',
          
        ]);
        $data = array();
        $data['tensp'] = $request->product_name;
        $data['gia'] = $request->product_price;
        $data['mansx'] = $request->product_mansx;
        $data['maloai'] = $request->product_maloai;
        $get_img = $request->file('product_img');
        if($get_img)
        {     
            $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_name_img;
            $get_img->move('public/frontend/img',$new_img);
            $data['hinh'] = $new_img;
            DB::table('sanpham')->where('masp',$product_id)->update($data);
        Session()->put('message','cap nhat san pham thanh cong thanh cong');
        return Redirect::to('all-product');

        }

        DB::table('sanpham')->where('masp',$product_id)->update($data);
        Session()->put('message','cap nhat san pham thanh cong thanh cong');
        return Redirect::to('all-product');

    }
    public function del_product($product_id)
    { $a=  DB::table('chitietsp')->where('masp',$product_id)->count();
      
        if($a==0)
        {
        DB::table('sanpham')->where('masp',$product_id)->delete();


        return Redirect::to('all-product')->with('message','cap nhat danh muc thanh cong');
        }
        else
        {
            return Redirect::to('all-product')->with('message','Không thể xóa');
        }

    }
    public function all_img($id)
    {   $a = DB::table('hinhanh')->where('mactsp',$id)->get();
        $manager_product = view('admin.all-img')
        ->with('images',$a)->with('id',$id);
        

        return view ('admin_layout')->with('admin.all_product',$manager_product);

    }
    public function save_img(Request $request)
    {  
       

        $data = array();
        $data['tenhinh'] = $request->name;
        $get_img = $request->file('img');
        if($get_img)
        {   $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_name_img;
            $get_img->move('public/frontend/img',$new_img);
            $data['hinh'] = $new_img;
            $data['mactsp'] = $request->id;
            $data['status']=$request->status;
            DB::table('hinhanh')->insert($data);
        return redirect()->back()->with('message','Thêm thành công');

        }
        else
        {
            return redirect()->back()->with('message','Vui lòng chèn file hình');
        }
        


    }
    //end admin page
    public function show_details_product($product_id)
    {
        $cate_product = DB::table('loaisanpham')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $product = DB::table('sanpham')
        // ->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        // ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')
        ->where('sanpham.masp', $product_id)
        ->get();

        $details_product = DB::table('sanpham')
        ->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')
        ->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')
        ->join('chitietsp', 'sanpham.masp', '=', 'chitietsp.masp')
        // ->join('sanpham', 'sanpham.masp', '=', 'chitietsp.masp')
        ->where('chitietsp.mactsp', $product_id)
        // ->where('sanpham.masp', $product_id)
        ->get();
        $hinh = hinhanh::where('mactsp',$product_id)->get();
        //show danh gia
        foreach($details_product as $a)
        {
            $danhgia =DB::table('danhgia')
            ->join('chitietdh', 'danhgia.mactdh', '=','chitietdh.id')
            ->where('chitietdh.masp',$a->masp)
            ->where('chitietdh.mausac',$a->mausac)
            ->get();

            $product_km = DB::table('sanpham')
            ->join('chitietkm','sanpham.masp','=','chitietkm.masp')
            ->join('khuyemai','chitietkm.makm','=','khuyemai.makm')
            ->where('chitietkm.masp',$a->masp)
            ->first();
      

        }
       
        $time=Carbon::now('Asia/Ho_Chi_Minh');
        // foreach ($details_product as $key => $value) {
        //     $category_id = $value->maloai;
        // }
        // $related_product = DB::table('sanpham')->join('nhasx', 'sanpham.mansx', '=','nhasx.mansx')->join('loaisanpham', 'sanpham.maloai', '=', 'loaisanpham.maloai')->where('loaisanpham.maloai', $category_id)->whereNotIn('sanpham.masp', [$product_id])->get();
        return view('pages.product.show_details')->with('product',$product)
        ->with('cate_product',$cate_product)->with('brand_product',$cate_brand)
        ->with('product_details',$details_product)
        ->with('hinh',$hinh)
        ->with('danhgia',$danhgia)
        ->with('product_km',$product_km)
        ->with('time',$time);
    }
    public function danh_gia($id,Request $rq)
    {
        $b=DB::table('chitietdh')->select('chitietdh.madh','chitietdh.id','donhang.makh','chitietdh.soluong as slban','sanpham.soluong as slton','sanpham.masp','donhang.trangthai')
        ->join('sanpham', 'chitietdh.masp','=','sanpham.masp')
        ->join('donhang', 'chitietdh.madh','=','donhang.madh')
        ->where('chitietdh.masp',$id)
        ->where('donhang.trangthai',"Đã giao")
        ->where('donhang.makh',Session::get('makh'))
        ->first();
     
      if($b)
      {
    
        $a = array();
      
        $a['mactdh']=$b->id;
        $a['ten']=Session::get('name');
        $a['noidung']=$rq->content;
        $a['parent_id']=0;
        $a['trangthai']='Hiện';
       
        DB::table('danhgia')->insert($a);
        return redirect()->back();
       
      
    
        }
   
      
      else
      { 
        return redirect()->back()->with('loibinhluan', 'Bạn chưa mua hàng hoặc sản phẩm chưa giao tới bạn!');
      }
    
    }
    public function sendsms()
    { 
        // Nexmo::message()->send([
        //     'to'   => '84879327833',
        //     'from' => '84879327833',
        //     'text' => 'Email được xác nhận ',
        // ]);
        // $length=2;
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $charactersLength = strlen($characters);
        // $randomString = '';
        // for ($i = 0; $i < $length; $i++) {
        //     $randomString .= $characters[rand(0, $charactersLength -1)];
        // }
        // echo $randomString;
    }
    
}
