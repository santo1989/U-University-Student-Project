<x-backend.layouts.master>
 {{-- @php die("check"); @endphp --}}

    <x-slot name="pageTitle">
        Add Form
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
            Create Mark Input <a class="btn btn-sm btn-info" href="{{ route('markinput.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('markinput.store') }}"  enctype="multipart/form-data" method="post">
                @csrf
                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                <select name="exam_name" class="form-control">
                    <option value="">Select Exam</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->exam_name }}">{{ $exam->exam_name }}</option>
                    @endforeach
                </select>
                <br>

                <select name="student_id" class="form-control">
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->student_id }}">{{ $student->student_id }}</option>
                    @endforeach
                </select>
                <br>

                <select name="file_name" class="form-control">
                    <option value="">Select File</option>
                    @foreach($fileuploads as $fileupload)
                        <option value="{{ $fileupload->id }}">{{ $student->student_id. ' '.  $fileupload->subject.' '.  $fileupload->file_type }}</option>
                    @endforeach
                </select>
                <br>
                   

                 <x-backend.form.input name="mark_Co_Ordinator" type="number" label="Mark Co-Ordinator" />
                <br>
                <x-backend.form.input name="mark_SuperViser" type="number"/>
                    <br>

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>