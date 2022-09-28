<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'pin',
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
     * Relationship with wallet.
     *
     * @return relationship
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url', 'identity_card_image_url'];

    /**
     * Get the image url.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/images/users/' . $this->image);
    }

    /**
     * Get the identity card image url.
     *
     * @return string
     */
    public function getIdentityCardImageUrlAttribute()
    {
        return asset('storage/images/identity_cards/' . $this->identity_card_image);
    }
}
