@if ($errors->any())
<div class="errors">
    <div style="font-weight: 800; margin-bottom: 6px;">Validasi error:</div>
    <ul style="margin: 0; padding-left: 18px;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif