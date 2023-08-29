<div class="card">
    <div class="card-header">Hello User</div>

    <div class="card-body">
        @if($counter < 1) <button class="btn btn-primary" wire:click='decrease' disabled>-</button>
            @else
            <button class="btn btn-primary" wire:click='decrease'>-</button>
            @endif
            <span class="mx-4">{{ $counter }}</span>
            <button class="btn btn-primary" wire:click="increase">+</button>
    </div>
</div>
