<x-backend.layouts.master>
      <x-slot name="pageTitle">
          Project Assigned List
      </x-slot>

      <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Project </x-slot>
            <li class="breadcrumb-item"><a href="{{ route('projectGroupReserves.index') }}">Project</a></li>
            <li class="breadcrumb-item active">Project</li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>
      
    <section class="content">
      <div class="container-fluid">
  
  @if (session('message'))
    <div class="alert alert-success">
        <span class="close" data-dismiss="alert">&times;</span>
        <strong>{{ session('message') }}.</strong>
    </div>
    @endif
  
        <div class="row">
          <div class="col-12">
                 
                </div>
          <div class="col-12">
            <div class="card">
              
              <div class="card-header">
                
                <div class='d-flex justify-content-between '>
                   <a class="btn btn-primary" style="height: 40px;" href={{ route("projectGroupReserves.create") }}>Assigned Project To Students</a>
                  {{-- <form method="GET" action="{{ route('projectGroupReserves.index') }}">
                      <input type="text" name="search" placeholder="Search" class="form-control" style="width: 200px;">
                  </form>&nbsp;&nbsp; --}}
      
                  {{-- <form method="GET" action="{{ route('projectGroupReserves.index') }}" >
                      <select name="project_id" id="project_id" class="form-select">
                          <option value="">Select Project</option>
                          @foreach($projects as $project)
                          <option value="{{ $project->id }}">{{ $project->project_id }}</option>
                          @endforeach --}}
                          {{-- @foreach ($projectGroupReserves as $projectGroupReserve)
                          <option value="{{$projectGroupReserve->projectGroup->project_id}}"> {{ $projectGroupReserve->projectGroup->project_id }} </option>
                          @endforeach --}}
                      {{-- </select>
                      <button class="btn btn-primary" type="submit">Project Search</button>
                  </form> --}}
              </div>
  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  {{-- role Table goes here --}}
  
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Sl#</th>
                        <th>Project Gropup Name</th>
                        <th>SuperVisor Name</th>
                        <th>Student ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
 
                      @foreach ($projectGroupReserves as $projectGroupReserve)
                      {{-- @dd($projectGroupReserve); --}}
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $projectGroupReserve->projectGroup->project_id }}</td>
                        <td>{{ $projectGroupReserve->projectGroup->teacher->name }}</td>
                        <td>
                          @foreach (json_decode($projectGroupReserve->student_id) as $student)
                          {{ $student }} <br>
                          @endforeach
                        </td>
                        <td>
  
                          <a class="btn btn-warning btn-sm" href="{{ route('projectGroupReserves.edit', ['projectGroupReserves' => $projectGroupReserve->first()->id ]) }}">Edit</a>

                          <form style="display:inline" action="{{ route('projectGroupReserves.destroy', ['projectGroupReserves' => $projectGroupReserve->first()->id ]) }}" method="post">
                              @csrf
                              @method('delete')

                              <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                          </form>

                      </td>
                      
                      {{-- @php $sl=0 @endphp
                      @foreach ($projectGroupReserves as $projectGroupReserve)
                      
                      <tr>
                          <td>{{ ++$sl }}</td>
                          <td>{{ $projectGroupReserve->project_group_id }}</td>
                          <td>{{ $projectGroupReserve->projectGroup->teacher }}</td>
                          <td>{{ $projectGroupReserves->student_id }}</td>
                          <td>
  
                              <a class="btn btn-warning btn-sm" href="{{ route('projectGroupReserves.edit', ['projectGroupReserve' => $projectGroupReserve->id]) }}">Edit</a>
  
                              <form style="display:inline" action="{{ route('projectGroupReserves.destroy', ['projectGroupReserve' => $projectGroupReserve->id]) }}" method="post">
                                  @csrf
                                  @method('delete')
  
                                  <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                              </form>
  
                          </td>--}}
                      </tr>
                      @endforeach 
                    
                    </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</x-backend.layouts.master>