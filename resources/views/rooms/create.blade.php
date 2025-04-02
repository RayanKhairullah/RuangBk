<x-layouts.app :title="__('Create Room')">
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="jurusan_id">{{ __('Jurusan') }}</label>
            <select name="jurusan_id" id="jurusan_id" class="form-input" required>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="tingkatan_rooms">{{ __('Tingkatan Room') }}</label>
            <input type="text" name="tingkatan_rooms" id="tingkatan_rooms" class="form-input" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </form>
</x-layouts.app>