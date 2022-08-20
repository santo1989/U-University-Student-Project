<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Student
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Student </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('student.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Student</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4" style="width:fit-content">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Student
        @can('create-student')
        @php
            $model0fstudent = App\Models\Student::find($user_id = auth()->user()->id);
            // dd($model0fstudent);
        @endphp
        @if ($model0fstudent == null)
            <a class="btn btn-sm btn-info" href="{{ route('student.create') }}">Add New</a>
            
        @endif
            {{-- <a class="btn btn-sm btn-info" href="{{ route('student.create') }}">Add New</a> --}}
        @endcan
            
        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('student.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Student ID</th>
                        <th>Year</th>
                        <th>Course Name</th>
                        <th>student Session</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ ++$sl }}</td>
                       
                        <td>{{ $student->student_id }}</td> 
                        
                        <td>{{ $student->year }}</td>

                        <td>{{ $student->course_name }}</td>

                        <td>{{ $student->student_session }}</td>
                        
                        
                        <td>
                            @can('create-student')
                            <a class="btn btn-info btn-sm" href="{{ route('student.show', ['student' => $student->id]) }}">Show</a>
                           
                            <a class="btn btn-warning btn-sm" href="{{ route('student.edit', ['student' => $student->id]) }}">Edit</a>
                            @endcan
                            @can('superVisor')
                            <form style="display:inline" action="{{ route('student.destroy', ['student' => $student->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                            @endcan
                            {{-- <!-- <a href="{{ route('student.destroy', ['student' => $student->id]) }}" >Delete</a> --> --}}


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $students->links() }}
        </div>
    </div>

</x-backend.layouts.master>