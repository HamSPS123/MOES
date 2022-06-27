<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-full">
            @csrf

            <div class="w-full max-w-xs form-control">
                <label class="label">
                    <span class="label-text">ອີເມວ:</span>
                </label>
                <x-jet-input id="email" class="w-full max-w-xs input input-bordered" type="email" name="email" :value="old('email')" required autofocus placeholder="example@email.com" />
            </div>

            <div class="w-full max-w-xs mt-2 form-control">
                <label class="label">
                    <span class="label-text">ລະຫັດຜ່ານ:</span>
                </label>
                <x-jet-input id="password" class="w-full max-w-xs input input-bordered" type="password" name="password" required autocomplete="current-password" placeholder="ປ້ອນລະຫັດຜ່ານ"  />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('ຈື່ຈຳຂ້ອຍ') }}</span>
                </label>
            </div>

            <div class="mt-4">

                <x-jet-button class="w-full btn btn-secondary">
                    {{ __('ເຂົ້າໃຊ້ລະບົບ') }}
                </x-jet-button>
                <a href="{{ route('index') }}" class="w-full mt-2 btn btn-accent">ກັບຄືນ</a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{asset('images/icon.ico')}}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style - Tailwind Css and DaisyUI -->
    <link rel="stylesheet" href="{{ asset('css/font-face.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/landing.js') }}" defer></script>

    <!-- Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>
</head>

<body>

    <main class="bg-slate-600/20">
        <div class="container flex items-center justify-center h-screen">
            <div class="shadow-xl card w-96 bg-base-100">
                <div class="w-full text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 mx-auto mt-2" />
                    <p class="mt-2 text-md">ກະຊວງສຶກສາທິການ ແລະ ກິລາ<br>ກົມແຜນການ<br>ຫ້ອງການພັດທະນາຊັບພະຍາກອນມະນຸດ</p>
                </div>
                <div class="items-center text-center card-body">
                    <h2 class="card-title">ເຂົ້າໃຊ້ລະບົບ</h2>
                    <form method="POST" action="{{ route('login') }}" class="w-full">
                        <div class="w-full max-w-xs form-control">
                            <label class="label">
                                <span class="label-text">ອີເມວ:</span>
                            </label>
                            <input type="text" placeholder="example@emil.com" class="w-full max-w-xs input input-bordered" />
                        </div>
                        <div class="w-full max-w-xs mt-2 form-control">
                            <label class="label">
                                <span class="label-text">ລະຫັດຜ່ານ</span>
                            </label>
                            <input type="password" placeholder="ປ້ອນລະຫັດຜ່ານ" class="w-full max-w-xs input input-bordered" />
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="w-full btn btn-secondary">ເຂົ້າໃຊ້ລະບົບ</button>
                            <a href="{{ route('index') }}" class="w-full mt-2 btn btn-accent">ກັບຄືນ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html> --}}
