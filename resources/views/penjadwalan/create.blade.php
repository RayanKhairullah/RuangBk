<x-layouts.app :title="__('Buat Jadwal Konseling')">
    <h1 class="text-2xl font-bold">{{ __('Buat Jadwal Konseling') }}</h1>

    <form action="{{ route('penjadwalan.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Pilih Penerima -->
        <div class="mb-4">
            <label for="penerima_id" class="block text-sm font-medium text-gray-700">{{ __('Pilih Penerima') }}</label>
            <select name="penerima_id" id="penerima_id" class="form-input w-full" required>
                <option value="">{{ __('Pilih Penerima') }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <!-- Lokasi -->
        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-700">{{ __('Lokasi') }}</label>
            <input type="text" name="lokasi" id="lokasi" class="form-input w-full" required>
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700">{{ __('Tanggal') }}</label>
            <input type="datetime-local" name="tanggal" id="tanggal" class="form-input w-full" required>
        </div>

        <!-- Topik Dibahas -->
        <div class="mb-4">
            <label for="topik_dibahas" class="block text-sm font-medium text-gray-700">{{ __('Topik Dibahas') }}</label>
            <textarea name="topik_dibahas" id="topik_dibahas" class="form-input w-full" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    </form>
</x-layouts.app>