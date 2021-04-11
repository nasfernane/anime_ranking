<?php

namespace Tests\Feature;

use Tests\TestCase;

class TopTest extends TestCase
{
    
    public function test_topListWorkingCorrectly()
    {
        $response = $this->get('/animes/top');

        $response->assertSeeText('Classement des utilisateurs');
        $response->assertStatus(200);
    }
}
