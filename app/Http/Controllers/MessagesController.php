<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
	public function index(Request $request)
	{
		return Message::all();
	}
 
	public function show(int $messageId)
	{
		return Message::find($messageId);
	}
 
	public function store(Request $request)
	{
		$message = Message::create($request->all());
 
		return response()->json($message, 201);
	}
 
	public function update(Request $request, Message $message)
	{
		$message->update($request->all());
		return response()->json($message, 200);
	}
 
	public function delete(int $messageId)
	{
		$message = Message::find($messageId);
		if (!empty($message))
			$message->delete();
 
		return response()->json(null, 204);
	}

	public function showMessagesForParams(Request $request) {
		if($request->user && $request->event) {
			$messages = Message::where('user', $request->user)->where('event', $request->event)->get();
		} elseif ($request->user && !$request->event) {
			$messages = Message::where('user', $request->user)->get();
		} elseif(!$request->user && $request->event) {
			$messages = Message::where('event', $request->event)->get();
		} elseif (!$request->user && !$request->event) {
			$messages = Message::all();
		}
		return $messages;
	}
}