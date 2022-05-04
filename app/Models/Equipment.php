<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $type_id
 * @property int $number
 * @property string $note
 *
 * @mixin Eloquent
 */

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'number',
        'note',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
