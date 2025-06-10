<x-front.layout>
    <x-slot name="pageHeader">
        {{ $data->title }}
    </x-slot>
    <x-slot name="pageSubheading">
        {{ $data->description }}
    </x-slot>
    <x-slot name="pageBackground">
        {{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION')."/".$data->thumbnail) }}
    </x-slot>
    <x-slot name="pageHeaderLink">
        {{ route('blog-detail',['slug'=>$data->slug]) }}
    </x-slot>
    <x-slot name="pageUser">{{ $data->user->name}}</x-slot>
    <x-slot name="pageDate">{{ $data->created_at->isoFormat('dddd, D MMMM Y') }}</x-slot>
    <x-slot name="pageCategory">{{ $data->category->name ?? 'Uncategorized' }}</x-slot>
    <x-slot name="pageTitle">{{ $data->title }}</x-slot>
<!-- Main Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">                <!-- Flash Messages -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <!-- Validation Errors -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                {!! $data->content !!}
                
                <!-- Comment Section -->
                <div class="mt-5 border-top pt-4">
                    <h4 class="mb-4">Komentar ({{ $comments->count() }})</h4>
                      @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('comment.store', $data->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="content" class="form-label">Tulis Komentar Anda</label>
                                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('comment.store.guest', $data->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="guest_name" class="form-label">Nama Anda</label>
                                    <input type="text" class="form-control" id="guest_name" name="guest_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="guest_email" class="form-label">Email Anda</label>
                                    <input type="email" class="form-control" id="guest_email" name="guest_email" required>
                                    <small class="text-muted">Email tidak akan ditampilkan</small>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Tulis Komentar Anda</label>
                                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                                <small class="ms-2">atau <a href="{{ route('login') }}">login</a> untuk berkomentar</small>
                            </form>
                        </div>
                    </div>
                    @endauth
                    
                    <!-- Display Comments -->
                    @if($comments->count() > 0)                        @foreach($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">
                                        @if($comment->user_id)
                                            {{ $comment->user->name }}
                                            <span class="badge bg-primary">Member</span>
                                        @else
                                            {{ $comment->guest_name }}
                                            <span class="badge bg-secondary">Guest</span>
                                        @endif
                                    </h5>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="card-text">{{ $comment->content }}</p>
                                
                                @auth
                                    @if(Auth::id() === $comment->user_id)
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus komentar ini?')">Hapus</button>
                                    </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                    @endif
                </div>
                
                <!-- Pager-->
                <div class="d-flex justify-content-between mb-4 mt-4">
                        <div>
                            @if ($pagination['next'])
                                <a href="{{ route('blog-detail', ['slug'=>$pagination['next']->slug]) }}">&larr;{{ $pagination['next']->title }}</a>
                            @else
                                <span></span>
                            @endif
                        </div>

                        <div>
                            @if ($pagination['prev'])
                                <a href="{{ route('blog-detail', ['slug'=>$pagination['prev']->slug]) }}">{{ $pagination['prev']->title }} &rarr;</a>
                            @else
                                <span></span>
                            @endif
                        </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</article>
</x-front.layout>


