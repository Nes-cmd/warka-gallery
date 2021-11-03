<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start ">
        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome To  <i class="text-success">WARKA GALLERY</i></h1>
        <p class="col-lg-10 fs-4 d-none d-sm-block">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="{{ route('register') }}">
             @csrf
          <div class="form-floating mb-3">
            <input name="name" type="text" class="form-control" value="{{ old('name')}}" required placeholder="name@example.com">
            <label for="floatingInput">Name</label>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input name="phone" type="text" class="form-control"  value="{{ old('phone')}}" required placeholder="name@example.com">
            <label for="floatingInput">Phone number</label>
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control"  value="{{ old('email')}}" required placeholder="name@example.com">
            <label for="floatingInput">Email</label>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" required placeholder="name@example.com">
            <label for="floatingInput">Paswword</label>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" required  placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <div class="ml-2">
              <input type="checkbox" name="terms" id="terms">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                ]) !!}
            </div>
            @error('terms')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
          <hr class="my-4">
          <a href="{{route('login')}}">Already registered</a>
        </form>
      </div>
    </div>
  </div>
</x-guest-layout>