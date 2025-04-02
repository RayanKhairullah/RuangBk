<x-layouts.app :title="__('Biodata')">
    <div class="mb-4">
        <a href="{{ route('biodatas.edit') }}" class="btn btn-primary">{{ __('Edit Biodata') }}</a>
    </div>

    <table class="table-auto w-full">
        <tr>
            <th>{{ __('NISN') }}</th>
            <td>{{ $biodata->nisn }}</td>
        </tr>
        <tr>
            <th>{{ __('Jenis Kelamin') }}</th>
            <td>{{ $biodata->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>{{ __('Jurusan') }}</th>
            <td>{{ $biodata->jurusan->nama_jurusan }}</td>
        </tr>
        <tr>
            <th>{{ __('Rooms') }}</th>
            <td>{{ $biodata->rooms->tingkatan_rooms }}</td>
        </tr>
        <tr>
            <th>{{ __('Telepon') }}</th>
            <td>{{ $biodata->telepon }}</td>
        </tr>
        <tr>
            <th>{{ __('Agama') }}</th>
            <td>{{ $biodata->agama }}</td>
        </tr>
        <tr>
            <th>{{ __('Alamat') }}</th>
            <td>{{ $biodata->alamat }}</td>
        </tr>
        <tr>
            <th>{{ __('Tanggal Lahir') }}</th>
            <td>{{ $biodata->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>{{ __('Golongan Darah') }}</th>
            <td>{{ $biodata->gol_darah }}</td>
        </tr>
        <tr>
            <th>{{ __('Status') }}</th>
            <td>{{ $biodata->status }}</td>
        </tr>
    </table>
</x-layouts.app>