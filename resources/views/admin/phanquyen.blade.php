@extends('admin_layout')
@section('admin_content')
@extends('admin_layout')
@section('admin_content')
    

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cấp Quyền
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
               
                       
                   
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{URL::to('/save-quyen/'.$user->id)}}">
                            {{ csrf_field() }}
                            
                        
                        <div class="form-group " >
                            <select name="role" class="form-control input-sm m-bot15">
                                @foreach($role as $key=>$c)
                            

                               <option selected value="{{($c->id)}}">{{ $c->name }}</option>
                         
                               {{-- <option selected value="{{($c->id)}}"></option> --}}

                               {{-- <option selected value="{{($c->id)}}">{{ $c->name }}</option>
                               @endif --}}
                               @endforeach
                               </select>
                        </div>
                    
                       
                        
                       
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>
                
                </div>
            </section>

    </div>
    
</div>
@endsection
@endsection