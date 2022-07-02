@extends('master')

@section('content')
    <div class="container shadow rounded pb-3 bg-light">
        <div class="row mt-5">
            <div class="col">
                <div class="text-right mt-3 mb-3">

                    <a href="{{ route('users.add') }}" class="btn btn-primary border-radius-20"><i
                            class="fa-solid fa-plus"></i> Add User</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>Users</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">House Number</th>
                                    <th scope="col">Street</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Country Code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        @foreach ($item->userAddresses as $row)
                                            <td>{{ $row->house_number }}</td>
                                            <td>{{ $row->street }}</td>
                                            <td>{{ $row->city }}</td>
                                            <td>{{ $row->country_code }}</td>
                                        @endforeach
                                        <td>
                                            <a href="{{ route('users.show', ['user' => $item->id]) }}"
                                                class="btn btn-primary">Show</a>
                                            <a href="{{ route('users.edit', ['user' => $item->id]) }}"
                                                class="btn btn-warning">Edit</a>
                                            <a href="{{ route('users.destroy', ['user' => $item->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
