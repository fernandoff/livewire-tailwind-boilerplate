<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Header;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HeaderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Header::class)
            ->assertStatus(200);
    }
}
