@extends('manager.layouts.master')
@section('title') Departments | Edit @endsection

@section('content')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Departments</div>
                        <div class="card-body">
                            <a href="{{route('departments.index')}}" class="btn btn-danger mb-2">Back</a>
                           <form action="{{route('departments.update', $department->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            
                            @include('manager.departments.fields')
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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