@extends('welcome')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/frontend/img/'.$value->hinh)}}" alt="" />
								<!-- <h3>ZOOM</h3> -->
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->tensp}}</h2>
								<p>ID: {{$value->masp}}</p>
								<img src="images/product-details/rating.png" alt="" />
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
<div class="recommended_items">
	<h2 class="title text-center">Sản Phẩm Liên Quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($relate as $key => $recommend)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
                                            		<div class="productinfo text-center">
		                                                <img width="100" height="100" src="{{URL::to('public/frontend/img/'.$recommend->hinh)}}" alt="" />
		                                                <h2>{{number_format($recommend->gia).' '.'VND'}}</h2>
		                                                <p>{{$recommend->tensp}}</p>
		                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            		</div>
                                    			</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
</div>
@endsection