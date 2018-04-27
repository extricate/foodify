<div class="card">
    <div class="card-body">
        <div class="card-title">
            <div class="h4">{{ $comment->author()->name }}
                <small class="badge badge-pill">({{ $comment->created_at->diffForHumans() }})</small>
            </div>

        </div>
        <p class="card-text">
            {{ $comment->text }}
        </p>
    </div>
    <div class="card-footer">
        Posted {{ $comment->created_at->diffForHumans() }} on {{ $comment->created_at }}

        @if ($comment->author()->id == auth()->user()->id || auth()->user()->admin())
            <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
            @include('modules.comments.destroy')
        @endif
    </div>
</div>