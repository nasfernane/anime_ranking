<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimeTest extends TestCase
{
    
    public function test_indexWorkingCorrectly()
    {
        $response = $this->get('/');

        $response->assertSeeText('AniManiacs');
        $response->assertSeeText('Le top');
        $response->assertStatus(200);
    }

    
}
