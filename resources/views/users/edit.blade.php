<x-layouts.app :title="__('Edit User')">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ $user->name }}" required>
        </div>
        <div class="mb-4">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-input" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</x-layouts.app>