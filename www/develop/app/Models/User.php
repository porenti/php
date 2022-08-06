<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'description',
        'email',
        'password',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNickname($nickname){
      $this->nickname = $nickname;
    }
    public function getNickname(){
      return $this->nickname;
    }

    public function setGender($gender){
      $this->gender = $gender;
    }
    public function getGender(){
      return $this->gender;
    }

    public function setAge($age){
      $this->age = $age;
    }
    public function getAge(){
      return $this->age;
    }

    public function setLast_name($last_name){
      $this->last_name = $last_name;
    }
    public function getLast_name(){
      return $this->last_name;
    }

    public function setFirst_name($first_name){
      $this->first_name = $first_name;
    }
    public function getFirst_name(){
      return $this->first_name;
    }

    public function setMiddle_name($middle_name){
      $this->middle_name = $middle_name;
    }
    public function getMiddle_name(){
      return $this->middle_name;
    }

    public function setDescription($description){
      $this->description = $description;
    }
    public function getDescription(){
      return $this->description;
    }

    public function setEmail($email){
      $this->email = $email;
    }
    public function getEmail(){
      return $this->email;
    }

    public function setPassword($password){
      $this->password = $password;
    } //защищенность - это мое второе имя, первое - плохая
    public function getPassword(){
      return $this->password;
    }
}
