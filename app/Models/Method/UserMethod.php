<?php

namespace App\Models\Method;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    /**
     * @return mixed
     */
    // public function canChangeEmail()
    // {
    //     return config('access.users.change_email');
    // }
    // public function isClient()
    // {
    //     return $this->hasRole("client");
    // }
    // public function isSuperAdmin()
    // {
    //     return $this->hasRole("super_admin");
    // }
    // public function isConsultant()
    // {
    //     return $this->hasRole("consultant");
    // }
    // public function isUniversity()
    // {
    //     return $this->hasRole("university");

    // }
    // public function isSubadmin()
    // {
    //     return $this->hasRole("subadmin");
    // }

    /**
     * @return bool
     */
    // public function canChangePassword()
    // {
    //     return ! app('session')->has(config('access.socialite_session_name'));
    // }

    /**
     * @param bool $size
     *
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    // public function getPicture($size = false)
    // {
    //     switch ($this->avatar_type) {
    //         case 'gravatar':
    //             if (! $size) {
    //                 $size = config('gravatar.default.size');
    //             }

    //             return gravatar()->get($this->email, ['size' => $size]);

    //         case 'storage':
    //             return url('storage/'.$this->avatar_location);
    //     }

    //     $social_avatar = $this->providers()->where('provider', $this->avatar_type)->first();
    //     if ($social_avatar && strlen($social_avatar->avatar)) {
    //         return $social_avatar->avatar;
    //     }

    //     return false;
    // }

    /**
     * @param $provider
     *
     * @return bool
     */
    // public function hasProvider($provider)
    // {
    //     foreach ($this->providers as $p) {
    //         if ($p->provider == $provider) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->hasRole("superadmin");
    }

    /**
     * @return bool
     */
    // public function isActive()
    // {
    //     return $this->active;
    // }

    /**
     * @return bool
     */
    // public function isConfirmed()
    // {
    //     return $this->confirmed;
    // }

    /**
     * @return bool
     */
    // public function isPending()
    // {
    //     return config('access.users.requires_approval') && ! $this->confirmed;
    // }
}
