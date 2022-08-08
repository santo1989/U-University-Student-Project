@if(auth()->user()->role->name == "superVisor") 
<x-backend.layouts.master>

    <x-slot name="pageTitle">
      Super Visor Dashboard
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Dashboard </x-slot>
            <li class="breadcrumb-item active">Dashboard</li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


       <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Check Document</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('fileupload.index')}}">Check Uploaded Document</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Assign Mark</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('markinput.index')}}">Mark Assign</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    {{-- <div class="row">
      <div class="col-md-12 ">
        <h3><i class="fas fa-chart-pie mr-1"></i>
          Notifications</h3>
        @php
          $notifi=$notifications->where('status',0)->sortByDesc('created_at')->take(3);
        @endphp
        @foreach ($notifi as $notification)
          <a href="{{ $notification->link }}" style="text-decoration: none; ">
            <div class="border rounded-pill;" style="  background-color: {{ $notification->color }}; padding-left:5px; color:black;">
              <p style="color:'black'; font-size:15px; font-weight:bold;">{{ $notification->name }}</p>
              <p style="color:'black'">{{ $notification->created_at->diffForHumans() }}</p>
            @break($loop->iteration == 3)
          </div>
        </a>
        @endforeach
      </div>
      
    </div> --}}
    </div>

</x-backend.layouts.master>
{{-- @endif --}}
@elseif(auth()->user()->role->name == "student") 
<x-backend.layouts.master>
<x-slot name="pageTitle">
        Student Portal
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Welcome, {{ auth()->user()->name }} </x-slot>
            
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="row">
      <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
              <div class="card-body">Upload Document</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ route('fileupload.create')}}">Uploaded Document</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      
  {{-- <div class="row">
    <div class="col-md-12 ">
      <h3><i class="fas fa-chart-pie mr-1"></i>
        Notifications</h3>
      @php
        $notifi=$notifications->where('status',0)->sortByDesc('created_at')->take(3);
      @endphp
      @foreach ($notifi as $notification)
        <a href="{{ $notification->link }}" style="text-decoration: none; ">
          <div class="border rounded-pill;" style="  background-color: {{ $notification->color }}; padding-left:5px; color:black;">
            <p style="color:'black'; font-size:15px; font-weight:bold;">{{ $notification->name }}</p>
            <p style="color:'black'">{{ $notification->created_at->diffForHumans() }}</p>
          @break($loop->iteration == 3)
        </div>
      </a>
      @endforeach
    </div>
    
  </div> --}}
  </div>
</x-backend.layouts.master>
{{-- @endif --}}
@elseif(auth()->user()->role->name == "coordinator")
<x-backend.layouts.master>
<x-slot name="pageTitle">
  coordinator Portal
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Welcome, {{ auth()->user()->name }} </x-slot>
            
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="row">
      <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
              <div class="card-body">Check Document</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ route('fileupload.index')}}">Check Uploaded Document</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
              <div class="card-body">Assign Mark</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="{{ route('markinput.index')}}">Mark Assign</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
  {{-- <div class="row">
    <div class="col-md-12 ">
      <h3><i class="fas fa-chart-pie mr-1"></i>
        Notifications</h3>
      @php
        $notifi=$notifications->where('status',0)->sortByDesc('created_at')->take(3);
      @endphp
      @foreach ($notifi as $notification)
        <a href="{{ $notification->link }}" style="text-decoration: none; ">
          <div class="border rounded-pill;" style="  background-color: {{ $notification->color }}; padding-left:5px; color:black;">
            <p style="color:'black'; font-size:15px; font-weight:bold;">{{ $notification->name }}</p>
            <p style="color:'black'">{{ $notification->created_at->diffForHumans() }}</p>
          @break($loop->iteration == 3)
        </div>
      </a>
      @endforeach
    </div>
    
  </div> --}}
  </div>
</x-backend.layouts.master>

@else
<x-backend.layouts.master>
<x-slot name="pageTitle">
  Guest Portal
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Welcome, {{ auth()->user()->name }} </x-slot>
            
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


</x-backend.layouts.master>
<script>
      // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('#reservation').daterangepicker()

  //   Date picker JS
</script>
@endif