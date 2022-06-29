<nav class="w-full bg-white pl-64 shadow-sm admin-nav transition-[padding-left] ease-in-out delay-150">
    <div class="container-fluid relative flex items-center justify-between py-2">
        <div class="flex items-center w-4/12 gap-4">
            <button type="button" class="admin-toggle bg-transparent border-none btn text-slate-700 hover:bg-slate-100">
                <ion-icon name="menu-outline" class="text-xl"></ion-icon>
            </button>

            <h1 class="text-lg">Breadcrumbs</h1>
        </div>
        <div class="flex items-center justify-end w-4/12">
            <div class="divider divider-horizontal"></div>
            <div class="dropdown dropdown-end">
                <div tabindex="0"
                    class="flex items-center gap-4 p-2 rounded-md cursor-pointer hover:bg-slate-100 profile">

                          <div class="avatar online">
                            <div class="w-8 rounded-full">
                              <img src="{{ Auth::user()->profile_photo_url }}" />
                            </div>
                          </div>

                    <p class="inline-block">
                        <span class="font-semibold align-middle">{{ Auth::user()->name }}</span>

                        <ion-icon name="chevron-down-outline" class="align-middle"></ion-icon>
                    </p>
                </div>

                <ul tabindex="0" class="p-2 mt-4 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a href="{{ route('admin.update-user-profile') }}" class="flex items-center">
                            <ion-icon name="person-sharp"></ion-icon> ຈັດການໂປຣໄຟລ໌ຜູ້ໃຊ້
                        </a>
                    </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            {{-- <x-jet-dropdown-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link> --}}

                            <a href="{{ route('logout') }}" class='text-red-500 flex items-center' @click.prevent="$root.submit();">
                                <ion-icon class='mr-2' name="log-out-outline"></ion-icon>

                                ອອກຈາກລະບົບ
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
