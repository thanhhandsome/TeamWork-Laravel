@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cap nhat san pham
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
                            @foreach($edit_product as $key=>$edit_value)

                           <form role="form" action="{{URL::to('/update-product/'.$edit_value->masp)}}" method="get" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ten san pham</label>
                                    <textarea type="Text" value="{{($edit_value->tensp)}}"  name="product_name" class="form-control" id="exampleInputPassword1" placeholder="Password"><?php echo ($edit_value->tensp);?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">So Luong</label>
                                    <textarea type="Text" value="{{($edit_value->tensp)}}"  name="product_qty" class="form-control" id="exampleInputPassword1" placeholder="Password"><?php echo ($edit_value->soluong);?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">San Pham Da Ban</label>
                                    <textarea type="Text" value="{{($edit_value->tensp)}}"  name="product_sold" class="form-control" id="exampleInputPassword1" placeholder="Password"><?php echo ($edit_value->sanphamdaban);?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gia </label>
                                    <input type="Text" value="{{$edit_value->gia}}" name="product_price" class="form-control" id="exampleInputPassword1" placeholder="Password"></input>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hinh san pham</label>
                                    <input type="file" name="product_img" class="form-control" id="exampleInputPassword1" value="{{$edit_value->hinh}}" placeholder="Password"></input>
                                    <img src="{{URL::to('public/frontend/img/'.$edit_value->hinh)}}" height="200" width="200">

                                </div>
                              
                            

                                <div class="form-group">
                                    <label for="exampleInputPassword1">loai san pham</label>
                                   <select name="product_maloai" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cp)
                                    @if($cp->maloai == $edit_value->maloai)
                                   <option selected value="{{$cp->maloai}}">{{$cp->tenloai}}</option>
                                   @else
                                   <option  value="{{$cp->maloai}}">{{$cp->tenloai}}</option>
                                  @endif
                                   @endforeach
                                   </select>
                                </div>

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
                                </div>
                            
                                <button type="submit" name="add-product" class="btn btn-info">Submit</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            @endsection
