<?php
/*
    Template Name: Privacy Policy
*/
get_header();
get_template_part('partials/page-head');
?>
<!-- main -->
<div role="main">
    <div class="row">
        <div class="columns twelve">
            <div class="main-content">
                <div class="privacy-content">
                    <h3><?php site_ops_practice_name(); ?> Internet Privacy & Security Policy</h3>
                    <p><?php site_ops_practice_name(); ?> respects your privacy and is committed to protecting sensitive information at all times. This online privacy statement explains how <?php site_ops_practice_name(); ?> collects, uses and safeguards information on <?php get_site_url(); ?>. This Internet Privacy Statement applies ONLY to information collected by the <?php site_ops_practice_name(); ?> through its website.</p>
                    <p>By using this website, you are acknowledging and agreeing to the terms of use and conditions outlined in within this policy. Please read carefully.</p>
                    <h3>Changes to Internet Privacy Statement</h3>
                    <p>We reserve the right to amend the Internet Privacy Statement at any time, for any reason. We will post a notice that this Internet Privacy Statement has been amended by revising the "Last updated" date at the bottom of this page.</p>
                    <p>If you have questions about this Internet Privacy Statement, please send us an email to info@<?php echo str_replace(array('https://', 'www.'),array('',''),get_site_url()); ?>.</p>
                    <h3>Information We Collect and How We Use It</h3>
                    <p><b>Information we collect —</b> When you browse <?php get_site_url(); ?> and do not interact with the site for any online service or product from <?php site_ops_practice_name(); ?>, you browse anonymously. Personally identifiable information–such as your name, address, phone number and email address–is not collected as you browse.</p>
                    <p>If you choose to interact with our site in other ways, such as subscribing to our newsletter, submitting questions or comments or requesting information or materials, we will collect certain personal information from you. The type of personal information collected will vary but may include name, phone number, email address, and other demographic information. We do not collect Social Security numbers or Dates of Birth via our website. The type of product or service that you seek will determine the personal information that is collected. For a listing of the exact type of personal information that will be collected from you, please refer to the appropriate online form.</p>
                    <p><b>Tracking activity on our website —</b> We track how our site is used by both anonymous visitors and visitors who interact with the site. We may use third party software such as Google Analytics to help us analyze how users use the site. These tools may uses "cookies", which which are text files placed on your computer, to collect standard Internet log information and visitor behavior information in an anonymous form. The information generated by the cookie about your use of the website (including IP address) is transmitted to Google or other third party company. This information is then used to evaluate visitors’ us of the website and to compile statistical reports on website activity for <?php site_ops_practice_name(); ?>.</p>
                    <p>We may also use a tracked phone number that records calls for quality assurance purposes. This practice will be identified to the caller upon placing the phone call to the tracked number. Callers will here something similar to "This call may be recorded for training and quality assurance purposes".</p>
                    <p><b>How we use personal information —</b> Once collected, we may use your personal information (except for email address, which is outlined below) for the following purposes:</p>
                    <ul>
                        <li>Register you for products, services or programs you have requested</li>
                        <li>Answer your emails or on-line requests</li>
                        <li>Send information you request</li>
                        <li>Ensure the website is relevant to your needs</li>
                        <li>Deliver <?php site_ops_practice_name(); ?> services such as newsletters, meetings or events</li>
                        <li>Notify you about new products/services, special offers, upgrades and other related information from the <?php site_ops_practice_name(); ?></li>
                    </ul>
                    <p><b>How we use your email address —</b> Users who have opted in to our electronic newsletter may periodically receive emails from us regarding new products/services, special offers, news and other related information from <?php site_ops_practice_name(); ?>.</p>
                    <p>We do not share, sell, trade, exchange or rent your email address to vendors for them to market their products or services to you. When we hire vendors to deliver emails to you on our behalf, they are under agreement and limited from using your email address for any other purpose.</p>
                    <p>When we send email to you, we may be able to identify information about your email address, such as whether you can view graphic-rich HTML email. If your email address is HTML-enabled, we may choose to send you graphic-rich HTML email messages.</p>
                    <p><b>How to opt out of email —</b> To opt out of an email list, please contact <?php site_ops_practice_name(); ?>, <?php site_ops_current_patient_phone(); ?>.</p>
                    <p><b>Children under 13 —</b> We do not knowingly solicit data online from or market online to children under the age of 13.</p>
                    <p>Information security — <?php site_ops_practice_name(); ?> implements security measures to protect against unauthorized access to or unauthorized alteration, disclosure or destruction of data. We restrict access to personal information to our business partners who may need to know that information in order to operate, develop or improve our services. These individuals are bound by confidentiality obligations and may be subject to discipline, including termination and criminal prosecution, if they fail to meet these obligations.</p>
                    <h3>How we safeguard information</h3>
                    <p><b>Site security features —</b> <?php site_ops_practice_name(); ?> takes extensive measures and carefully selects third party companies that have sound security practices in place. Please be aware that no data transmission over the Internet can be guaranteed 100% secured. For these reasons, and despite our measures, we cannot guarantee or warrant the security of any information transmitted to us electronically.</p>
                    <p>Our Internet Privacy Statement refers only to information collected through our website. For a copy of our HIPAA Notice of Privacy Practices, please contact <?php site_ops_practice_name(); ?>, <?php site_ops_current_patient_phone(); ?>.</p>
                    <p><b>Linking to other Internet sites —</b> <?php site_ops_practice_name(); ?> website may link to other Internet sites as other Internet sites may link to <?php get_site_url(); ?>. <?php site_ops_practice_name(); ?> is not responsible for the privacy practices or content of other websites and cannot monitor them. To ensure your privacy is protected, we recommend that you review the privacy statements of other Internet sites you visit.</p>
                    <h3>Contacting Us About Privacy</h3>
                    <p>You may contact us about our privacy practices at any time:<br/>Email: info@<?php echo str_replace(array('https://', 'www.'),array('',''),get_site_url()); ?><br/>Phone: <?php site_ops_current_patient_phone(); ?></p>
                    <p>By Mail At: <br/><?php site_ops_practice_name(); ?>, <br/><?php site_ops_address(); ?> <br/><?php site_ops_city(); ?>, <?php site_ops_state(); ?> <?php site_ops_zip(); ?></p>
                    <p>Last Update 02/03/2016</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>