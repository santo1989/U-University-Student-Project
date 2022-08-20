<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Course Registration </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"> New Registration </li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create New Registration <a class="btn btn-sm btn-info" href="{{ route('year.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('year.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                
                <x-backend.form.input name="student_id"/>

                <br>
                <label for="course_name">Select Course Year</label>
                <select name="course_name" class="form-control" id="course">
                    <option value="">Select Course</option>
                    @forelse ($course as $course )
                    <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                    @empty
                    <option value="">Create Course First for input Data</option>  
                    @endforelse
                    
                </select>
                <br>

                {{-- <x-backend.form.input name="year" type="year"/> --}}
                <label for="year">Select Year</label>
                <select name="year" class="form-control" id="year">
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
                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>