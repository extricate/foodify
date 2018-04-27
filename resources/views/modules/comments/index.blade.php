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

        Posted <i title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}.</i>

        @if ($comment->created_at != $comment->updated_at)
            Last updated <i title="{{ $comment->updated_at }}">{{ $comment->updated_at->diffForHumans() }}.</i>
        @endif
        @if ($comment->author()->id == auth()->user()->id || auth()->user()->isAdmin())
            <div class="d-inline float-right">
                <a class="btn btn-primary btn-sm" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
            </div>
            @include('modules.comments.destroy')
        @endif
    </div>
</div>