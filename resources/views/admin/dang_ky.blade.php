@extends('admin_layout')
@section('admin_content')

<header class="panel-heading">
        Đăng Ký
</header>
<div class="panel-body">
    <div class=" form">
        <form class="cmxform form-horizontal " id="commentForm"  novalidate="novalidate" method="POST" action="{{URL::to('/save-dk-nv')}}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Tên </label>
                <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="">
                </div>
            </div>
            <div class="form-group ">
                <label for="cemail" class="control-label col-lg-3">E-Mail </label>
                <div class="col-lg-6">
                    <input class="form-control " id="cemail" type="email" name="email" required="">
                </div>
            </div>
            <div class="form-group ">
                <label for="curl" class="control-label col-lg-3">Password</label>
                <div class="col-lg-6">
                    <input class="form-control " id="curl" type="password" name="password">
                </div>
            </div>
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Phone</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="sdth" minlength="2" type="text" required="">
                </div>
            </div>
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Địa chỉ</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="diachi" minlength="2" type="text" required="">
                </div>
            </div>
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Ngày Sinh</label>
                <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="ngaysinh" minlength="2" type="date" required="">
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-default" type="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection 
