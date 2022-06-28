<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();

        return view('users.index')->with(['data' => $data]);
    }

    public function add()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        // User::add([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Validation
        $validated = $request->validate([
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email',
            'password' => 'required|string',
            'house_number' => 'required|int',
            'street' => 'required|string',
            'city' => 'required|string',
            'country_code' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $userAddress = new UserAddress();
        $userAddress->user_id = $user->id;
        $userAddress->house_number = $request->house_number;
        $userAddress->street = $request->street;
        $userAddress->city = $request->city;
        $userAddress->country_code = $request->country_code;
        $userAddress->save();

        return redirect()->route('users.index');
    }

    public function show($user)
    {
        $data = User::where('id', $user)->first();



        return view('users.show')->with([
            'data' => $data,
        ]);
    }

    public function edit($user)
    {
        $data = User::where('id', $user)->first();

        return view('users.edit')->with([
            'data' => $data,
        ]);
    }

    public function update(Request $request, $user /*, $userAddresses*/)
    {

        // Validation
        $validated = $request->validate([
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email',
            'password' => 'required|string',
            'house_number' => 'required|int',
            'street' => 'required|string',
            'city' => 'required|string',
            'country_code' => 'required|string',
        ]);

        $user = User::where('id', $user)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // $user->house_number = $request->house_number;
        // $user->street = $request->street;
        // $user->city = $request->city;
        // $user->country_code = $request->country_code;
        $user->save();



        $userAddresses = UserAddress::where('user_id', $user->id)->first();
        // dd($request->all());
        $userAddresses->house_number = $request->house_number;
        $userAddresses->street = $request->street;
        $userAddresses->city = $request->city;
        $userAddresses->country_code = $request->country_code;
        $userAddresses->save();

        return redirect()->route('users.index');
    }

    public function destroy($user)
    {
        User::where('id', $user)->delete();
        UserAddress::where('user_id', $user)->delete();

        return redirect()->route('users.index');
    }
}
