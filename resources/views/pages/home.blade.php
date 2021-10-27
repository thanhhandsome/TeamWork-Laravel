@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
<h2 class="title text-center">Sản phẩm mới</h2>
@foreach($all_product as $key => $product)
<div class="col-sm-3" style="width:30%; height: 30%">
	<div class="product-image-wrapper">

		<a href="{{URL::to('/chitietsanpham/'.$product->masp)}}">

		<div class="single-products">
			<div class="productinfo text-center">
				

					<img width="100" height="300" src="{{URL::to('public/frontend/img/'.$product->hinh)}}" alt="" />
					<h2>{{number_format($product->gia).' '.'VNĐ'}}</h2>
					<p>{{$product->tensp}}</p>

					</a>

			</div>
		</div>
	</div>
</div>
@endforeach
</div><!--features_items-->


@endsection