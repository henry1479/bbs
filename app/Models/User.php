<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Bb;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    // один пользователь может иметь много объявлений
    public function bbs() {
        return $this->hasMany(Bb::class);
    }
    // один пользователь может иметь один аккаунт
    public function account() {
        return $this->hasOne(Account::class);
    }

    // собственный метод модели
    // его можно вызвать у любого объекта модели

    public function getNameAndEmail()
    {
        return "{$this->name} ({$this->email})";
    }

    // преобразователи
    // вызов $user->name

    public function name() : Attribute
    {
        return Attribute::make(
        //акцессор - получает данные из таблицы и преобразует их
        get: fn($value) => ucfirst($value),
        // мутатор - преобразует данные перед сохранением в таблицу
        set: fn($value) => strtolower($value)
        )->shouldCache();
    }

    



}
