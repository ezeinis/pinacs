<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Sentinel;
use App\RoleUser;
use App\Role;
use App\Assign;
use App\ClassYear;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()

    {
        return $this->belongsToMany(Role::class,'role_users','user_id','role_id');
    }

    public function classes()
    {
        return $this->belongsToMany(ClassYear::class,'assigns','user_id','class_year_id');
    }

      public function scopeFilteredUsers($query, $filters)
    {
        if (isset($filters['search_term']) && strlen($filters['search_term']) > 1) {
            $query->where(function ($query) use ($filters) {
                $search_term_str = '%'.implode("%", explode(" ", $filters['search_term'])).'%';
                $query->where('email', 'like', $search_term_str)
                    ->orWhere('first_name', 'like', $search_term_str)
                    ->orWhere('last_name', 'like', $search_term_str);
            });
        }

        if (isset($filters['role']) && ($filters['role'] != "any")) {
            $roles[0] = $filters['role'];
            $query->whereHas('roles', function ($query) use ($roles) {
                $query->whereIn('id', $roles);
            });
        }

        if (isset($filters['status']) && (is_numeric($filters['status']))) {

            if ($filters['status'] == 1) {
                //active
                $query->whereHas("activation", function($q) {
                      $q->where('completed', 1);
                    }, '=', 1);
            } else {
                //inactive
                $query->whereHas("activation", function($q) {
                      $q->where('completed', 1);
                    }, '<>', 1);
            }

            /*
            $query->join('activations', function ($query) use ($filters) {
                $query->on('users.id', '=', 'activations.user_id');
                if ($filters['status'] == 1) {
                    $query->where('activations.completed', '=', 1);
                } else {
                    $query->where('activations.completed', '<>', 1);
                }

            });
            */

            //$query->select('users.id','users.first_name','users.last_name','users.email','users.created_at','activations.completed as activation_completed', 'activations.completed_at as activation_completed_at')->with(['activation']);
        } else {
           // $query->select('users.id','users.first_name','users.last_name','users.email','users.created_at')->with(['activation']);
        }

        /*
        if (isset($filters['ac_status']) && (is_numeric($filters['ac_status']))) {
            $query->whereHas('accounts', function ($query) use ($filters) {
                $query->where('ac_status', '=', $filters['ac_status']);
            });
        }
        */

        $query->select('users.id','users.first_name','users.last_name','users.email','users.created_at')->with(['activation']);

        if (isset($filters['take']) && is_numeric($filters['take'])) {
            $query->take($filters['take']);
        }

        if (isset($filters['skip'])) {
            $query->skip($filters['skip']);
        }

        if (isset($filters['sort']) && isset($filters['sort_direction'])) {
            $query->orderBy($filters['sort'], $filters['sort_direction']);
        }

        return $query;
    }
}

