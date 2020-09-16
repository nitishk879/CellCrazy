<div class="footer-container">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">Contact</h4>
                        <div class="need-help">
                            <p class="phone-info">
                                NEED HELP?
                                <span>01753 696 664</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-2 mb-md-30px mb-lm-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">Information</h4>
                        <div class="footer-links">
                            <ul>
                                <li><a href="{{ route("returns-refund-policy") }}">Refund Policy</a></li>
                                <li><a href="{{ route("privacy-policy") }}">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-2 mb-sm-30px mb-lm-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">CUSTOM LINKS</h4>
                        <div class="footer-links">
                            <ul>
                                <li><a href="{{ route("faq") }}">FAQ</a></li>
                                <li><a href="{{ route("terms-conditions") }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single-wedge">
                        <h4 class="footer-herading">NEWSLETTER</h4>
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form
                                id="mc-embedded-subscribe-form"
                                class="validate"
                                novalidate=""
                                target="_blank"
                                name="mc-embedded-subscribe-form"
                                method="post"
                                action="">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email here.." name="EMAIL" value="" />
                                    <div class="mc-news" aria-hidden="true" style="position: absolute; left: -5000px;">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Sign Up" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="social-info">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="copy-text">©<a href="{{ route("/") }}"> {{ config("app.name") }}</a>. {{ __("All Rights Reserved | Company no. 7501180 | Registered in UK & Wales") }} </p>
                </div>
                <div class="col-md-6 text-right">
                    <img class="payment-img" src="{{ asset("theme/assets/images/payment-support.png") }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
