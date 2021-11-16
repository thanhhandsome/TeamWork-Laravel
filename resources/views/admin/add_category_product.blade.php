@extends('admin_layout')
@section('admin_content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    THÊM LOẠI SẢN PHẨM
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
                <div class="panel-body">
                    <?php
                    $mess =Session::get('message');
                    if($mess)
                    {
                        echo'<span class="text-alert">'.$mess.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/save-category-product') }}">
                            {{ csrf_field() }}
                        <div class="form-group " >
                            
                            <label for="exampleInputEmail1">Mã loại sản phẩm</label>
                            <input  type="text" name="category_product_id"class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                            <input type="text" onkeyup="ChangeToSlug();" name="category_product_name" class="form-control form-control-lg" id="slug" placeholder="danh mục">
                        </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug_category_product" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục cha</label>
                            <input type="text" name="category_product_parent" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                       
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection