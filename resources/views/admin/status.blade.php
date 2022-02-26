@extends('admin_layout')
@section('admin_content')
<section class="panel">
    <div class="panel-heading">
      Thay đổi trạng thái
      </div>
    <div class="panel-body">
       @foreach ( $dh as $d )
           
    
        <form class="form-horizontal bucket-form" method="POST" action="{{URL::to('/save-status/'.$d->madh)}}">
            {{ csrf_field() }}
            <div class="form-group">
                
                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Trạng thái</label>
              
                
                <div class="col-lg-6">
                   <select name="status" class="form-control m-bot15">
                    @if($d->trangthai=="Đang Vận Chuyển")
                       
                        <option>Đã giao</option>
                        <option>Hủy đơn</option>
                        @else
                        <option>Đang Vận Chuyển</option>
                        <option>Hủy đơn</option>
                        @endif
                       
                    </select>
                    
                </div>
            <button  onclick="return confirm('Bạn chắc chắn với sự thay đổi?')" type="submit" class="btn btn-info">Submit</button>
               
        </form>
        @endforeach
    </div>
</section>
@endsection