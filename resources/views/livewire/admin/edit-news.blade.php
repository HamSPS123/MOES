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
            <input type="file" wire:model="updateCover" class="w-full input" accept=".jpg,.jpeg,.png" />
            @error('updateCover')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            @if ($this->cover != null)
                <div class="w-24 avatar">
                    <div class="relative w-24 rounded-xl">
                        <a href="{{ asset('storage/uploads/' . $this->cover) }}" target="_blank">
                            <img src="{{ asset('storage/uploads/' . $this->cover) }}" />
                        </a>
                    </div>
                    {{-- <button wire:click="checkDelete({{ $this->news_id }})"
                        class="bg-red-500 cursor-pointer hover:bg-red-700 w-6 h-6 flex items-center justify-center absolute top-[-5px] right-[-10px] z-50 text-white rounded-full">
                        <ion-icon wire:ignore.self class="w-4 h-4" name="close-outline"></ion-icon>
                    </button> --}}
                </div>
            @endif
        </div>
        <div class="w-full mt-4 form-control">
            <label>ອັບໂຫຼດໄຟລ໌ແນບ <span class="text-red-500">*</span></label>
            <input type="file" wire:model="updateAttach" class="w-full input" accept=".pdf,.jpg,.jpeg,.png" />
            @error('updateAttach')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            @if ($this->attach != null)
                <div class="flex overflow-hidden bg-white rounded-lg shadow-md w-fit dark:bg-gray-800">
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
        $(function(){
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
