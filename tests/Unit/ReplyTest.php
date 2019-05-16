<?php

namespace Tests\Unit;

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

    
}
