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
                <p><h4>Mark Input Name  : </h4>{{ $show_markinput->exam_name }}</p>
                <p><h4>Mark Input Section  : </h4>{{ $show_markinput->section }}</p>
                <p><h4>Mark Input Year  : </h4>{{ $show_markinput->year }}</p>
                <p><h4>Mark Input Course Name  : </h4>{{ $show_markinput->course_name }}</p>
                <p><h4>Mark Input Student Reg No  : </h4>{{ $show_markinput->student_id }}</p>
                @forelse ($markdistributions as $markdistribution )
                            <td>{{ $markinput->$markdistribution->mark_distribution_id }}</td>
                        @empty
                            <td>No Mark Input</td>
                        @endforelse

        </div>
    </div>

</x-backend.layouts.master>