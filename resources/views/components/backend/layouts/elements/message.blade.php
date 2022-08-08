@props(['fmessage'])

@if ($fmessage)
<div class="alert alert-success">
    <span class="close" data-dismiss="alert">&times;</span>
    <strong>{{ $fmessage }}.</strong>
</div>
@endif