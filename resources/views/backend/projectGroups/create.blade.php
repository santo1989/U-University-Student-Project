<x-backend.layouts.master>
    <x-slot name="pageTitle">
       Create Project Group
    </x-slot>

    <x-slot name='breadCrumb'>
      <x-backend.layouts.elements.breadcrumb>
          <x-slot name="pageHeader"> ProjectGroup </x-slot>
          <li class="breadcrumb-item"><a href="{{ route('projectGroups.index') }}">Project Group</a></li>
          <li class="breadcrumb-item active">Create Project Group</li>
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
  <form action="{{ route('projectGroups.store') }}"  method="post">
      <div>
         @csrf
          <div class="row m-4">
              <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                  <label>Project Group Name</label>
                  <input type="text" class="form-control" placeholder="Enter projectGroup Name" name="project_id">
              </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Project SuperVisor</label>
                    <select class="form-control" name="teacher_id">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 33px">Save</button>
      </div>
    </form>


</x-backend.layouts.master>


