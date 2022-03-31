<?php

namespace Abdulrahman\GenericChat\Models\Concerns\Traits;

use Abdulrahman\GenericChat\Models\Message;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasMessages
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
}
