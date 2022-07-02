<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $user;
    protected $userAddress;

    public function __construct(User $user, UserAddress $userAddress)
    {
        $this->user = $user;
        $this->userAddress = $userAddress;
    }

    public function index()
    {
        return view('users.index')->with(['data' => $this->user->get()]);
    }

    public function add()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email',
            'password' => 'required|string',
            'house_number' => 'required|int',
            'street' => 'required|string',
            'city' => 'required|string',
            'country_code' => new Uppercase,
        ]);

        $user = new $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($validated['password']);
        $user->save();

        $userAddress = new $this->userAddress;
        $userAddress->user_id = $user->id;
        $userAddress->house_number = $request->house_number;
        $userAddress->street = $request->street;
        $userAddress->city = $request->city;
        $userAddress->country_code = $request->country_code;
        $userAddress->save();

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show')->with([
            'data' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with([
            // 'data' => $this->user->first(),
            'data' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {

        // Validation
        $validated = $request->validate([
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email',
            'password' => 'required|string',
            'house_number' => 'required|int',
            'street' => 'required|string',
            'city' => 'required|string',
            'country_code' => new Uppercase,
        ]);

        // $user = $user->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($validated['password']);
        $user->save();

        $userAddresses = $this->userAddress->where('user_id', $user->id)->first();
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
