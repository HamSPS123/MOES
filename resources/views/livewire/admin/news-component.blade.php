<div>
    <div class="w-full overflow-x-auto">
        <div class="flex justify-between my-4">
            <div class="inline-flex flex-1 gap-4">
                <a href="{{ route('admin.news.add') }}" class="gap-2 text-white btn btn-primary">ເພີ່ມຂໍ້ມູນ <ion-icon
                        wire:ignore.self class="w-6 h-6" name="add-circle-sharp"></ion-icon></a>
            </div>
            <div class="">
                <input wire:model='search' type="search" placeholder="ຄົ້ນຫາ..." class="w-full max-w-xs justify-items-end input input-bordered">
            </div>
        </div>
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr class="text-center">
                    <th class="text-[1.2rem]">ລຳດັບ</th>
                    <th class="text-[1.2rem]">ຫົວຂໍ້</th>
                    <th class="text-[1.2rem]">ຜູ້ຂຽນ</th>
                    <th class="text-[1.2rem]">ປະເພດ</th>
                    <th class="text-[1.2rem]">ໜ້າປົກ</th>
                    <th class="text-[1.2rem]">ໄຟລ໌ແນບ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $key => $row)
                    <tr>
                        <th class="text-center">{{ $key + 1 }}</th>
                        <td><span class="block overflow-hidden w-28 whitespace-nowrap text-ellipsis">{{ $row->title }}</span></td>
                        <td>{{ $row->auth->name }}</td>
                        <td>{{ $row->type->name }}</td>
                        <td><a class="block overflow-hidden w-28 whitespace-nowrap text-ellipsis" href="{{ asset('storage/uploads/' . $row->cover) }}"
                                target="_blank">{{ $row->cover }}</a></td>
                        <td><a class="block overflow-hidden w-28 whitespace-nowrap text-ellipsis" href="{{ asset('storage/uploads/' . $row->attach_file) }}"
                                target="_blank">{{ $row->attach_file }}</a></td>
                        <th class="text-center">
                            <a href="{{ route('readmore', [$row->id]) }}" target="_blank" class="text-white btn btn-sm btn-circle btn-info">
                                <ion-icon wire:ignore.self name="eye-sharp"></ion-icon>
                            </a>
                            <a href="{{ route('admin.news.edit', [$row->id]) }}" class="text-white btn btn-sm btn-circle btn-primary">
                                <ion-icon wire:ignore.self name="pencil"></ion-icon>
                            </a>
                            <button wire:click="checkDelete({{ $row->id }})" class="text-white btn btn-sm btn-circle btn-accent">
                                <ion-icon wire:ignore.self name="trash"></ion-icon>
                            </button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $post->links() }}
    </div>
</div>
