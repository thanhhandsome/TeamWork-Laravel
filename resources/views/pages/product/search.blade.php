@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                        <!-- <h2>Found {{count($search_product)}} products</h2> -->
                        @foreach($search_product as $key => $product)
                            <div class="col-sm-4" style="width:25%; height: 25%">
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
<!-- <footer class="panel-footer">
    <div class="row">
                                
        <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
                <li>1</li>
            </ul>
        </div>
    </div>
</footer> -->
@endsection