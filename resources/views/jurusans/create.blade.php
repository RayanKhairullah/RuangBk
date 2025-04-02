<x-layouts.app :title="__('Create Jurusan')">
    <form action="{{ route('jurusans.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_jurusan">{{ __('Nama Jurusan') }}</label>
            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-input" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </form>
</x-layouts.app>