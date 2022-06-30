<div>


    <main class="mt-8">
        <div class="container">
            <article class="prose lg:prose-xl">
                <h1>ແຈ້ງການຂ່າວຕ່າງໆ</h1>
            </article>

            <div wire:init='initLoading'>
                @if ($isLoading)
            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($news as $new)
                <div class="w-full">
                    <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                        <figure><img src="{{asset('storage/uploads/'.$new->cover)}}" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title"> {{ $new->title }}</h2>
                            <p class="text-sm text-gray-500">ໂດຍ {{$new->auth->name}} | {{($new->created_at)->format('d/m/Y')}}</p>
                            <div class="flex justify-between card-actions mt-4">
                                <a class="text-red-500 flex items-center gap-1" href="{{asset('storage/uploads/'.$new->attach_file)}}" download="">ດາວໂຫຼດ PDF <ion-icon name="cloud-download-outline"></ion-icon></a>
                                <a href="{{ route('readmore', ['id'=>$new->id]) }}" class="text-green-500 flex items-center gap-1">ອ່ານຕໍ່ <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $news->links() ?? '' }}
            </div>
            @else
            <div class="flex items-center justify-center">
                <div class="inline-block w-8 h-8 border-4 rounded-full spinner-border animate-spin" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        @endif
        </div>
    </main>
</div>
