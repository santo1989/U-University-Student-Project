<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
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
           FileUpload Details <a class="btn btn-sm btn-info" href="{{ route('fileupload.index') }}">List</a>
        </div>
        <div class="card-body">
            
            <p>File Type: {{ $fileupload_show->first()->file_type }}</p>
            <p>PDF: <a href="{{ asset('storage/files/'.$fileupload_show->first()->pdf) }}" target="_blank">
                <i class="fas fa-file-pdf"></i> 
                {{ $fileupload_show->first()->pdf }}
            </a></p>

             <p>Subject: {{ $fileupload_show->first()->subject }}</p>
        </div>
    </div>

</x-backend.layouts.master>