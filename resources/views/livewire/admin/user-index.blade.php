<div class="mt-4">

    <div class="flex items-center justify-between my-4">
        <div class="flex-1">

            <button @if (!$selected) disabled @endif  wire:click="deleteUsers()" class="gap-2 btn btn-accent">ລຶບຂໍ້ມູນ
                    ({{ count($selected) }})
                <ion-icon wire:ignore.self class="w-6 h-6" name="trash-sharp">
                </ion-icon>
            </button>

            <label for="AddModal" class="gap-2 text-white btn btn-primary">ເພີ່ມຜູ້ໃຊ້ <ion-icon wire:ignore.self
                    class="w-6 h-6" name="add-circle-sharp"></ion-icon></label>
        </div>
        <div class="inline-flex flex-1 justify-items-end">
            <div class="flex items-center justify-end w-2/4 gap-4">
                <label>ສະແດງ</label>
                <select wire:model='index' class="w-1/4 max-w-xs select select-bordered">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="justify-end w-1/2 tooltip tooltip-left" data-tip="ຄົ້ນຫາ ລະຫັດ, ຊື່ຜູ້ໃຊ້ ແລະ ອີເມວ">
                <input wire:model="search" type="search" placeholder="ຄົ້ນຫາ..."
                    class="w-full max-w-xs input input-bordered" />
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
                            <button wire:click="checkUpdate({{ $row->id }})"
                                class="text-white btn btn-circle btn-sm btn-primary">
                                <ion-icon wire:ignore.self name="pencil-sharp"></ion-icon>
                            </button>
                            <button wire:click="checkDelete({{ $row->id }})"
                                class="btn btn-circle btn-sm btn-accent">
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
            <label for="AddModal" class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
            <form novalidate wire:submit.prevent='store'>
                <h3 class="text-xl font-bold">ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້</h3>

                <div class="w-full mt-4 form-control">
                    <label class="label">ລະຫັດພະນັກງານ</label>
                    <input type="text" wire:model="code" placeholder="ກະລຸນາປ້ອນລະຫັດ"
                        class="w-full uppercase input input-bordered" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ຊື່ຜູ້ໃຊ້</label>
                    <input wire:model="name" type="text" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້"
                        class="w-full input input-bordered" />
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ເພດ</label>
                    <select wire:model="gender" class="w-full select select-bordered">
                        <option disabled selected>ກະລຸນາເລືອກເພດ</option>
                        <option value="ຊາຍ">ຊາຍ</option>
                        <option value="ຍິງ">ຍິງ</option>
                    </select>
                    @error('gender')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ວັນເດືອນປີເກີດ</label>
                    <input wire:model="dob" type="date" placeholder="ກະລຸນາປ້ອນຊື່ລະຫັດ"
                        class="w-full input input-bordered" />
                    @error('dob')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">ເບີໂທ</label>
                    <input wire:model='telephone' type="text" placeholder="20 xxxx xxxx"
                        class="w-full input input-bordered" />
                    @error('telephone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ອີເມວ</label>
                    <input wire:model="email" type="email" placeholder="example@email.com"
                        class="w-full input input-bordered" />
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ລະຫັດຜ່ານຜູ້ໃຊ້</label>
                    <input wire:model="pwd" type="password" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ"
                        class="w-full input input-bordered" />
                    @error('pwd')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ທີ່ຢູ່</label>
                    <textarea wire:model='address' class="w-full textarea textarea-bordered" placeholder="ປ້ອນທີ່ຢູ່"></textarea>
                    @error('address')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div class="modal-action">
                    <label for="AddModal" class="btn btn-accent">ຍົກເລີກ</label>
                    <button type="submit" wire:click.prevent='store'
                        class="text-white btn btn-primary">ບັນທຶກ</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Create Users -->

    <!-- Modal Update Users -->

    <input type="checkbox" id="UpdateModal" wire:model="updateModal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <label for="UpdateModal" class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
            <form novalidate wire:submit.prevent='updateUser'>
                <h3 class="text-xl font-bold">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</h3>

                <div class="w-full mt-4 form-control">
                    <label class="label">ລະຫັດພະນັກງານ</label>
                    <input type="text" wire:model="code" placeholder="ກະລຸນາປ້ອນລະຫັດ"
                        class="w-full uppercase input input-bordered" />
                    @error('code')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ຊື່ຜູ້ໃຊ້</label>
                    <input wire:model="name" type="text" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້"
                        class="w-full input input-bordered" />
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ເພດ</label>
                    <select wire:model="gender" class="w-full select select-bordered">
                        <option disabled selected>ກະລຸນາເລືອກເພດ</option>
                        <option value="ຊາຍ">ຊາຍ</option>
                        <option value="ຍິງ">ຍິງ</option>
                    </select>
                    @error('gender')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ວັນເດືອນປີເກີດ</label>
                    <input wire:model="dob" type="date" placeholder="ກະລຸນາປ້ອນຊື່ລະຫັດ"
                        class="w-full input input-bordered" />
                    @error('dob')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">ເບີໂທ</label>
                    <input wire:model='telephone' type="text" placeholder="20 xxxx xxxx"
                        class="w-full input input-bordered" />
                    @error('telephone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ອີເມວ</label>
                    <input wire:model="email" type="email" placeholder="example@email.com"
                        class="w-full input input-bordered" />
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full mt-2 form-control">
                    <label class="label">ທີ່ຢູ່</label>
                    <textarea wire:model='address' class="w-full textarea textarea-bordered" placeholder="ປ້ອນທີ່ຢູ່"></textarea>
                    @error('address')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div class="modal-action">
                    <label for="UpdateModal" class="btn btn-accent">ຍົກເລີກ</label>
                    <button type="submit" class="text-white btn btn-primary">ບັນທຶກ</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Update Users -->
</div>
