<x-layouts.app :title="__('Rooms')">
    <div class="mb-4">
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">{{ __('Create Room') }}</a>
    </div>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Jurusan') }}</th>
                <th>{{ __('Kode Room') }}</th>
                <th>{{ __('Tingkatan Room') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->jurusan->nama_jurusan }}</td>
                    <td>{{ $room->kode_rooms }}</td>
                    <td>{{ $room->tingkatan_rooms }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                        <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>