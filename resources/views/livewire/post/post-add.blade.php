<div class="post_part_add" x-data="{ add: false }">
    <div x-show="add">
        <label>Categoria</label>
        <select wire:model="category_id" class="w-full border border-gray-300 rounded-lg p-2 mb-1">
            <option value=""></option>
            @foreach($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <label>Titolo</label>
        <input wire:model="title" class="w-full border border-gray-300 rounded-lg p-2 mb-1"/>
        <label>Slug</label>
        <input wire:model="slug" class="w-full border border-gray-300 rounded-lg p-2 mb-1"/>
    </div>

    <div class="btn" x-on:click="add = ! add" x-show="! add">Aggiungi post</div>
    <div class="btn" wire:click="save" x-on:click="edit = ! add" x-show="add">Salva</div>
</div>
