<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>

    <body class="bg-primary">
        <div class="container shadow rounded w-25 pb-3 pt-4 pl-5 pr-5 bg-light" style="margin-top: 80px;">
            <form action="{{ route('admin.check') }}" method="post">
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @csrf
                <h2 class="fw-bold mb-3">Admin Login</h2>
                <div class="form-outline mb-4">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <div class="form-outline mb-4">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="password" class="form-control" name="password" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
        </div>

        @include('layouts.scripts')
    </body>

</html>
