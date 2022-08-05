@extends('layouts.admin')
@section('content')


    <div>
        <a class="btn btn-primary" href="{{ route('admin.students.index') }}"> Back</a>
    </div>


<div class="card">
    <div class="card-header">
        <!-- {{ trans('global.create') }} {{ trans('cruds.student.title_singular') }} -->
        Create Student
    </div>


    <div class="card-body">
        <form action="{{ route("admin.students.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="roll_no">Roll_no</label>
                <input type="text" id="roll_no" name="roll_no" class="form-control" >
                <!-- @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.student.fields.title_helper') }}
                </p> -->
            </div>
            <div>
            <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" >
            </div>
            <div></br>
            <label for="email">Student Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($student) ? $student->email : '') }}" required>

            </div>
            </br>
            <div>
            <label for="department">Department</label>
                <input type="text" id="department" name="department" class="form-control" value="{{ old('department', isset($student) ? $student->department : '') }}" required>
            </div>


            <div></br>
            <label for="ph_no">Ph_no</label>
                <input type="text" id="ph_no" name="ph_no" class="form-control" value="{{ old('ph_no', isset($student) ? $student->ph_no : '') }}" required>
            </div></br>

            <div>
            <label for="mentor">Mentor</label>
                <input type="text" id="mentor" name="mentor" class="form-control" value="{{ old('mentor', isset($student) ? $student->mentor : '') }}" required>
            </div></br>

            <div>   
            <label for="mentor_no">Mentor_no</label>
                <input type="text" id="mentor_no" name="mentor_no" class="form-control" value="{{ old('mentor_no', isset($student) ? $student->mentor_no : '') }}" required>
            </div>  





            <!-- <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                <label for="permission">{{ trans('cruds.student.fields.permissions') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
                    
                </select>
                
            </div> -->
</br>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection