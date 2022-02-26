@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tạo Chương Trình Khuyến Mãi
                </header>
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
                <div class="panel-body">
                    <?php
                    $mess =Session::get('message');
                    if($mess)
                    {
                        echo'<span class="text-alert">'.$mess.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/save-discount') }}">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chương trình khuyến mãi</label>
                            <input type="text" name="name" class="form-control form-control-lg" >
                        </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="datetime-local" name="ngaybd" class="form-control" id="convert_slug" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input  type="datetime-local" name="ngaykt" class="form-control form-control-lg" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">% Khuyến mãi</label>
                            <input type="number" style="width:75px" name="discount" class="form-control form-control-lg" id="exampleInputEmail1">

                        </div>
                       
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection