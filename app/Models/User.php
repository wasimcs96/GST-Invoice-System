<?php

namespace App\Models;

use App\Models\Method\RoleMethod;
use App\Models\Method\UserMethod;
use App\Traits\CompanyUserTrait;
use App\Traits\HasAddresses;
use Laravel\Passport\HasApiTokens;
use App\Traits\ApiTokens;
use App\Traits\UUIDTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{ 
    use Notifiable, HasRoles,UserMethod;
    use UUIDTrait;
    use HasAddresses;
    use HasApiTokens;
    use CompanyUserTrait;
    use UserMethod;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'first_name',
        'last_name',
        'state_id',
        'email',
        'email_verified_at',
        'password',
        'telephone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    /**
     * Define Relation with UserSetting Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function settings()
    {
        return $this->hasMany(UserSetting::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class,'id','owner_id');
    }

    /**
     * Get User Specified setting
     *
     * @param string $key
     * 
     * @return mixed
     */
    public function getSetting($key)
    {
        return UserSetting::getSetting($key, $this->id);
    }

    /**
     * Set User Specified setting
     *
     * @param string $key
     * @param string $value
     * 
     * @return void
     */
    public function setSetting($key, $value)
    {
        return UserSetting::setSetting($key, $value, $this->id);
    }

    /**
     * Get Full Name Attribute
     * 
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Return Default User Avatar Url
     * 
     * @return string (url)
     */
    public function getDefaultAvatar()
    {
        return asset('assets/images/avatar/user.png');
    }

    /**
     * Get User's Avatar Url || Default Avatar
     * 
     * @return string (url)
     */
    public function getAvatarAttribute()
    {
        $avatar = $this->getSetting('avatar');
        return $avatar ? asset($avatar) : $this->getDefaultAvatar();
    }
}
