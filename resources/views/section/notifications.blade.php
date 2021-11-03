<x-app-layout>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>
<section id="qestion" class="">
    <div class="container">
        <h1 class="text-center mb-3">All notifications you have</h1>
        <div class="accordion" id="accordionExample">
            <!-- Accordion item -->
            @php( $notifications = auth()->user()->notifications )
            @forelse($notifications as $notification)
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#id-{{$loop->index}}" aria-expanded="false" aria-controls="collapseTwo">
                  {{ $notification->data['title'] }}
                </button>
              </h2>
              <div id="id-{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body text-sm">
                  <strong>{{ $notification->data['title'] }}</strong> {{ $notification->data['info'] }} <code>@if(array_key_exists('link', $notification->data))<a href="{{ url($notification->data['link']) }}">Here</a> @endif</code>
                  <br/><i class="bg-secondary text-white" >{{'  '.$notification->created_at->diffForHumans()}}</i>
                </div>
              </div>
            </div>
            @empty
            <h2 class="text-danger">Oooh!, You don't have any notifications!</h2>
            @endforelse
      </div>
    </section>
</x-app-layout>