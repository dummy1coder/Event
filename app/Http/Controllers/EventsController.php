<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Http\JsonResponse;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('permission:create-event|edit-event|delete-event', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-event', ['only' => ['store']]);
        $this->middleware('permission:edit-event', ['only' => ['update']]);
        $this->middleware('permission:delete-event', ['only' => ['destroy']]);
    }

    // List all events
    public function index(): JsonResponse
    {
        $events = Events::latest()->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $events
        ]);
    }

    // Store a new event
    public function store(StoreEventsRequest $request): JsonResponse
    {
        $event = Events::create([
            'event_id' => $request->event_id,
            'event_type' => $request->event_type,
            'event_location' => $request->event_location,
            'event_date' => $request->event_date,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Event created successfully.',
            'event' => $event,
        ], 201);
    }

    // Show a single event
    public function show(Events $event): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'event' => $event
        ]);
    }

    // Update an event
    public function update(UpdateEventsRequest $request, Events $event): JsonResponse
    {
        $event->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Event updated successfully.',
            'event' => $event
        ]);
    }

    // Delete an event
    public function destroy(Events $event): JsonResponse
    {
        $event->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Event deleted successfully.'
        ]);
    }
}
