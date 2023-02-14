<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Offer;
use App\Models\Bb;

class Rubric extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "rubrics";

    protected $fillable = ["title","parent_id"];

    // одна рубрика может содержать очень много объявлений
    public function bbs()
    {
        return $this->hasMany(Bb::class, "rubric_id", "id");
    }

    // связь один к одному из многих
    // получение самого свежего объявления

    public function latestBb() {
        return $this->hasOne(Bb::class)->oldestOfMany();
    }

    // получение самого свежего объявления с самой дешевой ценой за последний месяц

    public function latestMinPriceBbOnLastMonth()
    {
        return $this->hasOne(Bb::class)->ofMany(
            ["price" => "MIN", "created_at" => "MAX"],
            function ($query) {
                $query->whereMonth("created_at", now()->month);
            }
        );
    }

    // связь один ко многим через(сквозная)

    public function offers()
    {
        return $this->hasManyThrough(Offer::class, Bb::class);
    }

    // реализация связи один ко многоим в рамках одной таблицы
    // пристутствует родительские рубрики и просто рубрики
    // в родительских рубриках поле parent_id это null

    public function rubtics()
    {
        return $this->hasMany(self::class, "parent_id");
    }


    // объявление с родиетльской рубрикой принадлежит только ему
    public function parent()
    {
        return $this->belongsTo(self::class, "parent_id");
    }

    // виртуальное, вычисляемое программными средствами,  поле - содержит только один акцессор
    // получение полного имени рубрики вместе с родительской, если таковая присутствует

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ($this->parent) ? "{$this->parent->title} - {$this->title}" : "{$this->title}"
        );
    }


}
