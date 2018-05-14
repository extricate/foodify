@if($comment->published == true)
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <div class="h4">{{ $comment->author()->name }}
                    @if($comment->author()->verified || $comment->author()->admin)
                        <span class="badge badge-success">Verified</span>
                    @endif
                    <small>said
                        <span title="{{ $comment->created_at }}">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                        @if ($comment->created_at != $comment->updated_at)
                            (and edited
                            <span title="{{ $comment->updated_at }}">
                            {{ $comment->updated_at->diffForHumans() }}.)
                        </span>
                        @endif
                    </small>
                </div>
            </div>
            <p class="card-text">
                {!! Markdown::convertToHtml($comment->text) !!}
            </p>
        </div>
        <div class="card-footer">
            @include('modules.comments.partials.actions')
        </div>
    </div>
@else
    @admin
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <div class="h4">Unpublished: {{ $comment->author()->name }}
                    <small>said
                        <span title="{{ $comment->created_at }}">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                        @if ($comment->created_at != $comment->updated_at)
                            (and edited
                            <span title="{{ $comment->updated_at }}">
                            {{ $comment->updated_at->diffForHumans() }}.)
                        </span>
                        @endif
                    </small>
                </div>
            </div>
            <p class="card-text">
                {!! Markdown::convertToHtml($comment->text) !!}
            </p>
        </div>
        <div class="card-footer">
            @include('modules.comments.partials.actions')
        </div>
    </div>
    @endadmin
@endif