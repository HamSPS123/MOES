
    <aside class="flex flex-col w-64 h-screen py-4 border-r dark:bg-gray-800 dark:border-gray-600 fixed top-0 left-0 z-[900] bg-moe-purple translate-x-0 admin-side transition-[transform] ease-in-out delay-150"> <!-- translate-x-[-250px] -->
        <a href="#" class="flex items-center justify-center gap-4 font-semibold text-center text-white text-md dark:text-white">
            <img class="w-8 h-auto" src="{{ asset('images/logo.png') }}" alt="">
            <span>ກະຊວງສຶກສາທິການ ແລະ ກິລາ</span>
        </a>

        <div class="block w-11/12 mx-3 my-4 bg-white border border-b-[0.5px]"></div>

        <div class="flex flex-col justify-between flex-1">
            <nav class="px-4">
                <ul class="flex flex-col text-white">
                    <li class="py-2 px-3 mt-1 rounded-md cursor-pointer hover:bg-sky-100/20 {{ request()->routeIs('admin.index') ? 'bg-sky-100/20' : '' }}">
                        <a class="block w-full text-md" href="{{ route('admin.index') }}"><ion-icon name="home-sharp"></ion-icon> ໜ້າຫຼັກ</a>
                    </li>
                    <li class="py-2 px-3 mt-1 rounded-md cursor-pointer hover:bg-sky-100/20 {{ request()->routeIs('admin.users') ? 'bg-sky-100/20' : '' }}">
                        <a class="block w-full text-md" href="{{ route('admin.users') }}"><ion-icon name="person-sharp"></ion-icon> ຂໍ້ມູນຜູ້ໃຊ້</a>
                    </li>
                    <li class="py-2 px-3 mt-1 rounded-md cursor-pointer hover:bg-sky-100/20 {{ request()->routeIs('admin.news') ? 'bg-sky-100/20' : '' }}">
                        <a class="block w-full text-md" href="{{ route('admin.news') }}"><ion-icon name="newspaper-sharp"></ion-icon> ຈັດການຂ່າວສານ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
