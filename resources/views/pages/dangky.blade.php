@extends('welcome')
@section('content')

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
                <form action="{{URL::to('/save-account')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  
                    <div>
                        <input type="text" name="name" placeholder="Họ và tên"/>
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email"/>
                    </div>
                    <div>
                        <input type="tel" name="phone" placeholder="Số điện thoại" pattern="(0[3|5|7|8|9])+([0-9]{8})"/>
                    </div>
                    <div>
                        <input type="text" name="address" placeholder="Địa Chỉ"/>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Mật khẩu"/>
                    </div>
                    <div>
                        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu"/>
                    </div>

     

             <div>
                    <button type="submit" class="btn btn-default">Đăng ký</button>
                </div>
              
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
@endsection 






