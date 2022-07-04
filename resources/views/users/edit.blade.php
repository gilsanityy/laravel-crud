@extends('master')

@section('content')
    <div class="container" style="margin-bottom: 200px;">
        <div class="row mt-5 w-50">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Edit user</h1>
                        <form action="{{ route('users.update', ['user' => $data->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $data->name }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $data->email }}">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            value="{{ $data->password }}">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Change Image</label>
                                        <img src="{{ asset($data->image) }}" alt="" width="200" height="200"
                                            style="border-radius: 100px; margin: 25px 0 25px 0;">
                                        <input type="file" name="image" class="form-control-file"
                                            id="exampleFormControlFile1">
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    @foreach ($data->userAddresses as $key => $item)
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">House Number {{ $key + 1 }}</label>
                                            <input type="text" class="form-control" name="house_number"
                                                value="{{ $item->house_number }}">
                                        </div>
                                        @error('house_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Street {{ $key + 1 }}</label>
                                            <input type="text" class="form-control" name="street"
                                                value="{{ $item->street }}">
                                        </div>
                                        @error('street')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">City {{ $key + 1 }}</label>
                                                    <input type="text" class="form-control" name="city"
                                                        value="{{ $item->city }}">
                                                </div>
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Country C
                                                        {{ $key + 1 }}</label>
                                                    <input type="text" class="form-control" name="country_code"
                                                        value="{{ $item->country_code }}">
                                                </div>
                                                @error('country_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <br>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
