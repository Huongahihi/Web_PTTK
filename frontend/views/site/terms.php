<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\components\FHtml;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 nav-tabs-col">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#terms" aria-controls="terms" role="tab"
                                                          data-toggle="tab">Terms of Use</a></li>
                <li role="presentation"><a href="#privacy" aria-controls="privacy" role="tab" data-toggle="tab">Privacy
                        Policy</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="tab-content">
    <div class="page-section terms-section tab-pane active" role="tabpanel" id="terms">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-col">
                    <h1 class="section-title">
                        Website Terms and Conditions of Use
                    </h1>
                </div>
                <div class="col-md-12">
                    <div class="term-div">
                        <h3><span class="number">1.</span><span class="title-text">Terms of Use</span></h3>
                        <p>Please take some time to read the terms and conditions of use carefully before using or
                            registering on our website. Your use of the website shall signify your acceptance of the
                            terms and conditions.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">2.</span><span class="title-text">User License</span></h3>
                        <p>Trayolo provide users with access to trip planning services and travel information about
                            every region in which Trayolo operates. </p>
                        <p>The User must also understand and agree that the service may include communications, such as
                            service announcements, administrative messages and a regular Newsletter, and that these
                            communications are considered part of the membership agreement. The User is welcome to
                            communicate with us if you wish to opt out of receiving these additional services.</p>
                        <p>The User must understand and agree that the Service is provided to the best accuracy and that
                            Trayolo cannot be held responsible for the timeliness, mis-delivery, deletion or failure to
                            store any user communications, information, and/or personalization settings.</p>
                        <p>Trip Plans/Itineraries created by the User using the www.trayolo.com services will be
                            considered public information and will thus be available to view by other users using the
                            Trayolo services. Trayolo retains the right to use these trip plans and/or itineraries for
                            any purpose that it deems fit for the benefit of the Trayolo community.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">3.</span><span class="title-text">Disclaimer</span></h3>
                        <p>Trayolo does not warrant or make any representations concerning the accuracy, likely results,
                            or reliability of the use of the materials on its Internet website; and/or relating to any
                            such materials and/or on any sites linked to this site.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">4.</span><span class="title-text">Links</span></h3>
                        <p>Trayolo cannot be held responsible for all of the sites linked to its website and is not
                            responsible and/or liable for the contents of any such linked site. Trayolo expects any and
                            all websites with a link on Trayolo to adhere to best practices laws and regulations within
                            all applicable jurisdictions and does not endorse materials or views on these linked
                            websites. The inclusion of any link does not imply endorsement of the site by Trayolo and/or
                            affiliated bodies. The use of any such linked websites are at the User's own risk.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">5.</span><span class="title-text">Cookies</span></h3>
                        <p>By using this website, you consent to the use of cookies in accordance with the Trayolo
                            cookie policy. For more information see our privacy policy page.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">6.</span><span class="title-text">Terms of Use for Website Modifications</span>
                        </h3>
                        <p>Trayolo.com may revise these Terms & Conditions of Use for its website at any time without
                            notice. By using this website you are agreeing to be bound by the most current version of
                            these Terms & Conditions of Use at any given time.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">7.</span><span class="title-text">Governing Law</span></h3>
                        <p>Any claim relating to Trayolo shall be governed by the laws of Malaysia without regard to its
                            conflict of law provisions.</p>
                        <p>General Terms and Conditions applicable to Use of a Website.</p>
                        <p>Recognizing the global nature of the Internet, the User agrees to comply with all local rules
                            regarding Online Conduct and Acceptable Content. Specifically, the User agrees to comply
                            with all applicable laws regarding the transmission of technical data exported/imported from
                            the country in which the User resides.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">8.</span><span class="title-text">Indemnity</span></h3>
                        <p>You, the User, agree to indemnify Trayolo; and, hold Trayolo, and its subsidiaries,
                            affiliates, officers, agents, co-branders or other partners, and employees, harmless from
                            any claim or demand, including attorneys' fees, made by any third party due to or arising
                            out of Content you, the User, submit, post, transmit or make available through the Service,
                            your use of the Service, your connection to the Service, your violation of the terms of
                            usage, or your violation of any rights of another user of the service.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">9.</span><span class="title-text">No Resale of Service</span></h3>
                        <p>You agree not to reproduce, duplicate, copy, sell, resell or exploit for any commercial
                            purposes, any portion of the Service, use of the Service, or access to the Service.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">10.</span><span class="title-text">Trademark Information</span></h3>
                        <p>Trayolo retains the full legal rights to www.trayolo.com, the Trayolo.com logo, and other
                            Trayolo.com logos, mottos, all products, and service names as solely owned trademarks of
                            Trayolo. The User or any third part is prohibited from using any of these materials without
                            express permission from Trayolo.com. Thus, the User or a third party must agree to not
                            display or use in any manner, the materials which fall under the trademark of Trayola,
                            unless prior approval is obtained.</p>
                    </div>

                    <div class="term-div">
                        <h3><span class="number">11.</span><span class="title-text">Feedback and Information</span></h3>
                        <p>Any feedback you (the User) provide to this website shall be deemed to be non-confidential.
                            Trayolo.com retains the right to be free to use such information on an unrestricted basis.
                            Further, by submitting any feedback, the User represents and warrants that Trayolo may use
                            use information provided to its best discretion.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="page-section terms-section tab-pane" role="tabpanel" id="privacy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="section-title">
                        Privacy Policy
                    </h1>
                </div>
                <div class="col-md-12">
                    <div class="privacy-div">
                        <p>Your privacy is very important to us. This Policy in order for you to understand how we
                            collect, use, communicate and disclose and make use of personal information. The following
                            outlines our privacy policy.</p>
                        <ul>
                            <li>We will gather and utilize individual data exclusively with the target of satisfying
                                those reasons determined by us and for other best practices purposes, unless we acquire
                                the assent of the individual concerned or as required by law.
                            </li>
                            <li>We will only hold sensitive information for the duration it is deemed necessary for
                                those purposes.
                            </li>
                            <li>We will collect individual data by legitimate and reasonable means and, where suitable,
                                with the knowledge or assent of the individual concerned.
                            </li>
                            <li>Personal information ought to be applicable to the reasons for which it is to be
                                utilized, and, to the degree appropriate for those reasons, should be accurate,
                                complete, and up-to-date.
                            </li>
                            <li>We will protect personal individual data by sensible and pertinent security shields
                                against misfortune or burglary, and unapproved access, revelation, replicating, use or
                                alteration.
                            </li>
                            <li>We will make promptly accessible to clients data about our approaches and policies
                                regarding the management of personal information.
                            </li>
                        </ul>
                        <p>We are focused on leading our business as per these standards keeping in mind the end goal is
                            to ensure that the confidentiality of personal information is ensured and protected.</p>
                    </div>

                    <div class="privacy-div">
                        <h3>Cookies In Use on This Site and How they Benefit You</h3>
                        <p>Our website uses cookies, as almost all websites do, to help provide you with the best
                            experience we can. Cookies are small text files that are placed on your computer or mobile
                            phone when you browse websites</p>
                        <p class="ul-title">Our cookies help us:</p>
                        <ul class="has-title">
                            <li>Ensure the website work to your expectations on every visit</li>
                            <li>Save you having to login every time you visit the site</li>
                            <li>Remember your settings between visits</li>
                            <li>Improve the speed/security of the site</li>
                            <li>Allow you to share with social networks like Facebook</li>
                            <li>Personalise our site to you to help you get what you require quicker</li>
                            <li>Continuously enhance our website for you</li>
                            <li>Help our marketing to be more efficient</li>
                        </ul>

                        <p class="ul-title">We do not utilize cookies to:</p>
                        <ul class="has-title">
                            <li>Collect any sensitive or personally identifiable data (without your express consent)
                            </li>
                            <li>Collect any delicate data (without your express authorization)</li>
                            <li>Pass personal identification data to third parties</li>
                        </ul>
                        <p>You can learn more about all the cookies we use below.</p>
                    </div>

                    <div class="privacy-div">
                        <h3>Allowing us authorization to utilize cookies</h3>
                        <p>If the settings on your browser allow it to accept cookies, we trust this and your continued
                            use of our website, to mean that you have accepted this condition. Should you wish to remove
                            or not utilize cookies from our site you can learn how to do this here. However, doing so
                            will likely mean that our site will not work as you would expect.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
