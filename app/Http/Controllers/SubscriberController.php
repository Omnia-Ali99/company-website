<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $subscribers = Subscriber::paginate(10);
        return view('admin.subscribers.subscribers', get_defined_vars());
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return to_route('admin.subscribers.index')->with('success', __('keywords.successfully_deleted'));
    }
}
