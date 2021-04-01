<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'is_active'
    ];

    /**
     * Get the record associated with the group.
     */
    public function users()
    {
        return $this->hasMany('App\User')->where('is_active', true);
    }

    /**
     * Get the group.
     * 
     * @param int $id
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getGroup(int $id)
    {
        $data = parent::where(
            [
                "groups.id" => $id,
                'groups.is_active' => true
            ]
        )
            ->first();

        return $data;
    }

    /**
     * Get all groups.
     * 
     * @param bool $isActive
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        $data = parent::where(
            [
                'groups.is_active' => true
            ]
        )->get();

        return $data;
    }

    /**
     * Checks if data exists or not.
     * 
     * @param string $groupName
     * @return bool
     */
    public static function exists(string $groupName): bool
    {
        return parent::where(
            [
                'name' => $groupName,
                'is_active' => true
            ]
        )->exists();
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
        return $this->getGroup($value);
    }
}
