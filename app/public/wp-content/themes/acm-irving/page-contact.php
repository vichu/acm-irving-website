<?php
/**
 * Contact Page Template
 * ACM Irving — Auto-loaded by WordPress for any page with slug "contact".
 */
get_header();
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="page-hero-inner">
        <span class="eyebrow">Get in Touch</span>
        <h1>Contact Us</h1>
        <p>Have a question, idea, or want to get involved with ACM Irving? Here's how to reach us.</p>
    </div>
</section>

<!-- CONTACT SECTION -->
<section class="section">
    <div class="section-inner contact-cards-layout">

        <div class="contact-card">
            <span class="contact-card-icon">✉️</span>
            <h3>Email Us</h3>
            <p>For general questions, membership inquiries, or anything else — email is the best way to reach the chapter.</p>
            <a href="mailto:acmchapterirving@gmail.com" class="contact-card-action">acmchapterirving@gmail.com</a>
        </div>

        <div class="contact-card">
            <span class="contact-card-icon">🗣️</span>
            <h3>Speak at an Event</h3>
            <p>We're always looking for computing professionals to share their expertise with the Irving and DFW community. Tell us about your topic.</p>
            <a href="mailto:acmchapterirving@gmail.com?subject=Speaker%20Proposal" class="contact-card-action">Submit a Speaker Proposal →</a>
        </div>

        <div class="contact-card">
            <span class="contact-card-icon">🤝</span>
            <h3>Join the Chapter</h3>
            <p>Membership starts at the ACM global level. Join at ACM.org, then reach out to us to connect with the Irving chapter and attend local events.</p>
            <a href="https://www.acm.org/membership" target="_blank" rel="noopener" class="contact-card-action">Join at ACM.org →</a>
        </div>

        <div class="contact-card">
            <span class="contact-card-icon">📍</span>
            <h3>Where We Meet</h3>
            <p>Our events are held in and around Irving, Texas — serving the greater Dallas–Fort Worth metroplex. Location details are included with each event.</p>
            <a href="<?php echo esc_url( home_url('/events') ); ?>" class="contact-card-action">View Upcoming Events →</a>
        </div>

    </div>
</section>

<!-- ACM SUPPORT -->
<section class="section section-alt">
    <div class="section-inner section-inner--center">
        <span class="eyebrow">ACM Global</span>
        <h2 class="section-title">Need Help with ACM Membership?</h2>
        <p class="section-sub">For questions about your ACM membership, the Digital Library, or global ACM services — contact ACM directly.</p>
        <a href="https://www.acm.org/about-acm/contact-us" target="_blank" rel="noopener" class="btn btn-blue">ACM Global Support →</a>
    </div>
</section>

<?php get_footer(); ?>