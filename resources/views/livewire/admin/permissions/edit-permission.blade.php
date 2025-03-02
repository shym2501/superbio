<section class="w-full">
    <x-page-heading>
        <x-slot:title>Edit Permission</x-slot:title>
        <x-slot:subtitle>Edit the permission</x-slot:subtitle>
    </x-page-heading>

    <x-form wire:submit="savePermission" class="space-y-6">
        <flux:input wire:model.live="name" label="Name of the permission" />
        <flux:button type="submit" icon="save" variant="primary">
            Save Permission
        </flux:button>
    </x-form>

</section>
