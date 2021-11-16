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
                <form action="{{URL::to('/save-info')}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div>
                        <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" placeholder="{{ Auth::user()->name }}">
 
                    </div>
                    <div>
                        <input type="email" value="{{ Auth::user()->email }}" readonly name="email" placeholder="{{ Auth::user()->email }}"/>
                    </div>
                    <div>
                        <input type="text" value="{{ Auth::user()->diachi}} "class="form-control"name="address"placeholder="{{ Auth::user()->diachi }}"/>
                    </div>
                        <input type="text" value="{{Auth::user()->phone }}"class="form-control" name="phone" placeholder="{{ Auth::user()->phone }}"/>
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