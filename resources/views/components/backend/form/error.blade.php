@props(['name'])

@error($name)
<span class="small text-danger">{{ $message }}</span>
@enderror