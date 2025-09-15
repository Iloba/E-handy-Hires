<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\Experience;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'role',
        'password',
        'age',
        'phone_number',
        'address',
        'disability',
        'gender',
        'identification',
        'photo',
        'occupation',
        'approved',
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

    public function hasUpdatedBioData(){
        return !empty($this->identification);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function experiences(){
        return $this->hasMany(Experience::class);
    }
}
