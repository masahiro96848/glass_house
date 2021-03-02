<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $user = factory(User::class)->create();

        $result = $user->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $liking = factory(User::class)->create();
        $liked = factory(User::class)->create();
        $liking->liked()->attach($liked);

        $result = $liking->isLikedBy($liked);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        $liking = factory(User::class)->create();
        $liked = factory(User::class)->create();
        $another = factory(User::class)->create();
        $liking->liked()->attach($another);

        $result = $liking->isLikedBy($liked);

        $this->assertFalse($result);
    }
}
