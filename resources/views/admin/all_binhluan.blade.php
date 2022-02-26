@extends('admin_layout')
@section('admin_content')
@if(Session('message'))

<div class="alert alert-danger">
    <ul>
        
            <li>
              {{Session('message')}}
            </li>
       
    </ul>
</div>

       @endif

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý đánh giá của khách hàng
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
            <th >Mã bình luận</th>
            <th>Tên</th>
            <th>Vai trò</th>
            <th>Nội dung</th>
            <th>Ngày đánh giá</th>
            <th>Trạng thái</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($cmt as $key => $cat_pro)
        
        <tbody>
          <tr>
            @if($cat_pro->parent_id==0)
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
           
            <td>{{ $cat_pro->mabinhluan }}</td>
            <td >{{ $cat_pro->ten }}  (Đơn hàng <a href="{{URL::to('/detail-dh/'.$cat_pro->madh)}}" style="color:#DB4437">{{$cat_pro->madh }})</a></td>
            <td>Khách hàng</td>
            <td style="width:100px;">{{ $cat_pro->noidung }}</td>
            
            <td>{{ $cat_pro->ngaydanhgia }}</td>
            <td>{{ $cat_pro->trangthai }}</td>
            
          
            
            

            
            <td >
                <a href="{{URL::to('/trang-thai/'.$cat_pro->mabinhluan)}}"class="btn btn-danger">Thay đổi trạng thái</a>
           

             
            </td>
            <td  >
                <a href="{{URL::to('/tra-loi-bl/'.$cat_pro->mabinhluan)}}"class="btn btn-primary">Trả lời bình luận</a>
                

             
            </td>
              
         
          </tr>
          <tr>
          @foreach ($cmt as $a)
                    @if($a->parent_id == $cat_pro->mabinhluan)
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td><p>{{ $a->mabinhluan }}</p></td>
                        <td><p>{{ $a->ten }}</p></td>
                        <td><p class="text-light bg-danger">Nhân viên</p></td>
                        <td>{{ $a->noidung }}</td>
                        <td>{{ $a->ngaydanhgia }}</td>
                        <td>{{ $a->trangthai }}</td>
                        
            <td >
                <a href="{{URL::to('/trang-thai/'.$a->mabinhluan)}}"class="btn btn-danger">Thay đổi trạng thái</a>
           

             
            </td>
            <td  >
              
                

             
            </td>
            </tr>
                        @endif
                @endforeach
            @endif
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
            {!!$cmt->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection
