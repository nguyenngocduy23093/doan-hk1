@extends('admin.layout')

@section('title', 'Feedback Details')

@section('content')
<div class="container">
    <h2 class="mb-3">Feedback Details</h2>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $feedback->feedback_id }}</td>
        </tr>

        <tr>
            <th>Rating</th>
            <td>{{ $feedback->rating }}</td>
        </tr>

        <tr>
            <th>Message</th>
            <td>{{ $feedback->message }}</td>
        </tr>

        <tr>
            <th>Unread</th>
            <td>
                @if($feedback->unread)
                    <span class="badge bg-danger">Unread</span>
                @else
                    <span class="badge bg-success">Read</span>
                @endif
            </td>
        </tr>

        <tr>
            <th>Sent At</th>
            <td>{{ $feedback->created_at }}</td>
        </tr>

    </table>

    <a href="{{ route('admin.feedback.index') }}" class="btn btn-secondary">
        Back
    </a>

    <form action="{{ route('admin.feedback.delete', $feedback->feedback_id) }}" 
          method="POST" 
          style="display:inline-block;">
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Delete this feedback?')">
            Delete
        </button>
    </form>
</div>
@endsection
