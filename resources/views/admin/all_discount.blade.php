@extends('admin_layout')
@section('admin_content')
    

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
    Chương trình khuyến mãi
    </div>
    @if(Session('message'))

    <div class="alert alert-danger">
        <ul>
            
                <li>
                  {{Session('message')}}
                </li>
           
        </ul>
    </div>

      @endif
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option href="a.html" value="2">Bulk edit</option>
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
            <th >Mã </th>
            <th>Tên Chương trình</th>
            <th>Phần trăm khuyến mãi</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
        
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($product_km as $key => $cat_pro)
        
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cat_pro->makm }}</td>
            <td><a style="color: red" href="{{URL::to('/chi-tiet-km/'.$cat_pro->makm) }}">{{ $cat_pro->tenkhuyenmai }}</a></td>
            <td>{{ $cat_pro->phantramkm }}%</td>
            <td>{{ $cat_pro->ngaybd }}</td>
            <td>{{ $cat_pro->ngaykt }}</td>
           
            
            <td>
              <a href="{{URL::to('/edit-discount/'.$cat_pro->makm)}}" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square text-success text-active"></i></a>
              <a onclick="return confirm('Ban co that su muon xoa?')" href="{{URL::to('/del-dis/'.$cat_pro->makm)}}" class="active" ui-toggle-class="">

              <i class="fa fa-times text-danger text"></i></a>
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
        
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection
