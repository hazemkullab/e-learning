@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('content')

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Preview Certificate</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ route('website.index') }}">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Preview Certificate
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
                <embed style="width:100%;height:600px" src="{{ asset('uploads/certificates/'.$file_name) }}">
            </div>

        </div>

    </div>
</section>

@stop
