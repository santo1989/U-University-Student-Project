@props(['name', 'options', 'selected' => ''])

<x-backend.form.field>
  
    <select name="{{ $name }}" id="{{ $name }}" class="form-select">
        @foreach ($options as $key=>$value)
        <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>

</x-backend.form.field>