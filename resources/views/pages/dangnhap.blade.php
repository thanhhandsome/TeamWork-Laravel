@extends('welcome')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
<<<<<<< HEAD
                    <form action={{URL::to('/checkout')}} method="POST" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="email" name="email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
=======
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
>>>>>>> ec390cb04d015c96544b0610b3186f2478e95eaf
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
<<<<<<< HEAD
                     
=======
>>>>>>> ec390cb04d015c96544b0610b3186f2478e95eaf
                    </form>
                </div><!--/login form-->
            </div>
          
   
            </div>
        </div>
    </div>

<!--/login form-->
		
	</section><!--/form-->
@endsection 

