@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('content')
<section class="banner banner-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="banner-content center-heading">
                    <span class="subheading">Expert instruction</span>
                    <h1>Build Skills With Experts Any Time, Anywhere </h1>
                    <p>We invest in personnel, technological innovations and infrastructure and have established regional and international offices.</p>
                    <a href="{{ route('website.courses') }}" class="btn btn-main"><i class="fa fa-list-ul mr-2"></i>our Courses </a>
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>


<section class="category-section2">
    <div class="container">
        <div class="row no-gutters">
            <div class="course-categories">
                @foreach ($categories as $item)
                <div class="category-item category-bg-{{ $loop->iteration }}">
                    <a href="{{ route('website.category', $item->slug) }}">
                      <div class="category-icon">
                          <i class="bi bi-laptop"></i>
                      </div>
                      <h4>{{ $item->trans_name }}</h4>
                      <p>({{ $item->courses->count() }} Courses)</p>
                    </a>
                  </div>
                @endforeach


            </div>
        </div>
    </div>
</section>

<section class="section-padding popular-course pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Top Trending Courses</span>
                    <h3>Our Popular Online Courses</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="{{ route('website.courses') }}" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a></div>
            </div>
        </div>

        <div class="row">
            @foreach ($latest_courses as $course)
            <div class="col-lg-4 col-md-6">
                @include('front.sections.course')
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="about-section section-padding about-2">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-6 col-md-12">
               <div class="about-img2">
                   <img src="{{ asset('webasset/assets/images/bg/choose.png') }}" alt="" class="img-fluid">
               </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading">Top Categories</span>
                    <h3>Learn new skills to go ahead for your career</h3>
                </div>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores excepturi explicabo esse nisi molestias molestiae magni porro magnam,
                    iusto sunt aliquid necessitatibus optio quod iste facilis similique eos voluptatum sint?</p>

                <a href="#" class="btn btn-main"><i class="fa fa-check mr-2"></i>Learn More</a>

            </div>
        </div>
    </div>
</section>

<section class="feature-2">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Expert Teacher</h4>
                        <p>Behind the word mountains, far from the countries</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Quality Education</h4>
                        <p>Behind the word mountains, far from the countries </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Life Time Support</h4>
                        <p>Behind the word mountains, far from the countries</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-rocket2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>HD Video</h4>
                        <p>Behind the word mountains, far from the countries</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--course section start-->
<section class="section-padding course-grid" >
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading center-heading">
                    <span class="subheading">Top Trending Courses</span>
                    <h3>Over 200+ New Online Courses</h3>
                </div>
            </div>
        </div>

        <div class="text-center">
            <ul class="course-filter">
                <li class="active"><a href="#" data-filter="*"> All</a></li>
                @foreach ($categories as $item)
                <li><a href="#" data-filter=".moh{{ $item->id }}">{{ $item->trans_name }}</a></li>
                @endforeach

            </ul>
        </div>

        <div class="row course-gallery ">
            @foreach ($courses as $course)
            <div class="course-item moh{{ $course->category_id  }} col-lg-4 col-md-6">
                @include('front.sections.course')
            </div>
            @endforeach
        </div>
    </div>
    <!--course-->
</section>
<!--course section end-->


<section class="counter-wrap section-padding counter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-desktop"></i>
                    <div class="count">
                        <span class="counter h2">90</span>
                    </div>
                    <p>Expert Instructors</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-agenda"></i>
                    <div class="count">
                        <span class="counter h2">1450</span>
                    </div>
                    <p>Total Courses</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-heart"></i>
                    <div class="count">
                        <span class="counter h2">5697</span>
                    </div>
                    <p>Happy Students</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-microphone-alt"></i>
                    <div class="count">
                        <span class="counter h2">24</span>
                    </div>
                    <p>Creative Events</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--course section start-->
{{-- <section class="section-padding video-section2 clearfix" >
    <div class="video-block-container"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Working Process</span>
                    <h3>Watch video to know more about us</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <a href="#" class="video-icon"><i class="fa fa-play"></i></a>
            </div>
        </div>
    </div>
    <!--course-->
</section> --}}
<!--course section end-->
<section class="testimonial section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading text-center">
                    <span class="subheading">Testimonials</span>
                    <h3>Learn New Skills to Go Ahead for Your Career</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonials-slides owl-carousel owl-theme">
                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="{{ asset('webasset/assets/images/clients/test-1.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>

                     <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="{{ asset('webasset/assets/images/clients/test-2.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>


                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="{{ asset('webasset/assets/images/clients/test-3.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="team section-padding bg-grey">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Best Expert Trainer</span>
                    <h3>Our Professional trainer</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="#" class="btn btn-main"><i class="fa fa-user mr-2"></i>Join With us</a></div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('webasset/assets/images/team/team-4.jpg') }}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Harish Ham</h4>
                        <p>CEO, Developer</p>

                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('webasset/assets/images/team/team-1.jpg') }}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Tanvir Hasan</h4>
                        <p>Market Researcher</p>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('webasset/assets/images/team/team-2.jpg') }}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Mikele John</h4>
                        <p>Content Writter</p>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('webasset/assets/images/team/team-3.jpg') }}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Mikele John</h4>
                        <p>Content Writter</p>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Blog News</span>
                    <h3>Latest Blog News</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="{{ asset('webasset/assets/images/blog/news-1.jpg') }}" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>

                        <h2><a href="#">Powerful tips to grow business manner</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="{{ asset('webasset/assets/images/blog/news-2.jpg') }}" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>

                        <h2><a href="#">Powerful tips to grow effective manner</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="{{ asset('webasset/assets/images/blog/news-3.jpg') }}" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>

                        <h2><a href="#">Python may be you completed online </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
