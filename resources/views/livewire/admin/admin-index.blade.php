<div>
    <div class="container px-6 py-10 mx-auto">

        <div class="flex items-center gap-16 justify-evenly">
            <div class="flex flex-col items-center p-6 space-y-3 text-center bg-gray-100 rounded-xl dark:bg-gray-800">
                <span class="inline-block p-3 text-blue-500 bg-blue-100 rounded-full dark:text-white dark:bg-blue-500">
                    <ion-icon name="person-sharp" class="w-12 h-12"></ion-icon>
                </span>

                <h1 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">ຂໍ້ມູນຜູ້ໃຊ້</h1>

                <div class="flex gap-16">
                    <p class="text-gray-500 dark:text-gray-300">
                        ລວມທັງໝົດ: {{ $this->totalUsers }}
                    </p>

                    <p class="text-gray-500 dark:text-gray-300">
                        ຊາຍ: {{ $this->male->count() }}
                    </p>

                    <p class="text-gray-500 dark:text-gray-300">
                        ຍິງ: {{ $this->female->count() }}
                    </p>
                </div>

                <a href="{{ route('admin.users') }}" class="flex items-center -mx-1 text-sm text-blue-500 capitalize transition-colors duration-200 transform dark:text-blue-400 hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                    <span class="mx-1">ຈັດການຂໍ້ມູນ</span>
                    <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>

            <div class="flex flex-col items-center p-6 space-y-3 text-center bg-gray-100 rounded-xl dark:bg-gray-800">
                <span class="inline-block p-3 text-blue-500 bg-blue-100 rounded-full dark:text-white dark:bg-blue-500">
                    <ion-icon name="newspaper" class="w-12 h-12"></ion-icon>
                </span>

                <h1 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">ຂໍ້ມູນຂ່າວສານ</h1>

                <div class="flex gap-16">
                    <p class="text-gray-500 dark:text-gray-300">
                        ລວມທັງໝົດ: {{ $this->totalNews->count() }}
                    </p>

                    <p class="text-gray-500 dark:text-gray-300">
                        ນິຕິກຳ: {{ $this->type_1->count() }}
                    </p>

                    <p class="text-gray-500 dark:text-gray-300">
                        ຂ່າວ: {{ $this->type_2->count() }}
                    </p>
                </div>

                <a href="{{ route('admin.news') }}" class="flex items-center -mx-1 text-sm text-blue-500 capitalize transition-colors duration-200 transform dark:text-blue-400 hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                    <span class="mx-1">ຈັດການຂໍ້ມູນ</span>
                    <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>
