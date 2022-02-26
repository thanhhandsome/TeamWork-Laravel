@extends('welcome')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details">
	<!--product-details-->
	@if(Session('message'))

        <div class="alert alert-danger">
            <ul>
                
                    <li>
                      {{Session('message')}}
                    </li>
               
            </ul>
        </div>

               @endif
						<div class="col-sm-5">
							
							<ul id="imageGallery">
								@foreach($hinh as $key=>$pic)
								<li data-thumb="{{URL::to('public/frontend/img/'.$pic->hinh)}}" data-src="{{URL::to('public/frontend/img/'.$pic->hinh)}}">
								  <img width="300px" height="300px" src="{{URL::to('public/frontend/img/'.$pic->hinh)}}"/>
								</li>
							
								@endforeach
							  </ul>
									
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->tensp}}</h2>
							<?php 
							$customer = Session()->get('makh');
						if($customer){
							?>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('/save-cart')}}" method="post">
									<?php 
						}else {
						
					
								?>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('/dangnhap')}}" method="get">
								<?php
								} 
								?>
									{{ csrf_field() }}
									<span>
										
										<?php
										if($product_km && $product_km->masp==$value->masp && $time <= $product_km->ngaykt && $time >=$product_km->ngaybd)
										{ 
										?>
										<span>{{number_format($product_km->giagiam).'VND'}}</span>
										<?php 
										}else{
										?>
										<span>{{number_format($value->gia).'VND'}}</span>
										<?php } ?>
									
									
										
										<label>Số lượng:</label>
										<input name="sl" type="number" min="1" value="1" />
										<input name="productid_hidden" type="hidden" value="{{$value->masp}}" />
										<button type="Submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</span>
								</form>
							
								
								<?php 
										if($value->soluongsp>0)
										{
								?>
								<p><b>Tình trạng:</b> Còn hàng</p>
								<?php 
										}else{
								?>
								<p><b>Tình trạng:</b> Hết hàng</p>
								<?php } 
								?>
								<p><b>Điều kiện:</b> New 100%</p>
								<p><b>Thương hiệu:</b> {{$value->tennsx}}</p>
								<p><b>Loại:</b> {{$value->tenloai}}</p>
								<p><b>Khối lượng:</b> {{$value->khoiluong}}</p>
								<p><b>Kích thước:</b> {{$value->kichthuoc}}</p>
								<p><b>Màu Sắc:</b> {{$value->mausac}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div>
@if(Session('loibinhluan'))

									<div class="alert alert-danger">
										<ul>
											
												<li>
												  {{Session('loibinhluan')}}
												</li>
										   
										</ul>
									</div>
							
  @endif
<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade " id="details" >	
								<p>{!!$value->mota!!}</p>
							</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									
							@foreach ($danhgia as $d )
								@if($d->trangthai == 'Hiện')
									@if($d->parent_id == 0) 
								
										<ul>
										<li><a href=""><i class="fa fa-user">
											</i>{{ $d->ten }}
										
										</a>
										</li>
										<li><a href=""><i class="fa fa-clock-o"></i>{{ ($d->ngaydanhgia) }}
										</a></li>
										<li><a style="color:black;background:yellow">Khách hàng
										</a></li>
										{{-- <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> --}}
										</ul>
									<p>{{ $d->noidung }}</p>
									@endif
									
									
										@foreach ($danhgia as $a )
										@if($a->trangthai == 'Hiện')
										@if($a->parent_id == $d->mabinhluan) 
								
									<ul>
										<li><a href=""><i class="fa fa-bullhorn"></i>{{ $a->ten }}</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>{{ ($a->ngaydanhgia) }}
										<li><a style="color:black;background:yellow">Nhân Viên
										</a></li>
									
										{{-- <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> --}}
									</ul>
									<p>{{ $a->noidung }}</p>
										@endif
										@endif
										
									@endforeach
								@endif
									@endforeach
									

									<div class="col-sm-12">
									<p><b>Hãy đánh giá sản phẩm</b></p>
									<form action="{{ URL::to('/danhgia/'.$value->masp) }}" method="POST">
										{{ csrf_field() }}
										<textarea name="content" ></textarea>
										<button type="submit"  class="btn btn-default pull-right">Submit</button>
									</form>
									</div>
								</div>
							</div>
							
						</div>
						
</div>
<!--/category-tab-->
@endforeach
{{-- <div class="recommended_items">
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
							 
						</div>
</div> --}}

@endsection
