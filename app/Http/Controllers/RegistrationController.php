<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    protected $user;
    protected $userAddress;

    public function __construct(User $user, UserAddress $userAddress)
    {
        $this->user = $user;
        $this->userAddress = $userAddress;
    }

    public function register()
    {
        return view('auth.registration');
    }

    public function store(Request $request, User $user)
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

        // if ($request->hasFile('image')) {
        //     $destination_path = 'public/images/profile';
        //     $image = $request->file('image');
        //     $image_name = $image->getClientOriginalName();
        //     $path = $request->file('image')->storeAs($destination_path, $image_name);

        //     $input['image'] = $image_name;
        // }
        $user = $request->all();
        $user = new $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($validated['password']);
        // $input = $request->all();
        $fileName = time() . '-' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $user['image'] = '/storage/' . $path;
        $user->save();

        $userAddress = new $this->userAddress;
        $userAddress->user_id = $user->id;
        $userAddress->house_number = $request->house_number;
        $userAddress->street = $request->street;
        $userAddress->city = $request->city;
        $userAddress->country_code = $request->country_code;
        $userAddress->save();



        return redirect()->route('auth.index');
    }
}
