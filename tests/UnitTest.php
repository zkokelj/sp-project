<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    /** @test */
    public function user_can_be_created(){
      $user = factory(App\User::class)->create();
      echo $user;
      $this->seeInDatabase('users', ['id'=>$user['id'], 'name'=>$user['name'], 'email' =>$user['email']]);
    }

    //TODO
    //testiraj funkcije v modelu
    //naredi tudi negativne teste, da fail-a.
}
