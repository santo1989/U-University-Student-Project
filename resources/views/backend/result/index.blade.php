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
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Student Information</th>
                <th>Course Information</th>
                <th>Exam Information</th>
                <th>Coordinator Mark</th>
                <th>Superviser Mark</th>
                <th>Total</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            

            @php
                $UID = Auth::user()->id;
                $VID = $results[0];
            @endphp
            {{-- @foreach ($results as $result) --}}
             @if($UID == $VID)

            
                <tr>
                    
                    <td><li>Name : {{ $results[1] }}</li>
                        <li>ID : {{ $results[2] }}</li></td>
                        
                        <td>
                    @foreach ( $results[3] as $result)
                        <li>Register Course Name : {{ $result->course_name }}</li>
                            <li>Sesson : {{ $result->year }}</li>
                        @break
                    @endforeach
                    
                </td>
                <td>
                    @foreach ( $results[4] as $result)
                        <li>Exam : {{ $result->exam_name }}</li><hr> 
                    @endforeach
                </td>
                <td>
                    @foreach ( $results[4] as $result)
                    <ul> {{ $result->mark_Co_Ordinator }}</ul><hr>
                        
                    @endforeach
                </td>
                <td>
                    @foreach ( $results[4] as $result)
                    <ul>{{ $result->mark_SuperViser }}</ul><hr>
                        
                    @endforeach
                </td>
                <td>
                    @foreach ( $results[4] as $result)
                    <ul>{{ $result->mark_SuperViser + $result->mark_Co_Ordinator }}</ul><hr>
                        
                    @endforeach 
                </td>
                </tr>
            {{-- @endforeach --}}
            @else
                <tr>
                    <td colspan="6">No Result Found</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{-- {{ $results->links() }} --}}
    </div>

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