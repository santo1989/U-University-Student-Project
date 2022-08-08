<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Message Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('message.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Message Input <a class="btn btn-sm btn-info" href="{{ route('message.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>
{{-- 
            <form action="{{ route('message.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <select name="message_name" class="form-control">
                    <option value="">Select Message</option>
                        <option value="1">First Message</option>
                        <option value="2">Second Message</option>
                        <option value="3">Third Message</option>
                </select>

                <br>

                <select name="course_name" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($course as $courses)
                        <option value="{{ $courses->course_name }}">{{ $courses->course_name }}</option>
                    @endforeach
                </select>
                <br>
                <select name="mark_distribution_id[]" class="form-control" multiple>
                    <option value="">Select multiple Mark Distribution Type using ctrl button</option>
                    @foreach($markdestribution as $markDistributions)
                        <option value="{{ $markDistributions->mark_distribution_name }}">{{ $markDistributions->mark_distribution_name }}</option>
                    @endforeach
                </select> 
                <br>
                <x-backend.form.button>Save</x-backend.form.button>
            </form> --}}
        </div>
    </div>


</x-backend.layouts.master>