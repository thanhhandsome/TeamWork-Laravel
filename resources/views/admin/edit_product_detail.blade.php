@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật chi tiết sản phẩm
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
                            @foreach($detail_product as $key=>$edit_value)

                           <form role="form" action="{{URL::to('/update-product-detail/'.$edit_value->mactsp)}}" method="get" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Khối lượng</label>
                                    <textarea type="Text" value="{{($edit_value->khoiluong)}}"  name="product_kl" class="form-control" id="exampleInputPassword1" placeholder="Password"><?php echo ($edit_value->khoiluong);?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kích thước </label>
                                    <input type="Text" value="{{$edit_value->kichthuoc}}" name="product_kt" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>

                            
                               
                              
                            

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên sản phẩm</label>
                                   <select name="product_masp" class="form-control input-sm m-bot15">
                                    @foreach($edit_product as $key => $cp)
                                    @if($cp->masp == $edit_value->masp)
                                   <option selected value="{{$cp->masp}}">{{$cp->tensp}}</option>
                                   @else
                                   <option  value="{{$cp->masp}}">{{$cp->tensp}}</option>
                                  @endif
                                   @endforeach
                                   </select>
                                </div>
{{-- 
                                <div class="form-group">
                                    <label for="exampleInputPassword2">ma sx</label>
                                   <select name="product_mansx" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key=>$c)
                                    @if($c->mansx == $edit_value->mansx)

                                   <option selected value="{{$c->mansx}}">{{($c->tennsx)}}</option>
                                   @else
                                   <option selected value="{{$c->mansx}}">{{($c->tennsx)}}</option>

                                    @endif
                                   @endforeach
                                   </select>
                                </div> --}}
                            
                                <button type="submit" name="add-product" class="btn btn-info">Submit</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            @endsection