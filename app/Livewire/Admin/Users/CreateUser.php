<?php

namespace App\Livewire\Admin\Users;

use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateUser extends Component
{
    use LivewireAlert;

    public function mount(): void
    {
        $this->authorize('create users');
    }

    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.users.create-user');
    }
}
