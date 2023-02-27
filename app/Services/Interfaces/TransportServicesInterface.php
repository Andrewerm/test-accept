<?php

namespace App\Services\Interfaces;

interface TransportServicesInterface
{
    static public function makeRequest(int $id, array $userSettingsParams):array;

}
