<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PaymentMethod;
use App\Models\Plan;
use Auth;

class Methods extends Component
{
    public $plan;
    public $selected_id;
    public $selected_index;

    public $phone;
    public $transaction_code;
    public $country;

    public function mount($selected)
    { 
        $this->phone = Auth::user()->phone;
        $this->plan = Plan::where('id', $selected)->first();
    }
    public function selectMethod($id, $index)
    {
        $this->selected_id = $id;
        $this->selected_index = $index;
    }
    public function saveProcess(){
        $validated = $this->validate([
            'transaction_code' => ['required', 'max:32'],
            'phone' => ['required', 'numeric', 'digits_between:9,14'],
            'country' => ['required'], 
        ]);
        $validated['plan_id'] = $this->plan->id;
        $validated['amount'] =  $this->plan->amount_required;
        $validated['method_id'] = $this->selected_id;
        $validated['verified'] = 0;
        \App\Models\PaymentProcess::updateOrCreate(['user_id' => Auth::user()->id],$validated);
        $this->country = '';
        $this->transaction_code = '';
        $this->phone = '';
        session()->flash('proceded', 'Payment detail submitted succesfully!');
        return redirect('/payment/submited');
    }
    public function render()
    {
        $plans = $this->plan;
        $methods = PaymentMethod::all();
        return view('livewire.methods', compact('methods', 'plans'));
    }
}
