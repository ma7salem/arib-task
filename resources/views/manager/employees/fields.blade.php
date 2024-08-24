<div class="form-group row">
    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
        <div class="col-md-6">
            <input type="text" id="first_name" class="form-control" name="first_name" value="{{old('first_name') ?? (isset($employee) ? $employee->first_name : '')}}" required>
        @if($errors->has('first_name'))
            <div class="alert alert-danger"> {{ $errors->first('first_name') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
        <div class="col-md-6">
            <input type="text" id="last_name" class="form-control" name="last_name" value="{{old('last_name') ?? (isset($employee) ? $employee->last_name : '')}}" required>
        @if($errors->has('last_name'))
            <div class="alert alert-danger"> {{ $errors->first('last_name') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
            <input type="enail" id="email" class="form-control" name="email" value="{{old('email') ?? (isset($employee) ? $employee->email : '')}}" required>
        @if($errors->has('email'))
            <div class="alert alert-danger"> {{ $errors->first('email') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
        <div class="col-md-6">
            <input type="text" id="phone" class="form-control" name="phone" value="{{old('phone') ?? (isset($employee) ? $employee->phone : '')}}" required>
        @if($errors->has('phone'))
            <div class="alert alert-danger"> {{ $errors->first('phone') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        <div class="col-md-6">
            <input type="password" id="password" class="form-control" name="password">
        @if($errors->has('password'))
            <div class="alert alert-danger"> {{ $errors->first('password') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="salary" class="col-md-4 col-form-label text-md-right">Salary</label>
        <div class="col-md-6">
            <input type="text" id="salary" class="form-control" name="salary" value="{{old('salary') ?? (isset($employee) ? $employee->salary : '')}}" required>
        @if($errors->has('salary'))
            <div class="alert alert-danger"> {{ $errors->first('salary') }}</div>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>
        <div class="col-md-6">
            <select name="department_id" id="department_id" class="form-control" required>
                @foreach($departments as $id => $name)
                    <option value="{{$id}}"
                    {{old('department_id') == $id ? 'selected' : (isset($employee) && $employee->department_id ? 'selected' : '')}}
                    >
                        {{$name}}
                    </option>
                @endforeach
            </select>
        @if($errors->has('department_id'))
            <div class="alert alert-danger"> {{ $errors->first('department_id') }}</div>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
        <div class="col-md-6">
            <input type="file" name="image" id="image" class="form-control">
        @if($errors->has('image'))
            <div class="alert alert-danger"> {{ $errors->first('image') }}</div>
        @endif
    </div>
</div>