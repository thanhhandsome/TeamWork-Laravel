@extends('admin_layout')
@section('admin_content')
    

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Nhân viên
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              
              </label>
            </th>
            <th><a class="text-danger">Họ và Tên</a></th>
            <th><a class="text-danger">Email</a></th>
            <th><a class="text-danger">Phone</a></th>
            <th><a class="text-danger">Địa Chỉ</a></th>
            <th><a class="text-danger">Ngày Sinh</a></th>
            <th><a class="text-danger">Vai trò</a></th>
            <th><a class="text-danger">Quyền</a></th>
            {{-- <th><a class="text-danger">Thao tác</a></th> --}}
          
          
            
          </tr>
        </thead>
        @foreach($all_nv as $key => $nv)
        <tbody>
          <tr>
          
            <td >{{ $nv->id }}</td>
            <td>{{ $nv->name }}</td>
            <td>{{ $nv->email }}</td>
            <td>{{ $nv->phone }}</td>
            <td>{{ $nv->diachi}}</td>
            <td>{{ $nv->ngaysinh}}</td>
            @foreach($nv->roles as $key =>$r)
            <td>{{ $r->name}}</td>
            @endforeach
            {{-- @foreach($nv->permissions as $key =>$r)
            <td>{{ $r->name}}</td>
            @endforeach --}}
            <td>
                <a href="{{URL::to('/phanquyen/'.$nv->id)}}"class="btn btn-success">Phân Vai Trò</a>
                <a href="" class="btn btn-success">Xóa</a>
                
            </td>
           

           
           
           
         
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection