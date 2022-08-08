<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Exam </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('exam.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Exam Details <a class="btn btn-sm btn-info" href="{{ route('exam.index') }}">List</a>
        </div>
        <div class="card-body">
                <p><h4>Exam Name  : </h4>{{ $show_exam->exam_name }}</p>
                <p><h4>Exam Date  : </h4>{{ $show_exam->exam_date }}</p>
                <p><h4>Exam Year  : </h4>{{ $show_exam->year }}</p>
                <p><h4>Exam Status  : </h4>{{ $show_exam->status }}</p>
                

        </div>
    </div>

</x-backend.layouts.master>