<x-layouts.app :title="__('Buat Jadwal Konseling')">
    <h1 class="text-2xl font-bold">{{ __('Buat Jadwal Konseling') }}</h1>

    <form action="{{ route('penjadwalan.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Pilih Jurusan -->
        <div class="mb-4">
            <label for="jurusan_id" class="block text-sm font-medium text-gray-700">{{ __('Jurusan') }}</label>
            <select name="jurusan_id" id="jurusan_id" class="form-input w-full" required>
                <option value="">{{ __('Pilih Jurusan') }}</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
            @error('jurusan_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Pilih Room -->
        <div class="mb-4">
            <label for="kelas_id" class="block text-sm font-medium text-gray-700">{{ __('Room') }}</label>
            <select name="kelas_id" id="kelas_id" class="form-input w-full" required>
                <option value="">{{ __('Pilih Room') }}</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->tingkatan_rooms }}</option>
                @endforeach
            </select>
            @error('kelas_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Lokasi -->
        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-700">{{ __('Lokasi') }}</label>
            <input type="text" name="lokasi" id="lokasi" class="form-input w-full" value="{{ old('lokasi') }}" required>
            @error('lokasi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700">{{ __('Tanggal') }}</label>
            <input type="datetime-local" name="tanggal" id="tanggal" class="form-input w-full" value="{{ old('tanggal') }}" required>
            @error('tanggal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    </form>
</x-layouts.app>