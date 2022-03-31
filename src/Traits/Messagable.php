<?php

namespace Abdulrahman\GenericChat\Traits;

use Abdulrahman\GenericChat\Models\{Conversation, Message, Participant};
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
     */
    public function participants(): MorphMany
    {
        return $this->morphMany(Participant::class, 'person');
    }

    /**
     * Get all of the conversations for the person.
     *
     * @return MorphToMany
     */
    public function conversations(): MorphToMany
    {
        return $this->morphToMany(Conversation::class, 'conversationable', 'conversationables', 'conversationable_id', 'conversation_id');
    }
}
