

<div class="container">
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Available Payment Methods') }}
    </h2>
</x-slot> 
    @php($index = -1)
    <div class="list-group col-md-8 pb-3">
        @foreach ($methods as $method)
            @php($index++)
            <button  class="list-group-item list-group-item-action {{ $method->id == $selected_id?'active':''}}" aria-current="true"wire:click='selectMethod({{$method->id}}, {{$index}})'>{{ $method->name }}</button>
        @endforeach
    </div>
    <div class="card bg-secondary text-white p-5 col-md-8">
    @if ($selected_id)
        <div class="lead"><?php echo str_replace("|", "<br />", $methods[$selected_index]->instruction); ?></div>
        <p >Amount required is <strong>{{ $plan->amount_required }}</strong> birr as your plan</p>
        <div class="card col-md-8 p-3 text-dark" style="justify-content: center">
            <div class="card-header text-danger"><strong>Please fill this form after the payment</strong></div>
            <div class="card-body px-3">
                <form wire:submit.prevent='saveProcess'>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" class="form-control" wire:model='phone' id="exampleFormControlInput1" placeholder="">
                        @error('phone')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Transaction Code</label>
                        <input type="text" class="form-control" name="transaction_code" wire:model='transaction_code' id="exampleFormControlInput1" placeholder="TXN Id">
                        @error('transaction_code')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Country</label>
                        <input type="text" list="datalistOptions" wire:model='country' id="exampleDataList" class="form-control" id="exampleFormControlInput1" placeholder="">
                        @error('country')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        <datalist id="datalistOptions">
                            <option value="Ethiopia">
                            <option value="San Francisco">
                            <option value="New York">
                            <option value="Seattle">
                            <option value="Los Angeles">
                            <option value="Chicago">
                        </datalist>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Finish</button>
                </form>
            </div>
        </div>
    @endif
    </div>
</div>
