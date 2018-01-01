<div class="box">
    {{ $heading }}
    @if(isset($body))
        <div class="content">
            {{ $body ?? null }}
        </div>
    @endif
</div>
