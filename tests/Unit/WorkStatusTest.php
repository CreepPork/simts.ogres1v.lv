<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WorkStatusTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function work_status_can_be_created()
    {
        $status = $this->create('App\WorkStatus');

        $this->assertDatabaseHas('work_statuses', [
            'id' => $status->id,
            'status' => $status->status
        ]);
    }
}
