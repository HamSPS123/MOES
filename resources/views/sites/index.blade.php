@extends('layouts.news')

@section('content')
<section class="hero">
    <img class="w-full" src="{{ asset('images/banner.jpg') }}" alt="">
</section>

<main class="mt-8">
    <div class="container">
        <article class="prose lg:prose-xl">
            <h1>ແຈ້ງການ</h1>
        </article>

        <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="w-full">
                <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="justify-end card-actions">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="justify-end card-actions">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="justify-end card-actions">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="justify-end card-actions">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="justify-end card-actions">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="shadow-xl card w-[80%] mx-auto mt-4 bg-base-100">
                    <figure><img src="https://api.lorem.space/image/shoes?w=400&h=225" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="justify-end card-actions">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto lg:col-span-3 md:col-span-2">
                <div class="btn-group">
                    <button class="btn btn-md">1</button>
                    <button class="btn btn-md btn-active">2</button>
                    <button class="btn btn-md">3</button>
                    <button class="btn btn-md">4</button>
                  </div>
            </div>

        </div>
    </div>
</main>
@endsection
