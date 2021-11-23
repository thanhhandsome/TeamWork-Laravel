@extends('welcome')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							
							<ul id="imageGallery">
								@foreach($hinh as $key=>$pic)
								<li data-thumb="{{URL::to('public/frontend/img/'.$pic->hinh)}}" data-src="{{URL::to('public/frontend/img/'.$pic->hinh)}}">
								  <img width="300px" height="300px" src="{{URL::to('public/frontend/img/'.$pic->hinh)}}" />
								</li>
							
								@endforeach
							  </ul>
									
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->tensp}}</h2>
								<p>ID: {{$value->masp}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<?php
                                    $cus = Session()->get('makh');
                                    if($cus)
                                    {
                                    ?>
									<form action="{{URL::to('/save-cart')}}" method="post">
										{{ csrf_field() }}
										<span>
											<span>{{number_format($value->gia).'VND'}}</span>
											<label>Số lượng:</label>
											<input name="qty" type="number" min="1" value="1" />
											<input name="productid_hidden" type="hidden" value="{{$value->masp}}" />
											<button type="Submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
										</span>
									</form>
								<?php
                                    }else {
                                    ?>
                                    <a href="{{URL::to('/dangnhap')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </a>
                                    <?php 
                                    }
                                    ?>
								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> New 100%</p>
								<p><b>Thương hiệu:</b> {{$value->tennsx}}</p>
								<p><b>Loại:</b> {{$value->tenloai}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div>
<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô Tả</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >	
								<p>{!!$value->mota!!}</p>
							</div>
							
							
						</div>
</div><!--/category-tab-->
@endforeach
@endsection