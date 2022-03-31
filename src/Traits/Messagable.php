<?php

namespace Abdulrahman\GenericChat\Traits;

use Abdulrahman\GenericChat\Models\{Message, Participant};
use Illuminate\Database\Eloquent\Relations\{MorphMany, MorphToMany};


trait Messagable
{
    /**
     * Get all of the message for the participant.
     *
     * @return MorphMany
     */
    public function messages(): MorphMany
    {
        return $this->MorphMany(Message::class, 'person');
    }

    /**
     * Participants relationship.
     *
     * @return MorphMany
     *
     */
    public function participants(): MorphMany
    {
        return $this->morphMany(Participant::class, 'person');
    }

    /**
     * Conversation relationship.
     *
     * @return MorphToMany
     *
     * @codeCoverageIgnore
     */
    public function conversations(): MorphToMany
    {
        return $this
            ->morphToMany(
                (Conversation::class),
                Models::table('participants'),
                'user_id',
                'thread_id'
            )
            ->whereNull(Models::table('participants') . '.deleted_at')
            ->withTimestamps();
    }
}
