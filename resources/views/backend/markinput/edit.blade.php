<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Mark Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('markinput.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Mark Input <a class="btn btn-sm btn-info" href="{{ route('markinput.index') }}">List</a>
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

            <form action="{{ route('markinput.update', ['markinput' => $single_markinput->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <x-backend.form.input name="exam_name" type="text" :value="$single_markinput->mark"/>

                    <select name="section_id" class="form-control">
                        <option value="">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" {{ $single_markinput->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <select name="year" class="form-control">
                        <option value="">Select Year</option>
                        @foreach($years as $year)
                            <option value="{{ $year->id }}" {{ $single_markinput->year == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <select name="course_name" class="form-control">
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $single_markinput->course_name == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <select name="student_id" class="form-control">
                        <option value="">Select Student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $single_markinput->student_id == $student->id ? 'selected' : '' }}>{{ $student->reg_no }}</option>
                        @endforeach
                    </select>

                    <x-backend.form.input name="mark" type="number" :value="$single_markinput->mark"/>
                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>