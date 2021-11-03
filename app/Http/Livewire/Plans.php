<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;
use App\Models\Feature;

class Plans extends Component
{
    public $plan_id;
    public $feature;
    public function addFeature()
    {
        Feature::create(['plan_id' => $this->plan_id, 'name' => $this->feature]);
        $this->feature = '';
    }
    public function render()
    {
        $plans = Plan::with('features')->get();
        return view('livewire.plans', ['plans' => $plans]);
    }
}
