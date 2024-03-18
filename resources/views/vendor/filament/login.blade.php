<form wire:submit.prevent="authenticate" class="space-y-8">
    {{ $this->form }}

    <x-filament::button type="submit" form="authenticate" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>
</form>

<style>
    body > div.filament-login-page.flex.min-h-screen.items-center.justify-center.bg-gray-100.py-12.text-gray-900 > div > div > div.flex.w-full.justify-center{
        display: none;
    }
</style>