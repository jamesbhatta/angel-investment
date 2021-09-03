@props(['title'])
<div class="my-4">
    <h6 class="h6-responsive" style="font-weight: 600;">{{ $title }}</h6>
    <div style="color: #515968;">
        {{ $slot }}
    </div>
</div>