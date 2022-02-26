<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Sanphamreq;
use App\hinhanh;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;


session_start();

class Payment extends Controller
{
    public function payment_admin()
    {
        $dh2 = DB::table('donhang')->orderby('madh','desc')
        ->join('khachhang', 'donhang.makh', '=', 'khachhang.id')
        ->get();
        $manager_payment = view('admin.payment')
        ->with('dh',$dh2);
        
        return view ('admin_layout')->with('dh',$manager_payment);
      
    }
    public function detail_dh($id)
    {
        $dh2 = DB::table('donhang')->select('chitietdh.mausac','donhang.madh','donhang.tongtien','sanpham.tensp','chitietdh.soluong','chitietdh.gia','donhang.ngaydathang','donhang.trangthai','donhang.tenkh','donhang.diachi','donhang.sodienthoai')
        ->where('donhang.madh',$id)->orderby('donhang.madh','desc')
        ->join('khachhang', 'donhang.makh', '=', 'khachhang.id')
        ->join('chitietdh', 'donhang.madh', '=', 'chitietdh.madh')
        ->join('sanpham', 'sanpham.masp', '=', 'chitietdh.masp')
        ->get();
        $dh1 = DB::table('donhang')->where('donhang.madh',$id)->get();
        $manager_payment = view('admin.detail_dh')
        ->with('dh',$dh2)
        ->with('dh1',$dh1);
        
        return view ('admin_layout')->with('dh',$manager_payment);
      
    }
    public function status($id)
    {
    //     $dh2 = DB::table('donhang')->where('donhang.madh',$id)->orderby('donhang.madh','desc')
    //     ->join('khachhang', 'donhang.makh', '=', 'khachhang.id')
    //     ->join('chitietdh', 'donhang.madh', '=', 'chitietdh.madh')
    //     ->join('sanpham', 'sanpham.masp', '=', 'chitietdh.masp')
    //     ->get();
    $dh2 = DB::table('donhang')->where('donhang.madh',$id)->orderby('donhang.madh','desc')
    ->get();
    $manager_payment = view('admin.status')
    ->with('dh',$dh2);
        
        return view ('admin_layout')->with('admin.status',$manager_payment );
      
    }
    public function save_status($id,Request $rq)
    {
    //     $dh2 = DB::table('donhang')->where('donhang.madh',$id)->orderby('donhang.madh','desc')
    //     ->join('khachhang', 'donhang.makh', '=', 'khachhang.id')
    //     ->join('chitietdh', 'donhang.madh', '=', 'chitietdh.madh')
    //     ->join('sanpham', 'sanpham.masp', '=', 'chitietdh.masp')
    //     ->get();
    $data=array();
    $data['trangthai']=$rq->status;
    if( $data['trangthai']=='Hủy đơn')
    {
        
        $b=DB::table('chitietdh')->select('chitietdh.madh','chitietdh.soluong as 
        slban','sanpham.masp','chitietdh.mausac')
        ->join('sanpham', 'chitietdh.masp','=','sanpham.masp')
        ->where('madh',$id)->get();
    //    dd($b);
        foreach($b as $q)
        {
        $c=DB::table('chitietsp')->where('masp',$q->masp)->where('mausac',$q->mausac)->first();
        $e=  $q->slban + $c->soluongsp;
         $d =(string)$e;
       
        
        DB::table('chitietsp')->where('masp',$q->masp)->where('mausac',$q->mausac)
        ->update(['soluongsp' =>$d]);
        DB::table('donhang')->where('madh',$id)->update($data);
            
        }
    
        return Redirect::to('payment-admin')->with('message','Cập nhật thành công'); 
    }
    else if($data['trangthai']=='Đã giao')
    {
        $dh2 = DB::table('donhang')->select('khachhang.email','khachhang.name','donhang.madh','donhang.tongtien','sanpham.tensp','chitietdh.soluong','chitietdh.gia','donhang.ngaydathang','donhang.trangthai','donhang.tenkh','donhang.diachi','donhang.sodienthoai')
            ->where('donhang.madh',$id)->orderby('donhang.madh','desc')
            ->join('khachhang', 'donhang.makh', '=', 'khachhang.id')
            ->join('chitietdh', 'donhang.madh', '=', 'chitietdh.madh')
            ->join('sanpham', 'sanpham.masp', '=', 'chitietdh.masp')
            ->get();
        $pdf = PDF::loadHTML( $this->dh_pdf($id));
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('A4', 'landscape');
        //  return $pdf->stream('pdf.pdf');
      foreach($dh2 as $a)
      {
      $email=$a->email;
      $madh=$a->madh;
      }
      $arr = array();
      $arr['a']='ok';
         Mail::send('pdf.thanhcong',$arr,function($message)use($pdf,$email,$madh){
            $message->from('thanhloi486@gmail.com','Thanh Loi');
            $message->to($email);
            $message->subject('Test'); 
            $message->attachData($pdf->output(),"HD".$madh.".pdf");
        });
        DB::table('donhang')->where('madh',$id)->update($data);
        return Redirect::to('payment-admin')->with('messcapnhat','Cập nhật thành công');
    }
    else
    {
       DB::table('donhang')->where('madh',$id)->update($data);
    return Redirect::to('payment-admin')->with('messcapnhat','Cập nhật thành công');
    }
    }
    public function dh_pdf($id)
    {  $dh2 = DB::table('donhang')->select('chitietdh.mausac','khachhang.email','khachhang.name','donhang.madh','donhang.tongtien','sanpham.tensp','chitietdh.soluong','chitietdh.gia','donhang.ngaydathang','donhang.trangthai','donhang.tenkh','donhang.diachi','donhang.sodienthoai')
      ->where('donhang.madh',$id)
      ->orderby('donhang.madh','desc')
      ->join('khachhang', 'donhang.makh', '=', 'khachhang.id')
      ->join('chitietdh', 'donhang.madh', '=', 'chitietdh.madh')
      ->join('sanpham', 'sanpham.masp', '=', 'chitietdh.masp')
      ->get();
   
                   

    return view('pdf.pdf')->with('dh2',$dh2);
       
    }
    public function import_pdf($id)
    {  
       
        $pdf = PDF::loadHTML( $this->dh_pdf($id));
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //  return $pdf->stream('hd.pdf');
        $data = array();
        $data['a']='ok';
         Mail::send('pdf.pdf',$data,function($message)use($pdf){
            $message->from('thanhloi486@gmail.com','Thanh Loi');
            $message->to('dh51705268@student.stu.edu.vn');
            $message->subject('Test'); 
            $message->attachData($pdf->output(),"invoice.pdf");
        });
    echo 'dc';
    }

}


