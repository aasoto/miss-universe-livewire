<div>
    @if ($item)
    <div class="flex box mb-3">
        <p>
            <input wire:keydown.enter="update" type="number" class="w-20" wire:model="count">
            {{$item[0]['title']}}
        </p>
    </div>
    @endif
</div>
