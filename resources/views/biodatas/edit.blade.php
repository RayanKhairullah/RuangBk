<x-layouts.app :title="__('Edit Biodata')">
    <form action="{{ route('biodatas.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nisn">{{ __('NISN') }}</label>
            <input type="text" name="nisn" id="nisn" class="form-input" value="{{ $biodata->nisn }}" required>
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-input" required>
                <option value="Laki-laki" {{ $biodata->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jurusan_id">{{ __('Jurusan') }}</label>
            <select name="jurusan_id" id="jurusan_id" class="form-input" required>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ $biodata->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="rooms_id">{{ __('Rooms') }}</label>
            <select name="rooms_id" id="rooms_id" class="form-input" required>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $biodata->rooms_id == $room->id ? 'selected' : '' }}>
                        {{ $room->tingkatan_rooms }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="telepon">{{ __('Telepon') }}</label>
            <input type="text" name="telepon" id="telepon" class="form-input" value="{{ $biodata->telepon }}" required>
        </div>

        <div class="mb-4">
            <label for="agama">{{ __('Agama') }}</label>
            <select name="agama" id="agama" class="form-input" required>
                <option value="Islam" {{ $biodata->agama == 'Islam' ? 'selected' : '' }}>{{ __('Islam') }}</option>
                <option value="Kristen" {{ $biodata->agama == 'Kristen' ? 'selected' : '' }}>{{ __('Kristen') }}</option>
                <option value="Hindu" {{ $biodata->agama == 'Hindu' ? 'selected' : '' }}>{{ __('Hindu') }}</option>
                <option value="Budha" {{ $biodata->agama == 'Budha' ? 'selected' : '' }}>{{ __('Budha') }}</option>
                <option value="Lainnya" {{ $biodata->agama == 'Lainnya' ? 'selected' : '' }}>{{ __('Lainnya') }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="alamat">{{ __('Alamat') }}</label>
            <textarea name="alamat" id="alamat" class="form-input" required>{{ $biodata->alamat }}</textarea>
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input" value="{{ $biodata->tanggal_lahir }}" required>
        </div>

        <div class="mb-4">
            <label for="gol_darah">{{ __('Golongan Darah') }}</label>
            <select name="gol_darah" id="gol_darah" class="form-input" required>
                <option value="A" {{ $biodata->gol_darah == 'A' ? 'selected' : '' }}>{{ __('A') }}</option>
                <option value="B" {{ $biodata->gol_darah == 'B' ? 'selected' : '' }}>{{ __('B') }}</option>
                <option value="AB" {{ $biodata->gol_darah == 'AB' ? 'selected' : '' }}>{{ __('AB') }}</option>
                <option value="O" {{ $biodata->gol_darah == 'O' ? 'selected' : '' }}>{{ __('O') }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="status">{{ __('Status') }}</label>
            <input type="text" name="status" id="status" class="form-input" value="{{ $biodata->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</x-layouts.app>