<x-backend.layouts.master>
    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Result </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Result</li>


        </x-backend.layouts.elements.breadcrumb>
    </x-slot>
<div id="printResultTable">
    <button class="btn btn-primary mb-2" onclick="printDiv('printResultTable')">Print</button>
    
    <table class="table table-bordered table-striped"   >
        
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Student Information</th>
                <th>Register Course Name</th>
                <th>Exam Information</th>
                <th>Coordinator Mark</th>
                <th>Superviser Mark</th>
                <th>Total</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>

            {{-- @dd($results) --}}
@forelse ( $results as $result)

<tr>
        {{-- @php
                  for($i = 0; $i < count($results); $i++) {
                $student_id = $results[$i]->student_id;
                $user_id = App\Models\Student::where('student_id', $student_id)->first()->user_id;
                $student_name = App\Models\User::where('id', $user_id)->first()->name;
                $courses_name = App\Models\Year::where('student_id', $student_id)->first()->course_name;
                $mark_Co_Ordinator = $results[$i]->mark_Co_Ordinator;
                $mark_SuperViser = $results[$i]->mark_SuperViser;
                $total = ($mark_Co_Ordinator + $mark_SuperViser);
                $results[$i]->student_name = $student_name;
                $results[$i]->courses_name = $courses_name;
                $results[$i]->total = $total;
                $results[$i]->mark_Co_Ordinator = $mark_Co_Ordinator;
                $results[$i]->mark_SuperViser = $mark_SuperViser;
                $results[$i]->student_id = $student_id;
                
                
            }
        @endphp      --}}
              @php
                  $user_id = App\Models\Student::where('student_id', $result->student_id)->first()->user_id;
                $student_name = App\Models\User::where('id', $user_id)->first()->name;
              @endphp    
    <td><li>Name : {{   $student_name }}</li>
        <li>ID : {{   $result->student_id }}</li></td>
        
        <td>
    {{-- @foreach ( $fullresults[3] as $result) --}}
    @php
        $courses_name = App\Models\Year::where('student_id', $result->student_id)->first()->course_name;
        $year = App\Models\Year::where('student_id', $result->student_id)->first()->year;
    @endphp
        <li> {{ $courses_name }}</li>
            <li>Sesson : {{ $year }}</li>
        {{-- @break --}}
    {{-- @endforeach --}}
    
</td>
<td>
    {{-- @foreach ( $fullresults[4] as $result) --}}
        <li>Exam : {{ $result->exam_name }}</li><hr> 
   {{--  @endforeach--}}
</td> 
<td>
    {{-- @foreach ( $fullresults[4] as $result) --}}
    <ul> {{  $result->mark_Co_Ordinator}}</ul><hr>
        
    {{-- @endforeach --}}
</td>
<td>
    {{-- @foreach ( $fullresults[4] as $result) --}}
    <ul>{{ $result->mark_SuperViser }}</ul><hr>
        
    {{-- @endforeach --}}
</td>
<td>
    {{-- @foreach ( $fullresults[4] as $result) --}}
    <ul>{{ $result->mark_Co_Ordinator + $result->mark_SuperViser   }}</ul><hr>
        
    {{-- @endforeach  --}}
</td>
</tr>

    
@empty
    <tr>
        <td colspan="6">No Data Found</td>
    </tr>
@endforelse
            {{-- @php
                $UID = Auth::user()->id;
                $VID = $results[0];
            @endphp --}}
            {{-- @forelse ($fullresults as $result) --}}
             {{-- @if($UID == $VID) --}}
{{-- @dd($fullresults) --}}
            
                {{-- <tr>
                    
                    <td><li>Name : {{ $fullresults[1] }}</li>
                        <li>ID : {{ $fullresults[2] }}</li></td>
                        
                        <td>
                    @foreach ( $fullresults[3] as $result)
                        <li>Register Course Name : {{ $result->course_name }}</li>
                            <li>Sesson : {{ $result->year }}</li>
                        @break
                    @endforeach
                    
                </td>
                <td>
                    @foreach ( $fullresults[4] as $result)
                        <li>Exam : {{ $result->exam_name }}</li><hr> 
                    @endforeach
                </td>
                <td>
                    @foreach ( $fullresults[4] as $result)
                    <ul> {{ $result->mark_Co_Ordinator }}</ul><hr>
                        
                    @endforeach
                </td>
                <td>
                    @foreach ( $fullresults[4] as $result)
                    <ul>{{ $result->mark_SuperViser }}</ul><hr>
                        
                    @endforeach
                </td>
                <td>
                    @foreach ( $fullresults[4] as $result)
                    <ul>{{ $result->mark_SuperViser + $result->mark_Co_Ordinator }}</ul><hr>
                        
                    @endforeach 
                </td>
                </tr> --}}
            {{--  --}}
            {{-- @empty
                <tr>
                    <td colspan="6">No Result Found</td>
                </tr> --}}
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
    {{-- {{ $results->links() }} --}}
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

</x-backend.layouts.master>