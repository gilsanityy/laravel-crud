<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body class="bg-primary">
    <div class="container shadow rounded mb-5 pb-3 pt-4 pl-5 pr-5 bg-light" style="margin-top: 80px; width: 40%;">
        <form action="{{ route('auth.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="fw-bold mb-3 text-uppercase">Register</h2>
            <div class="row">
                <div class="col-6">
                    <div class="form-outline mb-4">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        <label class="form-label">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                        <label class="form-label">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="password" class="form-control" name="password" />
                        <label class="form-label">Password</label>
                    </div>

                    <div class="row mb-4 ml-1">
                        <div class="form-group">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="exampleFormControlFile1">Upload image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-outline mb-4">
                        @error('house_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" name="house_number"
                            value="{{ old('house_number') }}" />
                        <label class="form-label">House Number</label>
                    </div>

                    <div class="form-outline mb-4">
                        @error('street')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" name="street" value="{{ old('street') }}" />
                        <label class="form-label">Street</label>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-outline mb-4">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" name="city"
                                    value="{{ old('city') }}" />
                                <label class="form-label">City</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-outline mb-4">
                                @error('country_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" name="country_code"
                                    value="{{ old('country_code') }}" />
                                <label class="form-label">Country Code</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>

            <div class="text-center">
                <p>Already a member? <a href="{{ route('auth.index') }}">Login</a></p>
            </div>
        </form>
    </div>

    @include('layouts.scripts')
</body>

</html>
