@props(['post' => $post])

<div class="my-4">
    <div>
        <strong><a href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a></strong>
        <span>{{ $post->created_at->diffForHumans() }}</span>
        <p>{{ $post->body }}</p>
    </div>
    <div class="d-flex flex-row">
        
        @auth                                        
            @if (!$post->likedby(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post">
                    <button type="submit" class="btn btn-link" style="padding: 0px !important; margin-right: 10px;">Like</button>
                    @csrf
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post">
                    <button type="submit" class="btn btn-link" style="padding: 0px !important">Unlike</button>
                    @csrf
                    @method('DELETE')
                </form>
            @endif
            
            @can('delete', $post)
                <form action="">
                    <button type="submit" class="btn btn-link text-danger" style="padding: 0px !important; margin-left: 5px !important;">Delete</button>
                    @csrf   
                    @method('DELETE')
                </form>
            @endcan

        @endauth
        <span style="padding-left: 5px !important; padding-top: 2px !important">{{ $post->likes()->count() }} {{ Str::plural('like', $post->likes()->count()) }}</span>
    </div>
</div>