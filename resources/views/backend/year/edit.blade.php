<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Course Registration </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Course Registration</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Course Registration <a class="btn btn-sm btn-info" href="{{ route('year.index') }}">List</a>
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

            <form action="{{ route('year.update', ['year' => $single_year->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

               <x-backend.form.input name="student_id" value="{{ $single_year->student_id }}"/>
                <br>

                <label for="course_name">Select Course Name</label>
                <select name="course_name" class="form-control" id="course">
                    <option value="">Select Course</option>
                    @foreach ($course as $course )
                    <option value="{{ $course->course_name }}" {{ $single_year->course_name == $course->course_name ? 'selected' : '' }}>{{ $course->course_name }}</option>

                    @endforeach
                   
                    

                </select>
                <br>

                <label for="year">Select Year</label>
                <select name="year" class="form-control" id="year">
                    <option value="">Select Year</option>
                    <option value="2018" {{ $single_year->year == '2018' ? 'selected' : '' }}>2018</option>
                    <option value="2019" {{ $single_year->year == '2019' ? 'selected' : '' }}>2019</option>
                    <option value="2020" {{ $single_year->year == '2020' ? 'selected' : '' }}>2020</option>
                    <option value="2021" {{ $single_year->year == '2021' ? 'selected' : '' }}>2021</option>
                    <option value="2022" {{ $single_year->year == '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ $single_year->year == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ $single_year->year == '2024' ? 'selected' : '' }}>2024</option>
                    <option value="2025" {{ $single_year->year == '2025' ? 'selected' : '' }}>2025</option>

                </select>
                <br>
                
                
                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>