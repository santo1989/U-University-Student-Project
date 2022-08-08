@props(['name'])

<x-backend.form.field>
    <textarea name="{{ $name }}" class="form-control" id="{{ $name }}">

    {{ $slot ?? old($name) }}

    </textarea>
    
    <x-backend.form.label name="{{ $name }}" />

    <x-backend.form.error name="{{ $name }}" />
    
</x-backend.form.field>