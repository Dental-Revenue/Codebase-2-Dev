<?php
/*
    Template Name: Accessibility
*/
get_header();
get_template_part('partials/page-head');
?>
<!-- main -->
<div role="main">
    <div class="row">
        <div class="columns twelve">
            <div class="main-content">
                <div class="accessibility-content">
                    <p>We are committed to providing a website that is accessible to the widest possible audience, regardless of technology or ability. We are always striving to increase the accessibility and usability of our website and in doing so adhere to many of the available standards and guidelines, such as those below:</p>
                    <ul>
                        <li>Provide text alternatives for non-text content.</li>
                        <li>Provide captions and other alternatives for multimedia.</li>
                        <li>Create content that can be presented in different ways, including by assistive technologies, without losing meaning.</li>
                        <li>Make it easier for users to see and hear content.</li>
                        <li>Make all functionality available from a keyboard.</li>
                        <li>Give users enough time to read and use content.</li>
                        <li>Do not use content that causes seizures.</li>
                        <li>Help users navigate and find content.</li>
                        <li>Make text readable and understandable.</li>
                        <li>Make content appear and operate in predictable ways.</li>
                        <li>Help users avoid and correct mistakes.</li>
                        <li>Maximize compatibility with current and future user tools.</li>
                    </ul>
                    <p>We are always seeking opportunities to improve website accessibility. If you experience any difficulty in accessing this website, please don't hesitate to contact us at <?php site_ops_new_patient_phone(); ?>.</p>
                </div>
            </div>
        </div>
        <?php get_footer(); ?>