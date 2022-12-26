<?php


namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use App\Models\Feature;

class FeatureEditedEvent
{
    use Dispatchable, SerializesModels;

    public $feature;
    public $message;
    public $objectType;
    public $objectId;

    /**
     * ProductEvent constructor.
     * @param Feature $Feature
     */
    public function __construct(Feature $feature)
    {
        $this->feature = $feature;
        $this->message = 'updated';
        if ($feature->wasChanged('active')) {
            $status = $feature->active ? 'active' : 'disabled';
            $this->message = 'changed_status_to_' . $status;
        }

        $this->objectType = get_class($feature);
        $this->objectId = $feature->id;
    }


}
