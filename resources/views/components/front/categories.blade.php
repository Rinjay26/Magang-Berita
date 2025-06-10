<x-front.layout>
    <x-slot name="pageHeader">
        Kategori
    </x-slot>
    <x-slot name="pageSubheading">
        Lihat berita berdasarkan kategori
    </x-slot>
    <x-slot name="pageBackground">
        {{ asset('assets/img/home-bg.jpg') }}
    </x-slot>
    <x-slot name="pageHeaderLink">
        {{ route('categories.index') }}
    </x-slot>
    <x-slot name="pageTitle">Kategori Berita</x-slot>
    
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="row mt-4">
                    @foreach ($categories as $category)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $category->name }}</h4>
                                <p class="text-muted">{{ $category->posts_count }} artikel</p>
                                <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-primary">Lihat Berita</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-front.layout>
