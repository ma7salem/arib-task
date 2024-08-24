@extends('manager.layouts.master')
@section('title') Tasks @endsection

@section('content')

<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>
                        <div class="card-body">
                            <a href="{{route('tasks.create')}}" class="btn btn-success mb-2">Create</a>
                           @include('manager.layouts.partiels.alert')
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Employee Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tasks as $k => $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{$task->details_limit}}</td>
                                        <td>{{$task->status}}</td>
                                        <td>{{ $task->employee?->full_name }}</td>
                                       
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
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection