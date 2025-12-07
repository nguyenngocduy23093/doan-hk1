@if(isset($active_tab) && $active_tab == 'feedback')
    <h3>Gửi góp ý</h3>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    
    <form action="{{ route('settings.send_feedback') }}" method="POST">
        @csrf
        <textarea name="message" class="form-control mb-3" rows="5" placeholder="Nhập ý kiến..."></textarea>
        <button type="submit" class="btn btn-primary">Gửi ngay</button>
    </form>
@else
    @endif