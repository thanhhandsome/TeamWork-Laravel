@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm chi tiết sản phẩm
                        </header>
                        <div class="panel-body">
                        <?php
	$message = Session()->get('message');
	if($message)
	{
		echo $message;
		Session()->put('message',null);
	}
	?>
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
                            <div class="position-center">
                           <form role="form" action="{{URL::to('/save-product-detail')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}

                           <div class="form-group">
                            <label for="exampleInputPassword1">Mã chi tiết sản phẩm</label>
                            <textarea type="Text" name="product_id" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                        </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Khối lượng</label>
                                    <textarea type="Text" name="product_kl" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kích thước</label>
                                    <textarea type="Text" name="product_kt" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Sản phẩm</label>
                                   <select name="product_ctsp" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $catepro)
                                   <option value="{{$catepro->masp}}">{{$catepro->tensp}}</option>
                                   @endforeach
                                   </select>
                                </div>

                    
                            
                                <button type="submit" name="add-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection