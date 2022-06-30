
@extends('layouts.news')

@section('content')

        <div class="container my-8">
            <h1>{{ $post->title }}</h1>

            <div class="flex justify-between mt-4">
                <p class="text-">ໂດຍ: {{ $post->auth->name }} | ວັນທີ: {{ $post->created_at->format('d/m/Y') }}</p>

            </div>
            <div class="divider"></div>

            <div>
                {!! $post->description !!}
            </div>

            <div class="flex justify-between items-center">
            <a class="text-grey-500 flex items-center gap-1 mt-8" href="{{($post->type_id == "1") ? route('index') : route('news')}}" ><ion-icon name="chevron-back-circle-outline"></ion-icon>ກັບຄື</a>
            <a class="text-red-500 flex items-center gap-1 mt-8" href="{{asset('storage/uploads/'.$post->attach_file)}}" download="">ດາວໂຫຼດ PDF <ion-icon name="cloud-download-outline"></ion-icon></a>
            </div>
        </div>
@endsection
