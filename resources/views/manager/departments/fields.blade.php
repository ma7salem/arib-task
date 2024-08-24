<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
            <input type="text" id="name" class="form-control" name="name" value="{{old('name') ?? (isset($department) ? $department->name : '')}}" required>
        @if($errors->has('name'))
            <div class="alert alert-danger"> {{ $errors->first('name') }}</div>
        @endif
    </div>
</div>
