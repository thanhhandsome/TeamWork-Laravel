@extends('master')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center"><!--Kết quả {{count($sanpham)}} tìm kiếm--></h2>
                       @foreach($sanpham as  $item)
                    
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <a href="">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/frontend/img/{{$item->hinh}}" alt="" />
                                            <h2>{{$item->gia}}VND</h2>
                                            <p>{{$item->tensp}}</p>
                                            <!-- <p> 
                                            <?php  
                                                  if($item->maloai=="dt")
                                                 {
                                                      echo "Điện Thoại";
                                                }
                                                else if($item->maloai=="lt")
                                                {
                                                    echo "Laptop";
                                                }
                                                else if($item->maloai=="tn")
                                                {
                                                    echo "Tainghe";
                                                }
                                                else if ($item->maloai=="usb")
                                                {
                                                    echo "USB";
                                                }
                                            ?></p> -->
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        </div>
                                      
                                </div>
                            </a>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items--> 
        <!--/recommended_items-->
@endsection