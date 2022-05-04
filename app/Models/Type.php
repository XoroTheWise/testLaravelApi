<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $name
 * @property int $mask
 *
 * @mixin Eloquent
 */

class Type extends Model
{
    use HasFactory;

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class, 'type_id', 'id');
    }
}
