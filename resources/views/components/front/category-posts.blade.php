<x-front.layout>
    <x-slot name="pageHeader">
        {{ $category->name }}
    </x-slot>
    <x-slot name="pageSubheading">
        Berita dalam kategori {{ $category->name }}
    </x-slot>
    <x-slot name="pageBackground">
        {{ asset('assets/img/home-bg.jpg') }}
    </x-slot>
    <x-slot name="pageHeaderLink">
        {{ route('categories.show', $category->slug) }}
    </x-slot>
    <x-slot name="pageTitle">Berita Kategori {{ $category->name }}</x-slot>
    
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                    <!-- Post preview-->
                    <x-front.blog-list 
                        title='{{ $post->title }}' 
                        description='{{ $post->description }}' 
                        date="{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}" 
                        user='{{ $post->user->name }}' 
                        link="{{ route('blog-detail', ['slug'=>$post->slug]) }}"
                        category="{{ $post->category->name ?? 'Uncategorized' }}"
                    />
                    @endforeach
                    
                    <!-- Pager-->
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            @if (!$posts->onFirstPage())
                            <a class="btn btn-primary text-uppercase" href="{{ $posts->previousPageUrl() }}">&larr; Newer Posts</a>
                            @endif
                        </div>
                        <div>
                            @if ($posts->hasMorePages())
                            <a class="btn btn-primary text-uppercase" href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <h4 class="mb-0">Belum ada berita dalam kategori ini</h4>
                    </div>
                @endif
                
                <div class="text-center mt-4">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
                </div>
            </div>
        </div>
    </div>
</x-front.layout>
