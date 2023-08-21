<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
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
