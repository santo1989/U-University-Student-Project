<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Student </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('student.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Student <a class="btn btn-sm btn-info" href="{{ route('student.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('student.update', ['student' => $single_student->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div>

                <div class="form-group">
                    <input type="hidden" name="profile_id" value="{{ Auth::user()->profile->id }}">
                </div>

                <x-backend.form.input name="student_id" type="number" value="{{ $single_student->student_id }}"/>
                <br>
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{ $single_student->year_id == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                    @endforeach
                </select>
                <br>

                <select name="section" class="form-control">
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}" {{ $single_student->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                    @endforeach
                </select>
                <br>

                <select name="course_name" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $single_student->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                    @endforeach
                </select>

                <br>
                <x-backend.form.input name="student_session" type="text" value="{{ $single_student->student_session }}"/>
                <br>
                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>