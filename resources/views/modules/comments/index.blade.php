<div class="card">
    <div class="card-body">
        <h2>{{ $comment->author()->name }}</h2>

        @if ($comment->author()->id == auth()->user()->id || auth()->user()->admin())
            @include('modules.comments.destroy')
        @endif
        <p class="card-text">
            {{ $comment->text }}
        </p>
        <div class="card-footer">
            {{ $comment->create_at }}
        </div>
    </div>
</div>