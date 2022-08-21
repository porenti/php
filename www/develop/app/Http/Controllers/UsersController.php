<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Gender;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

//use Illuminate\Support\Arr;

class UsersController extends Controller
{

    public function __construct()
    {
        $genders = Gender::pluck('short_name', 'id')->toArray();

        View::share('genders', $genders);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        SEOMeta::setTitle('Пользователи');

        $frd = $request->all();

        $users = User::query()
            ->with([
                'gender'
            ])
            ->filter($frd)
            ->filterHide()
            ->orderByDesc('id')
            ->paginate(25);

        //dd($users->total());
        return view('users', compact('frd', 'users'));
    }

    public function swapPasswordPage(Request $request, User $user)
    {
      //dd($request);
      return view('users.swap-password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
      $frd = $request['password'];
      $user->setPassword(Hash::make($frd));
      $user->save();
      return view('show', compact('user'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @deprecated
     */
    public function search(Request $request)
    {
        $data = $request->only(['fio', 'age', 'gender']);
        $full_name = explode(" ", $data['fio']);

        $l_name = $full_name[0];
        $f_name = $full_name[1];
        $m_name = $full_name[2];
        $age = $data['age'];
        $gender = $data['gender'];
        $users = User::where(function ($query) use ($l_name, $f_name, $m_name, $age, $gender) {
            $query->orWhere('first_name', $f_name)
                ->orWhere('last_name', $l_name)
                ->orWhere('middle_name', $m_name)
                ->where('age', $age)
                ->where('gender_id', $gender);

        })->get();
        //var_dump($users);
        return view('users', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        SEOMeta::setTitle('Создание пользователя');

        return view('users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $frd = $request->validate([
            'nickname' => 'required',
            'gender_id' => 'required',
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
        $user->setGenderId($frd['gender_id']);
        $user->setAge($frd['age']);
        $user->setLastName($frd['last_name']);
        $user->setFirstName($frd['first_name']);
        $user->setMiddleName($frd['middle_name']);
        $user->setDescription($frd['description']);
        $user->setEmail($frd['email']);
        $user->setPassword(Hash::make($frd['password']));
        $user->setHide(false);


        $user->save();

        return redirect()->route('users.show', $user);
    }


    public function rolesEdit(User $user)
    {
        $roles = Role::query()
            ->select([
                'name', 'id', 'display_name'
            ])
            ->get();


        return \view('users.roles-edit', compact('roles', 'user'));
    }

    public function rolesUpdate(Request $request, User $user)
    {

        $roles = $request->input('roles');

        $user->roles()->sync($roles);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        SEOMeta::setTitle('Просмотр - ' . $user->getNickname());

        return view('show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        SEOMeta::setTitle('Редактирование - ' . $user->getNickname());
<<<<<<< Updated upstream

        return view('users.edit', compact('user'));
=======
        $image = $user->getImages()->last();

        return view('users.edit', compact('user', 'image'));
>>>>>>> Stashed changes
    }

    public function hide($id)
    {
<<<<<<< Updated upstream
        $users = User::where('id', $id)->get();
        //var_dump($user);
        foreach ($users as $user) {
            $user->hidden();
        }
        //return get_class($user);
=======
        $user->hidden();
>>>>>>> Stashed changes
        return redirect()->route('users.index');
    }

    /**
     * Update the specifed resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /*dd($request->only(['nickname','first_name','last_name',
                                      'middle_name','gender_id','description',
                                      'email','age']));*/
        /*$frd = $request->only(['nickname','first_name','last_name',
                                      'middle_name','gender_id','description',
                                      'email','age']);
                                          */
        $frd = $request->validate([
            'nickname' => 'required',
            'gender_id' => 'required',
            'age' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'description' => 'required',
            'email' => 'required',
        ]);


        $user->setNickname($frd['nickname']);
        $user->setGenderId($frd['gender_id']);
        $user->setAge($frd['age']);
        $user->setLastName($frd['last_name']);
        $user->setFirstName($frd['first_name']);
        $user->setMiddleName($frd['middle_name']);
        $user->setDescription($frd['description']);
        $user->setEmail($frd['email']);
        $user->setHide(false);


        $user->save();
        //все работало, просто редиректило на страницу не давая изменений и соответсвенно новые данные только на эту страницу не прилетали, а на остальном сайте работали
        return view("show", compact('user'));
        //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
