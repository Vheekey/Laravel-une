@extends('layouts.app') 
<!-- //this will add laravel’s default navbar to your page -->

@section('content') 
<!-- //here goes your body content -->

<div class="container">
<h2> Add New task </h2>

<form action="/task" method="post">
    <div class="form-group">
        <textarea name="description" id="" cols="10" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Task</button>
    </div>

{{ csrf_field() }}
</form>
</div>

@endsection