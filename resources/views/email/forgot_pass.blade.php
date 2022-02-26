<form action="{{URL::to('/update-mk')}}" method="get">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" value="{{ $data['token'] }}" name="token" />
    <input type="hidden" value="{{ $data['email'] }}" name="email" />
  
    <button type="submit" class="btn btn-default">Submit</button>
</form>