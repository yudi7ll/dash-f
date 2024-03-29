<!-- Edit Comment Modal -->
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentModalLabel">Edit Your Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCommentForm" method="post" action="/comments/">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="content" id="messageInput"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('editCommentForm').submit()">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Comment Modal -->


<h5 id="comments">Comments</h5>
<form method="post" action="{{ route('comments.store') }}">
    @csrf
    <div class="form-group">
        <input type="hidden" value="{{ $post['id'] }}" name="post_id" id="post_id" />
        <textarea class="form-control" name="content" rows="5" placeholder="Write a comment..."  @guest disabled @endguest>{{ old('content') }}</textarea>
    </div>
    @guest
        <small style="float: left">Please <a href="{{ route('login') }}">Login</a> before comment</small>
    @endguest
    <button type="submit" class="btn btn-primary d-block ml-auto" @guest disabled @endguest>Send</button>
</form>
<div class="mt-3">
    @foreach ($post['comments']->reverse() as $comment)
        <div class="media py-3 border-bottom">
            <a href="{{ route('user', $comment->user->username) }}">
                <img class="mr-3 img-circle" src="{{ route('cover.thumb', $comment->user->cover) }}" alt="{{ $comment->user->name }}" />
            </a>
            <div class="media-body">
                <h6 class="mt-0">
                    <a class="text-dark font-weight-bold" href="{{ route('user', $comment->user->username) }}">{{ $comment->user->username }}</a>
                </h6>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
                @if ($comment->created_at != $comment->updated_at)
                    <small>( Edited )</small>
                @endif
                <div>{{ $comment->content }}</div>
            </div>

            <div class="btn-group">
                <button type="button" class="bg-transparent border-0 edit-comment-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#333" fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @can('update', $comment)
                        <button class="dropdown-item text-danger" type="button" onclick="deleteComment()">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            &nbsp;Remove
                        </button>
                        <button id="editBtn" class="dropdown-item" type="button" data-toggle="modal" data-target="#editCommentModal" onclick="setDataModal({{ $comment->id }}, '{{ $comment->content }}')">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            &nbsp;Edit
                        </button>
                    @endcan
                    <button class="dropdown-item" type="button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-flag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.5 1a.5.5 0 0 1 .5.5v13a.5.5 0 0 1-1 0v-13a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M3.762 2.558C4.735 1.909 5.348 1.5 6.5 1.5c.653 0 1.139.325 1.495.562l.032.022c.391.26.646.416.973.416.168 0 .356-.042.587-.126a8.89 8.89 0 0 0 .593-.25c.058-.027.117-.053.18-.08.57-.255 1.278-.544 2.14-.544a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5c-.638 0-1.18.21-1.734.457l-.159.07c-.22.1-.453.205-.678.287A2.719 2.719 0 0 1 9 9.5c-.653 0-1.139-.325-1.495-.562l-.032-.022c-.391-.26-.646-.416-.973-.416-.833 0-1.218.246-2.223.916a.5.5 0 1 1-.515-.858C4.735 7.909 5.348 7.5 6.5 7.5c.653 0 1.139.325 1.495.562l.032.022c.391.26.646.416.973.416.168 0 .356-.042.587-.126.187-.068.376-.153.593-.25.058-.027.117-.053.18-.08.456-.204 1-.43 1.64-.512V2.543c-.433.074-.83.234-1.234.414l-.159.07c-.22.1-.453.205-.678.287A2.719 2.719 0 0 1 9 3.5c-.653 0-1.139-.325-1.495-.562l-.032-.022c-.391-.26-.646-.416-.973-.416-.833 0-1.218.246-2.223.916a.5.5 0 0 1-.554-.832l.04-.026z"/>
                        </svg>
                        &nbsp;Report Abuse
                    </button>
                </div>
            </div>

            <form id="delete-comment-form" action="{{ route('comments.destroy', $comment->id) }}" method="post">
                @csrf
                @method('delete')
            </form>
            <script>
                function deleteComment() {
                    confirm('Your comment will be deleted permanently!\nContinue?')
                        && document.getElementById('delete-comment-form').submit();
                }
            </script>
        </div>
        </span>
    @endforeach

    <script>
        function setDataModal(id, comment) {
            document.getElementById('messageInput').innerHTML = comment;
            document.getElementById('editCommentForm').attributes.action.value = '/comments/' + id;
        }
    </script>
</div>
