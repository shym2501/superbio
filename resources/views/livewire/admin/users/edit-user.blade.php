<section class="w-full">
    <x-page-heading>
        <x-slot:title>Edit User</x-slot:title>
        <x-slot:subtitle>Editing user {{ $user->name }}</x-slot:subtitle>
    </x-page-heading>

    <x-form wire:submit="updateUser" class="space-y-6">
        <flux:input wire:model.live="name" label="Name"/>
        <flux:input wire:model.live="email" label="Email address"/>

        <flux:checkbox.group wire:model.live="userRoles" label="Roles" description="Select the roles this users should have." class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($roles as $role)
                <flux:checkbox label="{{$role->name}}" value="{{$role->id}}"/>
            @endforeach
        </flux:checkbox.group>

        @dump($userRoles)

        <flux:button type="submit" icon="save" variant="primary">
            Save User
        </flux:button>
    </x-form>

</section>
