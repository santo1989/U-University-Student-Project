<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> FileUpload </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('fileupload.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit File <a class="btn btn-sm btn-info" href="{{ route('fileupload.index') }}">List</a>
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

            <form action="{{ route('fileupload.update', ['fileupload' => $fileupload_edit->first()->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                {{-- <x-backend.form.input name="title" :value="$fileupload->first()->title" />  --}}
                <label for="file_type">Select Document Type</label>
                <select name="file_type" id="file_type" class="form-control">
                    <option value="">Select file_type</option>
                    <option value="Admission">Admission Related</option>
                    <option value="career">Career Related</option>
                    <option value="other">Other Document</option>
                </select>
                    

        	    <x-backend.form.input name="pdf" type="file" :value="$fileupload_edit->first()->image"/>  

                <x-backend.form.textarea name="subject">
                {{ $fileupload_edit->first()->subject }}
                </x-backend.form.textarea>

                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>