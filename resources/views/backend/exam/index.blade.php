<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Exam
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Exam </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('exam.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Exam</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4" style="width:fit-content">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Exam

            {{-- @can('create-category') --}}
            <a class="btn btn-sm btn-info" href="{{ route('exam.create') }}">Add New</a>
            {{-- @endcan --}}

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('exam.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Exam Name</th>
                        <th>Exam Date</th>
                        <th>Year</th>     
                        <th>Status</th>
                        

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($markinputs as $exam)
                    <tr>
                        <td>{{ ++$sl }}</td>
                       
                        <td>{{ $exam->exam_name }}</td> 
                        
                        <td>{{ $exam->exam_date }}</td>

                        <td>{{ $exam->year }}</td>

                        <td>{{ $exam->status }}</td>
                        
                        
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('exam.show', ['exam' => $exam->id]) }}">Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('exam.edit', ['exam' => $exam->id]) }}">Edit</a>

                            <form style="display:inline" action="{{ route('exam.destroy', ['exam' => $exam->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                            {{-- <!-- <a href="{{ route('exam.destroy', ['exam' => $exam->id]) }}" >Delete</a> --> --}}


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $markinputs->links() }}
        </div>
    </div>

</x-backend.layouts.master>