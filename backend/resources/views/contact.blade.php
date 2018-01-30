@extends("layouts.app")

@section("content")

    <div class="home-banner">
        <div id="homeCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill" style="background-image:url(/img/contact-bg.jpg)"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="fleet-info">
            <div class="operator-name">
                <div class="slurve card" data-slurve="0,0 0,0 100,0 0,0" data-slurve-classes="slurve-style-5">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="contact-container">
        <div class="contact-form">
            <div class="primary-heading">
                <div class="skew-left-side"></div>
                <h1>Contact <strong>Form</strong></h1>
            </div>
            <div class="clearfix"></div>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Your message"></textarea>
                </div>
                <div class="contact-submit">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#send-btn"></use>
                        </svg>
                        <span>Submit</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="contact-iframe">
            <div class="skew-right-side">
                <div class="skew-right-side-content">
                    <div class="contact-address">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9361550.822065111!2d-12.406050953950318!3d55.051365383354224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited+Kingdom!5e0!3m2!1sen!2suk!4v1487922267995" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection