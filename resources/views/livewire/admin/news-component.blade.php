<div>
    <div class="w-full overflow-x-auto">
        <div class="flex justify-between my-4">
            <div class="inline-flex gap-4">
                <a href="{{ route('admin.news.add') }}" class="gap-2 text-white btn btn-primary">ເພີ່ມຂໍ້ມູນ <ion-icon
                        wire:ignore.self class="w-6 h-6" name="add-circle-sharp"></ion-icon></a>
            </div>
            <div>Right</div>
        </div>
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ຫົວຂໍ້</th>
                    <th>ຜູ້ຂຽນ</th>
                    <th>ປະເພດ</th>
                    <th>ໜ້າປົກ</th>
                    <th>ໄຟລ໌ແນບ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $key => $row)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->auth->name }}</td>
                        <td>{{ $row->type->name }}</td>
                        <td><a class="block overflow-hidden w-28 whitespace-nowrap text-ellipsis" href="{{ asset('storage/uploads/' . $row->cover) }}"
                                target="_blank">{{ $row->cover }}</a></td>
                        <td><a class="block overflow-hidden w-28 whitespace-nowrap text-ellipsis" href="{{ asset('storage/uploads/' . $row->attach_file) }}"
                                target="_blank">{{ $row->attach_file }}</a></td>
                        <th class="text-center">
                            <button class="text-white btn btn-sm btn-circle btn-info">
                                <ion-icon wire:ignore.self name="eye-sharp"></ion-icon>
                            </button>
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
