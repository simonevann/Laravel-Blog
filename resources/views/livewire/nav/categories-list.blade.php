<div class="categories_list">
    <ul class="flex flex-col space-y-2 categories_list__list">
        @foreach($categories as $category)
            <li class="categories_list__list__item">
                <a href="{{ route('category', $category->name) }}"
                   class="text-gray-700 hover:text-gray-900">#{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
