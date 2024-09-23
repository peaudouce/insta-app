<style>
    .modal-body {
        overflow-y: scroll;
        max-height: 400px;
    }
</style>
<div class="modal fade" id="comments{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-secondary">
            <div class="modal-header border-secondary">
                <h3 class="h4">Recent Comments</h3>
            </div>
            <div class="modal-body">
                @forelse($user->comments->take(5) as $comment)
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            {{ $comment->body }}
                            <hr class="my-3">
                            <p class="text-muted small mt-3">Replied to <a href="{{ route('post.show', $comment->post->id) }}" class="text-decoration-none"> {{ $comment->post->user->name }}'s Posts</a></p>
                        </div>
                    </div>
                @empty
                    <p>No comments yet</p>
                @endforelse                                
            </div>
            <div class="modal-footer">                
                <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">Close</button>                
            </div>
        </div>
    </div>
</div>