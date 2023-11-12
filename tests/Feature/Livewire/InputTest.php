<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Input;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class InputTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Input::class)
            ->assertStatus(200);
    }
}
