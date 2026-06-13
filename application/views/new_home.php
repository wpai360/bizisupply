<div class="new-home-body">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-glow"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 animate-fade-in">
                    <h1 class="hero-title mb-4">
                        <span>Change the Way</span><br>You Buy & Supply for B2B
                    </h1>
                    <p class="hero-subtitle mb-5">
                        Bizisupply connects agricultural & horticultural businesses directly to their entire supply chain, enabling fast, competitive quotes and seamless B2B transactions.
                    </p>
                    <div class="d-flex flex-wrap">
                        <a href="<?php echo base_url('register'); ?>" class="btn-premium btn-premium-primary mr-3 mb-3">Get Started Free</a>
                        <a href="<?php echo base_url('academy'); ?>" class="btn-premium btn-premium-secondary mb-3">Explore Academy</a>
                    </div>
                </div>
                <div class="col-lg-6 animate-fade-in">
                    <div class="video-wrapper-premium">
                        <div class="video-container-premium">
                            <video controls preload="auto">
                                <source src="<?php echo base_url(); ?>assets/front/images/tempvideo.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Roles Section -->
    <section class="features-grid-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-weight: 800; color: #1c3a73; font-size: 2.25rem;">Tailored for Your Business Needs</h2>
                <p class="text-muted" style="font-size: 1.05rem;">Whether you are sourcing products or expanding your customer reach, we have you covered.</p>
            </div>
            <div class="row">
                <!-- Buyer Card -->
                <div class="col-md-6 mb-4">
                    <div class="premium-card">
                        <div class="card-icon-wrapper icon-buyer">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                        <h3 class="card-title">For B2B Buyers</h3>
                        <p class="text-muted mb-4">Streamline your procurement process, compare live bids, and manage suppliers in one unified hub.</p>
                        <ul class="card-features-list">
                            <li><i class="fa fa-check-circle list-buyer-icon"></i> Instantly recall your custom MASTERLIST</li>
                            <li><i class="fa fa-check-circle list-buyer-icon"></i> Source bids from verified & rated suppliers</li>
                            <li><i class="fa fa-check-circle list-buyer-icon"></i> Centralized quote comparison and order tracking</li>
                            <li><i class="fa fa-check-circle list-buyer-icon"></i> 100% transparent history and transaction logs</li>
                        </ul>
                    </div>
                </div>
                <!-- Supplier Card -->
                <div class="col-md-6 mb-4">
                    <div class="premium-card">
                        <div class="card-icon-wrapper icon-supplier">
                            <i class="fa fa-truck"></i>
                        </div>
                        <h3 class="card-title">For B2B Suppliers</h3>
                        <p class="text-muted mb-4">Grow your wholesale footprint local to nationwide and capture active buyer demand instantly.</p>
                        <ul class="card-features-list">
                            <li><i class="fa fa-check-circle list-supplier-icon"></i> Receive high-intent leads straight to your portal</li>
                            <li><i class="fa fa-check-circle list-supplier-icon"></i> Submit direct bids in under a minute</li>
                            <li><i class="fa fa-check-circle list-supplier-icon"></i> Manage wholesale categories and inventories</li>
                            <li><i class="fa fa-check-circle list-supplier-icon"></i> Build reputation with buyer feedback & ratings</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Immersive Video Feature Section -->
    <section class="immersive-mobile-section">
        <video id="videobcg" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
            <source src="<?php echo base_url(); ?>assets/front/images/phone.mp4" type="video/mp4">
        </video>
        <div class="mobile-overlay"></div>
        <div class="container mobile-section-content py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 pr-lg-5 mb-5 mb-lg-0">
                    <span class="mobile-tagline mb-3 d-inline-block">Always in Sync</span>
                    <h2 class="mobile-title mb-4">Your Supply Chain in Your Pocket 24/7</h2>
                    <p class="text-white-50 mb-5" style="font-size: 1.1rem; line-height: 1.6;">
                        Never miss a quotation, message, or order update. Manage your operations on the go with the native Bizisupply mobile app.
                    </p>
                    <div class="d-flex flex-wrap align-items-center" style="gap:16px;">
                        <a href="#" class="store-badge">
                            <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png"
                                 alt="Get it on Google Play"
                                 style="max-height: 54px; border-radius: 8px;">
                        </a>
                        <a href="#" class="store-badge">
                            <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                                 alt="Download on the App Store"
                                 style="max-height: 44px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-column">
                        <div class="feature-pill d-flex align-items-center mb-4">
                            <div class="feature-pill-icon"><i class="fa fa-list-ul"></i></div>
                            <div class="feature-pill-text">Recall custom MASTERLIST products instantly</div>
                        </div>
                        <div class="feature-pill d-flex align-items-center mb-4">
                            <div class="feature-pill-icon"><i class="fa fa-handshake-o"></i></div>
                            <div class="feature-pill-text">Request bids from certified local suppliers</div>
                        </div>
                        <div class="feature-pill d-flex align-items-center">
                            <div class="feature-pill-icon"><i class="fa fa-mobile"></i></div>
                            <div class="feature-pill-text">Easy, fast interface built for mobile screens</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials section if they exist -->
    <?php if (!empty($Testimonials)): ?>
    <section class="features-grid-section" style="background-color: #f8fafc;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-weight: 800; color: #1c3a73; font-size: 2.25rem;">Trusted by the Industry</h2>
                <p class="text-muted" style="font-size: 1.05rem;">See how other agricultural & horticultural businesses are streamlining their supply chain.</p>
            </div>
            <div class="row justify-content-center">
                <?php foreach($Testimonials as $Testimonial): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="premium-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-3" style="color: #f1c40f;">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6; font-style: italic;">
                                "<?php echo $Testimonial->description; ?>"
                            </p>
                        </div>
                        <div class="d-flex align-items-center mt-4 pt-3 border-top">
                            <?php if ($Testimonial->upload_image): ?>
                                <img src="<?php echo base_url(); ?>assets/uploads/testimonials_images/<?php echo $Testimonial->upload_image; ?>" class="rounded-circle mr-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php endif; ?>
                            <div>
                                <h5 class="mb-0" style="font-weight: 700; color: #1c3a73; font-size: 1rem;"><?php echo $Testimonial->name; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA Section -->
    <section class="premium-cta-section">
        <div class="cta-glow"></div>
        <div class="container relative z-10">
            <h2 class="cta-title">Ready to Transform Your B2B Operations?</h2>
            <p class="cta-text">
                Join thousands of businesses sourcing, quoting, and managing their supply chains efficiently. Start your free trial today.
            </p>
            <div class="cta-btn-wrapper">
                <a href="<?php echo base_url('register'); ?>" class="btn-premium btn-premium-primary mr-3">Create Buyer Account</a>
                <a href="<?php echo base_url('register'); ?>" class="btn-premium btn-premium-secondary">Register as Supplier</a>
            </div>
        </div>
    </section>

