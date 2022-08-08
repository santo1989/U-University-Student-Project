<x-backend.layouts.master>
    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Result </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Result</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>
    
    @php 
    $student_name=App\Models\Profile::where('student_id',$student_id)->first()->full_name;
    // @dd($student_name);
    @endphp

    <div class="container">
      
        <p>Name: {{ $student_name ?? ' ' }}</p>
    </div>
<hr>
<form action="{{ route('result.store') }}" method="POST">
    @csrf
    @forelse ($courses as $course)
        
    
                <input type="hidden" name="student_id" value="{{ $student_id }}">
                <input type="hidden" name="year" value="{{ $year }}">
                <input type="hidden" name="course_year" value="{{ $course_year }}">


        <label class="form-label" for="viva"><h4>{{ $course->course_name }}</h4></label><br>
        <input class="form-control" name="written[]" type="number" id="written" placeholder="Enter Written Mark"/><br>
        <input class="form-control" name="oral[]" type="number" id="oral" placeholder="Enter Oral Mark"/><br>
        <input class="form-control" name="formative[]" type="number" id="formative" placeholder="Enter formative Mark"/><br> 
        <input class="form-control" name="practical[]" type="number" id="practical" placeholder="Enter practical Mark"/> <br>  
        <input class="form-control" name="written_pass[]" type="number" id="written_pass" placeholder="Enter Written Pass Mark"/><br>
        <input class="form-control" name="formative_pass[]" type="number" id="formative_pass" placeholder="Enter Formative Pass Mark"/> <br>
        <input class="form-control" name="practical_pass[]" type="number" id="practical_pass" placeholder="Enter Practical Pass Mark"/> <br>
        <input class="form-control" name="oral_pass[]" type="number" id="oral_pass" placeholder="Enter Oral Pass Mark"/><br> 
        <input class="form-control" name="total[]" type="number" id="total" placeholder="Enter Total Mark"/> <br>    
        <input class="form-control" name="grade[]" type="number" id="grade" placeholder="Enter Grade"/> <br>  
        <input class="form-control" type="hidden" name="course_id[]" value="{{ $course->id }}"><br>
<br><br>
@empty
        <td colspan="8">No data found</td>
    @endforelse
<input type="submit" class="btn btn-primary"/>
</form>



</x-backend.layouts.master>