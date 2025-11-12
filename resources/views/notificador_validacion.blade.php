@if ($errors->any())
<div class="alert alert-light alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
        <span class="badge badge-danger">{{$error}}</span>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif