<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
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


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function adminlte_image()
    {
        //return 'https://picsum.photos/300/300';
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function adminlte_desc()
    {
        return $this->roles->first()->name;
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function adminlte_profile_url()
    {
        return 'profile';
    }



    public function configuraciones()
    {
        return $this->hasMany(Configuracion::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }


    public function scopeSearchUser(Builder $query, $text)
    {
        if ($text) {
            $query->where('name', 'LIKE', "%" . $text . "%")
                ->orWhere('email', 'LIKE', "%" . $text . "%");
        }
    }


    public function scopeFilterRole(Builder $query, $role_id)
    {
        if ($role_id) {
            $query->whereHas('roles', function ($roles) use ($role_id) {
                $roles->where('id', $role_id);
            });
        }
    }


    public function scopeFilterStatus(Builder $query, $status){

        if ($status) {

            if ($status == 1) {
                $query->onlyTrashed();
            }else if ($status == 2){
                $query->withTrashed();
            }
        }
    }
}
