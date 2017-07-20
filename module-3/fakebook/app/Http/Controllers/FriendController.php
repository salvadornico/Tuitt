<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FriendRequest;
use Auth;
use DB;
use Session;

class FriendController extends Controller
{
	function displayAll() {
		$friends = Auth::user()->friends();
		$not_friends = User::all()
			->diff(Auth::user()->friends())
			->diff(Auth::user()->where('id', Auth::user()->id)->get());

		$received_requests = Auth::user()->pendingReceivedRequests();
		$sent_requests = Auth::user()->pendingSentRequests();

		return view("home", compact("friends", "not_friends", "received_requests", "sent_requests"));
	}

	function displaySingleUser($id) {
		$user = User::find($id);
		$isFriend = Auth::user()->isFriend($id);

		return view("user", compact("user", "isFriend"));
	}

	function addFriendRequest($id) {
		$user = User::find($id);
		Auth::user()->addFriend($user);

		Session::flash("message", "Request sent!");
		return back();
	}

	function acceptFriend($id) {
		Auth::user()->acceptRequest($id);

		Session::flash("message", "Request accepted!");
		return redirect("/");
	}

	function denyFriend($id) {
		Auth::user()->declineRequest($id);

		Session::flash("message", "Request denied");
		return redirect("/");
	}
}
