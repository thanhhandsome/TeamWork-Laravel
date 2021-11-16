@extends('welcome')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="{{URL::to('/checkout')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="email" name="email" placeholder="Tài khoản" />
                            <input type="password" name="password" placeholder="Password" />
                            <span>
                                <input type="checkbox" class="checkbox"> 
                                Ghi nhớ đăng nhập
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>

                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action={{URL::to('/checkout')}} method="POST" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="email" name="email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                     
                    </form>
                </div><!--/login form-->
            </div>

          
   
            </div>
        </div>
    </div>

<!--/login form-->
		
@endsection 

