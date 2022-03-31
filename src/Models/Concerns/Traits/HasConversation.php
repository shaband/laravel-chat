<?php

namespace Abdulrahman\GenericChat\Models\Concerns\Traits;

use Abdulrahman\GenericChat\Models\Participant;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasConversation
{
    /**
     * Get all of the participants for the participant.
     *
     * @return MorphMany
     */
    public function participants(): MorphMany
    {
        return $this->MorphMany(Participant::class, 'person');
    }
}
