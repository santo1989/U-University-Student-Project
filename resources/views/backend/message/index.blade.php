<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Message 
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Message  </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('message.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Message </li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4" style="width:fit-content">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Message 

            {{-- @can('create-category') --}}
            {{-- <a class="btn btn-sm btn-info" href="{{ route('message.create') }}">Add New</a> --}}
            {{-- @endcan --}}

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            <form method="GET" action="{{ route('message.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Messanger Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{ ++$sl }}</td>
                       
                        <td>{{ $message->name }}.{{ $message->last_name }}</td> 
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('message.show', ['message' => $message->id]) }}">Show</a>

                            {{-- <a class="btn btn-warning btn-sm" href="{{ route('message.edit', ['message' => $message->id]) }}">Edit</a> --}}

                            <form style="display:inline" action="{{ route('message.destroy', ['message' => $message->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                            {{-- <!-- <a href="{{ route('message.destroy', ['message' => $message->id]) }}" >Delete</a> --> --}}


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- {{ $messages->links() }} --}}
        </div>
    </div>

</x-backend.layouts.master>