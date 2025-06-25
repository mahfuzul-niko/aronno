<x-backauth>
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        <p class="text-center small">Enter your personal details to create account</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="row g-3">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="col-md-6">
            <label for="first_name" class="form-label">First Name</label>
            <input id="first_name" type="text" name="name"
                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Your Email</label>
            <input id="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
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
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                required>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" name="terms" type="checkbox" id="acceptTerms" required>
                <label class="form-check-label" for="acceptTerms">
                    I agree and accept the <a href="#">terms and conditions</a>
                </label>
                <div class="invalid-feedback">You must agree before submitting.</div>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>

        <div class="col-12">
            <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </div>
    </form>

</x-backauth>
