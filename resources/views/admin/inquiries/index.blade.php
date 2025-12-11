@extends('admin.layout')

@section('title', 'Inquiries')

@section('content')
<div class="container">
    <h2 class="mb-4">Inquiry List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Property</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Sent At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($inquiries as $item)
            <tr>
                <td>{{ $item->inquiry_id }}</td>

                <td>
                    @if($item->property_id)
                        #{{ $item->property_id }}
                    @else
                        —
                    @endif
                </td>

                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>

                {{-- message rút gọn để không bị dài --}}
                <td>{{ Str::limit($item->message, 40) }}</td>

                <td>{{ $item->created_at }}</td>

                <td>
                    <a href="{{ route('admin.inquiries.show', $item->inquiry_id) }}" 
                       class="btn btn-sm btn-info">
                        View
                    </a>

                    <form action="{{ route('admin.inquiries.delete') }}" 
                          method="POST" 
                          style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="inquiry_id" value="{{ $item->inquiry_id }}">
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this?')">
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
