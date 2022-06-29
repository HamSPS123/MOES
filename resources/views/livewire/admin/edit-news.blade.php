<div>
    <form novalidate wire:submit.prevent='update'>
        <div class="w-full mt-4 form-control">
            <label>ຫົວຂໍ້ <span class="text-red-500">*</span></label>
            <input type="text" wire:model="title" placeholder="ຫົວຂໍ້ຂ່າວ" class="w-full input input-bordered" />
            @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full mt-4 form-control">
            <label>ໜ້າປົກຂ່າວ <span class="text-red-500">*</span></label>
            <input type="file" wire:model="cover" class="w-full input" accept=".jpg,.jpeg,.png" />
            @error('cover')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            @if ($this->cover != null)
                <div class="avatar w-24">
                    <div class="w-24 rounded-xl relative">
                        <a href="{{ asset('storage/uploads/' . $this->cover) }}" target="_blank">
                            <img src="{{ asset('storage/uploads/' . $this->cover) }}" />
                        </a>
                    </div>
                    <button wire:click="checkDelete({{ $this->news_id }})"
                        class="bg-red-500 cursor-pointer hover:bg-red-700 w-6 h-6 flex items-center justify-center absolute top-[-5px] right-[-10px] z-50 text-white rounded-full">
                        <ion-icon wire:ignore.self class="w-4 h-4" name="close-outline"></ion-icon>
                    </button>
                </div>
            @endif
        </div>
        <div class="w-full mt-4 form-control">
            <label>ອັບໂຫຼດໄຟລ໌ແນບ <span class="text-red-500">*</span></label>
            <input type="file" wire:model="attach" class="w-full input" accept=".pdf,.jpg,.jpeg,.png" />
            @error('attach')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            @if ($this->attach != null)
                <div class="flex w-fit max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 p-1 {{ $this->ext == 'pdf' ? 'bg-red-500' : 'bg-sky-500' }}">
                        <img src="{{ $this->ext == 'pdf' ? asset('images/pdf.png') : asset('images/jpg.png') }}" class="fill-current" alt="">
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <a href="{{ asset('storage/uploads/'.$this->attach) }}" target="_blank" >
                                <span class="font-semibold {{ $this->ext == 'pdf' ? 'text-red-500' : 'text-sky-500' }} dark:text-red-400">{{ $this->attach }}</span>
                            </a>
                        </div>
                    </div>
                    <button class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
        <div class="w-full mt-4 form-control">
            <label>ປະເພດເອກະສານ <span class="text-red-500">*</span></label>
            <select class="w-full select select-bordered" wire:model="type">
                <option value="" selected disabled>ເລືອກປະເພດເອກະສານ</option>
                @foreach (\App\Models\Type::all() as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full mt-4 form-control">
            <label>ເນື້ອຫາ <span class="text-red-500">*</span> @error('desc')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <div wire:ignore>
                <textarea class="w-full textarea textarea-bordered" id="desc" name="desc" wire:model="desc"></textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="text-white btn btn-primary"> ບັນທຶກ</button>

            <a href="{{ route('admin.news') }}" class="btn btn-accent">ຍົກເລີກ</a>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#desc').summernote({
                placeholder: 'ເນື້ອຫາຂ່າວ',
                tabsize: 2,
                height: 500,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],

                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('desc', contents);
                    }
                }
            });
        })
    </script>
@endpush
