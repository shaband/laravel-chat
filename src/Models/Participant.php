<?php

namespace Abdulrahman\GenericChat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Participant extends Eloquent
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['conversation_id', 'person_id', 'person_type', 'last_read'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_read' => 'datetime:Y-m-d H:i',
    ];

    /**
     * Get the person record associated with the participant.
     * @return MorphTo
     */
    public function person()
    {
        return $this->morphTo();
    }

    /**
     * Get the conversation that owns the Participant
     *
     * @return BelongsTo
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'foreign_key', 'other_key');
    }
}
