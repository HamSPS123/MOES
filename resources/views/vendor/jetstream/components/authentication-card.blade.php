<div>
    <div class="container flex items-center justify-center h-screen">
<!--        <div>
            {{ $logo }}
        </div> -->

        <div class="shadow-xl card w-96 bg-base-100">
            <div class="w-full text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 mx-auto mt-2" />
            </div>
            <div class="items-center card-body">
                <h2 class="text-center card-title font-NotoSansLao">ເຂົ້າໃຊ້ລະບົບ</h2>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
