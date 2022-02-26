@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm khuyến mãi
                </header>
                @if(Session('message'))

                <div class="alert alert-danger">
                    <ul>
                        
                            <li>
                              {{Session('message')}}
                            </li>
                       
                    </ul>
                </div>

                       @endif
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
                 
                    @foreach($product_km_add as $a)
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/save-product-dis/'.$a->makm) }}">
                            {{ csrf_field() }}
                        <div class="form-group">
                          
                        
                            <label for="exampleInputEmail1">Tên chương trình khuyến mãi</label>
                            <select name="masp" class="form-control input-sm m-bot15">
                                
                              
                                @if($count>0)
                                @foreach($product as $key=>$c)
                              
                               <option selected value="{{($c->masp)}}">{{ $c->tensp }}</option>
                          
                           
                              
                       
                               @endforeach
                               @else
                               <option selected value="">Rỗng</option>
                               @endif
                               </select>
                              
                        </div>
                       <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
            @endforeach
                </div>
            </section>

    </div>
    
</div>   

<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
    Chi tiết khuyến mãi
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
            <th>Giá giảm</th>
            <th>Giá gốc</th>
        
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($product_km as $key => $cat_pro)
        
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cat_pro->id }}</td>
            <td>{{ $cat_pro->tensp }}</td>
            <td>{{number_format( $cat_pro->giagiam) }} VNĐ</td>
            <td>{{number_format( $cat_pro->giachuagiam)}} VNĐ</td>
           
            
        
               <td>
                <a onclick="return confirm('Ban co that su muon xoa?')" href="{{URL::to('/del-dis-detail/'.$cat_pro->id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
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
