<div class="post_part_add" x-data="{ add: false }">
    <div class="post_part__error_toast">
        @error('message')
        <div class="toast toast--info m-0">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>
    <div x-show="add">
        <label>Tipo contenuto</label>
        <select wire:model="post_type_id" class="w-full border border-gray-300 rounded-lg p-2 mb-1">
            <option value=""></option>
            @foreach($types as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <label>Immagine</label>
        <input type="file" wire:model="image">
        <label>Contenuto</label>
        <textarea wire:model="content" class="w-full border border-gray-300 rounded-lg p-2 mb-1"></textarea>

    </div>

    <div class="btn" x-on:click="add = ! add" x-show="! add">Aggiungi parte</div>
    <div class="btn" wire:click="save" x-on:click="edit = ! add" x-show="add">Salva</div>
</div>
