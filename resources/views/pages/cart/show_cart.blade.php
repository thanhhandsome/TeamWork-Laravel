@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
              <li class="active">Giỏ Hàng</li>
            </ol>
        </div>
        @if(Session('message'))

        <div class="alert alert-danger">
            <ul>
                
                    <li>
                      {{Session('message')}}
                    </li>
               
            </ul>
        </div>

               @endif
        <div class="table-responsive cart_info">
            <?php 
            $content = Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $c)
                    
        
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/frontend/img/'.$c->options->hinh)}}" width="50px" height="50px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $c->name }}(màu {{$c->options->mau}})</a></h4>
                       
                        </td>
                        
                        <td class="cart_price">
                            <p>{{number_format($c->price).' '.'VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{ URL::to('/update-cart') }}" method="POST">
                                    {{ csrf_field() }}
                                <input style="width: 80px" class="cart_quantity_input" type="number" name="sl" value="{{$c->qty}}" autocomplete="off" size="2">
                                <input type="hidden" value="{{ $c->rowId }}" name="rowId" class="form-control">
                                <input type="hidden" value="{{ $c->id }}" name="masp" class="form-control">
                                <input type="hidden" value="{{ $c->options->mau }}" name="mau" class="form-control">
                                <input class="btn btn-default btn-sm" type="submit" Value="Cập Nhật">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php 
                                $tong =$c->qty*$c->price;
                               
                                ?>
                        {{number_format($tong)}}
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/del-cart/'.$c->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
           
             <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{ Cart::subtotal() }}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="{{ URL::to('/payment') }}">Next</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action--> <!--/#cart_items-->


@endsection