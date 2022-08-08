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
            FileUpload
            <a class="btn btn-sm btn-danger" href="{{ route('fileupload.trashed') }}">Trashed List</a>

            {{-- @can('create-category') --}}
            <a class="btn btn-sm btn-info" href="{{ route('fileupload.create') }}">Add New</a>
            {{-- @endcan --}}

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('fileupload.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
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
                            <a class="btn btn-info btn-sm" href="{{ route('fileupload.show', ['fileupload' => $fileupload->id]) }}">Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('fileupload.edit', ['fileupload' => $fileupload->id]) }}">Edit</a>

                            <form style="display:inline" action="{{ route('fileupload.destroy', ['fileupload' => $fileupload->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                            {{-- <!-- <a href="{{ route('fileupload.destroy', ['fileupload' => $fileupload->id]) }}" >Delete</a> --> --}}


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- {{ $fileuploads->links() }} --}}
        </div>
    </div>

</x-backend.layouts.master>