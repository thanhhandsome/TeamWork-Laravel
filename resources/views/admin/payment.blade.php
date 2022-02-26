@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý đơn hàng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th ><a class="text-danger">Mã đơn hàng</a></th>
            <th><a class="text-danger">Tên khách hàng đặt</a></th>
            <th><a class="text-danger">Ngày đặt hàng</a></th>
            <th><a class="text-danger">Trạng thái</a></th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($dh as $key => $d)
        <tbody>
          <tr>
            
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td >{{ $d->madh }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->ngaydathang }}</td>
           
            <td><span class="text-ellipsis">{{ $d->trangthai}}</span></td>
            <td>
             
              <a href="{{URL::to('/detail-dh/'.$d->madh)}}" class="active" ui-toggle-class=""><i class="fa fa-eye text-info text-active"></i></a>
            
        
            
            </td>
         
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$dh->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection