<x-layouts.app :title="__('Edit Catatan Prilaku')">
    <h1 class="text-2xl font-bold">{{ __('Edit Catatan Prilaku') }}</h1>

    <form action="{{ route('catatans.update', $catatan->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <!-- Pilih Siswa -->
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">{{ __('Pilih Siswa') }}</label>
            <select name="user_id" id="user_id" class="form-input w-full" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if($catatan->user_id == $user->id) selected @endif>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Room -->
        <div class="mb-4">
            <label for="room_id" class="block text-sm font-medium text-gray-700">{{ __('Pilih Room') }}</label>
            <select name="room_id" id="room_id" class="form-input w-full" required>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" @if($catatan->room_id == $room->id) selected @endif>
                        {{ $room->tingkatan_rooms }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Kasus -->
        <div class="mb-4">
            <label for="kasus" class="block text-sm font-medium text-gray-700">{{ __('Kasus') }}</label>
            <input type="text" name="kasus" id="kasus" value="{{ $catatan->kasus }}" class="form-input w-full" required>
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700">{{ __('Tanggal') }}</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ $catatan->tanggal }}" class="form-input w-full" required>
        </div>

        <!-- Catatan Guru -->
        <div class="mb-4">
            <label for="catatan_guru" class="block text-sm font-medium text-gray-700">{{ __('Catatan Guru') }}</label>
            <textarea name="catatan_guru" id="catatan_guru" class="form-input w-full" rows="4" required>{{ $catatan->catatan_guru }}</textarea>
        </div>

        <!-- Poin -->
        <div class="mb-4">
            <label for="poin" class="block text-sm font-medium text-gray-700">{{ __('Poin') }}</label>
            <input type="number" name="poin" id="poin" value="{{ $catatan->poin }}" class="form-input w-full" min="10" max="100" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</x-layouts.app>
