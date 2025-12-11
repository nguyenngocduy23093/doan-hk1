@extends('admin.layout')

@section('title', 'Inquiry Details')

@section('content')

<div class="container">
    <h2 class="mb-3">Inquiry Detail</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $inquiry->inquiry_id }}</td>
        </tr>

        <tr>
            <th>Property ID</th>
            <td>{{ $inquiry->property_id ?? '—' }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $inquiry->name }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $inquiry->email }}</td>
        </tr>

        <tr>
            <th>Message</th>
            <td>{{ $inquiry->message }}</td>
        </tr>

        <tr>
            <th>Created At</th>
            <td>{{ $inquiry->created_at }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                @if($inquiry->unread == 1)
                    <span class="badge bg-danger">Unread</span>
                @else
                    <span class="badge bg-success">Read</span>
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">Back</a>
</div>

@endsection
