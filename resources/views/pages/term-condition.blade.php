@extends('layouts.app')

@section('title', $title ?? 'Terms & Conditions')

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

    <!-- Terms & Conditions Section Start -->
    <div class="about-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="about-content col-lg-11 col-12">
                    <h2>{{ $title ?? __('Terms & Conditions') }}</h2>
                    <p>When selling a device(s), we recommend you take note of your IMEI number in case there is a problem with your order. Your IMEI number can be found at the back of your phone under the battery or by dialling *#06# on your phone.</p>
                    <h4 class="text-uppercase">SELLING A DEVICE TO US</h4>
                    <p><strong>Your Device</strong></p>
                    <p>Each device sold by you should match the make and model stated when registering your order and meet the following conditions:</p>
                    <ul>
                    <li>The device must turn on and off.</li>
                    <li>The device must be fully functional and complete.</li>
                    <li>The battery must be included.</li>
                    <li>The device must not be crushed or liquid-damaged.</li>
                        <li>The device must be original and meet the manufacturer’s original specifications.</li>
                    </ul>

                    <p><strong>Grading Phones</strong></p>
                    <p>No phone is ever the same so grading does vary from model to model, depending on the damage and condition.</p>
                    <p>To receive the full indicative value for your mobile phone/device, it must power-up (turn on) and be in full working condition (meaning that all features must be in good working order) and must not have significant damage (although may have some mild cosmetic damage i.e. general minor wear and tear).</p>
                    <p>By way of example only, damage classed as significant includes broken or cracked LCD screens; camera function not working or camera damage; buttons missing from the mobile phone/device or other keypad damage; deep scratches or dents; snapped hinges; charger port not working; microphone damage; earpiece damage; cracked backs; missing parts; no power on; touch screen faults; cracked or damaged screens; or software which is faulty or defective. Mobile phones/devices must have batteries enclosed within the mobile phone/device casing; not be barred; PIN locked or water damaged; appear in our online guide; be of UK specification; and not be reported lost or stolen. The list is not exhaustive. When we inspect or test your mobile phone/device, we will not pay as much as the original, indicative value if we find that your mobile phone/device does not comply with all these conditions.</p>
                    <p>Mobile phones/devices not listed on our website will be automatically recycled where possible, subject to these Terms. Such mobile phones/devices cannot be returned under any circumstances. Please ensure you are happy to send such mobile phones/devices to us for recycling only. You will not receive any payment for such mobile phones/devices. We accept the return of mobile phone/device boxes, battery chargers and mobile phone/device accessories but they do not increase mobile phone/device value and will not be returned if requested.</p>
                    <p>Other damage – for ad hoc damage and anything which affects our ability to refurbish or recycle your order there will be a reduction in price to reflect this damage. In these cases Cell Crazy will have the final decision on all device values.</p>
                    <p>By submitting an order through our site you warrant that the device(s) comply with these terms.</p>
                    <p>If you have a PIN or Password on any of your items you should remove this before sending.</p>
                    <p><strong>Pricing</strong></p>
                    <p>Prices offered on our website are subject to change at any time without notice. Mobile phone/device values may change from day to day which means that if you check the value of your mobile phone/device on any given day but do not place a sales order, you may be given a different value for the same mobile phone/device at a later time. This does not affect any other provisions in these terms and conditions.</p>
                    <p>Any special offers on mobile phone/device values are subject to particular terms which we may impose and may be varied or withdrawn at any time and without notice. Values are shown and payments are made in pounds sterling. Each mobile phone/device is processed separately even if included in a multiple mobile phone/device sales order.</p>
                    <p>When your order has been placed, the prices quoted are guaranteed for 14 days. If your phone/device is received after 14 days from the order placed date the updated, current prices will apply.</p>
                    <p><strong>Testing for Incorrect Information</strong></p>
                    <p>We test each mobile phone/device for compliance with our terms and conditions. We also check that the mobile phone/device is not red flagged (see below) according to CheckMEND details. Tests are carried out prior to and are the conditions for, payment. We may stipulate additional tests as we reasonably determine.</p>
                    <p>As mobile phones/devices can look similar, customers sometimes incorrectly identify them. If we find that the model you send is not as referred to in your sales order, we will email a value for the actual mobile phone/device, confirming the model.</p>
                    <p>We also test the device for the network it is locked to. In some cases, your device will receive a reduction if you have selected the incorrect network referred in your sales order.</p>
                    <p>You can choose to continue the sale for the revised value or decline it. If you decline it, we will return the mobile phone/device. The sale will not progress and our contract with you will terminate. To accept or decline a revised value, log on to your account where you will be given the revised value and be asked to either proceed or decline the revised value. If you do not respond within 3 (three) days, starting on the day on which we email the revised value, we will automatically process your sale after that time, using the new price. If you have queries about how models are identified, contact customer services (details below).</p>
                    <p><strong>Testing for Damage</strong></p>
                    <p>Where possible, we offer value for a damaged mobile phone/device but we are not obliged to do so nor purchase any damaged mobile phone/device.</p>
                    <p>If we determine your mobile phone/device is damaged, we may, at our discretion, pay for the damaged mobile phone/device but the value will be as indicated on our website. We will value the damaged mobile phone/device to take account of the damage and send a revised value by email.</p>
                    <p>In some cases, values will be zero if mobile phones/devices are beyond economical repair or have multiple faults (e.g. water damage and cracked LCD screen).</p>
                    <p>A revised value will only be given once the mobile phone/device has been tested or inspected. You can decide whether to continue with the revised value sale or whether to decline it in which case, we will return your mobile phone/device within 14 days, the sale will not continue and our contract with you will terminate.</p>
                    <p>To accept or decline a revised value, log on to your account where you will be given the revised value and asked to either proceed with the sale or decline the revised value. If you do not respond within 3 (three) days, starting on the day on which we email the revised value, we will automatically process your mobile phone/device sale after that time using the new price.</p>
                    <p>Mobile phones/devices in pieces or parts or mobile phones/devices which have no value will not be returned and we will recycle them.</p>
                    <p><strong>Checking Validity of Phone Ownership</strong></p>
                    <p>We will check the status of all mobile phones/devices received against the National CheckMEND database (using the unique IMEI number).</p>
                    <p>If your mobile phone/device is found to have a red flag by CheckMEND, it must be quarantined for 28 days whilst its status is reviewed. The mobile phone/device will have a red flag if it has been registered as lost, stolen or barred/blocked on the CheckMEND database.</p>
                    <p>If you are advised that your mobile phone/device has a red flag against it, you will need to contact CheckMEND in order to review the status of your mobile phone/device. You will be advised of the procedure required by email from us. The purpose of the quarantine period is to allow the rightful owner the opportunity to have the red flag removed in order that the mobile phone/device can be processed appropriately.</p>
                    <p>If, during the quarantine period the red flag is removed, your mobile phone/device will be processed and paid for in accordance with these terms and conditions and will not be returned.</p>
                    <p>However, if after the quarantine period has expired the red flag has not been removed then we are required by law to dispose of it and you will not receive any payment. UK legislation states that we cannot under any circumstances return the mobile phone/device during this 28-day period unless the red flag has been removed.</p>
                    <p>If we become aware of any issues you will be required to co-operate with the authorities and we reserve the right to withhold or cancel the payment.</p>
                    <p><strong>‘Activation Locked’ Devices</strong></p>
                    <p>If we receive a device with the ‘Activation Lock’ still activated and you do not respond within 3 (three) days, starting on the day on which we email you the ‘Activation Lock’ notification, we will revise the price to 5% of the full price. You can choose to accept the revised value or decline it. If you decline, we will return the device, the sale will not progress and our agreement will terminate. To accept or decline a revised value, log on to ‘my account’.</p>
                    <p><strong>Payments</strong></p>
                    <p>When we receive your order, we will check that it is complete, and that it meets our terms and conditions. Providing it does, we will send by your chosen method within 5 working days.</p>
                    <p>Under no circumstances will payment be dispatched before we receive and process your mobile phone/device.</p>
                    <p>If you have selected same day (faster) payment, we will pay by faster payment transfer directly into your account on the same day we process your device, subject to your device(s) being processed before 1pm on a working day and there being no amendment to your original valuation (in which case we will contact you outlining your further options).</p>
                    <p>If your payment date falls on a weekend or public holiday payment will be made on the next working day. If your bank account does not accept faster payments, a BACs payment will be automatically made.</p>
                    <p>Payment is in accordance with the method you select in the sales order process. The possible payment methods are cheque or BACS payment. Once you select a method for a particular sales order, you may choose any alternative payment option up until the process payment date. Once the payment has been processed it is no longer changeable.</p>
                    <p>Payment processing depends on third parties which we do not control. For payment by cheque, this involves a postal service and for BACS payments, a bank. We will not be liable for delay in your receipt of payment as a result of third party action or inaction.</p>
                    <p><strong>Cheque and BACS</strong></p>
                    <p>We aim to issue payment within 2 working days of the day on which your mobile phone/device is tested and confirmed to meet our terms and conditions where valuations do not change; or within 3 working days of the expiry of the three day period referred to above (see Testing sections above) where a mobile phone/device value does change. Timescales are indicative only and we do not guarantee to meet them.</p>
                    <p>We are advised by Royal Mail that customers should allow 2-3 working days for cheques to arrive and by the banks that customers should allow 3-5 working days to receive payment.</p>
                    <p>We may send payment for each mobile phone/device separately.</p>
                    <p>Payments are also subject to validation and security checks which we or third parties may stipulate from time to time.</p>
                    <p>Payments sent in the post will be sent via second class Royal Mail post. All valuations include VAT (or other applicable tax) at the prevailing rate.</p>
                    <p>If the damaged cheque is not received by us, a cancellation fee will apply and will be deducted from the re-issued cheque value.</p>
                    <p>If you have lost your cheque, you can request for it to be cancelled and reissued. A cancellation fee will apply and will be deducted from the re-issued cheque value.</p>
                    <p><strong>Postage and Returns</strong></p>
                    <p>We Strongly recommend our customers to send their device to us with Royal Mail Special Delivery or Tracked Delivery service.</p>
                    <p>Please note: Royal Mail recently introduced new guidelines regarding shipping products containing lithium batteries. To find out more information about sending lithium batteries via Royal Mail please ask at the post office or visit the Royal Mail website, www.royalmail.com.</p>
                    <p>We will send you a reminder by email if we have still not received your mobile phone/device within 7 &amp; 14 days of your sales pack order. We will not be liable if the mobile phone/device is subject to loss or damage before receipt at our warehouse. Equally, if for any reason your mobile phone/device is returned to you, you retain responsibility for risk in the mobile phone/device and we shall not be responsible for any damage in transit.</p>
                    <p>We do not receive deliveries on weekends and bank holidays. We strongly recommend that you pack the mobile phone/device carefully to minimise risk of damage.</p>
                    <p>If your mobile phone/device is lost in the post we will advise you how you might claim against the Royal Mail but we cannot guarantee this to be successful.</p>
                    <p>If we receive a damaged package, the package and mobile phone/device (if we received it) will be returned to you so that you may claim for the loss directly from Royal Mail if you wish. By sending the package back to you we do not guarantee that the claim will be successful and we will not have any liability for any claims which are refused by external parties. For more information about making claims with Royal Mail, please visit www.royalmail.com. This information is provided for your information only.</p>
                    <p>If we return your mobile phone/device, we use Royal Mail second class delivery at our cost. If Royal Mail cannot deliver the mobile phone/device, we will ask them to return it to our Head Office – Cell Crazy, 407 Montrose Avenue, Slough, SL1 4TJ. and we will contact you by email to check your address. Once we receive confirmation that the address is correct we will resend the mobile phone/device. If a mobile phone/device is returned to us for a second time or if we have emailed you and we do not receive a response within 14 days, we will treat the mobile phone/device as our property, retain it and process the sale and will send you payment at the revised mobile phone/device value that applies on the date of the second return receipt by us or the fourteenth day after we have emailed you.</p>
                    <p>We recommend that you wrap the phone(s) in a thin layer of cushioning. If you choose to use your own packaging, you must pack the mobile phone/device in a strong rigid container e.g. a cardboard box, encased in a material which prevents movement in transit e.g bubblewrap.</p>
                    <p>The package must be sent via Royal Mail tracked or if you are sending high value items we recommend sending via Royal Mail Special Delivery (at your own cost). Take your package to the Post Office and get your proof of postage and tracking number. For Royal Mail tracked parcels, the tracking number insures your phone for up to £100, plus you can track your package online at www.royalmail.com. Please note: the pack will be tracked online to our local delivery office. It will then appear as “delivered” on the Royal Mail system, but this means delivered to our local delivery office. From there it can take 1-2 days to arrive with us and will not be tracked directly to our premises. Once we receive it, we’ll send you an email.</p>
                    <p>PLEASE ENSURE THAT YOU ARE HAPPY TO SEND THE DEVICE TO US AND THAT IT IS WITHIN YOUR RIGHTS TO DO SO.</p>
                    <p><strong>Consumers</strong></p>
                    <p>By placing an order through our site, you warrant that:</p>
                    <ul>
                    <li>You are resident in Great Britain or Northern Ireland;</li>
                        <li>You are accessing our site from that country;</li>
                    <li>You are legally capable of entering into a binding contract;</li>
                    <li>By submitting an order with Cell Crazy Ltd you agree to create an account with Cell Crazy Ltd unless you’ve told us otherwise by selecting the appropriate option on the order form.</li>
                    <li>You are at least 18 years old; or</li>
                    <li>If you are under 18 years of age, that you have obtained your parent’s or guardian’s consent to sell your device to us for the sum indicated via our website.</li></ul>

                    <p>You and your parents or guardians release us of any liabilities or claims that may arise if you send the phone to us in breach of this warranty. If you deal as a consumer any provision of this contract which is of no effect to a consumer shall not apply. Your statutory rights are not affected by this contract. For the purposes of these terms and conditions, “consumer” means an individual who neither makes this contract in the course of a business, nor holds himself out as doing so, as defined by the Unfair Contract Terms Act 1977.</p>
                    <p>Please note:</p>
                    <ol class="list-group">
                        <li class="list-group-item">You are responsible for cancelling any airtime contract linked to each handset. We are not responsible for any call costs arising before, or after, receipt of your handset, or arising from any other circumstances whatsoever.</li>
                        <li class="list-group-item">Please remove SIM cards before sending us your mobile. Any SIM cards received by us will be destroyed, and so obviously cannot be returned. (We will dispose of them appropriately.) We accept no liability in the event that any phone that has been sent with its SIM card is lost and charges are then incurred. You shall continue to be responsible for such charges.</li>
                        <li class="list-group-item">Please ensure all personal data is removed from devices before sending them to Envirofone.com. This includes but is not limited to all personal details, SMS, photos, videos, games, songs or other data. Envirofone.com will not accept responsibility for the security, protection, confidentiality or use of such data. By sending your device to us you agree to release us from all and any losses, claims or damages with respect to the data enclosed or stored therein or on any media used in conjunction with the device.</li>
                        <li class="list-group-item">To delete data from your iPhone please follow the instructions below:
                            <ol>
                                <li>From standby select Menu &gt; Settings &gt; General &gt; Reset</li>
                                <li>Select Erase All Content and Settings</li>
                                <li>Press Erase iPhone</li>
                                <li>Press Erase iPhone</li>
                            </ol>
                        </li>
                    </ol>
                    <p>Handset will switch off and restart. This may take several minutes. Please do not switch handset off during reset.</p>
                    <p>Selling – How the Contract Is Formed Between You And Us</p>
                    <p>Our site is only intended for use by people registered with us and resident in Great Britain and Northern Ireland. At our complete discretion we may accept or reject orders from people outside of these territories.</p>
                    <p>During the online process, you will be asked to agree to these terms and conditions. You must read them carefully as they form the contract between us and you and you will be bound by them. If and when you agree to them, we will then send a confirmation that we have received your sales pack request. The contract between us is formed when we send that confirmation to you. Any terms or conditions referred to in a sales order by you, anywhere or at any time, have no effect. Any variation to these terms and conditions must be confirmed in writing by us. If you do not agree to our terms and conditions, we will not progress your trade.</p>
                    <p>A full explanation about how to place an order is in the FAQ section of our website.</p>
                    <p>The contract between you and us is binding on you and us and on our respective successors and assigns. You may not transfer, assign, charge or otherwise dispose of a contract, or any of your rights or obligations arising under it, without our prior written consent We may transfer, assign, charge, sub-contract or otherwise dispose of a contract, or any of our rights or obligations arising under it, at any time during the term of the contract.</p><h4 class="text-uppercase">Our Liability And Risk</h4>
                    <p>If we fail to comply with these terms and conditions, we are responsible for loss or damage you suffer that is a foreseeable result of our breach of these terms and conditions or our negligence, but we are not responsible for any loss or damage that is not foreseeable. Loss or damage is foreseeable if they were an obvious consequence of our breach or if they were contemplated by you and us at the time we entered into this contract.</p>
                    <p>We only supply our services and purchase or recycle mobile phones/devices for consumers and we have no liability to you for any loss of profit, loss of business, business interruption, loss of business opportunity, loss of data; loss of use of money; losses which you incur as a result of a failure by you to comply with your obligations under these terms and conditions, including without limitation, third party charges which are raised for your account as a result of a failure to adhere to your obligations regarding removal of SIM cards and other data.</p>
                    <p>We do not exclude or limit in any way our liability for:</p>
                    <ul>
                        <li>death or personal injury caused by Our negligence or the negligence of Our employees, agents or subcontractors;</li>
                        <li>fraud or fraudulent misrepresentation;</li>
                        <li>breach of the terms implied by section 2 of the Supply of Goods and Services Act 1982 (title and quiet possession); and</li>
                        <li>breach of the terms implied by sections 3, 4 and 5 of the Supply of Goods and Services Act 1982 (description, satisfactory quality, fitness for purpose and samples).</li>
                    </ul>
                    <p>You must own all rights, title and interests in any device(s) that you send to us. Ownership of the device(s) will only pass to us when we receive the devices, in accordance with these terms and conditions, and we have dispatched payment to you. Mobile phones/devices will remain at your risk until we have issued payment for the mobile phone/device.</p>
                    <h4 class="uppercase">Complaints</h4>
                    <p><strong>Please note we have a complaints procedure. Our contact details for all purposes are:</strong></p>
                    <p>Online Customer Services<br> Cell Crazy Ltd<br> 407 Montrose Avenue<br> Slough<br> Berkshire<br>SL1 4TJ</p>
                    <p><strong>Email:</strong> info@cellcrazy.co.uk<br> <strong>Tel:</strong> 01753696664</p><h4 class="text-uppercase">Company Info</h4>
                    <p><strong>Company number:<br> </strong>7501180</p>
                    <p><strong>Registered address:</strong><br> 407 Montrose Avenue<br> Slough<br> United Kingdom<br>SL1 4TJ</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Terms & Conditions Section End -->

@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
