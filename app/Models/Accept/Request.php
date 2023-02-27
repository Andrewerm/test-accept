<?php

namespace App\Models\Accept;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts=['params'=>'array'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
