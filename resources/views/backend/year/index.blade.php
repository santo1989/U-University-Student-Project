<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Course Registration
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Course Registration </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Course Registration</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    
    <div class="card mb-4" style="width: 100%">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Course Registration

            @can('create-student')
            <a class="btn btn-sm btn-info" href="{{ route('year.create') }}">Add New</a>
            @endcan

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('year.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Student ID</th>
                        <th>Course Name</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($years as $year)
                    <tr>
                        <td>{{ ++$sl }}</td>
                       
                        <td>{{ $year->student_id }}</td>
                        <td>{{ $year->course_name }}</td>
                        <td>{{ $year->year }}</td>
                        <td>{{ $year->section }}</td>

                        
                        <td>
                            @can('create-student')
                            <a class="btn btn-info btn-sm" href="{{ route('year.show', ['year' => $year->id]) }}">Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('year.edit', ['year' => $year->id]) }}">Edit</a>

                            @endcan
                            @can('coOrdinator')
                            <form style="display:inline" action="{{ route('year.destroy', ['year' => $year->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                            @endcan
                            {{-- <!-- <a href="{{ route('year.destroy', ['year' => $year->id]) }}" >Delete</a> --> --}}


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $years->links() }}
        </div>
    </div>

</x-backend.layouts.master>