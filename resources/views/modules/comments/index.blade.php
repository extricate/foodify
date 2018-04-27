<div class="card">
    <div class="card-body">
        <div class="card-title">
            <div class="h4">{{ $comment->author()->name }}</div>
        </div>
        <p class="card-text">
            {{ $comment->text }}
        </p>
    </div>
    <div class="card-footer">
        Posted <i title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</i>

        @if ($comment->author()->id == auth()->user()->id || auth()->user()->admin())
            <div class="d-inline float-right">
                <a class="btn btn-primary btn-sm" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
            </div>
            @include('modules.comments.destroy')
        @endif
    </div>
</div>