@extends('layouts.app')

@section('content')
      <!-- Main Content -->
    <section class="main contact-banner">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ol>
                <h2>Contact Us</h2>

            </div>
        </section><!-- End Breadcrumbs -->
        <section class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="contact-box">
                            <div class="contact-box-inner">
                                <i class="far fa-envelope"></i>
                                <h5>Mail Here</h5>
                                <br>
                                <h6>Info@gabrielangelinvestments.com</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-box">
                            <div class="contact-box-inner">
                                <i class="fas fa-map-marker-alt"></i>
                                <h5>Visit Here</h5>
                                <br>
                                <h6>Harrison street #5409 Chicago IL 60699</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="section-title">
                    <h2>Contact Us</h2>
                    <p>Please get in touch and our expert support team will answer all your questions.</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-12 ">
                        <img src="./img/undraw_Personal_text_re_vqj3.svg" width="100%" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        <form action="/action_page.php">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">

                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                            <label for="lname">Email</label>
                            <input type="text" id="lname" name="lastname" placeholder="Your email..">

                            <label for="country">Country</label>
                            <select id="country" name="country">
                                <option value="australia">UAE</option>
                                <option value="canada">India</option>
                                <option value="usa">USA</option>
                                <option value="usa">Indoesia</option>
                                <option value="usa">Quatar</option>
                            </select>

                            <label for="subject">Subject</label>
                            <textarea id="subject" name="subject" placeholder="Write something.."
                                style="height:150px"></textarea>

                            <input type="submit" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d380723.7722613736!2d-87.95555586053565!3d41.79804647250275!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e336c79216f53%3A0xedb49a9097d2aaab!2s5409%20W%20Harrison%20St%2C%20Chicago%2C%20IL%2060644%2C%20USA!5e0!3m2!1sen!2snp!4v1630738354063!5m2!1sen!2snp"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
    </section>

    <!-- Main Content-end -->
@endsection