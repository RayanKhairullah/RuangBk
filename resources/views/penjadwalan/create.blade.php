<x-layouts.app :title="__('Buat Jadwal Konseling')">
    <h1 class="text-2xl font-bold">{{ __('Buat Jadwal Konseling') }}</h1>

    <form action="{{ route('penjadwalan.store') }}" method="POST" class="mt-4">
        @csrf

        {{-- <!-- Pilih Penerima dengan AJAX Search -->
        <div class="mb-4">
            <label for="penerima_id" class="block text-sm font-medium text-gray-700">{{ __('Pilih Penerima') }}</label>
            <select name="penerima_id" id="penerima_id" class="form-input w-full" required></select>
        </div> --}}

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
{{-- 
    <!-- Sertakan Select2 (pastikan file CSS dan JS sudah terinclude, misalnya via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#penerima_id').select2({
                placeholder: "{{ __('Cari Penerima') }}",
                ajax: {
                    url: '{{ route("api.users.search") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term // Pencarian berdasarkan keyword
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name + " (" + item.email + ")"
                                };
                            })
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
    </script> --}}
