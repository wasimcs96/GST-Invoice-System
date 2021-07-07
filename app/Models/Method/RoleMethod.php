<?php

namespace App\Models\Method;

/**
 * Trait RoleMethod.
 */
trait RoleMethod
{
    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->name == "admin";
    }
    public function isSuperAdmin()
    {
        return $this->name == "super_admin";
    }
    public function isStaff()
    {
        return $this->name == "staff";
    }
    public function isCA()
    {
        return $this->name == "ca";
    }
    public function isBusinessman ()
    {
        return $this->name == "businessman";
    }
}
