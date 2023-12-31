<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MenuTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Menu::class)
            ->assertStatus(200);
    }
}
