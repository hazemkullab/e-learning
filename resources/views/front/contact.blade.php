@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('content')

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Contact Us</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Contact
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-info section-padding">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-6">
                  <div class="section-heading center-heading">
                      <span class="subheading">Contact Us</span>
                      <h3>Have any query?</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
              </div>
          </div>

          <div class="row justify-content-center">
              <div class="col-lg-4">
                  <div class="row">
                      <div class="col-lg-12 col-md-6">
                          <div class="contact-item">
                              <p>Email Us</p>
                              <h4>support@email.com</h4>
                          </div>
                      </div>
                       <div class="col-lg-12 col-md-6">
                          <div class="contact-item">
                              <p>Make a Call</p>
                              <h4>+45 234 345467</h4>
                          </div>
                      </div>
                       <div class="col-lg-12 col-md-6">
                          <div class="contact-item">
                              <p>Corporate Office</p>
                              <h4>Moon Street Light Avenue, 14/05
                                  Jupiter, JP 80630 </h4>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-lg-8">
                  <form class="contact__form form-row " method="POST" action="mail.php" id="contactForm">
                      <div class="row">
                         <div class="col-12">
                             <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                 Your message was sent successfully.
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group">
                                 <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                             </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                             </div>
                         </div>

                         <div class="col-lg-12">
                             <div class="form-group">
                                 <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="Your Message"></textarea>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-12">
                         <div class="mt-4 text-right">
                             <button class="btn btn-main" type="submit">Send Message <i class="fa fa-angle-right ml-2"></i></button>
                         </div>
                     </div>
                 </form>
              </div>
          </div>
      </div>
  </section>

@stop
