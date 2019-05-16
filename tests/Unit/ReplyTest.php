<?php

namespace Tests\Unit;

use App\Http\Controllers\ReplyController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    public function testReplyControllerExists(): void{
        $this -> assertTrue(
            class_exists("ReplyController.php")
        );
    }

    public function testConstructExists(): void{
        $this->assertTrue(
          method_exists(ReplyController::class, "__construct")
        );
    }

    public function testStoreExists(): void{
        $this->assertTrue(
          method_exists(ReplyController::class, "store")
        );
    }

    public function testShowExists(): void{
        $this->assertTrue(
            method_exists(ReplyController::class, "show")
        );
    }

    public function testEditExists(): void{
        $this->assertTrue(
            method_exists(ReplyController::class, "edit")
        );
    }

    public function testUpdateExists(): void{
        $this->assertTrue(
            method_exists(ReplyController::class, "update")
        );
    }

    public function testDestroyExists(): void{
        $this->assertTrue(
            method_exists(ReplyController::class, "destroy")
        );
    }

}
