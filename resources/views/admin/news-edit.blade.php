@extends('layouts.admin')

@section('content')

<div class="w-full shadow card bg-base-100">
    <div class="card-body">

        <livewire:admin.edit-news :id="$id" />
    </div>
</div>



@endsection
