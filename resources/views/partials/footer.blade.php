<footer class="w-full mt-4 text-white bg-moe-purple-light">
    <div class="container flex flex-col justify-between my-8 lg:flex-row">
        <div class="flex-1 mt-4 text-center">
            <img src="{{ asset('images/logo.png') }}" class="h-32 mx-auto lg:h-52" alt="">
            <p class="mt-3 text-lg">ກະຊວງສຶກສາທິການ ແລະ ກິລາ<br>ກົມແຜນການ<br>ຫ້ອງການພັດທະນາຊັບພະຍາກອນມະນຸດ</p>
        </div>
        <div class="flex-1 mt-8">
            <h1 class="text-[32px] lg:text-[46px]">ເມນູ</h1>
            <ul class="list-disc text-[18px] list-outside ml-8">
                <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="{{ route('index') }}">ໜ້າຫຼັກ</a></li>
                <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="{{ route('about') }}">ກ່ຽວກັບ</a></li>
                <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="{{ route('news') }}">ຂ່າວສານ</a></li>
                <li class="py-2 ml-0 hover:ml-3 transition-[margin-left] ease-in-out delay-150"><a href="{{ route('contact') }}">ຕິດຕໍ່ພົວພັນ</a></li>
            </ul>
        </div>
        <div class="flex-1 mt-8">
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
        <div class="container flex flex-col justify-between py-6 text-center lg:flex-row lg:text-left">
            <div class="mt-4 lg:mt-0">© 2022, ກົມແຜນການ, ຫ້ອງການພັດທະນາຊັບພະຍາກອນມະນຸດ</div>
            <div class="mt-4 lg:mt-0">&nbsp;</div>
        </div>
    </div>
</footer>
