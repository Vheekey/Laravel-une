@extends('layouts.app') 
<!-- //this will add laravel’s default navbar to your page -->

@section('content') 
<!-- //here goes your body content -->
    <div class="container">
        <div class="card">
            @if(Auth::check())
            <!-- Auth::check() is the Laravel function to check whether user is logged in or not. It gives true or false as return. -->
                <div class="card-header">Tasks List</div>
                <div class="card-body">
                    <a href="/task" class="btn btn-primary">Add New Task</a> 
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th colspan="2">Tasks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->tasks as $task) 
                            <!-- calling table tasks asnd using $user which is from the Auth class to get each user's class  -->
                            <tr>
                                <td>{{$task->description}}</td>
                                <td>
                                    <form action="/task/{{$task->id}}" >
                                    <button type="submit" name="edit" class="btn btn-sm btn-primary">Edit</button>
                                    <!-- <button type="submit" name="delete" method="POST" class="btn btn-sm btn-danger" action="/task/delete/{$task->id}" >Delete</button>  -->
                                    {!! csrf_field() !!} 

                                </form>
                                <form action="/task/delete/{{$task->id}}" method="POST">
                                <button type="submit" name="DELETE" class="btn btn-sm btn-danger"  >Delete</button>
                                    {!! csrf_field() !!}
                                </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <div class="card-body">
                        <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                </div>
                @endif
                </div>

            </div>
    </div>
@endsection