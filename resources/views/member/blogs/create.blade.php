<x-app-layout>    <script>
        document.addEventListener("trix-attachment-add", function (event) {
            if (event.attachment.file) {
                uploadFile(event.attachment);
            }
        });
    
        function uploadFile(attachment) {
            const file = attachment.file;
            const form = new FormData();
            form.append("attachment", file);
    
            fetch("/upload", {
                method: "POST",
                body: form,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                credentials: 'same-origin'
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Upload failed with status: ${response.status}`);
                }
                return response.json();
            })
            .then((result) => {
                attachment.setAttributes({
                    url: result.url,
                    href: result.url,
                });
            })
            .catch((error) => {
                console.error("Upload gagal:", error);
                attachment.remove();
            });
        }
    </script>
    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Tambah Tulisan
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan penambahan berita baru
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.blogs.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <x-input-label for="title" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" />
                            </div>

                            <div>
                                <x-input-label for="description" value="Description" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" value="{{ old('description') }}" />
                            </div>

                            <div>
                                <x-input-label for="category_id" value="Kategori" />
                                <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded-md">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="file_input" value="Thumbnail" />
                                <input type="file" class="w-full border border-gray-300 rounded-md" name='thumbnail' />
                            </div>

                            <div>
                                <x-textarea-trix value="{!! old('content') !!}" id="x" name="content"></x-textarea-trix>                                
                            </div>

                            <div>
                                <x-select name='status'>
                                    <option value="draft" {{ (old('status')=='draft')?'selected':'' }}>Simpan Sebagai Draft</option>
                                    <option value="publish" {{ (old('status')=='publish')?'selected':'' }}>Publish</option>
                                </x-select>
                            </div>

                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.blogs.index') }}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button>Simpan</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>