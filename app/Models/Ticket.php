<?php

namespace App\Models;

use App\Constants\TicketStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\TicketEditedEvent;
use App\Events\TicketDeletedEvent;
use App\Events\TicketCreatedEvent;

class Ticket extends Model
{
    use SoftDeletes;

    public static $autoValidates = true;

    protected $table    = 'tickets';
    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone', 'email', 'description', 'status'];
    protected $appends = ['status_label'];

    public function replies()
    {
        return $this->hasMany(TicketReply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function getStatusLabelAttribute()
    {
        return TicketStatus::getValue($this->status);
    }


    public $dispatchesEvents = [
        'updated' => TicketEditedEvent::class,
        'deleted' => TicketDeletedEvent::class,
        'created' => TicketCreatedEvent::class
    ];


}
