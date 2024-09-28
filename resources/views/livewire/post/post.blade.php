<div>
    <div class="post_part__error_toast">
        @error('message')
        <div class="toast toast--info m-0">
            <p>{{ $message }}</p>
        </div>
        @enderror
    </div>
    <div class="post__meta">
        <div class="post__meta__date">
            <span>{{ date('j F, Y', strtotime($date)) }}</span>
        </div>
    </div>
    <div class="post__title" x-data="{ edit: false }">
        <h1 x-show="! edit">{{ $title }}</h1>
        @auth
            <label x-show="edit">Title</label>
            <input x-show="edit" wire:model="title" class="w-full border border-gray-300 rounded-lg p-2">
            <label x-show="edit">Slug</label>
            <input x-show="edit" wire:model="slug" class="w-full border border-gray-300 rounded-lg p-2 mb-1">
            <div class="btn" x-on:click="edit = ! edit" x-show="! edit">Edit</div>
            <div class="btn btn-success" wire:click="save" x-on:click="edit = ! edit" x-show="edit">Save</div>
            <div class="btn btn-danger" wire:click="delete" wire:confirm="Sei sicuro di voler cancellare questo post?"
                 x-on:click="edit = ! edit" x-show="edit">Delete
            </div>
        @endauth
    </div>
    <div class="post__content">
        @if($parts)
            @foreach($parts as $part)
                <livewire:post.post-part :part="$part" :key="$part->id"/>
            @endforeach
        @else
            <p>Il post é vuoto</p>
        @endif
        @auth
            <livewire:post.post-part-add :postId="$id"/>
        @endauth
    </div>
</div>
