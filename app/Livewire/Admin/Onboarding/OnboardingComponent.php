<?php

namespace App\Livewire\Admin\Onboarding;

use Livewire\Component;

class OnboardingComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.onboarding.onboarding-component')->layout('livewire.admin.layouts.base');
    }
}