</div>

<!-- Double Ticketing banners fixed at the bottom -->
<div class="new-ticker-wrap partners-new-ticker">
    <div class="new-ticker">
        <div class="new-ticker__item"><a href="https://www.google.com" target="_blank">Rabobank</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Bunnings Warehouse</a></div>
        <div class="new-ticker__item"><a style="color:#217F42" href="https://www.google.com" target="_blank">Westfarmers Insurance</a></div>
        <div class="new-ticker__item"><a style="color:#E35301" href="https://www.google.com" target="_blank">Bhpbilliton</a></div>
        <div class="new-ticker__item"><a style="color:#347C2B" href="https://www.google.com" target="_blank">John deere</a></div>
        <div class="new-ticker__item"><a style="color:#217F42" href="https://www.google.com" target="_blank">BEEF WEEK 2021</a></div>
        <div class="new-ticker__item"><a style="color:#CDC531" href="https://www.google.com" target="_blank">FARMFEST TOOWOOMBA, QLD Tuesday 2 - Thursday 4, June 2020</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">RURAL PRESS</a></div>
        <div class="new-ticker__item"><a style="color:#6E0D11" href="https://www.google.com" target="_blank">AgQuip</a></div>
        <div class="new-ticker__item"><a style="color:#26AAAF" href="https://www.google.com" target="_blank">Kubota For earth For life</a></div>
        <div class="new-ticker__item"><a style="color:#F3BF8A" href="https://www.google.com" target="_blank">CLIPEX Fencing Stockyards</a></div>
        <div class="new-ticker__item"><a style="color:green" href="https://www.google.com" target="_blank">Garden City Plastics Nursery pots</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Nursery and Garden Industry australia</a></div>
    </div>
</div>

<div class="new-ticker-wrap sale-new-ticker">
    <div class="new-ticker">
        <div class="new-ticker__item"><a href="https://www.google.com" target="_blank">Rabobank</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Bunnings Warehouse</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Westfarmers Insurance</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Bhpbilliton</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">John deere</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">BEEF WEEK 2021</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">FARMFEST TOOWOOMBA, QLD Tuesday 2 - Thursday 4, June 2020</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">RURAL PRESS</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">AgQuip</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Kubota For earth For life</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">CLIPEX Fencing Stockyards</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Garden City Plastics Nursery pots</a></div>
        <div class="new-ticker__item"><a style="color:white" href="https://www.google.com" target="_blank">Nursery and Garden Industry australia</a></div>
    </div>
</div>
