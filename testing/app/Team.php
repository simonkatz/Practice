<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'size'];

    public function add($user) {
    	$this->guardAgainstTooManyMembers();
    	
    	if ($user instanceOf User) {
    		return $this->members()->save($user);
    	}

    	return $this->members()->saveMany($user);
    }

    public function members() {
    	return $this->hasMany(User::class);
    }

    public function count() {
    	return $this->members()->count();
    }

    public function removeAMember($user) {
    	return $this->members()->where('team_id', $user->team_id)->update(['team_id' => null]);
    }

    protected function guardAgainstTooManyMembers() {
    	if ($this->count() >= $this->size) {
    		throw new \Exception;
    	}
    }
}
