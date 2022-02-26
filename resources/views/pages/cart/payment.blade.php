@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Bước 2</h2>
        </div>
    

 

        <div class="shopper-informations">
            <div class="row">
              
          <div class="col-sm-8 clearfix">
            <?php 
            $name = Session()->get('name');
            $add = Session()->get('diachi');
            $phone = Session()->get('phone');
            $email = Session()->get('email');
            $id = Session()->get('makh');
                ?>
                    <div class="bill-to">
                        <p>Vui lòng kiểm tra lại thông tin</p>
                        <div class="form-one">
                            <form method="POST" action="{{ URL::to('/save-payment') }}">
                                {{ csrf_field() }}
                             
                                <input type="text" name="name" placeholder="Họ và tên người nhận" value="{{ $name  }}">
                                <input type="text" name="add" placeholder="Địa chỉ giao hàng" value="{{ $add  }}">
                                <input type="text" name="phone" placeholder="Số điện thoại người nhận" value="{{ $phone }}">
                                <textarea name="mess"  placeholder="Ghi chú thêm" rows="16"></textarea>
                               
                               <input type="submit" value="Mua hàng" name="send" class="btn btn-primary btn-sm" >
                            </form>
                         
                        </div>
                    </div>
                </div>
          
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

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
                            <h4><a href="">{{ $c->name }}</a></h4>
                       
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($c->price).' '.'VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{ URL::to('/update-cart') }}" method="POST">
                                    {{ csrf_field() }}
                                <input class="cart_quantity_input" type="number" name="sl" value="{{$c->qty}}" autocomplete="off" size="2">
                                <input type="hidden" value="{{ $c->rowId }}" name="rowId" class="form-control">
                                <input type="hidden" value="{{ $c->id }}" name="masp" class="form-control">
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
                   
                    
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{ Cart::subtotal() }}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{ Cart::subtotal() }}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h3 style="margin:40px 0;front-size:20px">Hình thức thanh toán</h3>
        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection