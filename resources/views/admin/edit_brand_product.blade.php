@extends('admin_layout')
@section('admin_content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬP NHÀ SẢN XUẤT
                </header>
                @if(count($errors)>0)
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $err)
                               <li>
                                   {!!$err  !!}
                               </li>
                           @endforeach
                       </ul>
                    </div>
                @endif
                <?php
                    $mess =Session::get('message');
                    if($mess)
                    {
                        echo'<span class="text-alert">'.$mess.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">  
                    @foreach($edit_brand as $key => $edit_value)
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/update-brand-product/'.$edit_value->mansx) }}">
                            {{ csrf_field() }}
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Mã nhà sản xuất</label>
                            <input  type="text" value="{{$edit_value->mansx}}" readonly="{{$edit_value->mansx}}" name="brand_product_id"class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà sản xuất</label>
                            <input type="text" value="{{$edit_value->tennsx}}" name="brand_product_name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text" value="{{$edit_value->xuatxu}}" name="brand_product_source" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
    
</div>
@endsection