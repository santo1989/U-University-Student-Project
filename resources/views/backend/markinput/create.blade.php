<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Mark Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('markinput.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Mark Input <a class="btn btn-sm btn-info" href="{{ route('markinput.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('markinput.store') }}" enctype="multipart/form-data" method="post">
                @csrf

               
                <x-backend.form.input name="exam_name" type="text"/>

                <br>
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->year_name }}</option>
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

               @forelse ($students as $student )
                    <div class="form-group">
                        <label for="">{{ $student->student_id }}</label>
                        <input type="text" name="marks[]" class="form-control">
                    </div>
                @empty
                    <div class="alert alert-danger">No Student Found</div>
                @endforelse

                <br>

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>