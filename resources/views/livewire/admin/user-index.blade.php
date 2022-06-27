<div class="mt-4">

    <div class="flex items-center justify-between my-4">
        <div class="flex-1">
            <button class="btn gap-2 btn-accent">ລຶບຂໍ້ມູນ <ion-icon wire:ignore.self class="h-6 w-6" name="trash-sharp">
                </ion-icon></button>
            <label for="AddModal" class="btn gap-2 btn-primary text-white">ເພີ່ມຜູ້ໃຊ້ <ion-icon wire:ignore.self
                    class="h-6 w-6" name="add-circle-sharp"></ion-icon></label>
        </div>
        <div class="flex-1 inline-flex justify-items-end">
            <div class="flex items-center gap-4 w-2/4 justify-end">
                <label>ສະແດງ</label>
                <select wire:model='index' class="select select-bordered w-1/4 max-w-xs">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="tooltip tooltip-left justify-end w-1/2" data-tip="ຄົ້ນຫາ ລະຫັດ, ຊື່ຜູ້ໃຊ້ ແລະ ອີເມວ">
                <input wire:model="search" type="search" placeholder="ຄົ້ນຫາ..."
                    class="input input-bordered w-full max-w-xs" />
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" wire:model='selectAll' class="checkbox checkbox-secondary">
                    </th>
                    <th>#</th>
                    <th>ລະຫັດພະນັກງານ</th>
                    <th>ຊື່ຜູ້ໃຊ້</th>
                    <th>ເພດ</th>
                    <th>ວັນເດືອນປີເກີດ</th>
                    <th>ເບີໂທ</th>
                    <th>ອີເມວ</th>
                    <th>ຮູບໂປຣໄຟລ໌</th>
                    <th>ເຄື່ອງມື</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $row)
                    <tr class="hover">
                        <th>
                            <input wire:model='selected' value="{{ $row->id }}" type="checkbox"
                                class="checkbox checkbox-secondary">
                        </th>
                        <th class="text-sm">{{ $key + 1 }}</th>
                        <td class="text-sm">{{ $row->code }}</td>
                        <td class="text-sm">{{ $row->name }}</td>
                        <td class="text-sm">{{ $row->gender }}</td>
                        <td class="text-sm">{{ $row->dob }}</td>
                        <td class="text-sm">{{ $row->telephone }}</td>
                        <td class="text-sm">{{ $row->email }}</td>
                        <td class="text-sm">
                            <img src="{{ $row->profile_photo_path != null ? asset('storage/' . $row->profile_photo_path) : asset('storage/profile.png') }}"
                                class="w-10 h-10 object-cover rounded-full shadow" alt="">
                        </td>
                        <td class="text-sm">
                            <button wire:click="checkUpdate({{ $row->id }})" class="btn btn-circle btn-sm btn-primary text-white">
                                <ion-icon wire:ignore.self name="pencil-sharp"></ion-icon>
                            </button>
                            <button wire:click="checkDelete({{ $row->id }})" class="btn btn-circle btn-sm btn-accent">
                                <ion-icon wire:ignore.self name="trash"></ion-icon>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $users->links() }}
    </div>


    <!-- Modal Create Users -->

    <input type="checkbox" id="AddModal" wire:model="modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <label for="AddModal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <form novalidate wire:submit.prevent='store'>
                <h3 class="font-bold text-xl">ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້</h3>

                <div class="form-control w-full mt-4">
                    <label class="label">ລະຫັດພະນັກງານ</label>
                    <input type="text" wire:model="code" placeholder="ກະລຸນາປ້ອນລະຫັດ"
                        class="input input-bordered w-full uppercase" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ຊື່ຜູ້ໃຊ້</label>
                    <input wire:model="name" type="text" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້"
                        class="input input-bordered w-full" />
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ເພດ</label>
                    <select wire:model="gender" class="select select-bordered w-full">
                        <option disabled selected>ກະລຸນາເລືອກເພດ</option>
                        <option value="ຊາຍ">ຊາຍ</option>
                        <option value="ຍິງ">ຍິງ</option>
                    </select>
                    @error('gender')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ວັນເດືອນປີເກີດ</label>
                    <input wire:model="dob" type="date" placeholder="ກະລຸນາປ້ອນຊື່ລະຫັດ"
                        class="input input-bordered w-full" />
                    @error('dob')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">ເບີໂທ</label>
                    <input wire:model='telephone' type="text" placeholder="20 xxxx xxxx"
                        class="input input-bordered w-full" />
                    @error('telephone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ອີເມວ</label>
                    <input wire:model="email" type="email" placeholder="example@email.com"
                        class="input input-bordered w-full" />
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ລະຫັດຜ່ານຜູ້ໃຊ້</label>
                    <input wire:model="pwd" type="password" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ"
                        class="input input-bordered w-full" />
                    @error('pwd')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ທີ່ຢູ່</label>
                    <textarea wire:model='address' class="textarea textarea-bordered w-full" placeholder="ປ້ອນທີ່ຢູ່"></textarea>
                    @error('address')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div class="modal-action">
                    <label for="AddModal" class="btn btn-accent">ຍົກເລີກ</label>
                    <button type="submit" wire:click.prevent='store' class="btn btn-primary text-white">ບັນທຶກ</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Create Users -->

    <!-- Modal Update Users -->

    <input type="checkbox" id="UpdateModal" wire:model="updateModal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <label for="UpdateModal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <form novalidate wire:submit.prevent='updateUser'>
                <h3 class="font-bold text-xl">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</h3>

                <div class="form-control w-full mt-4">
                    <label class="label">ລະຫັດພະນັກງານ</label>
                    <input type="text" wire:model="code" placeholder="ກະລຸນາປ້ອນລະຫັດ"
                        class="input input-bordered w-full uppercase" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ຊື່ຜູ້ໃຊ້</label>
                    <input wire:model="name" type="text" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້"
                        class="input input-bordered w-full" />
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ເພດ</label>
                    <select wire:model="gender" class="select select-bordered w-full">
                        <option disabled selected>ກະລຸນາເລືອກເພດ</option>
                        <option value="ຊາຍ">ຊາຍ</option>
                        <option value="ຍິງ">ຍິງ</option>
                    </select>
                    @error('gender')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ວັນເດືອນປີເກີດ</label>
                    <input wire:model="dob" type="date" placeholder="ກະລຸນາປ້ອນຊື່ລະຫັດ"
                        class="input input-bordered w-full" />
                    @error('dob')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">ເບີໂທ</label>
                    <input wire:model='telephone' type="text" placeholder="20 xxxx xxxx"
                        class="input input-bordered w-full" />
                    @error('telephone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ອີເມວ</label>
                    <input wire:model="email" type="email" placeholder="example@email.com"
                        class="input input-bordered w-full" />
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control w-full mt-2">
                    <label class="label">ທີ່ຢູ່</label>
                    <textarea wire:model='address' class="textarea textarea-bordered w-full" placeholder="ປ້ອນທີ່ຢູ່"></textarea>
                    @error('address')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div class="modal-action">
                    <label for="UpdateModal" class="btn btn-accent">ຍົກເລີກ</label>
                    <button type="submit" class="btn btn-primary text-white">ບັນທຶກ</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Update Users -->
</div>
