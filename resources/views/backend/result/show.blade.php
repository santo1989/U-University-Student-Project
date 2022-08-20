<x-backend.layouts.master>
    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Result </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('year.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Result</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>
    <x-backend.form.input style="width: 200px;" name='search' />

    <x-backend.form.button type='submit' value='Search' />

    



</x-backend.layouts.master>