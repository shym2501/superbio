<?php

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    #[Session]
    public int $perPage = 10;

    /** @var array<int,string> */
    public array $searchableFields = ['name'];

    #[Url]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function mount(): void
    {
        $this->authorize('view roles');
    }

    public function deleteRole(string $roleId): void
    {
        $this->authorize('delete roles');

        $role = Role::query()->where('id', $roleId)->firstOrFail();

        $role->delete();

        $this->dispatch('roleDeleted');
    }

    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.roles', [
            'roles' => Role::query()
                ->when($this->search, function ($query, $search): void {
                    $query->whereAny($this->searchableFields, 'LIKE', "%$search%");
                })
                ->paginate($this->perPage),
        ]);
    }
}
