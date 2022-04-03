<?php

namespace App\Models;

use App\Value\Owner;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function owner(): Attribute
    {
        return (new Attribute(
            get: fn ($value, array $attributes) => new Owner(
                name: $attributes["owner_name"],
                age: $attributes["owner_age"]
            ),
            set: fn (Owner $owner) => [
                "owner_name" => $owner->getName(),
                "owner_age" => $owner->getAge()
            ]
        ));
    }
}
