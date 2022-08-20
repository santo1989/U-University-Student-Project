<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Mark Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('markinput.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Mark Input <a class="btn btn-sm btn-info" href="{{ route('markinput.index') }}">List</a>
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

            <form action="{{ route('markinput.update', ['markinput' => $single_markinput->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <select name="exam_name" class="form-control">
                    <option value="">Select Exam</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->exam_name }}" {{ $single_markinput->exam_name == $exam->exam_name ? 'selected' : '' }}>{{ $exam->exam_name }}</option>
                    @endforeach
                </select>
                <br>
                <select name="student_id" class="form-control">
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->student_id }}" {{ $single_markinput->student_id == $student->student_id ? 'selected' : '' }}>{{ $student->student_id }}</option>
                    @endforeach
                </select>
                <br>
                <select name="file_name" class="form-control">
                    <option value="">Select File</option>
                    @foreach($fileuploads as $fileupload)
                        <option value="{{ $fileupload->id }}" {{ $single_markinput->file_name == $fileupload->id ? 'selected' : '' }}>{{ $student->student_id. ' '.  $fileupload->subject.' '.  $fileupload->file_type }}</option>
                    @endforeach
                </select>
                




    
                    <br>

                    <x-backend.form.input name="mark_Co_Ordinator" type="number" :value="$single_markinput->mark_Co_Ordinator"/>
                    <x-backend.form.input name="mark_SuperViser" type="number" :value="$single_markinput->mark_SuperViser"/>
                    
                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>