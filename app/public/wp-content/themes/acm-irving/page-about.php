<?php
/**
 * About Page Template
 * ACM Irving — Auto-loaded by WordPress for any page with slug "about".
 * No template assignment needed in WP Admin — just create a page with slug: about
 */
get_header();
?>

<!-- ═══════════════════════════ PAGE HERO ═══════════════════════════ -->
<section class="page-hero">
    <div class="page-hero-inner">
        <span class="eyebrow">Irving &amp; DFW</span>
        <h1>About ACM Irving</h1>
        <p>A professional chapter of the Association for Computing Machinery — advancing the science and profession of computing in Irving and the greater Dallas–Fort Worth area.</p>
    </div>
</section>

<!-- ═══════════════════════════ MISSION ═══════════════════════════ -->
<section class="section section-light">
    <div class="section-inner about-mission-layout">

        <div class="about-mission-text">
            <span class="eyebrow">Our Mission</span>
            <h2>Why We Exist</h2>
            <p>ACM Irving exists to bring the global reach of the Association for Computing Machinery to the local computing community of Irving and the greater Dallas–Fort Worth metroplex.</p>
            <p>We believe that computing professionals grow stronger together — through shared knowledge, meaningful connections, and a commitment to advancing the field. Our chapter creates the space for that to happen, right here in Irving, TX.</p>
            <p>Whether you're a seasoned engineer, an early-career developer, a researcher, or simply someone passionate about technology, ACM Irving is your local home for professional growth and community.</p>
        </div>

        <div class="about-mission-values">
            <div class="values-card">
                <div class="value-item">
                    <span class="value-icon">🎓</span>
                    <div>
                        <strong>Education</strong>
                        <p>Keeping computing professionals current through expert-led talks, workshops, and seminars.</p>
                    </div>
                </div>
                <div class="value-item">
                    <span class="value-icon">🤝</span>
                    <div>
                        <strong>Community</strong>
                        <p>Building genuine connections between computing professionals across Irving and DFW.</p>
                    </div>
                </div>
                <div class="value-item">
                    <span class="value-icon">💡</span>
                    <div>
                        <strong>Innovation</strong>
                        <p>Championing new ideas and helping members stay at the forefront of a rapidly evolving field.</p>
                    </div>
                </div>
                <div class="value-item">
                    <span class="value-icon">🌍</span>
                    <div>
                        <strong>Inclusivity</strong>
                        <p>Welcoming computing professionals of all backgrounds, disciplines, and experience levels.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════ WHAT WE DO ═══════════════════════════ -->
<section class="section">
    <div class="section-inner">
        <span class="eyebrow">What We Do</span>
        <h2 class="section-title">How We Show Up for the Community</h2>
        <p class="section-sub">ACM Irving runs regular events and initiatives that make a real difference for computing professionals in the DFW area.</p>

        <div class="pillars-grid">
            <div class="card card-top-accent">
                <span class="pillar-icon">🗣️</span>
                <h3>Speaker Series</h3>
                <p>Industry practitioners and researchers share insights on AI, cybersecurity, software engineering, cloud computing, and the technologies shaping our field.</p>
            </div>
            <div class="card card-top-accent">
                <span class="pillar-icon">🛠️</span>
                <h3>Workshops &amp; Hands-On Labs</h3>
                <p>Practical, skills-focused sessions where members learn by doing — from secure coding practices to machine learning fundamentals and beyond.</p>
            </div>
            <div class="card card-top-accent">
                <span class="pillar-icon">🍕</span>
                <h3>Networking Meetups</h3>
                <p>Casual, in-person gatherings in Irving and across DFW where computing professionals connect, share, and build lasting professional relationships.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════ ACM GLOBAL ═══════════════════════════ -->
<section class="section section-alt">
    <div class="section-inner about-acm-layout">

        <div class="about-acm-logo">
            <img
                src="https://irving.acm.org/wp-content/uploads/2026/03/acm_logo_tablet.svg"
                alt="Association for Computing Machinery"
            />
        </div>

        <div class="about-acm-text">
            <span class="eyebrow">Our Parent Organization</span>
            <h2>About ACM Global</h2>
            <p>The <strong>Association for Computing Machinery (ACM)</strong> is the world's largest scientific and educational computing society, founded in 1947. With over 100,000 members across 190 countries, ACM connects researchers, educators, and practitioners who are advancing computing as a science and profession.</p>
            <p>ACM produces the world-renowned <strong>ACM Digital Library</strong> — the most comprehensive database of computing research in existence — and publishes flagship journals including <em>Communications of the ACM</em>. It also sponsors the <strong>Turing Award</strong>, widely regarded as the "Nobel Prize of Computing."</p>
            <p>ACM Irving is one of ACM's professional chapters — locally organized, globally connected.</p>
            <div class="about-acm-links">
                <a href="https://www.acm.org" target="_blank" rel="noopener" class="btn btn-outline">Visit ACM.org →</a>
                <a href="https://dl.acm.org" target="_blank" rel="noopener" class="btn btn-outline">ACM Digital Library →</a>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════ CTA ═══════════════════════════ -->
<section class="section section-cta">
    <div class="section-inner section-inner--center">
        <span class="eyebrow">Get Involved</span>
        <h2>Ready to Join the Irving Computing Community?</h2>
        <p>Membership starts at the ACM global level. Once you're a member, connect with us to attend local Irving chapter events and get plugged into the DFW computing network.</p>
        <div class="cta-btns">
            <a href="https://www.acm.org/membership" target="_blank" rel="noopener" class="btn btn-gold">Join ACM →</a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-light">Contact Us</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>