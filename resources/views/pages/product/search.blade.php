@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                        <!-- <h2>Found {{count($search_product)}} products</h2> -->
                        @foreach($search_product as $key => $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img width="100" height="300" src="{{URL::to('public/frontend/img/'.$product->hinh)}}" alt="" />
                                                <h2>{{number_format($product->gia).' '.'VNĐ'}}</h2>
                                                <p>{{$product->tensp}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
</div><!--/recommended_items-->
@endsection