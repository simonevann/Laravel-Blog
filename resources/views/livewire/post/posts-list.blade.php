<div class="post_list">
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <livewire:post.posts-list-item :post="$post" :key="$post->id"/>
        @endforeach
    @else
        <div>
            Nessun post trovato
        </div>
    @endif
    @auth
        <livewire:post.post-add/>
    @endauth
</div>
