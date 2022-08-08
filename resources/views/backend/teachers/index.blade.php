<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Teachers
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Teachers </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('teachers.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Teachers</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Teachers
            <a class="btn btn-sm btn-danger" href="{{ route('teachers.trashed') }}">Trashed List</a>

            {{-- @can('create-category') --}}
            <a class="btn btn-sm btn-info" href="{{ route('teachers.create') }}">Add New</a>
            {{-- @endcan --}}

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('teachers.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($teachers as$teacher)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{$teacher->name }}</td>
                        <td>
                            <img src="{{ asset('storage/teachers/'.$teacher->img) }}" alt="{{$teacher->name }}" width="100px" height="100px">
                        </td>
                        <td>{{$teacher->designation }}</td>
                        <td>{{$teacher->phone }}</td>
                        
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('teachers.show', ['teacher' =>$teacher->id]) }}">Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('teachers.edit', ['teacher' =>$teacher->id]) }}">Edit</a>

                            <form style="display:inline" action="{{ route('teachers.destroy', ['teacher' =>$teacher->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $teachers->links() }}
        </div>
    </div>

</x-backend.layouts.master>