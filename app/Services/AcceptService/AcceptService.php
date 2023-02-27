<?php

namespace App\Services\AcceptService;

use App\Models\Accept\Request;

class AcceptService
{
    /**
     * @throws \Exception
     */
    static public function add(string $acceptServiceId, int $id, array $userSettingsParams)
    {
        $service = null;
        try {
            $service = app($acceptServiceId);
        } catch (\Exception $exception) {
            abort(404, 'Нет такого сервиса ' . $exception->getMessage());
        }
        $serviceResponse = $service::makeRequest($id, $userSettingsParams);

        if ($serviceResponse['status'] === 'ok') {
            Request::query()->create([
                'user_id' => $id,
                'params' => $userSettingsParams
            ]);
        } else throw new \Exception($serviceResponse['message']);


    }

    static public function accept()
    {

    }

}
