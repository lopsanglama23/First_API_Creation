
@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- reCAPTCHA -->
        <div class="form-group mt-3">
            {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::display() !!}
            @error('g-recaptcha-response')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>

{!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
@endsection

