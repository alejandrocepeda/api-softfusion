<?php

namespace Tests\Feature;

use App\Email;
use Tests\TestCase;

class EmailsTemplateEmailTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/emails-templates/';
    protected $table = 'emails';

    /**
     * A basic test example.
     */
    public function test_list_emails_templates_email()
    {
        $data     = factory(Email::class)->create();
        $response = $this->get($this->url.$data->email_template_id.'/emails', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
