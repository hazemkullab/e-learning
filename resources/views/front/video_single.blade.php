@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('content')

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>{{ $video->course->trans_name }}</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ route('website.index') }}">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    {{ $video->course->trans_name }}
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
</section>


  <section class="section-padding course">

    <div class="container">
        <div class="row justify-content-center">


            <div class="col-8">
                <div class="text-right">
                    <form class="mb-4" action="{{ route('website.video_watched', $video->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-main-2">Complete</button>
                    </form>
                </div>
                <video controls width="100%" src="{{ asset('uploads/'. $video->path) }}"></video>
            </div>

        </div>

    </div>
</section>

@stop
