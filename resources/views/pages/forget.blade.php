@extends('welcome')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

            <div class="login-form">
                      
                         <!--login form-->
                        <h2>Điền tài khoản email</h2>
                          @if(Session('message'))

                  <div class="alert alert-danger">
                      <ul>
                          
                              <li>
                                {{Session('message')}}
                              </li>
                         
                      </ul>
                  </div>

                         @endif
                        <form action="{{URL::to('/save-pass')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="email" name="email" placeholder="Tài khoản" />
                            
                          
                            <button type="submit" class="btn btn-default">Submit</button>
                 </form>
             </div><!--/login form-->
            </div>

              
          
   
            </div>
        </div>
    </div>

<!--/login form-->
		
@endsection 

