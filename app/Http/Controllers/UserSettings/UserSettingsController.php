<?php

namespace App\Http\Controllers\UserSettings;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AcceptService\AcceptService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    // метод создания запроса на подтверждение
    public function edit(string $id, Request $request): JsonResponse
    {
        $acceptServiceId = $request->input('service');
        $userSettingsParams = $request->except('service');
        try {
            AcceptService::add($acceptServiceId, $id, $userSettingsParams);
        } catch (\Exception $exception) {
            abort(500, 'Проблема с сервисом ' . $exception->getMessage());
        }
        return response()->json(200);
    }

    // метод принятия подтверждения
    public function accept(string $id): JsonResponse
    {
        $acceptRequest=\App\Models\Accept\Request::query()->findOrFail($id);
        $acceptRequest->user()->update(['params'=>$acceptRequest->params]);
        return response()->json(200);
    }
}
