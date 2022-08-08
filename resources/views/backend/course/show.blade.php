<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Course </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('course.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Course Details <a class="btn btn-sm btn-info" href="{{ route('course.index') }}">List</a>
        </div>
        <div class="card-body">
                <p><h4>Course Name  : </h4>{{ $show_course->course_name }}</p>
                
                <p><h4>Course Code  : </h4>{{ $show_course->course_code }}</p>

        </div>
    </div>

</x-backend.layouts.master>