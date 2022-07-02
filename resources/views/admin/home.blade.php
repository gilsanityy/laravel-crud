<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="bg-primary">
    <div class="container shadow rounded pb-3 bg-light">
        <div class="row mt-5">
            <div class="col">
                <div class="text-right mt-3 mb-3">

                    <a href="" class="btn btn-primary border-radius-20"><i class="fa-solid fa-plus"></i>
                        Add User</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>Admin</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ Auth::guard('admin')->user()->name }}</td>
                                    <td>{{ Auth::guard('admin')->user()->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        <form action="{{ route('admin.logout') }}" id="logout-form" method="POST">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.scripts')
</body>

</html>
