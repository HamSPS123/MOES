<div>
    <form novalidate wire:submit.prevent='store'>
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
        </div>
        <div class="w-full mt-4 form-control">
            <label>ອັບໂຫຼດໄຟລ໌ແນບ <span class="text-red-500">*</span></label>
            <input type="file" wire:model="attach" class="w-full input" accept=".pdf,.jpg,.jpeg,.png" />
            @error('attach')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
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
        $(document).ready(function(){
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
