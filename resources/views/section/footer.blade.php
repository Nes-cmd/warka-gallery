<footer class="p-md-3 mt-5 bg-dark text-white position-relative fixed-bottom">
    <div class="row">
        <div class="col-4">
            <div>Contact us via  
                <i class="bi bi-facebook"></i>
                <i class="bi bi-telegram"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-twitter"></i>
            </div>
            <div>
                <a href="tel:+251940678725">Call: +251940678725</a><br>
                <a href="e-mail//:service@warkaorder.com">E-mail: service@warkaorder.com</a>
                <p>Adress: Addis Abeba/Ethiopia Bole sub city </p>
            </div>
        </div>
        <div class="col-4">
            <div class="">
                <a href="{{ url('/faq')}}">FAQ?</a><br>
                <a href="#">About us</a>
            </div>
        </div>
        <div class="col-4">
            {!! __(':terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-blue-900">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-blue-900">'.__('Privacy Policy').'</a>',
            ]) !!}
        </div>
    </div>
    <div class="container text-center">
        <p class="">Copyrirht © 2021 Warka Technology</p>
        <p class="text-sm">All rights reserved</p>
        <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
    </div>
</footer>