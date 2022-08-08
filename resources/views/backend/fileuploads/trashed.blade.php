<x-backend.layouts.master>
    <x-slot name="pageTitle">
        FileUpload
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> FileUpload </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('fileupload.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">FileUpload</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            FileUpload <a class="btn btn-sm btn-info" href="{{ route('fileupload.index') }}">List</a>
        </div>
        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success">
                <span class="close" data-dismiss="alert">&times;</span>
                <strong>{{ session('message') }}.</strong>
            </div>
            @endif

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>File Type</th>
                        <th>PDF</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($fileuploads as $fileupload)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $fileupload->file_type }}</td>
                        <td>
                            <a href="{{ asset('storage/files/'.$fileupload->pdf) }}" target="_blank">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </td>
                        <td>{{ $fileupload->subject }}</td>
                        <td>
                        
                            <a class="btn btn-warning btn-sm" href="{{ route('fileupload.restore', ['fileupload' => $fileupload->id]) }}" >Restore</a>

                            <form style="display:inline" action="{{ route('fileupload.delete', ['fileupload' => $fileupload->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <button onclick="return confirm('Are you sure want to delete permanently?')" class="btn btn-sm btn-danger" type="submit">Permanent Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-backend.layouts.master>