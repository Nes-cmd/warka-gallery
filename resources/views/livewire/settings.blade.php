<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Photo gallery setting') }}
    </h2>
</x-slot> 

<div class="container">
    <div class="card col-8">
        <div class="card-header">
            Edit your settings here
        </div>
        <div class="card-body">
            <div class="card mb-3">
                <div class="card-header"><label for="biggerLabel1">Default category</label></div>
                @foreach ($categories as $category)
                    <div class="form-check mx-4" id="biggerLabel1">
                      <input wire:model="defaults.category_id" class="form-check-input" type="radio" id="flexRadioDefault1" value="{{$category->id}}" @if($category->id == $defaults['category_id']) checked="true" @endif>
                      <label class="form-check-label" for="flexRadioDefault1">
                        {{$category->name}}
                      </label>
                  </div>
                @endforeach
            </div>

            <div class="card mb-3">
                <div class="card-header"><label for="biggerLabel2">Default sorting oreder</label></div>
                @foreach ($sortings as $sorting)
                    <div class="form-check mx-4" id="biggerLabel2">
                      <input wire:model="defaults.sorting_id" class="form-check-input" type="radio" id="flexRadioDefault2" value="{{$sorting->id}}" @if($sorting->id == $defaults['sorting_id']) checked="true" @endif>
                      <label class="form-check-label" for="flexRadioDefault2">
                        {{$sorting->name}}
                      </label>
                  </div>
                @endforeach
            </div>

            <div class="card mb-3">
                <div class="card-header"><label for="biggerLabel3">Default Size For large screens</label></div>
                @foreach ($largeSizes as $largeSize)
                    <div class="form-check mx-4" id="biggerLabel3">
                      <input wire:model="defaults.large_size_id" class="form-check-input" type="radio" value="{{$largeSize->id}}" @if($largeSize->id == $defaults['large_size_id']) checked="true" @endif>
                      <label class="form-check-label" for="flexRadioDefault3">
                        {{$largeSize->name}}
                      </label>
                  </div>
                @endforeach
            </div>

            <div class="card mb-3">
                <div class="card-header"><label for="biggerLabel4">Default Size For Small screens</label></div>
                @foreach ($smallSizes as $smallSize)
                    <div class="form-check mx-4" id="biggerLabel4">
                      <input wire:model="defaults.small_size_id" class="form-check-input" type="radio" value="{{$smallSize->id}}" @if($smallSize->id == $defaults['small_size_id']) checked="true" @endif>
                      <label class="form-check-label" for="flexRadioDefault4">
                        {{$smallSize->name}}
                      </label>
                  </div>
                @endforeach
            </div>
            <button wire:click="selectCategory" class="btn btn-primary mb-2" style="justify-content:right">Save</button>
        </div>
        @if(! auth()->user()->isProUser())<a href="{{ url('payment/start/1')}}" class="btn btn-success">Upgrade to Pro <i class="bi bi-arrow-up"></i> </a>@endif
    </div>
</div>
