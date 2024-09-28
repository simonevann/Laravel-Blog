<div class="post_part" x-data="{ edit: false }">
    <div class="post_part__error_toast">
        @error('message')
        <div class="toast toast--info m-0">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>

    <div x-show="! edit">
        @if($image)
            <img src="{{ url('storage/' . $image) }}">
        @endif
        {!! $content  !!}
    </div>
    @auth
        <div x-show="edit">
            <div class="form-group">
                <input type="file" wire:model="image">
                <button wire:click="deleteImage" wire:confirm="Sei sicuro di voler cancellare l'immagine?"
                        class="form-group-btn">Cancella
                </button>
            </div>
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <textarea wire:model="contentRaw"
                      class="w-full h-32 border border-gray-300 rounded-lg p-2 post_part__editor__area"></textarea>
        </div>
        <div class="btn" x-on:click="edit = ! edit" x-show="! edit">Edit</div>
        <div class="btn btn-success" wire:click="save" x-on:click="edit = ! edit" x-show="edit">Save</div>
        <div class="btn btn-danger" wire:click="delete" wire:confirm="Sei sicuro di voler cancellare questa parte?"
             x-on:click="edit = ! edit" x-show="edit">Delete
        </div>
    @endauth
</div>

