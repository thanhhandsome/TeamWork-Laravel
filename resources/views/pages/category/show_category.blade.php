@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
@foreach($category_name as $key => $catalog)
	<h2 class="title text-center">{{$catalog->tenloai}}</h2>
@endforeach
<!-- <div class="row">
	<div class="col-sm-4">
				<h2 for="amount" >Lọc giá theo</h2>
				<form>
					<div id="slider-range"></div>
					<style type="text/css">
						.style-range p{
							float: left;
							width: 37%
						}
					</style>
					<div class="style-range">
						<p><input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
							<input type="hidden" name="start_price" id="start_price">
							<input type="hidden" name="end_price" id="end_price">
						<br>
						<div class="clearfix"></div>
						<p><input type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default"></p>
					</div>
				</form>
	</div>
</div> -->
@foreach($category_by_id as $key => $product)
<div class="col-sm-4" style="width:25%; height: 25%">
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
            {!!$category_by_id->links()!!}
          </ul>
        </div>
      </div>
</footer>

@endsection