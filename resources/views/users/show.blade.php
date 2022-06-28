<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Show User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5 w-50 mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1>User Details</h1>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}"
                                disabled>
                        </div>
                        @foreach ($data->userAddresses as $key => $item)
                            <div class="form-group">
                                <label for="exampleInputEmail1">House Number {{ $key + 1 }}</label>
                                <input type="text" class="form-control" name="housenumber"
                                    value="{{ $item->house_number }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Street {{ $key + 1 }}</label>
                                <input type="text" class="form-control" name="street" value="{{ $item->street }}"
                                    disabled>
                            </div>
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
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
