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
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <x-backend.form.input name="student_id" type="number"/>
                <br>
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                <br>

                <x-backend.form.input name="student_session" type="number"/>
                <br>

                <select name="course_name" class="form-control">
                    <option value="">Select Course</option>

                    @forelse($courses as $course)
                        <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                    @empty
                        <option value="">No Course Found</option>
                    @endforelse

                </select>
                <br>

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>