@extends('layout.app')

@section('content')
    <div class="d-flex card flex-column container mb-5" style="max-width: 50rem; border: none; margin-top: 100px;">
        <div style="width: 40rem; margin: 0 auto;">
            <div class="card-body justify-content-center">
                <div class="mt-4">
                    <x-post :post="$post" />
                </div>
            </div>
        </div>
    </div>
@endsection