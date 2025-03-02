<section class="w-full">
    <x-page-heading>
        <x-slot:title>Create Permission</x-slot:title>
        <x-slot:subtitle>Create a new permission</x-slot:subtitle>
    </x-page-heading>

    <x-form wire:submit="createPermission" class="space-y-6">
        <flux:input wire:model.live="name" label="Name of the permission" />
        <flux:button type="submit" icon="save" variant="primary">
            Create Permission
        </flux:button>
    </x-form>

</section>
