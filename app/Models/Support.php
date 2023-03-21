<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $table = 'supports';

    protected $fillable = ['user_id', 'lesson_id', 'status', 'description'];

    public $statusOptions = [
        'P' => 'Pendente, aguardando Professor',
        'A' => 'Aguardando aluno',
        'C' => 'Concluido/Finalizado',
    ];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ReplySupport::class);
    }
}
