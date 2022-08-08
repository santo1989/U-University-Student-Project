<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
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
            Create Exam <a class="btn btn-sm btn-info" href="{{ route('exam.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('exam.store') }}" enctype="multipart/form-data" method="post">
                @csrf

               
                <x-backend.form.input name="exam_name" type="text"/>

                <x-backend.form.input name="exam_date" type="date"/>

                <br>
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                    @endforeach
                </select>
                <br>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
                <br>

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>