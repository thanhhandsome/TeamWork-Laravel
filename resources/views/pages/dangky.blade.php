@extends('welcome')
@section('content')

                   
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
@endsection 

