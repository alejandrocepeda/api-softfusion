<?php

namespace Tests\Feature;

use App\Attachment;
use Tests\TestCase;

class ActivityAttachmentTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/activities/';
    protected $table = 'attachments';

    /**
     * A basic test example.
     */
    public function test_list_activities_status_activity()
    {
        $data     = factory(Attachment::class)->create();
        $response = $this->get($this->url.$data->activity_id.'/attachments', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
