@extends('manager.layouts.master')
@section('title') Employees | Create @endsection

@section('content')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employees</div>
                        <div class="card-body">
                            <a href="{{route('employees.index')}}" class="btn btn-danger mb-2">Back</a>
                           <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            @include('manager.employees.fields')
                            
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