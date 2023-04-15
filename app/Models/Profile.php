<?php

namespace App\Models;

use App\Enums\ProfileRoleEnum;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model implements Authenticatable
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'role' => ProfileRoleEnum::class
    ];

    // Implement the required methods from Authenticatable contract
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // Do nothing
    }

    public function getRememberTokenName()
    {
        return null;
    }
}
