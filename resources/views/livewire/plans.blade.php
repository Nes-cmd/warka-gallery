<div class="container">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Process') }}
        </h2>
    </x-slot>
    <div>
        @foreach ($plans as $plan)
            <ul>
                {{ $plan->name }}
                @foreach ($plan->features as $feature)
                    <li class="px-4">
                        {{ $feature->name }}
                    </li>
                @endforeach
                <strong>Amount : </strong>{{ $plan->amount_required }}
            </ul>
        @endforeach
        <form wire:submit.prevent='addFeature'>
            <select name="plan_id" id="" wire:model='plan_id'>
                <option value="">Select Plan</option>
                @foreach ($plans as $plan)
                    <option value="{{$plan->id}}">{{ $plan->name}}</option>
                @endforeach
            </select>
            <input type="text" wire:model='feature'>
        </form>
    </div>
</div>
