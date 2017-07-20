<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\FriendRequest;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'avatar',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];


	function sentRequests() {
		return $this->belongsToMany('App\User', 'friend_requests', 'from', 'to');
	}

	function pendingSentRequests() {
		return $this->sentRequests()->wherePivot('status', 'Pending')->get();
	}


	function receivedRequests() {
		return $this->belongsToMany('App\User', 'friend_requests', 'to', 'from');
	}

	function pendingReceivedRequests() {
		return $this->receivedRequests()->wherePivot('status', 'Pending')->get();
	}


	function friends() {
		return $this->receivedRequests()->wherePivot('status', 'Accepted')->get()
			->merge($this->sentRequests()->wherePivot('status', 'Accepted')->get());
	}

	function isFriend($id) {
		return FriendRequest::where([['from', $id], ['to', $this->id]])
			->orWhere([['from', $this->id], ['to', $id]])
			->count();
	}


	function addFriend(User $user) {
		return $this->sentRequests()->attach($user->id, ['status' => 'Pending']);
	}

	function acceptRequest($id) {
		$this->receivedRequests()->where('from', $id)->first()->pivot->update(['status' => 'Accepted']);
	}

	function declineRequest($id) {
		$this->receivedRequests()->detach($id);
	}
}
