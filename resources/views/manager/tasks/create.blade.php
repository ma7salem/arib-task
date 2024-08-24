@extends('manager.layouts.master')
@section('title') Tasks | Create @endsection

@section('content')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>
                        <div class="card-body">
                            <a href="{{route('tasks.index')}}" class="btn btn-danger mb-2">Back</a>
                           <form action="{{route('tasks.store')}}" method="post">
                            @csrf
                            
                            @include('manager.tasks.fields')
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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