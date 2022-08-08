<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Year Input </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Year Input <a class="btn btn-sm btn-info" href="{{ route('year.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('year.update', ['year' => $single_year->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <select name="year_name" class="form-control">
                    <option value="">Select Year</option>
                        <option value="1" {{ $single_year->year_name == 1 ? 'selected' : '' }}>First Year</option>
                        <option value="2" {{ $single_year->year_name == 2 ? 'selected' : '' }}>Second Year</option>
                        <option value="3" {{ $single_year->year_name == 3 ? 'selected' : '' }}>Third Year</option>
                </select>
                <br>

                <select name="course_name" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($course as $courses)
                        <option value="{{ $courses->course_name }}" {{ $single_year->course_name == $courses->course_name ? 'selected' : '' }}>{{ $courses->course_name }}</option>
                    @endforeach
                </select>
                <br>
                {{-- <select name="mark_distribution_id[]" class="form-control" multiple>
                    <option value="">Select multiple Mark Distribution Type using ctrl button</option>
                    @foreach($markdestribution as $markDistributions)
                        <option value="{{ $markDistributions->mark_distribution_name }}">{{ $markDistributions->mark_distribution_name }}</option>
                    @endforeach
                </select>  --}}

                    {{-- checkbox --}}
                    {{-- <div class="form-group">
                        <label for="mark_distribution_id">Mark Distribution Type</label>
                        <div class="form-check">
                            @forelse ($markdestribution as $markDistributions )
                            <input type="checkbox" name="mark_distribution_id[]" value="{{ $markDistributions->mark_distribution_name }}" {{ in_array($markDistributions->mark_distribution_name, $mark_distribution_id) ? 'checked' : '' }}> {{ $markDistributions->mark_distribution_name }}
    
                            @empty
                                <label class="form-check-label">No Mark Distribution Type Found</label>
                            @endforelse
                        </div>
                    </div> --}}
              
                {{-- @checked(true, $single_year->mark_distribution_id) --}}
                @forelse ($markdestribution as $markDistributions )
                    <input type="checkbox" name="mark_distribution_id[]" value=" {{ $markDistributions->mark_distribution_name }} " required> {{ $markDistributions->mark_distribution_name }}
                @empty
                    <p>No Mark Distribution Type Found</p>
                @endforelse





                <br>

                
                
                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>