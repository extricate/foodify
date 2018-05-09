@auth
    @if ($comment->author()->id == auth()->user()->id || auth()->user()->isAdmin())
        <div class="d-inline float-right">
            <a class="btn btn-primary" href="{{ route('comments.edit', $comment->id) }}">Edit <i class="fal fa-edit"></i></a>
        </div>
        @include('modules.comments.destroy')
    @endif
    @admin
        @include('modules.user.partials.ban-user', ['user_id' => $comment->author()->id])
        @include('modules.comments.partials.moderate', ['comment' => $comment])
    @endadmin
@endauth