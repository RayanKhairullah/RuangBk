<x-layouts.app :title="__('Create Biodata')">
    <form action="{{ route('biodatas.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nisn">{{ __('NISN') }}</label>
            <input type="text" name="nisn" id="nisn" class="form-input" required>
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-input" required>
                <option value="Laki-laki">{{ __('Laki-laki') }}</option>
                <option value="Perempuan">{{ __('Perempuan') }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jurusan_id">{{ __('Jurusan') }}</label>
            <select name="jurusan_id" id="jurusan_id" class="form-input" required>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="rooms_id">{{ __('Rooms') }}</label>
            <select name="rooms_id" id="rooms_id" class="form-input" required>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->tingkatan_rooms }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="telepon">{{ __('Telepon') }}</label>
            <input type="text" name="telepon" id="telepon" class="form-input" required>
        </div>

        <div class="mb-4">
            <label for="agama">{{ __('Agama') }}</label>
            <select name="agama" id="agama" class="form-input" required>
                <option value="Islam">{{ __('Islam') }}</option>
                <option value="Kristen">{{ __('Kristen') }}</option>
                <option value="Hindu">{{ __('Hindu') }}</option>
                <option value="Budha">{{ __('Budha') }}</option>
                <option value="Lainnya">{{ __('Lainnya') }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="alamat">{{ __('Alamat') }}</label>
            <textarea name="alamat" id="alamat" class="form-input" required></textarea>
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input" required>
        </div>

        <div class="mb-4">
            <label for="gol_darah">{{ __('Golongan Darah') }}</label>
            <select name="gol_darah" id="gol_darah" class="form-input" required>
                <option value="A">{{ __('A') }}</option>
                <option value="B">{{ __('B') }}</option>
                <option value="AB">{{ __('AB') }}</option>
                <option value="O">{{ __('O') }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="status">{{ __('Status') }}</label>
            <input type="text" name="status" id="status" class="form-input" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </form>
</x-layouts.app>