<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
 
        <!-- Styles -->
        <link href="{{ asset('lightbox2/dist/css/lightbox.min.css')}}" rel="stylesheet" />
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('bootstrap5/bootstrap-icons/bootstrap-icons.css')}}">
        {{-- <link href="path/to/lightbox.css" rel="stylesheet" /> --}}

        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <!-- Scripts -->
        <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.js')}}"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        

    
        @livewireStyles
        @livewireScripts
        
        <style>
            .gallery{
                position: relative;
                float: left;
                margin-left: 10px; 
                padding: 10px;
            }
            .gallery img{
                transition: 1s;
            }
            .gallery img:hover{
                filter:grayscale(100%);
                transform:scale(1.1);
            }
            .checkbox{
            position: absolute;
            top: 10px;
            right: 10px;
        }
        </style>
        
    </head>
    <body class="font-sans {{ auth()->user()->isProUser()?'bg-indigo-500':'' }}">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
        </svg>
        <x-jet-banner />
        <div>
        <nav class="navbar navbar-expand navbar-dark bg-dark p-0 pb-0 fixed-top">
            <div class="container">
                <a href="{{route('dashboard')}}" class="navbar-brand">G-Warka</a>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav">
                        <li class="nav-item navbar-text">
                            <a href="{{ route('files.photo.index') }}" class="nav-link {{request()->routeIs('files.photo.index')?'active':''}}"> 
                                <i class="bi bi-image"></i><i class="d-none d-md-block">My gallery</i>
                            </a>
                        </li>
                        <li class="nav-item navbar-text">
                            <a href="{{ route('files.other.index') }}" class="nav-link {{request()->routeIs('files.other.index')?'active':''}}"> 
                                <i class="bi bi-folder2"></i><i class="d-none d-md-block">Files</i>
                            </a>
                        </li>
                        @can('manage-users')
                            <li class="nav-item navbar-text">
                                <a class="nav-link {{ request()->routeIs('admin.users.index')?'active':''}}" href="{{ route('admin.users.index') }}">
                                    <i class="bi bi-person-square"></i>
                                    <i class="d-none d-md-block">{{ __('Users') }}</i>
                                </a>   
                            </li>
                            <li class="nav-item navbar-text">
                                <a class="nav-link {{ request()->routeIs('admin.plans.index')?'active':''}}" href="{{ route('admin.plans.index') }}" >
                                    <i class="bi bi-person"></i>
                                    <i class="d-none d-md-block">
                                        {{ __('Plans') }}
                                    </i>
                                    </a>
                            </li>
                        @endcan  
                    </ul>
                    <ul class="navbar-nav ms-auto" id="notification-panel">
                        
                        @livewire('notification-panel')
                          
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="rounded-circle image-fluid w-10 h-10" src="{{ Auth::user()->profile_photo_url }}" alt="{{Auth::user()->name}}">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">{{ __('Manage Account') }}</a></li>
                                <li class="dropdown-item"><a href="{{ route('profile.show') }}"><i class="bi bi-person"></i>{{ __(' Profile') }}</a></li>
                                
                                <li class="dropdown-item"><a href="{{ route('files.photo.setting') }}"><i class="bi bi-gear-fill"></i>{{ __(' Setting') }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        <i class="bi bi-arrow-right-square-fill"></i> {{ __('Log Out') }}
                                    </a>
                                </form>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </nav>

    <div>
        @if(isset($header))  
            <header class="py-20 mt-5 p-5 mb-0 mx-0 bg-cyan-900">
                <div class="d-flex flex-wrap">
                    <span class="fs-4 card-header">{{ $header }}</span>
                </div>
            </header>
        @endif
    </div>
        
    </div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        @include('section.footer')
        @stack('modals')
        <audio id="notification_audio" src="{{ asset('notification_sound/mixkit-happy-bells-notification-937.wav')}}" preload="auto"></audio>
        <script src="{{ asset('bootstrap5/js/bootstrap.min.js')}}"></script>
    </body>
</html>
<script>
    var id = <?php echo auth()->user()->id; ?>;
    Pusher.logToConsole = true;
    var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
      cluster: '{{env("PUSHER_APP_CLUSTER")}}',
      encrypted: true
    });
    var channel = pusher.subscribe('warkaorder' + id);
    channel.bind('App\\Events\\PaymentProcessed', function(data) {
          //console.log(data.title);
          //console.log(data.info);
          Livewire.emit('notificationAdded');
          document.getElementById('notification_audio').play();
          //document.getElementById('notification-size').innerHTML = '+1';
          // document.getElementById('notification-body').innerHTML = "<p class='card-text'><strong>"+data.title+"</strong><i class='bg-secondary text-white' >Now<br/></i><span class='card-text text-sm px-2'>"+data.info+"</span></p>";
            });
  </script>