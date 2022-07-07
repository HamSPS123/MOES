
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

            <div class="flex items-center justify-between">
            <a class="flex items-center gap-1 mt-8 text-grey-500" href="{{($post->type_id == "1") ? route('index') : route('news')}}" ><ion-icon name="chevron-back-circle-outline"></ion-icon>ກັບຄື</a>
            <a class="flex items-center gap-1 mt-8 text-red-500" href="{{asset('storage/uploads/'.$post->attach_file)}}" download="">ດາວໂຫຼດໄຟລ໌  <ion-icon name="cloud-download-outline"></ion-icon></a>
            </div>
        </div>
@endsection
