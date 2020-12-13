@extends('layout.app')

@section('content')

    <div>

        <div class="text-muted mt-5 d-flex flex-column container" style="max-width: 50rem;">
            <h1>{{ $user->name }}</h1>
            <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}, Received {{ $user->receivedLikes()->count() }} likes</p>

        </div>

        <div class="d-flex card flex-column container mb-5 mt-3" style="max-width: 50rem; border: none;">
            <div style="width: 40rem; margin: 0 auto;">
                <div class="card-body justify-content-center">
                    <div class="mt-4">
                        @if ($posts->count())
                            @foreach ($posts as $post)
                                <x-post :post="$post" />
                            @endforeach
                        @else
                            <p>{{ $user->name }} doesn't have any posts</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection