@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
@foreach($category_name as $key => $catalog)
   <h2 class="title text-center">{{$catalog->tenloai}}</h2>
@endforeach
@foreach($category_by_id as $key => $product)
<div class="col-sm-4" style="width:25%; height: 25%">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
					<a href="{{URL::to('/chitietsanpham/'.$product->masp)}}">
					<img width="100" height="300" src="{{URL::to('public/frontend/img/'.$product->hinh)}}" alt="" />
					<h2>{{number_format($product->gia).' '.'VNĐ'}}</h2>
					<p>{{$product->tensp}}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</a>

			</div>
		</div>
	</div>
</div>
@endforeach
</div><!--features_items-->


@endsection