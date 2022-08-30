{{-- @dd($students); --}}
<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Assign Project Group
    </x-slot>

    <x-slot name='breadCrumb'>
      <x-backend.layouts.elements.breadcrumb>
          <x-slot name="pageHeader"> Project Group Reservation </x-slot>
          <li class="breadcrumb-item"><a href="{{ route('projectGroupReserves.index') }}">Project Group</a></li>
          <li class="breadcrumb-item active">Assign Project Group</li>
      </x-backend.layouts.elements.breadcrumb>
  </x-slot>


  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
  <form action="{{ route('projectGroupReserves.store') }}"  method="post">
      <div>
         @csrf
          <div class="row m-4">
              <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                {{-- @dd($projectGroups); --}}
                  <label>Project Group Name</label>
                  <select name="project_group_id" class="form-control">
                      <option value="">Select Project Group</option>      
                      @foreach($projectGroups as $projectGroup)
                 
                      <option value="{{ $projectGroup->id }}">{{ $projectGroup->project_id }}</option>
                      @endforeach
                </select>

              </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Assign Student</label>
                    {{-- multiple checkbox select  --}}
                    <select name="student_id[]" class="form-control" multiple>
                        <option value="">Select Multiple Student</option>      
                        @foreach($students as $student)
                 
                        <option value="{{ $student->student_id }}">{{ $student->student_id }}</option>
                        @endforeach
                    </select>
                
                 
                </div>
                </div>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 33px">Save</button>
      </div>
    </form>


</x-backend.layouts.master>


