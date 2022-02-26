@extends('admin_layout')
@section('admin_content')
<section class="panel">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Trả lời bình luận
                    </header>
                    <div class="panel-body">
  
            <div class="position-center">
                @foreach ($cmt as $m)
                    <form role="form" action="{{URL::to('/save-tl-bl/'.$m->mabinhluan)}}" method="post" enctype="multipart/form-data">
                       {{csrf_field()}}
                     
                            <div class="form-group">
                               <textarea style="height: 200px" type="Text" name="cmt" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                               
                            </div>
                            <input  type="hidden"   value="{{ $m->mactdh }}" name="mactdh"class="form-control form-control-sm" >
                                <button type="submit" name="add-product" class="btn btn-info">Submit</button>
                    </form>
                        </div>
                @endforeach
                    </div>
                </section>

        </div>
</section>
@endsection