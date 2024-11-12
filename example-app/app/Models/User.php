<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; //gmail
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class User extends Authenticatable // تعديل هنا
{
    use HasFactory, Notifiable, Searchable ;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', //تأكد من إخفاء كلمة المرور
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function productFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function favs()
    {
        return $this->hasMany(Fav::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    #[SearshUsingPrefix(['status'])]
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,

        ];   
    }
}
