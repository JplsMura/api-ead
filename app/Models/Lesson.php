<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'lessons';

    protected $fillable = ['name', 'url', 'description', 'video'];

    // Relations
    public function modules(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(Views::class)
                    ->where(function ($query) {
                        if (auth()->check()) {
                            return $query->where('user_id', auth()->user()->id);
                        }
                    });
    }
}
