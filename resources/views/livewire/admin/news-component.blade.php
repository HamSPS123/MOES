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
                    <th>ເນື້ອຫາຂ່າວ</th>
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
                        <td>{!! $row->description !!}</td>
                        <td><a href="{{ asset('storage/uploads/' . $row->cover) }}"
                                target="_blank">{{ $row->cover }}</a></td>
                        <td><a href="{{ asset('storage/uploads/' . $row->attach_file) }}"
                                target="_blank">{{ $row->attach_file }}</a></td>
                        <th class="text-center">
                            <button class="text-white btn btn-sm btn-circle btn-info">
                                <ion-icon wire:ignore.self name="eye-sharp"></ion-icon>
                            </button>
                            <button class="text-white btn btn-sm btn-circle btn-accent">
                                <ion-icon wire:ignore.self name="trash"></ion-icon>
                            </button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $post->links() }}
    </div>

    <!--  Modal Create news -->

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="AddModal" class="modal-toggle" wire:model="modal" />
    <div class="modal">
        <div class="w-11/12 max-w-5xl modal-box">
            <h3 class="text-xl font-bold">ເພີ່ມຂ່າວສານ</h3>
            <label for="AddModal" class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
            <form>
                <div class="w-full mt-4 form-control">
                    <label>ຫົວຂໍ້ <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="code" placeholder="ຫົວຂໍ້ຂ່າວ"
                        class="w-full input input-bordered" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-4 form-control">
                    <label>ໜ້າປົກຂ່າວ <span class="text-red-500">*</span></label>
                    <input type="file" wire:model="code" placeholder="ຫົວຂໍ້ຂ່າວ" class="w-full input" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-4 form-control">
                    <label>ອັບໂຫຼດໄຟລ໌ແນບ <span class="text-red-500">*</span></label>
                    <input type="file" wire:model="code" placeholder="ຫົວຂໍ້ຂ່າວ" class="w-full input"
                        accept=".pdf" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-4 form-control">
                    <label>ປະເພດເອກະສານ <span class="text-red-500">*</span></label>
                    <select name="" id="" class="w-full select select-bordered">
                        <option value="" selected disabled>ເລືອກປະເພດເອກະສານ</option>
                        @foreach (\App\Models\Type::all() as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-4 form-control">
                    <label>ລາຍລະອຽດ</label>
                    <div id="desc"></div>
                </div>
            </form>
            <div class="modal-action">
                <label for="my-modal-5" class="btn">Yay!</label>
            </div>
        </div>
    </div>
</div>
