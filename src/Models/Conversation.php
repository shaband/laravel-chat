<?php

namespace Abdulrahman\GenericChat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Eloquent
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all of the participants for the Conversation
     *
     * @return HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
