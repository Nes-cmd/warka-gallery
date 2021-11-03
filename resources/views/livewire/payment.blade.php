

<section id="instructors" class="p-5 bg-indigo-500">
    <div class="container">
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chose the plan as your requiremnt!') }}
        </h2>
    </x-slot>
        <p class="lead text-center text-white">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Quisquam error veritatis fuga facilis illum reprehenderit deleniti quaerat, nulla autem enim.
        </p>
        <div class="row g-3 pb-md-5">
            @foreach ($plans as $plan)
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-light h-100">
                        <img src="{{ asset('images/'. $plan->name .'.jpeg')}}" class="card-img-top h-100" alt="img">
                        <div class="card-header text-center h3 ul"><strong>{{ $plan->name}}</strong></div>
                        <h5 class="px-3"> Features</h5>
                           @foreach ($plan->features as $feature)
                               <li class="li">{{ $feature->name }}</li>
                           @endforeach
                        <p> Price : <strong>{{$plan->amount_required}}</strong> birr</p>
                        <div class="card-footer">
                            <a class="btn btn-primary bi bi-cart" href="{{ route('payment.method', $plan->id) }}"> Choose this One</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- @if($skip)
            <a class="btn btn-primary  btn-lg " href="{{ route('files.photo.index') }}">I will Pay next time</a>
        @endif -->
    </div>
</section>