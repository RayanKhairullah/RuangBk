{{-- filepath: d:\xampp\htdocs\RuangBk\resources\views\catatans\index.blade.php --}}
<x-layouts.app :title="__('Catatan Prilaku')">
    <h1 class="text-2xl font-bold mb-4">{{ __('Catatan Prilaku') }}</h1>

    @if (auth()->user()->role === App\Enums\UserRole::Teacher)
        <a href="{{ route('catatans.create') }}" class="btn btn-primary mb-4">{{ __('Buat Catatan') }}</a>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-black-100">
                    <th class="border border-gray-300 px-4 py-1">{{ __('Nama Siswa') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Room') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Kasus') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Tanggal') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Nama Guru') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Catatan Guru') }}</th>
                    <th class="border border-gray-300 px-4 py-1">{{ __('Poin') }}</th>
                    @if (auth()->user()->role === App\Enums\UserRole::Teacher)
                        <th class="border border-gray-300 px-4 py-1">{{ __('Actions') }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($catatans as $catatan)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->room->tingkatan_rooms }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->kasus }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->guru->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->catatan_guru }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $catatan->poin }}</td>
                        @if (auth()->user()->role === App\Enums\UserRole::Teacher)
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('catatans.edit', $catatan->id) }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                                <form action="{{ route('catatans.destroy', $catatan->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Yakin ingin menghapus?') }}')">{{ __('Hapus') }}</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>