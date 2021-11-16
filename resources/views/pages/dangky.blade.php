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
                        <input type="text" name="id" placeholder="id"/>
                    </div>
                    <div>
                        <input type="text" name="name" placeholder="Họ và tên"/>
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email"/>
                    </div>
                        <input type="text" name="phone" placeholder="Số điện thoại"/>
                    <div>
                        <input type="password" name="password" placeholder="Mật khẩu"/>
                    </div>

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
@endsection 



