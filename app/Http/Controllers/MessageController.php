<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $messages = Message::paginate(10);
        return view('admin.messages.messages', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
 
    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('admin.messages.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.

     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return to_route('admin.messages.index')->with('success', __('keywords.successfully_deleted'));
    }
}
