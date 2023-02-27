<?php

namespace Tests\Feature\Accept;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AcceptTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->artisan('db:seed');
        // alternatively you can call
        // $this->seed();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_change()
    {
        // запрос к сервису на изменения данных с проверкой через Телеграмм, Id пользователя 1
        $response = $this->post(route('change', ['id' => 1,
            'service' => 'telegram',
            'param1' => 1,
            'param2' => 2
        ]));

        $response->assertOk();

        // Сервис (Телеграмм или любой другой) подтверждает запрос в параметре Id запроса (не пользователя!)
        $response = $this->post(route('accept', '1'));
        $response->assertOk();

        // параметры пользователя изменились
        $this->assertDatabaseHas('users', [
            'params' => '{"param1":"1","param2":"2"}'
        ]);
    }

}
