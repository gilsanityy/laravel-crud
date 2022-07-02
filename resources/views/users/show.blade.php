@extends('master')

@section('content')
    <div class="container">
        <div class="row mt-5 w-50 mb-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>User Details</h1>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}" disabled>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                @foreach ($data->userAddresses as $key => $item)
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">House Number {{ $key + 1 }}</label>
                                        <input type="text" class="form-control" name="housenumber"
                                            value="{{ $item->house_number }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Street {{ $key + 1 }}</label>
                                        <input type="text" class="form-control" name="street"
                                            value="{{ $item->street }}" disabled>
                                    </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City {{ $key + 1 }}</label>
                                    <input type="text" class="form-control" name="city" value="{{ $item->city }}"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Country Code {{ $key + 1 }}</label>
                                    <input type="text" class="form-control" name="city"
                                        value="{{ $item->country_code }}" disabled>
                                </div>
                                @endforeach
                            </div>
                        </div>



                        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
