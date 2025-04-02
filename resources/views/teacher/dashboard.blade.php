<x-layouts.app :title="__('Teacher Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Dashboard') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage the Modules data from here:') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @session('success')
    <p class="text-green-600">{{ $value }}</p>
    @endsession

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1>Hello World</h1>
    </div>
</x-layouts.app>
