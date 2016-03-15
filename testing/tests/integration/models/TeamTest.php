
<?php

use App\Team;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function TeamHasAName() {
     $team = new Team(['name' => 'Acme']);

     $this->assertEquals('Acme', $team->name);
    }

    /** @test */
    public function TeamCanAddMembers() {
     $team = factory(Team::class)->create();
        
     $user = factory(User::class)->create();
     $userTwo = factory(User::class)->create();

     $team->add($user);
     $team->add($userTwo);

     $this->assertEquals(2, $team->count());
    }

    /** @test */
    public function TeamHasMaximumSize() {
     $team = factory(Team::class)->create(['size' => 2]);
     $userOne = factory(User::class)->create();
     $userTwo = factory(User::class)->create();

     $team->add($userOne);
     $team->add($userTwo);

     $this->setExpectedException('Exception');

     $userThree = factory(User::class)->create();
     $team->add($userThree);
    }

    /** @test */
    public function TeamCanAddMultipleMembersAtOnce() {
        $team = factory(Team::class)->create();

        $users = factory(User::class, 2)->create();

        $team->add($users); 
        $this->assertEquals(2, $team->count());
    }

    /** @test */
    public function TeamCanRemoveAMember() {
        $team = factory(Team::class)->create();

        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();
        $userThree = factory(User::class)->create();

        $team->add($userOne);
        $team->add($userTwo);
        $team->add($userThree);

        $team->removeAMember($userOne);

        $this->assertEquals(2, $team->count());
    }

    /** @test */
    public function TeamCanRemoveAllMembersAtOnce() {
        
    }
}
