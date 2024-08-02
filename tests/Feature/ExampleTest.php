<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function it_checks_example_functionality()
    {
        $response = $this->get('/appPrueba');
        $response->assertStatus(200);
        $response->assertSee('Laravel');
    }
}
