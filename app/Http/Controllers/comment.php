<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();
class comment extends Controller
{
    public function binh_luan()
    {
      $cmt = DB::table('danhgia')
      ->join('chitietdh','danhgia.mactdh','=','chitietdh.id')
      ->get();
      $manager= view('admin.all_binhluan')
        ->with('cmt',$cmt);
        return view ('admin_layout')->with('admin.all_binhluan',$manager);
    }
    public function trang_thai_cmt($id)
    {
      $cmt = DB::table('danhgia')->where('mabinhluan',$id)->get();
      $manager= view('admin.trangthaibinhluan')
        ->with('cmt',$cmt);
        

        return view ('admin_layout')->with('admin.trangthaibinhluan',$manager);
    }
    public function save_status_bl($id,Request $rq)
    {
     $data = array();
    $data['trangthai']=$rq->status;
    DB::table('danhgia')->where('mabinhluan',$id)->update($data);
    return Redirect::to('/binh-luan')->with('message','Thay đổi thành công');
    // dd($data);
    }
    public function tra_loi_cmt($id,Request $rq)
    {
        $cmt = DB::table('danhgia')->where('mabinhluan',$id)->get();
        $manager= view('admin.tra_loi_binh_luan')
          ->with('cmt',$cmt);
          return view ('admin_layout')->with('admin.tra_loi_binh_luan',$manager);
    }
    public function save_tl_bl($id,Request $rq)
    {
        $data=array();
        $data['mactdh']=$rq->mactdh;
        $data['ten']=Auth::user()->name;
        $data['noidung']=$rq->cmt;
        $data['trangthai']="Hiện";
        $data['parent_id']=$id;
        $data['idnv']=Auth::user()->id;
        DB::table('danhgia')->insert($data);
        return Redirect('/binh-luan')->with('message','Thêm bình luận thành công');
      
    
    }
    
}
