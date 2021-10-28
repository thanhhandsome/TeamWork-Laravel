@extends('welcome')
@section('content')

<<<<<<< HEAD
<div class="container">
    <div class="row">
    
        <div class="col-sm-4">
            <div class="signup-form">
                <!--sign up form-->
               <h3>Đăng ký</h3>
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
                <form action="{{URL::to('/save-account')}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    
                    <div>
                        <input type="text" name="name" placeholder="Họ và tên"/>
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email"/>
                    </div>
                    <div>
                        <input type="text" name="address"placeholder="Địa chỉ"/>
                    </div>
                        <input type="text" name="phone" placeholder="Số điện thoại"/>
                    <div>
                        <input type="password" name="password" placeholder="Mật khẩu"/>
                    </div>
                <div>
                    <button type="submit" class="btn btn-default">Signup</button>
                </div>
              
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
=======
                   
<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}"> <!-- form dùng phương thức post => cần token -->
            <div class="row">
                <div class="col-sm-3"></div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}};
                        @endforeach
                    </div>
                @endif
                @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                             <div>   
                            <label for="your_last_name">Fullname*</label>
                            <br>
                            <input type="text" id="your_last_name" required name="fullname">
                            </div>
							<div >
                            <label for="email">Email address*</label>
                            <br>
                            <input type="email" id="email" required name="email" name="email">
                            </div>
                            <div >
                            <label for="phone">Phone*</label>
                            <br>
                            <input type="text" id="phone" required name="phone">
                            </div>
                            <div>
                            <label for="adress">Address*</label>
                            <br>
                            <input type="text" id="adress"required name="address">
                            </div>
							<div >
                            <label for="phone">Password*</label>
                            <br>
                            <input type="password"  required name="password">
                            </div>
                      

                    
                   
                
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
>>>>>>> ec390cb04d015c96544b0610b3186f2478e95eaf
@endsection 

