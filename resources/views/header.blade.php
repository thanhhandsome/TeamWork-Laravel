<header id="header"><!--header-->
<div class="header_top"><!--header_top-->
<div class="container">
	<div class="row col-sm-12">
		<div class="col-sm-5">
			<div class="contactinfo">
				<ul class="nav nav-pills">
					<li><a href="#"><i class="fa fa-phone"></i> =></a></li>
					<li><a href="https://github.com/buddylol123/webgiadung"><i  class="fa fa-github"></i> Link GitHUB</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="social-icons pull-right">
				<ul class="nav navbar-nav">
					<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://accounts.google.com/"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div><!--/header_top-->
<div class="header-middle"><!--header-middle-->
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<form action="{{URL::to('/tim-kiem')}}" method="POST">
				{{ csrf_field() }}
			<div class="search_box pull-right" >
				<input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm" />
				<input type="submit" name="search_items" style="margin-top: 0; color:#000" class="btn btn-primary btn-sm" value="Tìm">
			</div>
			</form>

			<div class="shop-menu pull-right">
				<ul class="nav navbar-nav">
					
					<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
			
					@if(Auth::check())
					
				
					<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
					<li><a href="{{URL::to('/show_giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
					<li><a href="{{ URL::to('/getinfo/'.Auth::user()->id) }}"><i  class="fa fa-user"></i> {{ Auth::user()->email }}</a></li>
					<li><a href="{{URL::to('/dangxuat')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
					@else
						<li><a href="{{URL::to('/dangnhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
						<li><a href="{{URL::to('/dangky')}}"><i class="fa fa-lock"></i> Đăng ký</a></li>

					<li><a href="{{URL::to('/dangnhap')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
					<li><a href="{{URL::to('/show_giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
					@endif

					<li></li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
</div><!--/header-middle-->
<div class="header-bottom"><!--header-bottom-->
</div><!--/header-bottom-->
</header><!--/header-->
<section>
	
<div class="container">
<div class="row" style="margin-bottom: 20px">
	<div class="col-sm-3">
		<div class="left-sidebar">
			<h2>Danh mục sản phẩm</h2>
			<div class="panel-group category-products" id="accordian"><!--category-productsr-->
				@foreach($cate_product as $key => $value)
					<div class="panel panel-default">
						@if($value->category_parent=='0')
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#{{$value->slug_loaisp}}">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										{{$value->tenloai}}
									</a>
								</h4>
								
							</div>
							<div id="{{$value->slug_loaisp}}" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										@foreach($cate_product as $key => $cate_sub)
											@if($cate_sub->category_parent==$value->maloai)
												<li><a href="{{URL::to('/danhmucsanpham/'.$cate_sub->slug_loaisp)}}"> {{$cate_sub->tenloai}} </a></li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
						@endif
					</div>
				@endforeach
			</div><!--/category-products-->
			
			<div class="brands_products"><!--brands_products-->
				<h2>Thương hiệu sản phẩm</h2>
				<div class="brands-name">
					<ul class="nav nav-pills nav-stacked">
						@foreach($brand_product as $key => $data)
						<li><a href="{{URL::to('/thuonghieusanpham/'.$data->mansx)}}">{{$data->tennsx}}</a></li>
						@endforeach
					</ul>
				</div>
			</div><!--/brands_products-->
		</div>
	</div>
	
	<div class="col-sm-9 padding-right">
		@yield('content')
	</div>
	
</div>
</div>
</section>
<!-- {{URL::to('/danhmucsanpham/'.$value->maloai)}} -->