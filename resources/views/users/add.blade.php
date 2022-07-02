@extends('master')

@section('content')
    <div class="container">
        <div class="row mt-5 w-50">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Add new user</h1>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name"
                                    value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email"
                                    value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">House Number</label>
                                <input type="text" class="form-control" name="house_number"
                                    placeholder="Enter House Number" value="{{ old('house_number') }}">
                            </div>
                            @error('house_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Street</label>
                                <input type="text" class="form-control" name="street" placeholder="Enter Street"
                                    value="{{ old('street') }}">
                            </div>
                            @error('street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City"
                                    value="{{ old('city') }}">
                            </div>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country Code</label>
                                <input type="text" class="form-control" name="country_code"
                                    placeholder="Enter Country Code" value="{{ old('country_code') }}">
                            </div>
                            @error('country_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
