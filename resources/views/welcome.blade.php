<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/font-face.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/landing.js') }}" defer></script>

    <!-- Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>

    <style>
        @media screen and (min-width: 720px) {
            .flex-2 {
                flex-basis: 100% !important;
            }
        }
    </style>
</head>

<body>
    <header class="w-full text-white bg-moe-purple font-NotoSansLao z-[999] py-2 header-menu transition-[padding] ease-in-out delay-150">
        <nav class="container flex flex-wrap items-center justify-between mx-auto lg:flex-nowrap">
            <div class="flex-1 lg:flex-auto">
                <a href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="ໂລໂກ້" class="w-auto h-14 py-2">
                </a>
            </div>
            <button type="button" class="text-2xl lg:hidden btnMenuToggle">
                <ion-icon name="menu-outline"></ion-icon>
            </button>
            <div
                class="relative hidden w-full mt-4 lg:mt-0 lg:items-center lg:justify-center flex-2 lg:basis-0 menu-navbar lg:flex">
                <!-- //hidden flex-1 -->
                <ul class="flex flex-col lg:flex-row">
                    <!--- mt-4   -->
                    <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                        <a href="#">ໜ້າຫຼັກ</a>
                    </li>
                    <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                        <a href="#">ກ່ຽວກັບ</a>
                    </li>
                    <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                        <a href="#">ຂ່າວສານ</a>
                    </li>
                    <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                        <a href="#">ຕິດຕໍ່ພົວພັນ</a>
                    </li>
                    <li class="block px-4 py-2 lg:hidden group">
                        <a href="#" class="flex items-center justify-between">ເຂົ້າສູ່ລະບົບ <svg
                                class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg></a>
                        <ul class="hidden mt-4 border-t-4 border-moe-purple group-hover:block">
                            <li class="py-2 hover:bg-slate-100"><a href="{{ route('login') }}">ຈັດການເອກະສານ</a></li>
                            <li class="py-2 hover:bg-slate-100"><a href="#">ການແບ່ງປັນ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="hidden lg:block">
                <ul class="relative">
                    <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300 group">
                        <a href="#" class="flex items-center justify-between whitespace-nowrap">ເຂົ້າສູ່ລະບົບ <svg
                                class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg></a>
                        <ul
                            class="absolute left-0 hidden px-2 py-4 bg-white rounded-md shadow-md w-fit whitespace-nowrap top-10 text-slate-800 group-hover:block">
                            <li class="px-3 py-2 hover:bg-slate-100"><a href="{{ route('login') }}">ຈັດການເອກະສານ</a>
                            </li>
                            <li class="px-3 py-2 hover:bg-slate-100"><a href="#">ການແບ່ງປັນ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

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

    <footer class="w-full mt-4 text-white bg-moe-purple-light">
        <div class="container flex flex-col justify-between lg:flex-row my-8">
            <div class="flex-1 text-center mt-4">
                <img src="{{ asset('images/logo.png') }}" class="h-32 lg:h-52 mx-auto" alt="">
                <p class="text-lg mt-3">ກະຊວງສຶກສາທິການ ແລະ ກິລາ<br>ກົມແຜນການ<br>ຫ້ອງການພັດທະນາຊັບພະຍາກອນມະນຸດ</p>
            </div>
            <div class="flex-1  mt-4">
                <h1 class="text-[32px] lg:text-[46px]">ເມນູ</h1>
                <ul class="list-disc text-[18px] list-outside ml-8">
                    <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="#">ໜ້າຫຼັກ</a></li>
                    <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="#">ກ່ຽວກັບ</a></li>
                    <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="#">ຂ່າວສານ</a></li>
                    <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="#">ຕິດຕໍ່ພົວພັນ</a></li>
                </ul>
            </div>
            <div class="flex-1  mt-4">
                <h1 class="text-[32px] lg:text-[46px]">ຂໍ້ມູນຕິດຕໍ່</h1>

                <div class="flex gap-4 text-[18px] mt-4">
                    <p class="font-semibold w-[70px]">ສະຖານທີ່: </p>
                    <p>ຖະໜົມເສດຖາທິລາດ, ບ້ານຊຽງຢືນ, ເມື່ອງຈັນທະບູລີ, ນະຄອນຫຼວງວຽງຈັນ, ສ.ປ.ປ.ລາວ.</p>
                </div>
                <div class="flex gap-4 text-[18px] mt-2">
                    <p class="font-semibold w-[70px]">ເບີໂທ: </p>
                    <p>+856 20 28 240 541</p>
                </div>
                <div class="flex gap-4 text-[18px] mt-2">
                    <p class="font-semibold w-[70px]">ອີເມວ: </p>
                    <p>hrd@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="bg-moe-purple">
            <div class="container flex flex-col lg:flex-row text-center lg:text-left justify-between py-6">
                <div class="mt-4 lg:mt-0">© 2022, ກົມແຜນການ, ຫ້ອງການພັດທະນາຊັບພະຍາກອນມະນຸດ</div>
                <div class="mt-4 lg:mt-0">&nbsp;</div>
            </div>
        </div>
    </footer>
</body>

</html>
