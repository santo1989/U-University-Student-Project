<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
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
           Year Input Details <a class="btn btn-sm btn-info" href="{{ route('year.index') }}">List</a>
        </div>
        <div class="card-body">
                {{-- <p><h4>Year Input Name  : </h4>{{ $show_year->year }}</p> --}}
                <p><h4>Year Input Name  : </h4>{{ $show_year->year_name }}</p>
                <p><h4>Course Name  : </h4>{{ $show_year->course_name }}</p>
                <p><h4>Exam Mark Distribution Type  : </h4>@foreach(explode(',', $show_year->mark_distribution_id) as $info) 
                    <option>{{$info}}</option>
                  @endforeach</p>
                

        </div>
    </div>

</x-backend.layouts.master>