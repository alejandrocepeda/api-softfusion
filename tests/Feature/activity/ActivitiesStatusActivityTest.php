<?php

namespace Tests\Feature;

use App\Activity;
use Tests\TestCase;

class ActivitiesStatusActivityTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/activities-statuses/';
    protected $table = 'activities';

    /**
     * A basic test example.
     */
    public function test_list_activities_status_activity()
    {
        $data     = factory(Activity::class)->create();
        $response = $this->get($this->url.$data->activity_status_id.'/activities', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
