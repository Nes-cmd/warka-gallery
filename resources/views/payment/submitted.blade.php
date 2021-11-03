<x-app-layout>
    <div class="container">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Paymet submitted successfilly') }}
            </h2>
        </x-slot>
        @if (Session::has('proceded'))
            <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div class="alert-dismissible">
                    {{session('proceded')}}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
        @endif
        <div class="card align-items-center">
            <img src="{{ asset('/images/processing.jpg')}}" class="image-fluid" width="50%">
            <p>You submitted the payment detail succesfully!</p>
            <p>We are working on it. After the payment is verified, you will be redirected shortly. If it takes longer, please contact us <a href="tel:+251940678725">Call +251940678725</a></p>
        </div>
    </div>
</x-app-layout>