<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Message Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('message.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Message Input <a class="btn btn-sm btn-info" href="{{ route('message.index') }}">List</a>
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

            {{-- <form action="{{ route('message.update', ['message' => $single_message->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <select name="message_name" class="form-control">
                    <option value="">Select Message</option>
                        <option value="1" {{ $single_message->message_name == 1 ? 'selected' : '' }}>First Message</option>
                        <option value="2" {{ $single_message->message_name == 2 ? 'selected' : '' }}>Second Message</option>
                        <option value="3" {{ $single_message->message_name == 3 ? 'selected' : '' }}>Third Message</option>
                </select>
                <br>

                <select name="course_name" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($course as $courses)
                        <option value="{{ $courses->course_name }}" {{ $single_message->course_name == $courses->course_name ? 'selected' : '' }}>{{ $courses->course_name }}</option>
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

                
                
                <x-backend.form.button>Update</x-backend.form.button>

            </form> --}}
        </div>
    </div>


</x-backend.layouts.master>