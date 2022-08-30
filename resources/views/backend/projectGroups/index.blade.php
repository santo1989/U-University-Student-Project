<x-backend.layouts.master>
  <x-slot name="pageTitle">
     Project Group List
 </x-slot>

 <x-slot name='breadCrumb'>
   <x-backend.layouts.elements.breadcrumb>
       <x-slot name="pageHeader"> Project Group </x-slot>
       <li class="breadcrumb-item"><a href="{{ route('projectGroups.index') }}">Project Group</a></li>
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
        <div class="card">
          <div class="card-header">
            <a class="btn btn-primary" href={{ route("projectGroups.create") }}>Create</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              {{-- projectGroup Table goes here --}}

              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Project Group Name</th>
                    <th>Supervisor</th>
                  <th>Actions</th>
                  
                </tr>
                </thead>
                <tbody>
                  @php $sl=0 @endphp
                  @foreach ($projectGroups as $projectGroup)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $projectGroup->project_id }}</td>
                        <td>{{ $projectGroup->teacher->name }}</td>
                      <td>
                        <a class="btn btn-primary" href={{ route("projectGroups.edit", ['projectGroups'=>$projectGroup->id]) }}>Edit</a>
                        <form action={{ route("projectGroups.destroy", $projectGroup->id) }} method="POST" class="d-inline">
                          @csrf
                          @method("DELETE")
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                      </td>
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