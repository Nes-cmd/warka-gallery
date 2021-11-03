<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap5/bootstrap-icons/bootstrap-icons.css')}}">

    <title>Warka Gallery - Frequently asked questions</title>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark p-0 pb-0 fixed-top">
    <div class="container">
        <a href="{{route('dashboard')}}" class="navbar-brand">G-Warka</a>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item navbar-text">
                        <a href="{{ url('/dashboard') }}" class="nav-link"> 
                            Dashboard
                        </a>
                    </li>
                @else
                    <li class="nav-item navbar-text">
                        <a href="{{ route('login') }}" class="nav-link"> 
                            Log In
                        </a>
                    </li>
                    <li class="nav-item navbar-text">
                        <a href="{{ route('register') }}" class="nav-link"> 
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<section id="qestion" class="p-md-5">
    <div class="container">
        <h1 class="text-center mb-3">Frequently Asked Questions</h1>
        <div class="accordion" id="accordionExample">
            <!-- Accordion item -->
            
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How to register?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body text-sm">
                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, 
                  as well as the showing and hiding via CSS transitions.
                   You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why we are here?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,
                   as well as the showing and hiding via CSS transitions.
                   You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    How many acconts can i have?
                  </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample" style="">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, 
                    as well as the showing and hiding via CSS transitions.
                     You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
          </div>
      </div>
    </section>
    @include('section.footer')
    <script src="{{ asset('bootstrap5/js/bootstrap.min.js')}}"></script>
</body>
</html>