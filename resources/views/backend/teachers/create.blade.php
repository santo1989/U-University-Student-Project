<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Teachers </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('teachers.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Teacher ID <a class="btn btn-sm btn-info" href="{{ route('teachers.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('teachers.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <x-backend.form.input name="name" required/> 
                <x-backend.form.input name="designation" required/>
                <x-backend.form.input name="phone"/>
                <x-backend.form.input name="img" type="file"/>
                
                
                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>