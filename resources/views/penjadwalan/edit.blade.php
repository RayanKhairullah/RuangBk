<x-layouts.app :title="__('Edit Jadwal Konseling')">
    <h1 class="text-2xl font-bold mb-4">{{ __('Edit Jadwal Konseling') }}</h1>

    <form action="{{ route('penjadwalan.update', $penjadwalan->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <!-- Lokasi -->
        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-700">{{ __('Lokasi') }}</label>
            <input type="text" name="lokasi" id="lokasi" class="form-input w-full" value="{{ $penjadwalan->lokasi }}" required>
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700">{{ __('Tanggal') }}</label>
            <input type="datetime-local" name="tanggal" id="tanggal" class="form-input w-full" value="{{ $penjadwalan->tanggal }}" required>
        </div>

        <!-- Topik Dibahas -->
        <div class="mb-4">
            <label for="topik_dibahas" class="block text-sm font-medium text-gray-700">{{ __('Topik Dibahas') }}</label>
            <textarea name="topik_dibahas" id="topik_dibahas" class="form-input w-full" rows="4" required>{{ $penjadwalan->topik_dibahas }}</textarea>
        </div>

        <!-- Solusi -->
        @if (auth()->user()->role === App\Enums\UserRole::Teacher)
            <div class="mb-4">
                <label for="solusi" class="block text-sm font-medium text-gray-700">{{ __('Solusi') }}</label>
                <textarea name="solusi" id="solusi" class="form-input w-full" rows="4">{{ $penjadwalan->solusi }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                <select name="status" id="status" class="form-input w-full">
                    <option value="Incomplete" {{ $penjadwalan->status === 'Incomplete' ? 'selected' : '' }}>{{ __('Incomplete') }}</option>
                    <option value="Complete" {{ $penjadwalan->status === 'Complete' ? 'selected' : '' }}>{{ __('Complete') }}</option>
                </select>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
    </form>
</x-layouts.app>