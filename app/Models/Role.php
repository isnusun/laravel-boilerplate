<?php

namespace App\Models;

use App\Models\Traits\HtmlElements;
use Zizaco\Entrust\EntrustRole;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read string $action_buttons
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends EntrustRole
{

    use HtmlElements;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
            'display_name',
            'description',
        ];

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        $buttons = $this->getEditButtonHtml('admin.role.edit')
            .$this->getDeleteButtonHtml('admin.role.destroy');

        return $buttons;
    }

    public function __toString()
    {
        return $this->display_name;
    }
}