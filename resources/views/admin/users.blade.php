@extends('layouts.admin')

@section('content')

<div class="card bg-base-100 w-full shadow">
    <div class="card-body">
        <h1 class="text-lg">ຈັດການຂໍ້ມູນຜູ້ໃຊ້</h1>

        <livewire:admin.user-index />
    </div>
</div>
@endsection
