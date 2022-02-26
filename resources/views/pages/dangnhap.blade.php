@extends('welcome')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

            <div class="login-form">
                      
                         <!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                          @if(Session('message'))

                          <div class="alert alert-danger">
                              <ul>
                                  
                                      <li>
                                        {{Session('message')}}
                                      </li>
                                 
                              </ul>
                          </div>

                         @endif
                        <form action="{{URL::to('/checkout')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="email" name="email" placeholder="Tài khoản" />
                            <input type="password" name="password" placeholder="Password" />
                            <span>
                               <a href="{{URL::to('/forget-pass')}}"> Quên tài khoản</a>
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                 </form>
             </div><!--/login form-->
            </div>

              
          
   
            </div>
        </div>
    </div>

<!--/login form-->
        
@endsection 


