<x-layouts.app :title="__('Jurusan')">
    <div class="mb-4">
        <a href="{{ route('jurusans.create') }}" class="btn btn-primary">{{ __('Create Jurusan') }}</a>
    </div>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Nama Jurusan') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jurusans as $jurusan)
                <tr>
                    <td>{{ $jurusan->id }}</td>
                    <td>{{ $jurusan->nama_jurusan }}</td>
                    <td>
                        <a href="{{ route('jurusans.edit', $jurusan) }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                        <form action="{{ route('jurusans.destroy', $jurusan) }}" method="POST" class="inline-block">
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