<x-backend.layouts.master>
      <x-slot name="pageTitle">
          Edit Role
      </x-slot>

      <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Role </x-slot>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
{{-- <form action="{{ route('roles.update') }}" method="post"> --}}
{{-- <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
  <div>
    @csrf
    @method('put')
    

      <div class="row m-4">
        
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
              <label>Role</label>
              <select name="role_id" id="role_id" class="form-select">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}"   {{ $role->id == $user->role_id ? 'selected' : '' }} >{{ $role->name }}</option>
                @endforeach
            </select>
          </div>
          </div>
          
      </div>
      <button type="submit" class="btn btn-primary" style="margin-left: 33px">Save</button>
  </div>
</form> --}}

<form action="{{ route('projectGroupReserves.update ', ['projectGroupReserves' => $projectGroupReserve->first()->id]) }}" method="post">
    <div>
        @csrf
        @method('put')
        
          <div class="row m-4">
              
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Project Group Name</label>
                    <select name="project_group_id" class="form-control">
                        <option value="">Select Project Group</option>      
                        @foreach($projectGroups as $projectGroup)
                 
                        <option value="{{ $projectGroup->id }}" {{ $projectGroup->id == $projectGroupReserve->project_group_id ? 'selected' : '' }}>{{ $projectGroup->project_id }}</option>
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
                 
                          <option value="{{ $student->id }}" {{ in_array($student->id, $projectGroupReserve->student_id) ? 'selected' : '' }}>{{ $student->student_id }}</option>
                          @endforeach
                      </select>
                  
                   
                  </div>
                  </div>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 33px">Save</button>
    </div>
</form>


</x-backend.layouts.master>
