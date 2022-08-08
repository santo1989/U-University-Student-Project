<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Course
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Course </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('course.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Course</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4" style="width:100%">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Course

            {{-- @can('create-category') --}}
            <a class="btn btn-sm btn-info" href="{{ route('course.create') }}">Add New</a>
            {{-- @endcan --}}

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('course.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ ++$sl }}</td>
                       
                        <td>{{ $course->course_name }}</td>
                        
                        <td>{{ $course->course_code }}</td>                      
                        
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('course.show', ['course' => $course->id]) }}">Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('course.edit', ['course' => $course->id]) }}">Edit</a>

                            <form style="display:inline" action="{{ route('course.destroy', ['course' => $course->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                            {{-- <!-- <a href="{{ route('course.destroy', ['course' => $course->id]) }}" >Delete</a> --> --}}


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $courses->links() }}
        </div>
    </div>

</x-backend.layouts.master>