@extends('layouts.admin')

@section('content')

<div class="w-full shadow card bg-base-100">
    <div class="card-body">
        <h1 class="text-lg">ຈັດການຂໍ້ມູນຂ່າວສານ</h1>

        @if (request()->routeIs('admin.news'))
            <livewire:admin.news-component />
        @elseif (request()->routeIs('admin.news.add'))
            <livewire:admin.add-news />
        @endif
    </div>
</div>



@endsection
