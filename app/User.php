<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'email', 'password', 'is_active', 'role', 'bday', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'bday',
    ];

    /**
     * Get all users.
     * 
     * @param bool $isActive
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getAll($isActive = true)
    {
        $data = parent::where(
            [
                'is_active' => $isActive
            ]
        )
            ->get();

        return $data;
    }

    /**
     * Get user by id.
     * 
     * @param int $id
     * @param bool $isActive
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getById(int $id, $isActive = true)
    {
        $data = parent::where(
            [
                'id' => $id,
                'is_active' => $isActive
            ]
        )
            ->firstOrFail();

        return $data;
    }

    /**
     * Get user by email.
     * 
     * @param string $email
     * @param bool $isActive
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getUserByEmail(string $email, $isActive = true)
    {
        $data = parent::where(
            [
                'email' => $email,
                'is_active' => $isActive
            ]
        )
            ->first();

        return $data;
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->getById($value);
    }
}
