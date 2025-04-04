<x-layouts.app :title="__('Jadwal Konseling')">
    <h1 class="text-2xl font-bold mb-4">{{ __('Jadwal Konseling') }}</h1>

    <a href="{{ route('penjadwalan.create') }}" class="btn btn-primary mb-4">{{ __('Buat Jadwal') }}</a>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-black-100">
                    <th class="border border-gray-300 px-4 py-1">{{ __('Nama Pengirim') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Email Pengirim') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Nama Penerima') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Email Penerima') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Lokasi') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Tanggal') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Topik Dibahas') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Solusi') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Status') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Aksi') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->pengirim->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->pengirim->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->penerima->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->penerima->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->lokasi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->topik_dibahas }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->solusi ?? '-' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('penjadwalan.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                            <form action="{{ route('penjadwalan.destroy', $jadwal->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Yakin ingin menghapus?') }}')">{{ __('Hapus') }}</button>
                            </form>
                            <form action="{{ route('penjadwalan.send', $jadwal->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">{{ __('Send') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>