@extends('admin_layout')
@section('admin_content')
    

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      Thông Tin Chi Tiết Sản Phẩm
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
            <th>Khối lượng</th>
            <th>Kích thước</th>
            <th>Số lượng</th>
            <th>Tình trạng</th>
            
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($all_product_detail as $key => $cat_pro)
        
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td style="width:10px">{{ $cat_pro->mactsp }}</td>
            <td style="width:200px"><a href="{{URL::to('/all-img/'.$cat_pro->mactsp)}}" style="color:darkblue">{{ $cat_pro->tensp }}</a></td>
            <td>{{ $cat_pro->khoiluong}}</td>
            <td>{{ $cat_pro->kichthuoc }}</td>
            <td>{{ $cat_pro->soluongsp }}</td>
   
            @if($cat_pro->soluongsp>0)
            <td><p style="color:green">Còn hàng</p></td>
            @else
            <td><p style="color: red">Hết hàng</p></td>
            @endif
   
           
            
            <td>
              <a href="{{URL::to('/edit-product-detail/'.$cat_pro->mactsp)}}" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square text-success text-active"></i></a>
              <a onclick="return confirm('Ban co that su muon xoa?')" href="{{URL::to('/del-product-detail/'.$cat_pro->mactsp)}}" class="active" ui-toggle-class="">

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
            {!!$all_product_detail->links()!!}
          </ul>
        </div> 
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection