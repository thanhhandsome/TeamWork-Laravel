@extends('welcome')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

            <div class="login-form">
                      
                         <!--login form-->
                        <h2>Điền mật khẩu mới</h2>
                          @if(Session('message'))

                  <div class="alert alert-danger">
                      <ul>
                          
                              <li>
                                {{Session('message')}}
                              </li>
                         
                      </ul>
                  </div>

                         @endif
                        <form action="{{URL::to('/save-repass')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="name" value="{{$email}}">
                            <input type="password" name="password" placeholder="Mật khẩu" />
                            {{-- <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" /> --}}
                            
                          
                            <button type="submit" class="btn btn-default">Update</button>
                 </form>
             </div><!--/login form-->
            </div>

              
          
   
            </div>
        </div>
    </div>

<!--/login form-->
		
@endsection 

