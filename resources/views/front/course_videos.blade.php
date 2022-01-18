@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('content')

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>{{ $course->trans_name }}</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ route('website.index') }}">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    {{ $course->trans_name }}
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
</section>


  <section class="section-padding course">

    <div class="container">
        <div class="row">

            <div class="col-12">

                @php
                    $percentage = (count($user_videos) / $course->videos->count()) * 100;
                    $percentage = round($percentage, 2);
                @endphp

                @if ($percentage >= 20)
                    <a href="{{ route('website.certificate', [Auth::id(), $course->id]) }}" class="btn btn-main px-5 mb-5">Certificate</a>
                @endif

                <div class="progress">
                    <div style="width: {{ $percentage }}%" class="progress-bar">{{ $percentage }}%</div>
                </div>

                <div class="list-group mt-5">
                    @foreach ($course->videos as $item)
                    <a href="{{ route('website.video_single', $item->id) }}" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <span>{{ $item->id }} - {{ $item->trans_name }}</span>

                        @if (in_array($item->id, $user_videos))
                            <span class="badge text-white bg-primary rounded-pill"><i class="fas fa-check"></i></span>
                        @endif

                      </a>
                    @endforeach

                  </div>
            </div>

        </div>

    </div>
</section>

@stop
