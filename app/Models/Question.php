<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'question_key',
        'question_english',
        'question_indonesia',
        'level_id',
        'type_id',
        'created_by',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
