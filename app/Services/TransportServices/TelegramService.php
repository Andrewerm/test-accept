<?php

namespace App\Services\TransportServices;

use App\Services\Interfaces\TransportServicesInterface;

class TelegramService implements TransportServicesInterface
{

    static public function makeRequest(int $id, array $userSettingsParams): array
    {
        // TODO: Implement makeRequest() method.
        return ['status'=>'ok'];
    }
}
