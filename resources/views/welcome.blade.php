<x-guest-layout>
    <main class="container">
        <section id="learn" class="p-md-5 mt-5 bg-secondary">
            <div >
                <div class="row align-items-center justify-content-between">
                    <div class="col-md">
                        <img src="{{ asset('/images/photoForwelcome.png')}}" alt="" class="image-fluid" width="100%">
                    </div>
                    <div class="col-md p-5">
                        <h2 class="text-warning">Warka Gallery</h2>
                        <p class="lead text-white">Warka gallery is aplatform to store and manage photos and some restricted files.</p>
                        <p class="font-semibold">why you lose your photos of amazing journies? If you lose your phone somewhere, Or your phone should be formatted for some reason, you are going to lose your gallery photos and may be some urgent datas like contacts, documents...</p>
                        <p class="lead">Dont let this to happen! <a class="btn btn-success" href="{{ url('register')}}">Sign Up</a> to Warka Gallery now.</p>
                    </div>
                    
                </div>
            </div>
        </section>
        <section id="instructors" class="p-2 p-lg-5 mb-4 bg-primary">
            <div >
                <h1 class="text-center text-white">Things you get with Warka Gallery</h1>
                <p class="lead text-center text-white">
                    Warka Gallery will save you from loss!
                </p>
                <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-file-lock"></i>
                            </div>
                            <h3 class="card-title mb-3">Security</h3>
                            <p class="card-text">
                                You can store your most valuable thing here. There is no issue for security. No one can see what you have here. Your seret is also ours. 
                            </p>
                            <a href="#" class="d-flex btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-bag-check-fill"></i>
                            </div>
                            <h3 class="card-title mb-3">BackUp</h3>
                            <p class="card-text">
                                We have full backup of your data in safe place, incase even world is collapsed your datas are safe! No worry what ever happens we are here to supply your datas. 
                            </p>
                            <a href="#" class="d-flex btn btn-dark">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3">Easy to use</h3>
                            <p class="card-text">
                                To use warka gallery knowdlage of simple use of electronics devices like computer or smart phone is enough. You dont't have to be professional!
                            </p>
                            <a href="#" class="d-flex btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            </div> 
            </div>
        </section>
    </main>
  </x-guest-layout>
</body>
</html>