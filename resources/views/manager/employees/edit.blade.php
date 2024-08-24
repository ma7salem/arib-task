@extends('manager.layouts.master')
@section('title') Employees | Edit @endsection

@section('content')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employees</div>
                        <div class="card-body">
                            <a href="{{route('employees.index')}}" class="btn btn-danger mb-2">Back</a>
                           <form action="{{route('employees.update', $employee->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            
                            @include('manager.employees.fields')
                            
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