<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Payment;
use App\Models\Plan;

class Payment extends Component
{
    public $skip;
    public function mount($skip = null)
    {
        $this->skip = $skip;
    }
    public function render()
    {
        $plans = Plan::with('features')->get();
        return view('livewire.payment', compact('plans'));
    }
}
