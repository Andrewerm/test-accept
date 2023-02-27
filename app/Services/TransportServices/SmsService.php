<?php

namespace App\Services\TransportServices;

use App\Services\Interfaces\TransportServicesInterface;

class SmsService implements TransportServicesInterface
{

    public static function makeRequest(int $id, array $userSettingsParams): array
    {
        // TODO: Implement makeRequest() method.
        return ['status'=>'ok'];
    }
}
