<x-layouts.app :title="__('Edit Room')">
    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="jurusan_id">{{ __('Jurusan') }}</label>
            <select name="jurusan_id" id="jurusan_id" class="form-input" required>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ $jurusan->id == $room->jurusan_id ? 'selected' : '' }}>
                        {{ $jurusan->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="tingkatan_rooms">{{ __('Tingkatan Room') }}</label>
            <input type="text" name="tingkatan_rooms" id="tingkatan_rooms" class="form-input" value="{{ $room->tingkatan_rooms }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</x-layouts.app>