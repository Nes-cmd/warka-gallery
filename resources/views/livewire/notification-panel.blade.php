<li class="nav-item dropdown">
    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <h4><i class="bi bi-bell-fill"><sup id="notification-size">{{sizeof($notifications)}}</sup></i></h4>
    </a>
    <ul class="dropdown-menu dropdown-menu-end bg-secondary" aria-labelledby="navbarDropdown" style="min-width: 350px;max-width: 450px;">
        <div class="card">
            <li class="card-header "><strong class="text-green-500">New notifications</strong></li>
            <li class="list-group dropdown-item p-0 mb-0 mt-0" style="white-space: normal;" id="notification-body">
                    
                </li>
            @forelse ($notifications as $notification)
                <li class="list-group dropdown-item p-0 mb-0 mt-0" style="white-space: normal;">
                    <p class="card-text" wire:click="readed('{{ $notification->id }}')">
                    <strong>{{$notification->data['title']}}</strong>
                    <i class="bg-secondary text-white" >{{'  '.$notification->created_at->diffForHumans()}}<br/></i>
                    <span class="card-text text-sm px-2">
                        {{' '.$notification->data['info']}}
                         @if(array_key_exists('link', $notification->data))<a href="{{ url($notification->data['link']) }}">Here</a> @endif
                    </span>
                </p>
                </li>
            @empty
                <li class="list-group dropdown-item p-0 mb-0 mt-0" style="white-space: normal;">
                    <p class="card-text">
                    <strong>You don't have new notifications</strong>
                    <span class="card-text text-sm px-2">
                        If you want to read past notifications, Click<a href="{{ url('notifications')}}"> here.</a>
                    </span>
                </p>
                </li>
            @endforelse
        </div>
    </ul>
</li>
