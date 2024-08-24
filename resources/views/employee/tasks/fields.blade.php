<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        <div class="col-md-6">
            <input type="text" id="title" class="form-control" name="title" value="{{old('title') ?? (isset($task) ? $task->title : '')}}" required>
        @if($errors->has('title'))
            <div class="alert alert-danger"> {{ $errors->first('title') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="details" class="col-md-4 col-form-label text-md-right">Details</label>
        <div class="col-md-6">
            <textarea name="details" id="details" class="form-control" cols="30" rows="10">{{old('details') ?? (isset($task) ? $task->details : '')}}</textarea>
        @if($errors->has('details'))
            <div class="alert alert-danger"> {{ $errors->first('details') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control" required>
                @foreach(['pending', 'onprogress', 'completed'] as $status)
                    <option value="{{$status}}"
                    {{old('status') == $status ? 'selected' : (isset($task) && $task->status == $status ? 'selected' : '')}}
                    >
                        {{$status}}
                    </option>
                @endforeach
            </select>
        @if($errors->has('status'))
            <div class="alert alert-danger"> {{ $errors->first('status') }}</div>
        @endif
    </div>
</div>
