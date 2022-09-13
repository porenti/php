<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Interfaces\Images\Imagable;
use App\Models\Images\Image;
use App\Models\Shop\Cart;
use App\Models\Shop\Order;
use App\Traits\Relations\Images\HasImages;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $nickname
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property int $gender_id
 * @property string $description
 * @property int $age
 * @property bool $hide
 * @property string|null $hide_time
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Gender $gender
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User filter(array $frd)
 * @method static Builder|User filterFio(string $fioString)
 * @method static Builder|User filterHide()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User orWherePermissionIs($permission = '')
 * @method static Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static Builder|User query()
 * @method static Builder|User whereAge($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDescription($value)
 * @method static Builder|User whereDoesntHavePermission()
 * @method static Builder|User whereDoesntHaveRole()
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereGenderId($value)
 * @method static Builder|User whereHide($value)
 * @method static Builder|User whereHideTime($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereMiddleName($value)
 * @method static Builder|User whereNickname($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $image
 * @property-read int|null $image_count
 * @property string $phone
 * @property int|null $address_id
 * @property-read \Illuminate\Database\Eloquent\Collection|Cart[] $carts
 * @property-read int|null $carts_count
 * @method static Builder|User whereAddressId($value)
 * @method static Builder|User wherePhone($value)
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 */
class User extends Authenticatable implements Imagable, FilamentUser, HasName
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
    use HasImages;

    /**
     * The attributes that are mass assignable.
     *
     * ЧТО ПОЛУЧАТЬ
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'first_name',
        'last_name',
        'middle_name',
        'gender_id',
        'description',
        'email',
        'hide',
        'phone',
        'hide_time',
        'password',
        'age',
        'address_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * ЧТО НЕ ПОЛУЧАТЬ
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
     *
     *КАК ПОЛУЧАТЬ?
     * @kozlov: теперь, вместо 1 и 0, будут приходить true, false у hide
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'hide' => 'boolean',
    ];


    /**
     * @return BelongsTo
     * @kozlov: всегда указываем возвращаемый тип, php не такой нетипизированный
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }


    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function getCart(): Cart {
        return $this->carts;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function getOrders(): Collection|Order
    {
        return $this->order;
    }

    /**
     * @return Gender
     */
    public function getGender(): Gender
    {
        return $this->gender;
    }

    /**
     * @return int|null
     */
    public function getAddressId(): ?int
    {
        return $this->address_id;
    }

    /**
     * @param int|null $address_id
     */
    public function setAddressId(?int $address_id): void
    {
        $this->address_id = $address_id;
    }

    public function checkOrder(): bool
    {
        $result = false;
        if ($this->orders()->count() !== 0)
        {
            $result = true;
        }
        return $result;
    }

    /**
     * @return string|null
     */
    public function getGenderShortName(): ?string
    {
        return $this->getGender()?->short_name;
    }

    public function getGenderName(): ?string
    {
        return $this->getGender()?->name;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }


    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param bool $hide
     */
    public function setHide(bool $hide): void
    {
        $this->hide = $hide;
    }


    /**
     * @param int $gender_id
     */
    public function setGenderId(int $gender_id): void
    {
        $this->gender_id = $gender_id;
    }

    /**
     * @return int
     */
    public function getGenderId(): int
    {
        return $this->gender_id;
    }


    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }


    /**
     * @return mixed
     * Нмикогда так не называем функции, ТОЛЬКО camelCase
     */
    public function getFirstName()
    {
        return $this->first_name;
    }


    public function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
    }

    public function getMiddleName(): string
    {
        return $this->middle_name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    } //защищенность - это мое второе имя, первое - плохая

    public function getPassword()
    {
        return $this->password;
    }

    public function hidden()
    {
        $this->hide = true;
        $this->hide_time = now();
        $this->save();
    }

    /**
     * @param Builder $query
     * @param string $fioString
     * @return Builder
     */
    public function scopeFilterFio(Builder $query, string $fioString): Builder
    {

        $names = explode(' ', $fioString);

        foreach ($names as $nameValue) {

            $query->where(static function (Builder $query) use ($nameValue): Builder {
                return $query
                    ->orWhere('first_name', 'like', '%' . $nameValue . '%')
                    ->orWhere('last_name', 'like', '%' . $nameValue . '%')
                    ->orWhere('middle_name', 'like', '%' . $nameValue . '%');

            });
        }

        return $query;
    }

    public function scopeFilterHide(Builder $query): Builder
    {
        return $query->where('hide', false);
    }

    /**
     * @param Builder|User $query
     * @param array $frd
     * @return Builder
     *
     * @kozlov: вместо нового метода в контроллере, нужно просто использовать 1 функцию
     */
    public function scopeFilter(Builder $query, array $frd): Builder
    {


        foreach ($frd as $key => $value) {
            if (null == $value) {
                continue;
            }

            switch ($key) {
                case 'age':
                    {

                        $query->where('age', $value);
                    }
                    break;
                case 'fio':
                    {
                        $query->filterFio($value);
                    }
                    break;
                case 'gender':
                    {
                        $query->where('gender_id', $value);
                    }
                    break;
            }

        }


        return $query;
    }

    /**
     * @return string
     */
    public function getPathForImages(): string
    {
        return 'users/' . $this->getKey() . '/images';
    }

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return $this->getNickname();
    }
}
