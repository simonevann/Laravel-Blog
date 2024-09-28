<div class="post_list_item">
    <a href="{{ url('/' . $post->slug) }}"><h4 class="post_list_item__title m-0">{{ $post->title }}</h4></a>
    <p class="post_list_item__date">{{ date('j F, Y', strtotime($post->created_at)) }}</p>
</div>
