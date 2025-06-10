@props(['title', 'date', 'user', 'description', 'link', 'category'])
<div class="post-preview">
    <a href="{{ $link }}">
        <h2 class="post-title">{{ $title }}</h2>
        <h3 class="post-subtitle">
            @isset($description)
            {{ $description }}
            @endisset
        </h3>
    </a>
    <p class="post-meta">
        Posted by
        <a href="#!">{{ $user }}</a>
        on {{ $date }}
        @isset($category)
        <span class="ms-2 badge bg-primary text-white">{{ $category }}</span>
        @endisset
    </p>
</div>
<hr class="my-4" />