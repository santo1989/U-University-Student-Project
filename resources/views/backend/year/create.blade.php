<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Year Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Year <a class="btn btn-sm btn-info" href="{{ route('year.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('year.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <label for="student_id">Select student</label>
                <select name="student_id" class="form-control" id="student_id" style="height: 80px !important">
                   
                    <option value="">Select Year</option>
                    @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>

                

                <br>
                <label for="course">Select Course Year</label>
                <select name="course" class="form-control" id="course">
                    <option value="">Select Course</option>
                    @forelse ($courses as $course )
                    <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                    @empty
                    <option value="">Create Course First for input Data</option>  
                    @endforelse
                    
                </select>
                <br>

                <x-backend.form.input name="year" type="year"/>

                <br>
                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>