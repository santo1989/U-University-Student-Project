<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Exam </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('exam.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Exam <a class="btn btn-sm btn-info" href="{{ route('exam.index') }}">List</a>
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

            <form action="{{ route('exam.update', ['exam' => $single_markinput->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <x-backend.form.input name="exam_name" type="text" :value="$single_markinput->mark"/>

                <x-backend.form.input name="exam_date" type="date" :value="$single_markinput->date"/>
                    <br>
                    <select name="year" class="form-control">
                        <option value="">Select Year</option>
                        @foreach($years as $year)
                            <option value="{{ $year->id }}" {{ $single_markinput->year == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <select name="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" {{ $single_markinput->status == 1 ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ $single_markinput->status == 0 ? 'selected' : '' }}>Unpublished</option>
                    </select>
                    <br>
                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>