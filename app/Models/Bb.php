<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Offer;
use Mockery\Exception\RuntimeException;

use function PHPUnit\Framework\isNan;

class Bb extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "bbs";

    protected $fillable = [
        "title",
        "content",
        "price",
        "adress",
        "rubric_id",
        "user_id",
        "state",
    ];
    // помечаем как исправленные запсиси первичной таблицы,
    // если правятся или удаляются запсиси этой таблицы
    protected $touches = [
        "rubric"
    ];

    protected $casts = [
        "content" => AsStringable::class,
        "price" => "integer",
        "created_at" => "datetime:Y-m-d",
        "updtated_at" => "datetime: Y-m-d",
        "state" => "array"
    ];

    // с получением значения по умолчанию в случае,
    // если запись вторичной модели не связана с записью первичной модели
    public function user() {
        return $this->belongsTo(User::class)->withDefault(function ($user, $bb) {
            $user->name = "guest." . config("app.name");
        });
    }

    // полное определение со всеми внешними ключами и классами
    // объявление может иметь только одну рубрику

    public function rubric() {
        return $this->belongsTo(Rubric::class, "rubric_id", "id");
    }

    // связь один ко многим с предложениями
    // одно объявление может иметь очень много предложений
    public function offers() {
        return $this->hasMany(Offer::class);
    }

    public function state() : Attribute
    {
        return Attribute::make(
        get: fn($value) => json_decode($value),
        set: fn($value) => (!is_null($value))? json_encode($value):throw new RuntimeException("Содержание отсутствует"))
            ->shouldCache();
    }
}
