<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> FileUpload </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('fileupload.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create FileUpload <a class="btn btn-sm btn-info" href="{{ route('fileupload.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('fileupload.store') }}" enctype="multipart/form-data" method="post">
                @csrf
               
                <label for="file_type">Select Document Type</label>
                <select name="file_type" id="file_type" class="form-control">
                    <option value="">Select file_type</option>
                    <option value="document">Submit Document</option>
                    <option value="presentation">Submit Presentation</option>
                    <option value="FYP">FYP Submission</option>
                </select>
                <br>

                <x-backend.form.input name="pdf" type="file"/>

                 <x-backend.form.textarea name="subject" />

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>