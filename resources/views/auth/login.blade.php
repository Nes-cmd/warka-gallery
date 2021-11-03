<x-guest-layout>
	@if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start d-none d-sm-block">
        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome Back Again</h1>
        <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="{{ route('login') }}">
        	 @csrf
          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="floatingInput" value="{{ old('email')}}" required placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            @error('email')
            	<span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" required id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
            	<span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
          <hr class="my-4">
        </form>
      </div>
    </div>
  </div>
</x-guest-layout>