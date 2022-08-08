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
<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
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
</form>


</x-backend.layouts.master>
