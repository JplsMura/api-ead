<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $table = 'courses';

    protected $fillable = ['name', 'description', 'image'];

    // Relations
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
