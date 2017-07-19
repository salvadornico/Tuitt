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
		$current_login_id = Auth::user()->id;

		$friends = DB::select("SELECT DISTINCT users.* FROM users JOIN friend_requests ON (users.id = friend_requests.from OR users.id = friend_requests.to) WHERE ((users.id != ?) AND (friend_requests.status = 'Accepted') AND (friend_requests.from = ? OR friend_requests.to = ?))", [$current_login_id, $current_login_id, $current_login_id]);

		$not_friends = DB::select("SELECT * FROM users WHERE id NOT IN (SELECT DISTINCT users.id FROM users JOIN friend_requests ON (users.id = friend_requests.from OR users.id = friend_requests.to) WHERE ((friend_requests.status = 'Accepted') AND (friend_requests.from = ? OR friend_requests.to = ?)))", [$current_login_id, $current_login_id]);

		$received_requests = FriendRequest::join('users', 'users.id', '=', 'friend_requests.from')
			->select('users.name', 'users.id')
			->where('friend_requests.status', 'Pending')
			->where('friend_requests.to', $current_login_id)
			->get();
		$sent_requests = FriendRequest::join('users', 'users.id', '=', 'friend_requests.to')
			->select('users.name', 'users.id')
			->where('friend_requests.status', 'Pending')
			->where('friend_requests.from', $current_login_id)
			->get();

		return view("home", compact("friends", "not_friends", "received_requests", "sent_requests"));
	}

	function displaySingleUser($id) {
		$user = User::find($id);
		$current_login_id = Auth::user()->id;

		$isFriend = FriendRequest::where([['from', $id], ['to', $current_login_id]])
			->orWhere([['from', $current_login_id], ['to', $id]])
			->count();

		return view("user", compact("user", "isFriend"));
	}

	function addFriendRequest($id) {
		$new_friend = User::find($id)->id;
		$current_login_id = Auth::user()->id;

		$friend_request = new FriendRequest();
		$friend_request->from = $current_login_id;
		$friend_request->to = $new_friend;
		$friend_request->status = "Pending";
		$friend_request->save();

		Session::flash("message", "Request sent!");

		return back();
	}

	function acceptFriend($id) {
		$current_login_id = Auth::user()->id;

		$friend_request = FriendRequest::where('from', $id)
			->where('to', $current_login_id)->get();
		$friend_request->status = "Accepted";
		$friend_request->save();

		Session::flash("message", "Request accepted!");

		return redirect("/");
	}

	function denyFriend($id) {
		$current_login_id = Auth::user()->id;

		$friend_request = FriendRequest::where('from', $id)
			->where('to', $current_login_id)->get();
		$friend_request->delete();

		Session::flash("message", "Request denied");

		return redirect("/");
	}

	function test($id) {
		$current_login_id = Auth::user()->id;
		$friend_request = FriendRequest::where([['from', $id], ['to', $current_login_id]])
			->orWhere([['from', $current_login_id], ['to', $id]])
			->count();
		dd($friend_request);
	}
}
