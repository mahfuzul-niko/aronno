<x-backauth>
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
        <p class="text-center small">Enter your email & password to login</p>
      </div>

      <form method="POST" action="{{ route('login') }}" class="row g-3">
        @csrf
    
        <div class="col-12">
            <label for="email" class="form-label">Your Email</label>
            <input id="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    
        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
        </div>
    
        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Login</button>
        </div>
    
        <div class="col-12 ">
            <a href="{{ route('password.request') }}" class="small">Forgot Your Password?</a>
        </div>
    
        <div class="col-12 ">
            <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
        </div>
    </form>
    
</x-backauth>