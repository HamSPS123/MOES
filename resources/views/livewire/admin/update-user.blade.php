<div>

    <div class="flex">
        <div class="flex-1 w-1/2 relative">
            <div class="flex items-center gap-4">
                <img src="{{ Auth::user()->profile_photo_url }}" class="w-32 h-32 object-cover rounded-full shadow" alt="">
                <div>
                    <p class="text-md"><b>ຊື່ຜູ້ໃຊ້:</b></p>
                    <p>{{ Auth::user()->name }}</p>
                    <p><b>Email:</b></p>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="flex gap-4 mt-4 absolute bottom-0">
                <button wire:click="confirmUpdate({{ Auth::user()->id }})" class="btn btn-secondary gap-2"><ion-icon wire:ignore.self name="create-outline" class="h-6 w-6"></ion-icon> ແກ້ໄຂ</button>
                <button class="btn btn-primary text-white gap-2"><ion-icon wire:ignore.self name="lock-closed" class="h-6 w-6"></ion-icon> ປ່ຽນລະຫັດຜ່ານ</button>
            </div>
        </div>
        <div class="divider divider-horizontal"></div>
        <div class="flex-1">
            <form novalidate wire:submit.prevent='update'>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">ຊື່ຜູ້ໃຊ້</span>
                    </label>
                    <input wire:model="name" type="text" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້" class="input input-bordered w-full max-w-xs" {{ $this->disabled }} />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">ອີເມວ</span>
                    </label>
                    <input wire:model="email" type="email" placeholder="ກະລຸນາປ້ອນອີເມວ" class="input input-bordered w-full max-w-xs" {{ $this->disabled }} />
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-primary mt-4 text-white" {{ $this->disabled }}>ບັນທຶກ</button>
            </form>
        </div>
    </div>

</div>
