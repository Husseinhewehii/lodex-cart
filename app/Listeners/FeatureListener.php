<?php

namespace App\Listeners;

use App\Events\FeatureEditedEvent;
use App\Http\Services\LogsService;

class FeatureListener
{

    protected $logsService;

    public function __construct(LogsService $logsService)
    {
        $this->logsService = $logsService;
    }

    /**
     * @param FeatureEditedEvent $event
     */
    public function handleEditedFeature(FeatureEditedEvent $event)
    {
        $this->logsService->fillLog($event->objectId, $event->objectType, $event->message);
    }

}
