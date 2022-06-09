<?php

namespace Tests\Feature;

use Tests\TestCase;

class CandidatosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertRedirect('/candidatos');
    }
}
