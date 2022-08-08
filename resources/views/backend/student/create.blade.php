<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Student </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('student.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Student <a class="btn btn-sm btn-info" href="{{ route('student.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('student.store') }}" enctype="multipart/form-data" method="post">
                @csrf

               
                <div class="form-group">
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                </div>

                <div class="form-group">
                   {{-- <input type="hidden" name="profile_id" value="{{ Auth::user()->profile->id }}"> --}}
                </div>
                
                <x-backend.form.input name="student_id" type="number"/>
                <br>
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                    @endforeach
                </select>
                <br>

                <select name="section" class="form-control">
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                    @endforeach
                </select>
                <br>

                <select name="course_name" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                    @endforeach
                </select>

                <br>
                <x-backend.form.input name="student_session" type="text"/>
                <br>

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>