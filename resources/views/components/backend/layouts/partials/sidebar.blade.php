<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @can('coOrdinator') 
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Co-Ordinator Home</div>

                
                {{-- <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Super-Visor Home
                </a> --}}

                <a class="nav-link" href="{{ route('teachers.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Teachers
                </a>

                 <a class="nav-link" href="{{ route('course.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Course
                </a>

                <a class="nav-link" href="{{ route('projectGroups.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Supervisor Assign
                </a>

                <a class="nav-link" href="{{ route('projectGroupReserves.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Student Assign to Group
                </a>
                
                <a class="nav-link" href="{{ route('fileupload.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Check Downloadable FileUpload
                </a>

              <a class="nav-link" href="{{ route('exam.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Set Exam Schedule
                </a>

                <a class="nav-link" href="{{ route('markinput.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Assign Mark
                </a>

                

                {{--@can('user-management')--}}

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    User Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Role
                        </a>
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Users
                        </a>
                    </nav>
                </div>
                {{--@endcan--}}

            </div>
            @endcan
   
            
            {{-- {{ Chairman }} --}}
            @can('Chairman') 
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Chairman Home</div>

                
                {{-- <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Super-Visor Home
                </a> --}}

                <a class="nav-link" href="{{ route('teachers.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Teachers
                </a>

                 <a class="nav-link" href="{{ route('course.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Course
                </a>

                <a class="nav-link" href="{{ route('projectGroups.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Supervisor Assign
                </a>

                {{-- <a class="nav-link" href="{{ route('projectGroupReserves.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Student Assign to Group
                </a> --}}
                
                <a class="nav-link" href="{{ route('fileupload.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Check Downloadable FileUpload
                </a>

              {{-- <a class="nav-link" href="{{ route('exam.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Exam Schedule
                </a> --}}



                



                {{--@endcan--}}

            </div>
            @endcan





{{-- Co-Ordinator --}}

            @can('superVisor') 
            <div class="nav">
                <div class="sb-sidenav-menu-heading">List</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    superVisor Home
                </a>

                <a class="nav-link" href="{{ route('course.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Course
                </a>


                 <a class="nav-link" href="{{ route('exam.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Set Exam Schedule
                </a>

                <a class="nav-link" href="{{ route('fileupload.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Downloadable FileUpload
                </a>
            
                <a class="nav-link" href="{{ route('markinput.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Assign Mark to Student
                </a>

               
            </div>
            @endcan

            @can('student') 
            <div class="nav">
                <div class="sb-sidenav-menu-heading">List</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Student Home
                </a>

                <a class="nav-link" href="{{ route('student.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Student Profile
                </a>
                
                <a class="nav-link" href="{{ route('year.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Course Registration
                </a>

                <a class="nav-link" href="{{ route('fileupload.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Downloadable FileUpload
                </a>
                
                <a class="nav-link" href="{{ route('result.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Result
                </a>

                

                
                

            </div>
            @endcan
            @can('Guest')
            <div class="nav">
                <div class="sb-sidenav-menu-heading">List</div>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Waiting for Supervisor Conformation
            </a>
            </div>
            @endcan

        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
           {{ auth()->user()->role->name ?? "" }}
        </div>
    </nav>
</div>


