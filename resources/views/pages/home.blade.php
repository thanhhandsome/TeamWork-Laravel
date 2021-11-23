@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
<h2 class="title text-center">Sản phẩm mới</h2>
<div class="row">
	<div class="col-sm-4">
		<label for="amount" >Lọc theo kg</label>
			<form>
			@csrf
				<select name="sort" id="sort" class="form-control">
					<option value="{{Request::url()}}?sort_by=none">lọc</option>
					<option value="{{Request::url()}}?sort_by=1-50">1kg-50kg</option>
					<option value="{{Request::url()}}?sort_by=50-500">50kg-500kg</option>
				</select>

			</form>
	</div>
</div>
@foreach($all_product as $key => $product)
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
					<a href="{{URL::to('/chitietsanpham/'.$product->mactsp)}}">
					<img width="200" height="200" src="{{URL::to('public/frontend/img/'.$product->hinh)}}" alt="" />
					<h2>{{number_format($product->gia).' '.'VNĐ'}}</h2>
					<p>{{$product->tensp}}</p>
					<p>{{$product->khoiluong}}</p>
					<?php
					$cus = Session()->get('makh');
					if($cus)
					{
					?>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</a>
					<?php
					}else {
					?>
						<a href="{{URL::to('/dangnhap')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</a>
					<?php 
					}
					?>
			</div>
		</div>
	</div>
</div>
@endforeach
</div><!--features_items-->
<footer class="panel-footer">
      <div class="row">
        
        <!-- <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div> -->
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_product->links()!!}
          </ul>
        </div>
      </div>
</footer>

@endsection