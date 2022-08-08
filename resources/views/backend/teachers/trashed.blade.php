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
            Teachers <a class="btn btn-sm btn-info" href="{{ route('teachers.index') }}">List</a>
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
                        <td>
                            <img src="{{ asset('storage/teachers/'.$teacher->img) }}" alt="{{$teacher->name }}" width="100px" height="100px">
                        </td>
                        <td>{{$teacher->name }}</td>
                        <td>{{$teacher->designation }}</td>
                        <td>{{$teacher->phone }}</td>
                        
                        <td>
                        
                            <a class="btn btn-warning btn-sm" href="{{ route('teachers.restore', ['teacher' => $teacher->id]) }}" >Restore</a>

                            <form style="display:inline" action="{{ route('teachers.delete', ['teacher' => $teacher->id]) }}" method="post">
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