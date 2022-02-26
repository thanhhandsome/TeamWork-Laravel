@extends('welcome')
@section('content')

<div class="container">
    <div class="row">
    
        <div class="col-sm-4">
            <div class="signup-form">
                <!--sign up form-->
               <h3>Thông tin khác hàng</h3>
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
                    $name = Session()->get('name');
                    $add = Session()->get('diachi');
                    $phone = Session()->get('phone');
                    $email = Session()->get('email');
                    $id = Session()->get('makh');
                 ?>
                <form action="{{URL::to('/save-info')}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div>
                        <input type="hidden" value="<?php echo $id ?>" class="form-control" name="id" placeholder="Tên">
 
                    </div>
                    <div>
                        <input type="text" value="<?php echo $name ?>" class="form-control" name="name" placeholder="Tên">
 
                    </div>
                    <div>
                        <input type="email" value="<?php echo $email ?>" readonly name="email" placeholder="Email"/>
                    </div>
                    <div>
                        <input type="text" value="<?php echo $add?>"class="form-control"name="address"placeholder="Địa chỉ"/>
                    </div>
                        <input type="text" value="<?php echo $phone ?>"class="form-control" name="phone" placeholder="Số điện thoại"/>
                    <div class="form-group" >
                        <input type="password" class="form-control" id="ipnPassword">
                        {{-- <button style="background: #FE980F;
                        border: medium none;
                        border-radius: 0;
                        margin-left: -5px;
                        margin-top: -3px; padding: 7px 17px ;" class="btn btn-danger fomr" type="button" id="btnPassword"> --}}
                            {{-- <i  class="fa fa-eye"></i> --}}
                          </button>
                        
                        
                        
                    </div>
                 
                    <div>
                        <input type="password" name="re_password" placeholder="Nhập lại Mật khẩu"/>
                    </div>
                <div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
              
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
@endsection 
@section('script')

@endsection