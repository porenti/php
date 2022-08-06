<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
      if ($page == 1)
      {
        $count = 0;
      } else {
        $count = ($page-1)*25;
      } //возможно это костыль, но мне нравится
        $valuePages = ceil(User::get()->count()/25);
        $users = User::where('id','>',$count)->paginate(25);
        return view('users', compact('users','valuePages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $frd = $request->validate([
        'nickname' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'last_name' => 'required',
        'first_name' => 'required',
        'middle_name' => 'required',
        'description' => 'required',
        'email' => 'required',
        'password' => 'required',
      ]);
      $user = new User();
      $user->setNickname($frd['nickname']);
      $user->setGender($frd['gender']);
      $user->setAge($frd['age']);
      $user->setLast_name($frd['last_name']);
      $user->setFirst_name($frd['first_name']);
      $user->setMiddle_name($frd['middle_name']);
      $user->setDescription($frd['description']);
      $user->setEmail($frd['email']);
      $user->setPassword($frd['password']);
      /*User::create($request->only(['nickname','first_name','last_name',
                                    'middle_name','gender','description',
                                    'email','password','age']));
      */
      $user->save();
      return redirect()->route('users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("form", compact("user"));
    }

    /**
     * Update the specifed resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    { //пусть стандартный будет как пример висеть
        $user->update($request->only(['nickname','first_name','last_name',
                                      'middle_name','gender','description',
                                      'email','password','age']));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
