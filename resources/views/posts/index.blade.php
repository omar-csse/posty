@extends('layout.app')

@section('content')
    <div class="container mb-5 card d-flex justify-content-center py-5 text-muted" style="max-width: 50rem; border: none;">
        <div style="width: 40rem; margin: 0 auto;">
                <div class="card-body justify-content-center">

                    <div class="text-danger mb-3">
                        @if (session()->has('status'))
                            {{ session('status') }}
                        @endif
                    </div>
                    
                    @auth                
                        <form action="{{ route('posts') }}" method="post">
                            <div class="form-group">
                                <label for="posts_area">Post</label>
                                <textarea name="body" class="form-control text-muted @error('body') border-danger @enderror" id="postsarea" rows="4" placeholder="Happy posting!"></textarea>
                                @error('body')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button type="submit" class="btn btn-dark mt-3">Post</button>
                            </div>
                            @csrf
                        </form>
                    @endauth

                    <div class="mt-4">
                        @if ($posts->count())
                            @foreach ($posts as $post)
                                <x-post :post="$post" />
                            @endforeach
                        @else
                            <p>No Posts yet</p>
                        @endif
                    </div>
                </div>
        </div>
    </div>
@endsection