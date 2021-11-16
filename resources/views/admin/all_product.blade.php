@extends('admin_layout')
@section('admin_content')
    

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Sản Phẩm
    </div>
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
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Sản phẩm đã bán</th>
            <th>Giá</th>
            <th>Hình</th>
            <th>Mô tả</th>
            <th>NSX</th>
            <th>Loại</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($all_product as $key => $cat_pro)
        
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cat_pro->masp }}</td>
            <td>{{ $cat_pro->tensp }}</td>
            <td>{{ $cat_pro->soluong }}</td>
            <td>{{ $cat_pro->sanphamdaban }}</td>
            <td>{{ $cat_pro->gia }}</td>
            <td>{{ $cat_pro->hinh }}</td>
            <td>{{ $cat_pro->mota }}</td>
            <td>{{ $cat_pro->tennsx }}</td>
            <td><span class="text-ellipsis">{{ $cat_pro->tenloai }}</span></td>
            
            <td>
              <a href="{{URL::to('/edit-product/'.$cat_pro->masp)}}" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square text-success text-active"></i></a>
              <a onclick="return confirm('Ban co that su muon xoa?')" href="{{URL::to('/del-product/'.$cat_pro->masp)}}" class="active" ui-toggle-class="">

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

        {{-- <div class="col-sm-5 text-center">

          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_product->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection
