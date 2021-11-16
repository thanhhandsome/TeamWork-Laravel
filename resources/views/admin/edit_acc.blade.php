@extends('admin_layout')
@section('admin_content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬT TÀI KHOẢN
                </header>
                @if(count($errors)>0)
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $err)
                               <li>
                                   {!!$err  !!}
                               </li>
                           @endforeach
                       </ul>
                    </div>
                @endif
                <?php
                    $mess =Session::get('message');
                    if($mess)
                    {
                        echo'<span class="text-alert">'.$mess.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">  
  
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/update-acc') }}">
                            {{ csrf_field() }}
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Tên</label>
                            <input  type="text" value="{{Auth::user()->name}}" name="name" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Email</label>
                            <input  type="text" value="{{Auth::user()->email}}" name="email" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input  type="text" value="{{Auth::user()->phone}}" name="phone" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input  type="text" value="{{Auth::user()->diachi}}" name="address" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Ngày Sinh</label>
                            <input  type="date" value="{{Auth::user()->ngaysinh}}" name="date" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Password</label>
                            <input  type="password" value="" name="password" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                       
                        
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>
         
                </div>
            </section>

    </div>
    
</div>
@endsection