@props(['title', 'date', 'user', 'description', 'link', 'category', 'thumbnail'])
<div class="post-preview">
    <div class="row">
        @isset($thumbnail)
        <div class="col-md-4 mb-3">
            <a href="{{ $link }}">
                <img src="{{ $thumbnail }}" alt="{{ $title }}" class="img-fluid rounded shadow-sm">
            </a>
        </div>
        <div class="col-md-8">
        @else
        <div class="col-12">
        @endisset
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
    </div>
</div>
<hr class="my-4" />