<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link{{ $page === 'articles' ? ' active' : '' }}" href="{{ route('admin.articles.index') }}">News</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'images' ? ' active' : '' }}" href="{{ route('admin.images.index') }}">Images</a></li>
    <li class="nav-item"><a class="nav-link{{ $page === 'tags' ? ' active' : '' }}" href="{{ route('admin.tags.index') }}">Tags</a></li>
</ul>
