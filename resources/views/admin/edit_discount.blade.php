@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
               Sửa Khuyến Mãi
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
                        <form role="form"   method="POST" action="{{ URL::to('/save-edit-discount/'.$id) }}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chương trình khuyến mãi</label>
                            <input type="text" name="name" value="{{ $km->tenkhuyenmai }}" class="form-control form-control-lg" >
                        </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="datetime-local" name="ngaybd" value="{{ date('Y-m-d\TH:i',strtotime($km->ngaybd)) }}" class="form-control" id="convert_slug" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input  type="datetime-local" name="ngaykt" value="{{date('Y-m-d\TH:i',strtotime($km->ngaykt)) }}" class="form-control form-control-lg" id="exampleInputEmail1">
                        </div>
                 
                       
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection