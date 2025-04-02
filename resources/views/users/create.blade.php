<x-layouts.app :title="__('Create User')">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-input" required>
        </div>
        <div class="mb-4">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-input" required>
        </div>
        <div class="mb-4">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-input" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </form>
</x-layouts.app>