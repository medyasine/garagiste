<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'username',
        'password',
        'address',
        'phoneNumber',
        'isClt',
        'isMecan',
        'isAdmine'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function setPasswordAttribute($value)
    {
        $this->attribute['password'] = bcrypt($value);
    }
}
