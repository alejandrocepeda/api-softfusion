<?php

namespace Tests\Feature;

use App\ActivitiesHistory;
use Tests\TestCase;

class ActivitiesStatusActivityHistoryTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/activities-statuses/';
    protected $table = 'activities_histories';

    /**
     * A basic test example.
     */
    public function test_list_activities_status_activities_history()
    {
        $data     = factory(ActivitiesHistory::class)->create();
        $response = $this->get($this->url.$data->activity_status_id.'/activities-histories', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
