@extends('manager.layouts.master')
@section('title') Employees @endsection

@section('content')

<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employees</div>
                        <div class="card-body">
                            <a href="{{route('employees.create')}}" class="btn btn-success mb-2">Create</a>
                           @include('manager.layouts.partiels.alert')
                            <table class="table table-striped">
                                <thead>
                                    <form action="{{route('employees.index')}}" method="get">
                                    <tr>
                                        <th>
                                            <input type="text" name="name" class="form-control" value="{{ request()->name }}" placeholder="Search By Name...">
                                        </th>
                                        <th>
                                            <input type="text" name="email" class="form-control" value="{{ request()->email }}" placeholder="Search By Email...">
                                        </th>
                                        <th>
                                            <input type="text" name="phone" class="form-control" value="{{ request()->phone }}" placeholder="Search By Phone...">
                                        </th>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>
                                            <button type="submit" class="btn btn-info btn-block">Search</button>
                                        </th>
                                    </tr>
                                    </form>

                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Salary</th>
                                        <th>Manager Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($employees as $k => $employee)
                                    <tr>
                                        <td>{{ $employee->full_name }}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{ $employee->salary . ' EGP' }}</td>
                                        <td>{{$employee->department?->user?->name}}</td>
                                        <td>
                                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="6" class="text-center">
                                            No Data Found!
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection