@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <h2>{{ $exception->getMessage() }}</h2>
    </div>
</div>
@endsection