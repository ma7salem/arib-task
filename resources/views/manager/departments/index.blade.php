@extends('manager.layouts.master')
@section('title') Departments @endsection

@section('content')

<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Departments</div>
                        <div class="card-body">
                            <a href="{{route('departments.create')}}" class="btn btn-success mb-2">Create</a>
                           @include('manager.layouts.partiels.alert')
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="4">
                                            <form action="{{route('departments.index')}}" method="get">
                                                <input type="text" name="name" class="form-control" value="{{ request()->name }}" placeholder="Search By Name...">
                                            </form>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <th>Emp.Count</th>
                                        <th>Emp.Salary</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($departments as $k => $department)
                                    <tr>
                                        <td>{{ $department->name }}</td>
                                        <td>{{$department->employees_count}}</td>
                                        <td>{{ $department->employees_sum_salary ? $department->employees_sum_salary . ' EGP' : '0 EGP' }}</td>
                                        <td>
                                            <a href="{{route('departments.edit', $department->id)}}" class="btn btn-primary">Edit</a>
                                            @if($department->canBeDeleted())
                                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            @else
                                            <a href="#" onclick="event.preventDefault(); alert('This department can not be deleted.');" class="btn btn-danger">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4" class="text-center">
                                            No Data Found!
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection