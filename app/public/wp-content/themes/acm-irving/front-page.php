<?php
/**
 * ACM Irving — Front Page (Homepage) Template
 * WordPress uses this file automatically for the static front page.
 */
get_header(); ?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="hero">
    <div class="hero-bg" style="background-image: url('https://irving.acm.org/wp-content/uploads/2026/03/acm_desktopbanner-1.jpeg');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-eyebrow">ACM Irving Professional Chapter · Irving, TX</span>
        <h1>Connecting Computing Professionals in the Heart of Irving & DFW</h1>
        <p>A professional chapter of the Association for Computing Machinery — uniting developers, engineers, researchers, and technology leaders across Irving and the greater Dallas–Fort Worth metroplex.</p>
        <div class="hero-btns">
            <a href="#membership" class="btn btn-gold">Join the Chapter</a>
            <a href="#events" class="btn btn-ghost">View Upcoming Events</a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════ PURPOSE PILLARS ═══════════════════════════ -->
<section class="section section-light">
    <div class="section-inner">
        <span class="eyebrow">Our Purpose</span>
        <h2 class="section-title">Why ACM Irving Exists</h2>
        <p class="section-sub">We advance computing as a science and profession — bringing the global reach of ACM to our local Irving and DFW community.</p>
        <div class="pillars-grid">

            <div class="card card-top-accent">
                <span class="pillar-icon">🎓</span>
                <h3>Professional Development</h3>
                <p>Expert-led talks, workshops, and seminars keeping you current across AI, cybersecurity, software engineering, and emerging technologies.</p>
            </div>

            <div class="card card-top-accent">
                <span class="pillar-icon">🤝</span>
                <h3>Community &amp; Networking</h3>
                <p>Build meaningful connections with fellow computing professionals across Irving and DFW. Collaborate, mentor, and grow together in our local community.</p>
            </div>

            <div class="card card-top-accent">
                <span class="pillar-icon">💡</span>
                <h3>Industry Leadership</h3>
                <p>Contribute to the global ACM community while making a local impact. Help shape the future of computing in the DFW technology ecosystem.</p>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════ MEMBERSHIP ═══════════════════════════ -->
<section class="section" id="membership">
    <div class="section-inner">
        <div class="membership-grid">

            <div>
                <span class="eyebrow">Membership</span>
                <h2 class="section-title">Join ACM Irving Today</h2>
                <p style="color: var(--text-muted); font-size: 16px; line-height: 1.7;">
                    Become part of a global network of computing professionals while enjoying the
                    tight-knit benefits of a local Irving chapter.
                </p>
                <ul class="benefits-list">
                    <li>
                        <span class="check-icon">✓</span>
                        <span><strong>Communications of the ACM</strong> — complimentary 3-month electronic subscription to ACM's flagship publication</span>
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        <span><strong>acm.org email address</strong> — a personal @acm.org email forwarding address with filtering</span>
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        <span><strong>TechNews</strong> — the latest news in computing, delivered 3× weekly</span>
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        <span><strong>CareerNews</strong> — career and industry news delivered bi-monthly</span>
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        <span><strong>MemberNet</strong> — ACM people and events newsletter, delivered quarterly</span>
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        <span><strong>Irving chapter events</strong> — access to local meetups, workshops, and speaker series in the DFW area</span>
                    </li>
                </ul>
                <a href="https://www.acm.org/membership" target="_blank" rel="noopener" class="btn btn-blue">
                    Become an ACM Member →
                </a>
            </div>

            <div class="membership-card">
                <h3>ACM Professional Membership</h3>
                <p class="subtitle">Annual membership via ACM Global</p>
                <div class="price-amount">$99</div>
                <div class="price-period">per year · Professional rate</div>
                <a href="https://www.acm.org/membership" target="_blank" rel="noopener" class="btn btn-gold btn-block">
                    Join at ACM.org
                </a>
                <hr class="card-divider"/>
                <p class="card-note">Student rate: $19/yr &nbsp;·&nbsp; ACM-W members may qualify for additional discounts</p>
                <hr class="card-divider"/>
                <p class="card-note">After joining ACM globally, contact us to connect with the Irving chapter and attend local events.</p>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════ UPCOMING EVENTS ═══════════════════════════ -->
<section class="section section-alt" id="events">
    <div class="section-inner">
        <span class="eyebrow">Upcoming Events</span>
        <h2 class="section-title">Stay Connected. Stay Current.</h2>
        <p class="section-sub">Talks, workshops, and networking events in Irving and the DFW area. Join us in person and be part of the conversation.</p>

        <div class="events-list">
            <?php
            // Query upcoming events (posts with future dates or tagged as events)
            // For now using placeholder posts — replace with ACM Events custom post type later
            $events = new WP_Query([
                'post_type'      => 'acm_event',
                'posts_per_page' => 3,
                'meta_key'       => '_event_date',
                'orderby'        => 'meta_value',
                'order'          => 'DESC',
            ]);

            if ($events->have_posts()) :
                while ($events->have_posts()) : $events->the_post();
                    get_template_part( 'template-parts/event-card', null, [ 'variant' => 'upcoming' ] );
                endwhile;
                wp_reset_postdata();
            else : ?>
                <!-- Placeholder events shown when no posts exist yet -->
                <div class="event-card">
                    <div class="event-date-box">
                        <span class="month">Apr</span>
                        <span class="day">17</span>
                        <span class="year">2025</span>
                    </div>
                    <div class="event-info">
                        <h3>AI &amp; Machine Learning in the Enterprise — Panel Discussion</h3>
                        <p>Industry practitioners discuss real-world AI adoption, challenges, and opportunities for computing professionals in DFW's growing tech sector.</p>
                        <div class="event-meta">
                            <span>🕕 6:00 – 8:30 PM</span>
                            <span>📍 Irving Convention Center</span>
                            <span>🎟 Free for Members</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-rsvp">RSVP</a>
                </div>

                <div class="event-card">
                    <div class="event-date-box">
                        <span class="month">Mar</span>
                        <span class="day">27</span>
                        <span class="year">2025</span>
                    </div>
                    <div class="event-info">
                        <h3>Cybersecurity Best Practices for Software Developers</h3>
                        <p>A hands-on workshop covering secure coding practices, OWASP Top 10, and tools every developer needs to build safer applications.</p>
                        <div class="event-meta">
                            <span>🕖 6:30 – 9:00 PM</span>
                            <span>📍 TBA – Irving, TX</span>
                            <span>🎟 Members &amp; Guests Welcome</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-rsvp">RSVP</a>
                </div>

                <div class="event-card">
                    <div class="event-date-box">
                        <span class="month">Mar</span>
                        <span class="day">06</span>
                        <span class="year">2025</span>
                    </div>
                    <div class="event-info">
                        <h3>ACM Irving Chapter Kickoff Meetup &amp; Networking Night</h3>
                        <p>Welcome new members, meet chapter leadership, and hear about the 2025 event calendar. Light refreshments provided.</p>
                        <div class="event-meta">
                            <span>🕕 6:00 – 8:00 PM</span>
                            <span>📍 Irving, TX (Details TBD)</span>
                            <span>🎟 Free &amp; Open to All</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-rsvp">RSVP</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="events-footer">
            <a href="<?php echo esc_url(home_url('/events')); ?>" class="btn btn-blue">
                View All Events →
            </a>
        </div>

    </div>
</section>

<?php get_footer(); ?>
