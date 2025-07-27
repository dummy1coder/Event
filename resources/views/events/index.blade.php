@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Event List</div>
    <div class="card-body">
        @can('create-event')
            <a href="{{ route('events.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Event</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>
                        <form action="{{ route('events.destroy', $event->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-event')
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-event')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this event?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No event Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $events->links() }}

    </div>
</div>
@endsection