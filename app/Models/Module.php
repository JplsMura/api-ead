<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Module extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $table = 'modules';

    protected $fillable = ['name'];

    // Relations
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
