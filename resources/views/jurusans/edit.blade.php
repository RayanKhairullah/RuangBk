<x-layouts.app :title="__('Edit Jurusan')">
    <form action="{{ route('jurusans.update', $jurusan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_jurusan">{{ __('Nama Jurusan') }}</label>
            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-input" value="{{ $jurusan->nama_jurusan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</x-layouts.app>