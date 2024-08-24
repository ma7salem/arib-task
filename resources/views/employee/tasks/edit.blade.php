@extends('employee.layouts.master')
@section('title') Tasks | Update @endsection

@section('content')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>
                        <div class="card-body">
                            <a href="{{route('emp_home')}}" class="btn btn-danger mb-2">Back</a>
                           <form action="{{route('tasks.update', $task->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            
                            @include('employee.tasks.fields')
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Task
                                </button>
                            </div>

                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection