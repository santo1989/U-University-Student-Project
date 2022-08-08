<x-backend.layouts.master>
    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Result </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Result</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <h3>First Year</h3>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
        <th scope="col">SL</th>
        <th scope="col">Course</th>
        <th scope="col">Teacher</th>
        <th scope="col">Formative</th>
        <th scope="col">Oral</th>
        <th scope="col">Written</th>
        <th scope="col">Practical</th>
        <th scope="col">Total</th>
        <th scope="col">Grade</th>
        </tr>
    </thead>
    @php $sl = 0; @endphp
    <tbody>
        @foreach ($firstYearResults as $firstYearResult)
        <tr>
        <th scope="row">{{ ++$sl }}</th>
        <td>{{ $firstYearResult->currentcourses->course->course_name }}</td>
        <td>{{ $firstYearResult->currentcourses->teacher->name }}</td>
        <td>{{ $firstYearResult->formative }} / {{ $firstYearResult->formative_pass }}</td>
        <td>{{ $firstYearResult->written }} / {{ $firstYearResult->written_pass }}</td>
        <td>{{ $firstYearResult->oral }} / {{ $firstYearResult->oral_pass }}</td>        
        <td>{{ $firstYearResult->practical }} / {{ $firstYearResult->practical_pass }}</td>
        <td>{{ $firstYearResult->total }}</td>
        <td>{{ $firstYearResult->grade }}</td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
    <br>

    @if(count($secondYearResults) != 0)
    <h3>Second Year</h3>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
        <th scope="col">SL</th>
        <th scope="col">Course</th>
        <th scope="col">Teacher</th>
        <th scope="col">Formative</th>
        <th scope="col">Oral</th>
        <th scope="col">Written</th>
        <th scope="col">Practical</th>
        <th scope="col">Total</th>
        <th scope="col">Grade</th>
        </tr>
    </thead>
    @php $sl = 0; @endphp
    <tbody>
        @foreach ($secondYearResults as $secondYearResult)
        <tr>
        <th scope="row">{{ ++$sl }}</th>
        <td>{{ $secondYearResult->currentcourses->course->course_name }}</td>
        <td>{{ $secondYearResult->currentcourses->teacher->name }}</td>
        <td>{{ $secondYearResult->formative }} / {{ $secondYearResult->formative_pass }}</td>
        <td>{{ $secondYearResult->written }} / {{ $secondYearResult->written_pass }}</td>
        <td>{{ $secondYearResult->oral }} / {{ $secondYearResult->oral_pass }}</td>        
        <td>{{ $secondYearResult->practical }} / {{ $secondYearResult->practical_pass }}</td>
        <td>{{ $secondYearResult->total }}</td>
        <td>{{ $secondYearResult->grade }}</td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
    @endif

    @if(count($thirdYearResults) != 0)
    <br>

    <h3>Third Year</h3>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
        <th scope="col">SL</th>
        <th scope="col">Course</th>
        <th scope="col">Teacher</th>
        <th scope="col">Formative</th>
        <th scope="col">Oral</th>
        <th scope="col">Written</th>
        <th scope="col">Practical</th>
        <th scope="col">Total</th>
        <th scope="col">Grade</th>
        </tr>
    </thead>
    @php $sl = 0; @endphp
    <tbody>
        @foreach ($thirdYearResults as $thirdYearResult)
        <tr>
        <th scope="row">{{ ++$sl }}</th>
        <td>{{ $thirdYearResult->currentcourses->course->course_name }}</td>
        <td>{{ $thirdYearResult->currentcourses->teacher->name }}</td>
        <td>{{ $thirdYearResult->formative }} / {{ $thirdYearResult->formative_pass }}</td>
        <td>{{ $thirdYearResult->written }} / {{ $thirdYearResult->written_pass }}</td>
        <td>{{ $thirdYearResult->oral }} / {{ $thirdYearResult->oral_pass }}</td>        
        <td>{{ $thirdYearResult->practical }} / {{ $thirdYearResult->practical_pass }}</td>
        <td>{{ $thirdYearResult->total }}</td>
        <td>{{ $thirdYearResult->grade }}</td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
    @endif



</x-backend.layouts.master>