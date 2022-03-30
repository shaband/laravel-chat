<?php

namespace Abdulrahman\GenericChat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;

class Message extends Eloquent
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id',
        'person_id',
        'person_type',
        'body',
        'attachment',
        'attachment_type',
        'seen_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'seen_at' => 'time',
    ];

    /**
     * storage path of the attachment
     *
     * @var string
     */
    protected $path = 'uploads/messages';

    /**
     * Get the conversation that owns the Message
     *
     * @return BelongsTo
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    /**
     * Get the person record associated with the Message.
     * @return MorphTo
     */
    public function person()
    {
        return $this->morphTo();
    }

    /**
     * Set the attachment attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setAttachmentAttribute($value = null)
    {
        if ($value && $value instanceof UploadedFile) {
            $this->attributes['attachment'] =  $value->store($this->path ?? 'uploads');
            // $this->attributes['attachment_type'] = $value->getClientMimeType();
        }
    }
}
