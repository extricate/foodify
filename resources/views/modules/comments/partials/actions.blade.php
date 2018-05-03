@auth
    @if ($comment->author()->id == auth()->user()->id || auth()->user()->isAdmin())
        <div class="d-inline float-right">
            <a class="btn btn-primary btn-sm" href="{{ route('comments.edit', $comment->id) }}"><i class="fal fa-edit"></i></a>
        </div>
        @include('modules.comments.destroy')
    @endif
    @if(auth()->user()->isAdmin())
        @include('modules.user.partials.ban-user', ['user_id' => $comment->author()->id])
    @endif
@endauth