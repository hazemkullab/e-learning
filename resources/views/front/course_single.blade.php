@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('content')

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>{{ $course->trans_name }}</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ route('website.index') }}">{{ __('web.home') }}</a>
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

  <section class="page-wrapper edutim-course-single">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="course-single-header">
      <div class="rating">
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <a href="#"><i class="fa fa-star"></i></a>
          <span>(5.00)</span>
      </div>

      <h3 class="single-course-title">{{ $course->trans_name }}</h3>
      <p>{{ $course->trans_excerpt }}</p>

      <div class="single-course-meta ">
          <ul>
              <li>
                  <span><i class="fa fa-calendar"></i>Last Update :</span>
                  <a href="#" class="d-inline-block">{{ $course->updated_at->format('F d, Y') }} </a>
              </li>
              <li>
                  <span><i class="fa fa-bookmark"></i>Category :</span>
                  <a href="#" class="d-inline-block">{{ $course->category->trans_name }}</a>
              </li>
          </ul>
      </div>
  </div>

                  <div class="single-course-details ">
      <h4 class="course-title">Description</h4>
      {!! $course->trans_content !!}

      <div class="course-widget course-info">
          <h4 class="course-title">What You will Learn?</h4>
          <ul>
              <li>
                  <i class="fa fa-check"></i>
                  Clean up face imperfections, improve and repair photos
              </li>
              <li>
                  <i class="fa fa-check"></i>
                  Remove people or objects from photos
              </li>
              <li>
                  <i class="fa fa-check"></i>
                  Master selections, layers, and working with the layers panel
              </li>
              <li>
                  <i class="fa fa-check"></i>
                  Use creative effects to design stunning text styles
              </li>
              <li>
                  <i class="fa fa-check"></i>
                  working with the layers panel
              </li>
              <li>
                  <i class="fa fa-check"></i>
                  Cut away a person from their background
              </li>
          </ul>
      </div>
  </div>
                  <!--  Course Topics -->
  <div class="edutim-single-course-segment  edutim-course-topics-wrap">
      <div class="edutim-course-topics-header d-lg-flex justify-content-between">
          <div class="edutim-course-topics-header-left">
              <h4 class="course-title">Topics for this course</h4>
          </div>
          <div class="edutim-course-topics-header-right">
              <span> Total learning: <strong>{{ $course->videos_count }} Lessons</strong></span>
              {{-- <span> Time: <strong>13h 20m 20s</strong> </span> --}}
          </div>
      </div>

      <div class="edutim-course-topics-contents">
          <div class="edutim-course-topic ">
            <ul class="list-group">
                @foreach ($course->videos as $item)
                <li class="list-group-item">{{ $item->trans_name }}</li>
                @endforeach

              </ul>
          </div>
      </div>
  </div>
  <!--  COurse Topics End -->

                  <div class="course-widget course-info">
      <h4 class="course-title">About the instructors</h4>
      <div class="instructor-profile">
          <div class="profile-img">
              <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
          </div>
          <div class="profile-info">
              <h5>Meraz Ahmed</h5>
              <div class="rating">
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star-half"></i></a>
                  <span>3.79 ratings (29 )</span>
              </div>
              <p>I'm a developer with a passion for teaching. I'm the lead instructor at the London App Brewery, London's leading Programming Bootcamp. I've helped hundreds of thousands of students learn to code and change their lives by becoming a developer </p>
              <div class="instructor-courses">
                  <span><i class="bi bi-folder"></i>4 Courses</span>
                  <span><i class="bi bi-group"></i>400 Students</span>
              </div>
          </div>
      </div>
  </div>
                  <div class="course-widget course-info">
      <h4 class="course-title">Students Feedback</h4>

      <div class="course-review-wrapper">
          <div class="course-review">
              <div class="profile-img">
                  <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
              </div>
              <div class="review-text">
                  <h5>Mehedi Rasedh  <span>26th june 2020</span></h5>

                  <div class="rating">
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star-half"></i></a>
                  </div>
                  <p>Great course. Well structured, paced and I feel far more confident using this software now then I did back in school when I was learning. And the guy doing the voice over really is great at what he does</p>
              </div>
          </div>


          <div class="course-review">
              <div class="profile-img">
                  <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
              </div>
              <div class="review-text">
                  <h5>Rasedh raj <span>1 Year Ago</span></h5>
                  <div class="rating">
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star"></i></a>
                      <a href="#"><i class="fa fa-star-half"></i></a>
                  </div>
                  <p>Very deep course for a beginner, enjoyed everything from the very start and every detail is vastly investigated and discussed. A nice choice for those, who are enrolling Python. </p>
              </div>

          </div>
      </div>
  </div>
              </div>

              <div class="col-lg-4">
                  <div class="course-sidebar">
      <div class="course-single-thumb">
          <img src="assets/images/course/course2.jpg" alt="" class="img-fluid w-100">
          <div class="course-price-wrapper">
              <div class="course-price ml-3"><h4>Price: <span>${{ $course->price }}</span></h4></div>
              @if (Auth::check())
                <div class="buy-btn"><a href="{{ route('website.buy_course', $course->slug) }}" class="btn btn-main btn-block">Buy This Course</a></div>
              @else
                <div class="buy-btn"><a href="{{ route('website.login') }}" class="btn btn-main btn-block">Buy This Course</a></div>
              @endif

          </div>
      </div>


      <div class="course-widget single-info">
          <i class="bi bi-group"></i>
          Enrolled <span>101 Students</span>
      </div>

      <div class="course-widget course-details-info">
          <h4 class="course-title">This Course Includes</h4>
          <ul>
              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-graph-bar"></i>Skill level : </span>
                      Beginner
                  </div>
              </li>
              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-user-ID"></i>Instructor :</span>
                      <a href="#" class="d-inline-block">Jone Smit</a>
                  </div>
              </li>

               <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-flag"></i>Duration :</span>
                      2 weeks
                  </div>
              </li>
               <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-paper"></i>Lessons :</span>
                      42
                  </div>
              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-forward"></i>Language :</span>
                      English
                  </div>
              </li>

              <li>
                  <div class="d-flex justify-content-between align-items-center">
                      <span><i class="bi bi-madel"></i>Certificate :</span>
                      yes
                  </div>
              </li>
          </ul>
      </div>

      <div class="course-widget course-share d-flex justify-content-between align-items-center">
          <span>Share</span>
          <ul class="social-share list-inline">
              <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"><i class="fab fa-facebook"></i></a></li>
              <li  class="list-inline-item"><a href="https://twitter.com/intent/tweet?url={{ request()->url() }}&text={{ $course->trans_name }}"><i class="fab fa-twitter"></i></a></li>
              <li  class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->url() }}"><i class="fab fa-linkedin"></i></a></li>
              <li  class="list-inline-item"><a href="https://pinterest.com/pin/create/button/?url={{ request()->url() }}&media=&description={{ $course->trans_name }}"><i class="fab fa-pinterest"></i></a></li>
          </ul>
      </div>

      <div class="course-widget course-metarials">
          <h4 class="course-title">Requirements</h4>
          <ul>
              <li>
                  <i class="fa fa-check"></i>
                  No previous knowledge of Photoshop required.
              </li>
               <li>
                  <i class="fa fa-check"></i>
                  If you have Photoshop installed, that's great.
              </li>
              <li>
                  <i class="fa fa-check"></i>
                  If not, I'll teach you how to get it on your computer.
              </li>

          </ul>
      </div>

      <div class="course-widget">
          <h4 class="course-title">Tags</h4>
          <div class="single-course-tags">
              <a href="#">Web Deisgn</a>
              <a href="#">Development</a>
              <a href="#">Html</a>
              <a href="#">css</a>
          </div>
      </div>



  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="section-padding related-course">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6">
                  <div class="section-heading">
                      <h4>Related Courses You may Like</h4>
                  </div>
              </div>
          </div>

          <div class="row">
              @foreach ($related_courses as $course)
                <div class="col-lg-4 col-md-6">
                    @include('front.sections.course')
                </div>
              @endforeach

          </div>
      </div>
  </section>
@stop
