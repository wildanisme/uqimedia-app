@if(Session::has('status-success'))
<div class="alert alert-success">
    {{Session::get('status-success')}}
</div>
@endif

@if(Session::has('status-info'))
<div class="alert alert-info">
    {{Session::get('status-info')}}
</div>
@endif

@if(Session::has('status-warning'))
<div class="alert alert-warning">
    {{Session::get('status-warning')}}
</div>
@endif

@if(Session::has('status-danger'))
<div class="alert alert-danger">
    {{Session::get('status-danger')}}
</div>
@endif