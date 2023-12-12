<?php

namespace Tests\Feature\Livewire\Global;

use App\Livewire\Global\Button;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ButtonTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Button::class)
            ->assertStatus(200);
    }
}
