<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
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
           Mark Input Details <a class="btn btn-sm btn-info" href="{{ route('markinput.index') }}">List</a>
        </div>
        <div class="card-body">
                <p><h4>Exam Name  : </h4>{{ $show_markinput->exam_name }}</p>
                <p><h4>Student ID : </h4>{{ $show_markinput->student_id }}</p>
                <p><h4>File  : </h4>{{ $show_markinput->file_name }}</p>
                <p><h4>CoOrdinator Mark  : </h4>{{ $show_markinput->mark_Co_Ordinator }}</p>
                <p><h4>Supervisor Mark  : </h4>{{ $show_markinput->mark_Supervisor }}</p>
               

        </div>
    </div>

</x-backend.layouts.master>