@extends('admin.layout')

@section('title', 'Feedback')

@section('content')
<div class="container">
    <h2 class="mb-4">Feedback List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rating</th>
                <th>Message</th>
                <th>Unread</th>
                <th>Sent At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($feedbacks as $item)
            <tr>
                <td>{{ $item->feedback_id }}</td>

                <td>{{ $item->rating }}</td>

                <td>{{ \Illuminate\Support\Str::limit($item->message, 50) }}</td>

                <td>
                    @if($item->unread)
                        <span class="badge bg-danger">Unread</span>
                    @else
                        <span class="badge bg-success">Read</span>
                    @endif
                </td>

                <td>{{ $item->created_at }}</td>

                <td>
                    <a href="{{ route('admin.feedback.show', $item->feedback_id) }}" 
                       class="btn btn-sm btn-info">
                        View
                    </a>

                    <form action="{{ route('admin.feedback.delete', $item->feedback_id) }}" 
                          method="POST" 
                          style="display:inline-block;">
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete feedback?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
