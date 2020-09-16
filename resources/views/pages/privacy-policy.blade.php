@extends('layouts.app')

@section('title', $title ?? 'Privacy Policies')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="{{ route("/") }}">Home</a></li>
                            <li>{{ $title ?? __("FAQ") }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->

    <!-- Privacy policy -->
    <div class="about-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="about-content col-lg-11 col-12">
                    <h2>Returns & Refund policy</h2>

                                <h3>INTRODUCTION</h3>
                                <p>“We,” “our,” or “us” in this policy is referring to “Cell Crazy” the company which processes your order. Cell Crazy will be the data processor and the data controller of any such Personal Data.</p><p>This Privacy Policy describes how Cell Crazy collects, uses and discloses your personal information and data (“Personal Data”).</p>
                                <p>By using the Website, registering as a user of any services provided by Cell Crazy service generally, you consent to the collection and use of your Personal Data in the manner and for the purposes described in this Privacy Policy.</p>
                                <p>If you have any questions about the collection or use of your Personal Data through the Website or if you would like Cell Crazy to remove your Personal Data from our database or if you no longer wish to receive information about products and services, you should contact Cell Crazy by e-mail to info@cellcrazy.co.uk. We will deal with your query within 24 hours.</p>
                                <p><strong>Cell Crazy may collect and process the following Personal Data about you:</strong></p>
                                <p>information that you provide by filling in the forms/boxes on the Website. This includes information provided at the time of registering to use the Website, subscribing to our services, posting material or requesting further services.</p>
                                <h3>USE AND STORAGE OF PERSONAL DATA</h3>
                                <p>All Personal Data will be treated as strictly confidential, stored in a secure fashion and used by Cell Crazy solely for purposes related to the use of or otherwise in accordance with this Privacy Policy. More specifically, We need to use your Personal Data to process your order with Cell Crazy, your Personal Data will be used in the following ways:</p>
                                <p>to register you with the Website and to administer the Website services;</p>
                                <p>to carry out Cell Crazy obligations arising from any contracts entered into between you and Cell Crazy;</p>
                                <p>to help improve the content of the Website and the service Cell Crazy offers to users of the Website;</p>
                                <p>to ensure that content from the Website is presented in the most effective manner for you and for your computer;</p>
                                <p>for internal audit purposes.</p>
                                <p>If you have opted in to receive marketing information, Cell Crazy may use your Personal Data in the following ways:</p>
                                <p>to keep you informed of the latest products and services by Email. If you wish to receive information of such products and services, please tick the opt-in box provided when registering on this website;</p>
                                <p>to provide users with information regarding updates or additional services available through the Website;</p>
                                <h3>CHILDREN’S INFORMATION</h3>
                                <p>Our services are not directed to children under 16. If you learn that a child under 16 has provided us with personal information without consent, please contact us.</p>
                                <h3>DISCLOSURE OF PERSONAL DATA</h3>
                                <p>We may give Personal Data about you to employees and agents of Cell Crazy to administer any accounts, products and services provided to you by Cell Crazy now or in the future, who may use it for purposes related to the use of the Website.</p>
                                <h3>IP ADDRESSES AND COOKIES</h3>
                                <p>Cell Crazy may collect information about your computer, including where available your IP address, operating system and browser type, for system administration and to report aggregate information. This is statistical data about users’ browsing actions and patterns, and does not identify any individual.</p>
                                <p>For the same reason, We may obtain information about your general internet usage by using a cookie. Cookies are small data files sent by a web server to a web browser to enable the server to collect information back from the browser. They contain information that is transferred to your computer’s hard drive. Cell Crazy uses cookies to track usage of the Website, to identify returning users and to enable Cell Crazy to customise parts of the Website according to users’ previous browsing habits at the site.</p>
                                <p>You can delete cookies from your hard drive at any time. You may also be able to set your browser to disable cookies. However, you should be aware that, if you disable cookies, this may limit your ability to enjoy the full functionality of the Website. Unless you have adjusted your browser setting so that it will refuse cookies,</p>
                                <h3>SECURITY</h3>
                                <p>At Cell Crazy we take security of our customers very seriously. We take various steps to protect information you provide to us from loss, misuse, and unauthorized access or disclosure. These steps take into account the sensitivity of the information we collect, process and store, and the current state of technology.</p>
                                <h3>ACCESS TO INFORMATION</h3>
                                <p>The Act gives you the right to access and rectification or erasure of personal data or restriction of processing information held about you. Your right of access can be exercised in accordance with the Act.</p>
                                <p>If you feel like Cell Crazy are not fulfilling their duties when protecting your data, you can lodge a complaint with the Information Commissioners Offices at the following link – https://ico.org.uk/concerns/</p>
                                <h3>CHANGES TO THIS PRIVACY POLICY</h3>
                                <p>We may change this policy from time to time, and if we do we will post any changes on this page. If you continue to use the services after those changes are in effect, you agree to the revised policy.</p>
                            </div></div>
        </div>
    </div>
    <!-- Privacy policy->

@endsection

@section('stylesheets')
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
