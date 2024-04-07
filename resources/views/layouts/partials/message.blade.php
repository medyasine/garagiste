@if(isset($errors) && count($errors) > 0)
<div class="alert alert-warning" role="alert">
    <ul class="list-unstyled mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($success = Session::get('success'))
@if (is_array($success))
@foreach ($success as $msg)
<div class="alert alert-warning" role="alert">
    <i class="fa fa-check"></i>
    {{ $msg }}
</div>
@endforeach
@else
<div class="alert alert-warning" role="alert">
    <i class="fa fa-check"></i>
    {{ $success }}
</div>
@endif
@endif