@extends('frontend.layouts.master')
@section('title', 'Terms And Conditions')
@push('custom_css')
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <!-- Terms Condition banner -->
    <div class="about">
        <section class="terms-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="terms-heading">
                            <h1>{{$terms->heading ?? 'Terms And Conditions'}}</h1>
                            <div>{!!$terms->description ?? ''!!}</div>
                            {{-- <h1>Terms and Conditions:</h1> --}}

                            {{-- <p>(DRNK UP HARD SELTZER LLC) Terms & Conditions this website is maintained by DRNK UP HARD
                                SELTZER LLC for the personal use and enjoyment
                                of those of legal age for the consumption of alcoholic beverages. To ensure a safe, pleasant
                                environment for all of our visitors and users,
                                we have established these Terms of Use. In this way, you know what you can expect from us
                                and what we expect from you. By accessing any areas of this website
                                you agree to be legally bound and to abide by the terms set forth below. Please exit this
                                site if you do not agree to the Terms of Use, are not of legal age to visit this site,
                                or live in a country where consumption of alcoholic beverages is not permitted. LINKS It
                                should be noted that any links to and from this site are provided for your convenience.
                                The sites that you may link to through this website are not part of DRNK UP HARD SELTZER LLC
                                website. </p>

                            <p>Should you leave this site via a link contained herein, the content that you view therein is
                                not provided by DRNK UP HARD SELTZER LLC.
                                Accordingly, DRNK UP HARD SELTZER LLC is not responsible for, nor has it developed or
                                reviewed the ever-changing and updated content at those sites.
                                DRNK UP HARD SELTZER LLC makes no guarantees, representations or warranties as to, and shall
                                have no liability for, any electronic content delivered on any third-party website,
                                including, without limitation, the accuracy, subject matter, quality or timeliness of such
                                electronic content. The fact that DRNK UP HARD SELTZER LLC may be linked to other sites
                                does not constitute an endorsement or recommendation of those sites, the views expressed on
                                the sites, or the products or services offered on the sites. DISCLAIMERS OF WARRANTIES
                                AND DAMAGES you expressly agree that use of this site is at your sole risk. Every effort has
                                been made to ensure the accuracy of the information on the DRNK UP HARD SELTZER LLC
                                website and DRNK UP HARD SELTZER LLC intends to take reasonable steps to prevent the
                                introduction of viruses or other harmful components on this site. However, DRNK UP HARD
                                SELTZER
                                LLC does not warrant that any of the information,
                                materials or content on the site or functions of the website are accurate, complete or error
                                free or free of any virus or other harmful components or that use of the site will be
                                uninterrupted. </p>
                            <p> DRNK UP HARD SELTZER LLC shall not be liable for any damages arising from any defect in the
                                accuracy, quality, completeness or timeliness of the data, information, or content of the
                                site or for harm caused by a virus or other harmful component on or downloaded from this
                                site. This website, including all content, software, functions, materials and information,
                                is provided by DRNK UP HARD SELTZER LLC on an “as is” basis. DRNK UP HARD SELTZER LLC makes
                                no representations, express or implied, as to the operation of the site or its content,
                                software, functions, materials and information. To the maximum extent permissible by
                                applicable law, DRNK UP HARD SELTZER LLC disclaims all warranties, express or implied,
                                including, but not limited to, implied warranties of fitness for a particular purpose. DRNK
                                UP HARD SELTZER LLC shall under no circumstances be liable to any users and/or third party
                                for any damages of any kind arising from the use of this site, including, but not limited
                                to, direct, indirect, special, punitive or consequential damages even if DRNK UP HARD
                                SELTZER LLC has been advised of the possibility of such damages. UZI Hard Seltzer LLC’s
                                maximum liability is limited to a refund of the purchase price paid for any product
                                purchased through this site.
                            </p>
                            <h2>PRIVACY NOTICE At DRNK UP HARD SELTZER LLC, </h2>
                            <p> we recognize and respect the importance of maintaining the privacy of our customers and
                                website users and have established a Privacy policy as a result. In our Privacy Policy we
                                describe why we gather personal information, what information we collect, how we collect it
                                and what we use the information for. We encourage you to carefully read our Privacy Policy.
                                To view our Privacy Policy click here. By accessing this website you agree to be bound by
                                the terms of the Privacy Policy and acknowledge that while DRNK UP HARD SELTZER LLC will
                                take reasonable security precautions concerning electronic data and communications, it is
                                not responsible for any harm caused by interception of such data and communications. </p>

                            <h2>TERMINATION OF USAGE DRNK UP HARD SELTZER LLC</h2>
                            <p>may terminate or suspend your access to all or part of this web site, without notice, for any
                                conduct that DRNK UP HARD SELTZER LLC, in its sole discretion, believes is in violation of
                                any applicable law or is harmful to the interests of DRNK UP HARD SELTZER LLC, another user,
                                a third-party provider, merchant, sponsor or service provider. USER INPUT Visitors to this
                                web site who send electronic mail or other input to DRNK UP HARD SELTZER LLC through this
                                website acknowledge that such electronic mail and/or other input can be used by DRNK UP HARD
                                SELTZER LLC for any purpose without compensation to the contributor. In order to prevent any
                                misunderstandings regarding the origin of ideas or concepts, DRNK UP HARD SELTZER LLC cannot
                                accept any ideas or suggestions for its products, merchandise, promotions, advertising,
                                names, designs, artwork, slogans, or any other trademarks. Further, you agree that any
                                ideas, concepts, techniques or other materials that you send to DRNK UP HARD SELTZER LLC may
                                be used by DRNK UP HARD SELTZER LLC for whatever reason without compensation or attribution.
                                APPLICABLE LAWS This site is created and controlled by DRNK UP HARD SELTZER in the State of
                                California, USA. As such, any claim relating to this website, the services provided through
                                this website or to these Terms of Use shall be governed by the substantive laws of the State
                                of California, without giving effect to any principles of conflicts of law. </p>
                            <p>TRADEMARKS ©UZI HARD SELTZER. The content on this site and/or its compilation or arrangement
                                is the property of DRNK UP HARD SELTZER LLC and/or its content providers, and is protected
                                by U.S. and international copyright laws. Users of this website may not copy, redistribute
                                or republish the content on this site for any purpose other than individual personal use
                                without the express written permission of DRNK UP HARD SELTZER LLC. A trademark can be a
                                word, phrase, symbol, or design that distinguishes the source of goods or services. It can
                                also, as trade dress, be the appearance of a product or its packaging. The following is a
                                non-exhaustive list of registered trademarks and service marks owned by DRNK UP HARD SELTZER
                                LLC. These and any other marks owned by DRNK UP HARD SELTZER LLC should not be used without
                                written permission from DRNK UP HARD SELTZER LLC and should not be used in any manner that
                                is likely to cause consumer confusion as to the source of their products and services. DRNK
                                UP HARD SELTZER UZI HARD SELTZER etc. </p>
                            <p><b>Responsibility Page:</b> Appreciating and engaging in responsible alcohol consumption
                                involves more than just enjoying the immediate sensory pleasures. It requires an awareness
                                of the potential consequences. While alcoholic beverages offer a rich tapestry of tastes,
                                aromas, and appearances, excessive or irresponsible consumption can result in significant
                                and tragic outcomes, both for individuals and the wider community. In contrast to some
                                European customs, where wine and beer are often introduced within family settings to impart
                                cultural understanding, American society often lacks structured education about alcohol's
                                effects. This absence leaves many individuals to navigate the realm of alcohol through trial
                                and error, potentially leading to dire consequences. At DRNK UP HARD SELTZER LLC, we
                                advocate for the appreciation of our products for their taste, complexity, and sheer
                                enjoyment.</p>
                            <p>We promote moderation in consumption, encouraging drinkers to savor our hard seltzers
                                responsibly. We commend the efforts of organizations
                                and initiatives focused on educating individuals about alcohol consumption, supporting their
                                aim to foster responsible attitudes and behaviors toward drinking.
                                Additionally, in compliance with government regulations and our commitment to
                                accountability, our product packaging includes a government-mandated warning regarding the
                                health
                                implications of consuming alcoholic beverages. This advisory underscores the importance of
                                making informed decisions and underscores the potential risks linked with alcohol use,
                                including impaired driving and health issues.</p>
                            <ul>
                                <li><b> Government warning:</b></li>
                                <li> (1) According to the Surgeon General, pregnant women should refrain from consuming
                                    alcoholic beverages due to the risk of birth defects.</li>
                                <li>(2) Drinking alcoholic beverages impairs your ability to operate machinery or drive a
                                    vehicle and may lead to health complications. Privacy Policy: We've crafted this Privacy
                                    Policy to safeguard your privacy while you browse our site, outlining the types of
                                    information we collect and how it's utilized. As our services and technologies evolve,
                                    and as we expand or refine our offerings, this Privacy Policy may be subject to updates.
                                    We encourage you to review it periodically. At DRNK UP HARD SELTZER LLC, we're dedicated
                                    to safeguarding your privacy in accordance with federal and state laws. These
                                    regulations mandate that we inform you about how we gather, utilize, share, and
                                    safeguard your personal information, while also delineating the permissible uses of such
                                    data. Please take the time to read this Policy carefully to comprehend how we handle the
                                    personal information we collect. When you reach out to us for assistance with inquiries
                                    or concerns, any personal information you provide is entirely voluntary. We gather and
                                    employ only the necessary minimum of personal information to address your queries and
                                    issues. There may be other instances where we collect your personal information as well.
                                    Typically, this involves obtaining limited details such as your name, address, phone
                                    number, birth date, and/or email address. However, for specific purposes like purchases
                                    or resume submissions, we may require additional personal information such as credit
                                    card details or resume-related information. Instances in which we may collect your
                                    personal information include, but are not restricted to:
                                </li>
                                <li> 1. Making a purchase from our E-Store</li>
                                <li>2. Participating in a contest or promotion </li>
                                <li>3. Subscribing to our newsletter</li>
                                <li>4. Applying for a job position</li>
                                <li>5. Commenting on our blog posts; </li>
                                <li>6. Submitting a question or comment via our Contact Us page. Where does your Information
                                    go? Within DRNK UP HARD SELTZER LLC,
                                    we utilize your personal information for various purposes, such as processing purchases,
                                    contest entries, promotions, or resumes,
                                    and ensuring appropriate responses to your comments or inquiries. To enhance our
                                    services, we collaborate with third-party providers
                                    who assist in delivering certain functionalities of this website. On occasion, your
                                    information may be disclosed to these third parties,
                                    who have contractually agreed not to misuse your personal information beyond the scope
                                    of the services they provide for this website. For instance:
                                    - When making a purchase, your details may be shared with vendors to fulfill your order
                                    and with credit card companies to complete the transaction securely.
                                    - Submitting your resume may involve processing through a third-party vendor for
                                    streamlined management. - Participation in contests or newsletter subscriptions
                                    may entail sharing your information with third-party vendors to facilitate these
                                    activities effectively. - Additionally, we may share aggregated, non-identifiable
                                    data about our general readership with third parties for marketing purposes and to
                                    foster new vendor and customer relationships. Cookies and How we use them:
                                    This website may automatically gather some non-personal data from your device, like the
                                    type of web browser and operating system you're using, as well as the
                                    domain name of the website you came from. We use this information in a general sense to
                                    understand our visitors better and make ongoing technical enhancements to the website.
                                    When you browse this site, a small text file known as a "cookie" may be stored on your
                                    device to track your interactions, such as the pages you've viewed or activities you've
                                    engaged in. Cookies also help us prevent multiple contest entries from the same
                                    individual. Most web browsers allow you to manage cookies by erasing them, blocking
                                    them, or
                                    receiving warnings before they're stored. However, opting out of cookies might limit
                                    your access to certain website features like contests. If you select the "Remember Me"
                                    option when entering the site, cookies will be used to associate the birth date you
                                    provided with your IP address. This way, you won't need to re-enter the same information
                                    every time you visit. Remember not to check "Remember Me" on shared computers for
                                    privacy reasons. Linking: Please be aware that this website may include links to other
                                    websites
                                    operated by third parties. We typically have no affiliation with or authority over the
                                    content on these external websites, each of which may have distinct privacy policies
                                    and practices. <b>Legal Drinking Age: </b>
                                    Our website is designed for individuals who are of legal drinking age. </li>
                                <li><b>Questions?:</b> To submit an online question, comment, or complaint, please visit our
                                    Contact Us page. </li>
                                <li><b>Security:</b> We employ a range of measures, including physical, electronic, and
                                    managerial protocols, to protect the information collected on this site. These measures
                                    encompass firewalls, encryption, intrusion detection, and ongoing site monitoring.
                                    Access to personally identifiable information is restricted to employees who require it
                                    for their roles. Despite our efforts, no data protection method is foolproof, so while
                                    we endeavor to safeguard your information, we cannot ensure its absolute security. </li>
                                <li><b>European Economic Area Visitors and Privacy Shield:</b> This website is hosted and
                                    operated in the United States ("US") and various other locations worldwide. By using
                                    this site, you agree to the transfer of your personal information to the US. If you're
                                    accessing this site from outside the US, please note that US law may not offer the same
                                    privacy protections as those in your jurisdiction. We adhere to the EU-US Privacy
                                    Shield, safeguarding consumer personal data received from clients in the European
                                    Economic Area and Switzerland in line with Privacy Shield Principles. We've designated
                                    the American Arbitration Association to handle complaints and provide recourse at no
                                    cost, including the option for binding arbitration under certain conditions.</li>
                                <li>Additionally, we ensure the protection of all data transferred to third parties through
                                    contracts, stipulating that your data is used only for specified purposes consistent
                                    with your authorization. We require third-party recipients to uphold the same level of
                                    protection as outlined in Privacy Shield principles and take necessary steps to ensure
                                    effective processing of personal information. Upon request, we can provide a summary or
                                    representative copy of relevant privacy provisions within our contract with the
                                    third-party recipient. For further information on Privacy Shield and to view our
                                    certification,
                                </li>
                                <li><a href="https://www.privacyshield.gov">https://www.privacyshield.gov</a>
                                </li>
                                <li><b>Review and Correction of Your Information:</b> You have the option to review and
                                    modify the information we gather about you by reaching out to us directly. In cases
                                    where your data has been shared with a third party, as outlined in this Privacy Policy,
                                    that party will have received their own copy of your information. If you've been
                                    contacted by one of these third parties and need to rectify or delete your data, kindly
                                    get in touch with them directly.</li>
                                <li><b>California Privacy Rights: </b> Under California law, residents have the right to
                                    request details from companies they have an established business relationship with
                                    regarding the sharing of personal information with third parties for direct marketing
                                    purposes. We do not share any personal information of California consumers with third
                                    parties for marketing purposes without consent. California customers seeking additional
                                    information about our adherence to this law or with privacy-related inquiries can
                                    contact us using the provided contact information below.</li>
                                <li><b>Updates: </b> This Privacy Policy was last revised on June 15, 2024. We periodically
                                    update our Privacy Policy, so we encourage you to check it frequently. By continuing to
                                    use the site, you agree that your information may be used in accordance with the updated
                                    policy. If you disagree with the changes, please discontinue using the site and inform
                                    us that you do not consent to your information being used in line with the revisions.
                                </li>




                            </ul>
                            <h2 style="text-align:center;">UZI Terms: </h2>
                            <h5 style="text-align:center;">(DRNK UP HARD SELTZER LLC)</h5>

                            <h2>Terms & Conditions </h2>
                            <p>This website is maintained by DRNK UP HARD SELTZER LLC for the personal use and enjoyment of
                                those of legal age for the consumption of alcoholic beverages. To ensure a safe, pleasant
                                environment for all of our visitors and users, we have established these Terms of Use. In
                                this way, you know what you can expect from us and what we expect from you. By accessing any
                                areas of this website you agree to be legally bound and to abide by the terms set forth
                                below. Please exit this site if you do not agree to the Terms of Use, are not of legal age
                                to visit this site, or live in a country where consumption of alcoholic beverages is not
                                permitted.</p>

                            <h2> LINKS</h2>

                            <p>It should be noted that any links to and from this site are provided for your convenience.
                                The sites that you may link to through this website are not part of DRNK UP HARD SELTZER LLC
                                website. Should you leave this site via a link contained herein, the content that you view
                                therein is not provided by DRNK UP HARD SELTZER LLC. Accordingly, DRNK UP HARD SELTZER LLC
                                is not responsible for, nor has it developed or reviewed the ever-changing and updated
                                content at those sites. DRNK UP HARD SELTZER LLC makes no guarantees, representations or
                                warranties as to, and shall have no liability for, any electronic content delivered on any
                                third-party website, including, without limitation, the accuracy, subject matter, quality or
                                timeliness of such electronic content. The fact that DRNK UP HARD SELTZER LLC may be linked
                                to other sites does not constitute an endorsement or recommendation of those sites, the
                                views expressed on the sites, or the products or services offered on the sites.</p>

                            <h2>DISCLAIMERS OF WARRANTIES AND DAMAGES</h2>
                            <p>You expressly agree that use of this site is at your sole risk. Every effort has been made to
                                ensure the accuracy of the information on the DRNK UP HARD SELTZER LLC website and DRNK UP
                                HARD SELTZER LLC intends to take reasonable steps to prevent the introduction of viruses or
                                other harmful components on this site. However, DRNK UP HARD SELTZER LLC does not warrant
                                that any of the information, materials or content on the site or functions of the website
                                are accurate, complete or error free or free of any virus or other harmful components or
                                that use of the site will be uninterrupted. DRNK UP HARD SELTZER LLC shall not be liable for
                                any damages arising from any defect in the accuracy, quality, completeness or timeliness of
                                the data, information, or content of the site or for harm caused by a virus or other harmful
                                component on or downloaded from this site.</p>

                            <p>This website, including all content, software, functions, materials and information, is
                                provided by DRNK UP HARD SELTZER LLC on an “as is” basis. DRNK UP HARD SELTZER LLC makes no
                                representations, express or implied, as to the operation of the site or its content,
                                software, functions, materials and information. To the maximum extent permissible by
                                applicable law, DRNK UP HARD SELTZER LLC disclaims all warranties, express or implied,
                                including, but not limited to, implied warranties of fitness for a particular purpose. DRNK
                                UP HARD SELTZER LLC shall under no circumstances be liable to any users and/or third party
                                for any damages of any kind arising from the use of this site, including, but not limited
                                to, direct, indirect, special, punitive or consequential damages even if DRNK UP HARD
                                SELTZER LLC has been advised of the possibility of such damages. UZI Hard Seltzer LLC’s
                                maximum liability is limited to a refund of the purchase price paid for any product
                                purchased through this site.</p>

                            <h2>PRIVACY NOTICE</h2>


                            <p>At DRNK UP HARD SELTZER LLC, we recognize and respect the importance of maintaining the
                                privacy of our customers and website users and have established a Privacy policy as a
                                result. In our Privacy Policy we describe why we gather personal information, what
                                information we collect, how we collect it and what we use the information for. We encourage
                                you to carefully read our Privacy Policy. To view our Privacy Policy click here. By
                                accessing this website you agree to be bound by the terms of the Privacy Policy and
                                acknowledge that while DRNK UP HARD SELTZER LLC will take reasonable security precautions
                                concerning electronic data and communications, it is not responsible for any harm caused by
                                interception of such data and communications.</p>

                            <h2>TERMINATION OF USAGE</h2>
                            <p>DRNK UP HARD SELTZER LLC may terminate or suspend your access to all or part of this web
                                site, without notice, for any conduct that DRNK UP HARD SELTZER LLC , in its sole
                                discretion, believes is in violation of any applicable law or is harmful to the interests of
                                DRNK UP HARD SELTZER LLC, another user, a third-party provider, merchant, sponsor or service
                                provider.</p>

                            <h2>USER INPUT</h2>

                            <p>Visitors to this web site who send electronic mail or other input to DRNK UP HARD SELTZER LLC
                                through this website acknowledge that such electronic mail and/or other input can be used by
                                DRNK UP HARD SELTZER LLC for any purpose without comp</p> --}}


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('footer')
    @include('frontend.partials.footer')
@endsection
@push('custom_js')
@endpush

