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
                    <a href="/">ໜ້າຫຼັກ</a>
                </li>
                <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                    <a href="about">ກ່ຽວກັບ</a>
                </li>
                <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                    <a href="/news">ຂ່າວສານ</a>
                </li>
                <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300">
                    <a href="/contact">ຕິດຕໍ່ພົວພັນ</a>
                </li>
                <li class="block px-4 py-2 lg:hidden group">
                    <a href="#" class="flex items-center justify-between">ເຂົ້າສູ່ລະບົບ <svg
                            class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg></a>
                    <ul class="hidden mt-4 border-t-4 border-moe-purple group-hover:block">
                        <li class="py-2 hover:bg-slate-100"><a href="{{ route('login') }}">ຈັດການເອກະສານ</a></li>
                        <li class="py-2 hover:bg-slate-100"><a href="http://localhost:4200" target="_blank">ການແບ່ງປັນ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="hidden lg:block">
            <ul class="relative">
                <li class="px-4 py-2 rounded-lg hover:bg-sky-500/10 hover:text-slate-300 group">
                    <a href="#" class="flex items-center justify-between whitespace-nowrap"><ion-icon name="user"></ion-icon> ເຂົ້າສູ່ລະບົບ <svg
                            class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg></a>
                    <ul
                        class="absolute left-0 hidden px-2 py-4 bg-white rounded-md shadow-md w-fit whitespace-nowrap top-10 text-slate-800 group-hover:block">
                        <li class="px-3 py-2 hover:bg-slate-100"><a href="{{ route('login') }}">ຈັດການເອກະສານ</a>
                        </li>
                        <li class="px-3 py-2 hover:bg-slate-100"><a href="http://localhost:4200" target="_blank">ການແບ່ງປັນ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
