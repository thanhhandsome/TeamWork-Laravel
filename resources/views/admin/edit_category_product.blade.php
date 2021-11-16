@extends('admin_layout')
@section('admin_content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬP LOẠI SẢN PHẨM
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
                    @foreach($edit_category as $key => $edit_value)
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/update-category-product/'.$edit_value->maloai) }}">
                            {{ csrf_field() }}
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Mã loại sản phẩm</label>
                            <input  type="text" value="{{$edit_value->maloai}}" readonly="{{$edit_value->maloai}}" name="category_product_id"class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                            <input type="text" value="{{$edit_value->tenloai}}" onkeyup="ChangeToSlug();" name="category_product_name" class="form-control form-control-lg" id="slug">
                        </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" value="{{$edit_value->slug_loaisp}}" name="slug_category_product" class="form-control" id="convert_slug" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục cha</label>
                            <input type="text" name="{{$edit_value->parent}}" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter email">
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