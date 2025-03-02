<section class="w-full">
    <x-page-heading>
        <x-slot:title>Create Role</x-slot:title>
        <x-slot:subtitle>Create a new role and assign permissions to it.</x-slot:subtitle>

    </x-page-heading>

    <x-form wire:submit="createRole" class="space-y-6">
        <flux:input wire:model.live="name" label="Name of the role"/>

        <flux:checkbox.group wire:model.live="selectedPermissions" label="Permissions" description="Select the permissions that the role will have access to" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($permissions as $permission)
                <flux:checkbox label="{{$permission->name}}" value="{{$permission->id}}"/>
            @endforeach
        </flux:checkbox.group>

        <flux:button type="submit" icon="save" variant="primary">
            Create Role
        </flux:button>
    </x-form>
</section>
