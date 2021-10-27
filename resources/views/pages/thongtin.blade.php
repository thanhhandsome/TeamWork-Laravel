@extends('welcome')
@section('content')
<section id="#"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Thông Tin Cá Nhân</h2>
						<form action="">
                        <div class="your-order-item">
                      <?php 

                        $id =Session()->get('manv');
                        $name = Session()->get('tenkh');
                        $email = Session()->get('email');
                        $phone = Session()->get('sodienthoai');
                        $diachi = Session()->get('diachi');
                        ?>
                        
                            
                                <div class="pull-left"><p class="your-order-f18">Họ Tên:</p></div>
                                <div class="pull-right"><h5 class="color-black"><?php echo $name ?></h5></div>
                             
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Email:</p></div>
                                <div class="pull-right"  ><h5 class="color-black"><?php echo $email ?></h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Số điện thoại:</p></div>
                                <div class="pull-right"><h5 class="color-black"><?php echo $phone ?></h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Địa chỉ:</p></div>
                                <div class="pull-right"><h5 class="color-black"><?php echo $diachi;?></h5></div>
                            
                
                                <div class="clearfix"></div>
                            </div>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
    @endsection



  