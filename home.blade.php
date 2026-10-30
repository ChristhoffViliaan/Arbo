<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#17251b">
    <title>Arbo Resources | Thoughtful wood, better futures</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @php
        $displayProducts = $products->isNotEmpty() ? $products : collect([
            (object) [
                'name' => 'Moulding',
                'description' => 'Carefully finished profiles for furniture, interiors, and construction.',
                'image' => 'products/Moulding.png',
            ],
            (object) [
                'name' => 'Hammer Mill',
                'description' => 'Reliable processing equipment for consistent wood-fiber output.',
                'image' => 'products/Hammer Mill.png',
            ],
            (object) [
                'name' => 'Sawmill',
                'description' => 'Quality timber products, prepared with care from log to finish.',
                'image' => 'products/Sawmil.png',
            ],
        ]);
        $displayMembers = $members->isNotEmpty() ? $members : collect([
            (object) ['name' => 'Catherine Sanjaya', 'title' => 'CEO', 'image' => 'members/Catherine Sanjaya.png'],
            (object) ['name' => 'Rio Marcellino', 'title' => 'CFO', 'image' => 'members/Rio Marcellino.png'],
            (object) ['name' => 'Jannice Ruvinda Sufianto', 'title' => 'Director', 'image' => 'members/Jannice Ruvinda Sufianto.png'],
            (object) ['name' => 'James Devara Isnardy', 'title' => 'COO', 'image' => 'members/James Devara Isnardy.png'],
            (object) ['name' => 'Gabriella Maria Taffyanna Santoso', 'title' => 'CFO', 'image' => 'members/Gabriella Maria Taffyanna Santoso.png'],
        ]);
    @endphp

    <main>
        <section class="hero" id="home" aria-label="Arbo wood materials">
            <header class="site-header">
                <a class="brand" href="#home" aria-label="Arbo home">
                    <img class="brand-logo" src="{{ asset('images/others/White logo.png') }}" alt="Arbo">
                </a>
                <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation">
                    <span></span><span></span><span></span>
                </button>
                <nav class="primary-navigation" id="primary-navigation" aria-label="Main navigation">
                    <a href="#home">Home</a>
                    <a href="#about">About Us</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#products">Products</a>
                    <a href="#blog">Blog</a>
                    <a href="#team">Team</a>
                    <a href="#contact">Contact</a>
                </nav>
                <div class="header-socials" aria-label="Social media">
                    <span aria-label="LinkedIn">
                        <img src="{{ asset('images/others/Rectangle 4.png') }}" alt="">
                    </span>
                    <span aria-label="TikTok">
                        <img src="{{ asset('images/others/Rectangle 5.png') }}" alt="">
                    </span>
                    <span aria-label="Instagram">
                        <img src="{{ asset('images/others/Rectangle 6.png') }}" alt="">
                    </span>
                </div>
            </header>
            <div class="hero-carousel" data-carousel role="region" aria-label="Featured Arbo materials">
                <article class="hero-panel hero-panel-waste is-active" role="group" aria-roledescription="slide" aria-label="1 of 2" aria-hidden="false">
                    <img class="hero-background" src="{{ asset('images/others/carausel2.png') }}" alt="">
                    <div class="hero-shade"></div>
                    <div class="hero-copy">
                        <span class="eyebrow">From nature, with purpose</span>
                        <h1>Wood Waste</h1>
                        <p>Giving new purpose to every piece of wood.</p>
                        <a class="text-link" href="#about">Discover Arbo <span aria-hidden="true">↗</span></a>
                    </div>
                </article>
                <article class="hero-panel hero-panel-sawdust" role="group" aria-roledescription="slide" aria-label="2 of 2" aria-hidden="true">
                    <img class="hero-background" src="{{ asset('images/others/1.png') }}" alt="">
                    <div class="hero-shade"></div>
                    <div class="hero-copy">
                        <span class="eyebrow">A more thoughtful material cycle</span>
                        <h2>Sawdust</h2>
                        <p>Turning by-products into possibilities.</p>
                        <a class="text-link" href="#products">Explore our products <span aria-hidden="true">↗</span></a>
                    </div>
                </article>
                <div class="hero-carousel-controls">
                    <button class="carousel-arrow carousel-previous" type="button" data-carousel-previous aria-label="Previous slide">←</button>
                    <div class="carousel-indicators" aria-label="Choose a slide">
                        <button class="hero-dot is-active" type="button" data-carousel-slide="0" aria-label="Show Wood Waste slide" aria-current="true"></button>
                        <button class="hero-dot" type="button" data-carousel-slide="1" aria-label="Show Sawdust slide" aria-current="false"></button>
                    </div>
                    <button class="carousel-arrow carousel-next" type="button" data-carousel-next aria-label="Next slide">→</button>
                </div>
            </div>
        </section>

        <section class="about section section-warm" id="about">
            <div class="section-inner about-layout">
                <div class="about-copy">
                    <span class="eyebrow eyebrow-dark">Rooted in responsibility</span>
                    <h2>About Arbo</h2>
                    <p>Arbo Resources processes wood waste into useful materials. Based in Sukoharjo, Central Java, we bring together local forestry, craftsmanship, and modern production to create reliable wood products and MDF materials.</p>
                    <p>From reclaimed timber to carefully processed sawdust, we believe every resource deserves a second life. Our work is guided by quality, integrity, and a long-term commitment to a more circular wood industry.</p>
                </div>
                <a class="video-card" href="#process" aria-label="Explore how Arbo transforms wood">
                    <img src="{{ asset('images/others/Vid.png') }}" alt="A sawmill cutting a log outdoors">
                </a>
            </div>
        </section>

        <section class="values section section-white" aria-labelledby="values-title">
            <div class="section-inner">
                <div class="section-heading">
                    <span class="eyebrow eyebrow-dark">What guides us</span>
                    <h2 id="values-title">Company Values</h2>
                    <p>We build lasting partnerships through the way we work, every day.</p>
                </div>
                <div class="value-grid">
                    <article class="value-card">
                        <span class="value-icon" aria-hidden="true"><svg viewBox="0 0 32 32"><circle cx="11" cy="9" r="4"/><path d="M3 27v-2a8 8 0 0 1 8-8h1a8 8 0 0 1 8 8v2M21 19l3 3 6-7"/></svg></span>
                        <h3>Accountability</h3><p>We take ownership and stand behind our work.</p>
                    </article>
                    <article class="value-card">
                        <span class="value-icon" aria-hidden="true"><svg viewBox="0 0 32 32"><path d="M16 4 25 8v7c0 6-3.8 10.2-9 13-5.2-2.8-9-7-9-13V8l9-4Z"/><path d="m12 16 2.5 2.5L20 13"/></svg></span>
                        <h3>Reliability</h3><p>Consistency and care in every commitment.</p>
                    </article>
                    <article class="value-card">
                        <span class="value-icon" aria-hidden="true"><svg viewBox="0 0 32 32"><path d="M8 22H6a4 4 0 0 1-.5-8A8 8 0 0 1 21 12a5 5 0 0 1 2 10h-2"/><path d="m12 21 4-5 4 5m-4-5v12"/></svg></span>
                        <h3>Breakthrough</h3><p>Curiosity and collaboration move us forward.</p>
                    </article>
                    <article class="value-card">
                        <span class="value-icon" aria-hidden="true"><svg viewBox="0 0 32 32"><path d="M6 22 21 7a4 4 0 0 1 6 6L12 28H6v-6Z"/><path d="m18 10 6 6M6 22l6 6"/></svg></span>
                        <h3>Ownership</h3><p>We care for our people, materials, and results.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="gallery section section-warm" id="gallery">
            <div class="section-inner">
                <div class="section-heading">
                    <h2>Our Gallery</h2>
                    <p>From wood-waste collection to sawdust processing, our gallery reflects the materials and industrial applications behind Arbo. We focus on giving wood residues a productive role as raw material for briquettes, wood pellets and MDF.</p>
                </div>
                <div class="gallery-grid">
                    @foreach ([['3a.png', 'gallery-logs'], ['3b.png', 'gallery-mist'], ['3f.png', 'gallery-rounds'], ['3g.png', 'gallery-woodland'], ['3h.png', 'gallery-sunlight'], ['3c.png', 'gallery-forest'], ['3i.png', 'gallery-sunrise'], ['3d.png', 'gallery-lumber'], ['3e.png', 'gallery-stock'], ['3j.png', 'gallery-endgrain']] as [$image, $position])
                        <figure class="gallery-item {{ $position }}">
                            <img src="{{ asset('images/others/' . $image) }}" alt="Arbo wood materials and production" loading="lazy">
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="products section section-warm" id="products">
            <div class="section-inner">
                <div class="section-heading">
                    <span class="eyebrow eyebrow-dark">Made for what comes next</span>
                    <h2>Our Products</h2>
                    <p>Our core products are made from carefully selected wood. From moulding and mill equipment to quality timber, we combine practical expertise with dependable production.</p>
                </div>
                <div class="product-grid">
                    @foreach ($displayProducts as $product)
                        <article class="product-card">
                            <div class="product-image"><img src="{{ asset('images/' . ltrim($product->image, '/')) }}" alt="{{ $product->name }}" loading="lazy"></div>
                            <div class="product-copy">
                                <span class="card-kicker">Arbo collection</span>
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <a href="#contact" aria-label="Ask about {{ $product->name }}">Learn more <span aria-hidden="true">↗</span></a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="process" id="process">
            <img class="process-image" src="{{ asset('images/others/4.png') }}" alt="Stacks of timber inside a wood storage facility" loading="lazy">
            <div class="process-card">
                <h2>Our Process <img src="{{ asset('images/others/Rectangle 48.png') }}" alt="" aria-hidden="true"></h2>
                <p>We collect wood waste, check incoming materials and grind the wood into sawdust. Quality control includes particle-size standardization and COA requirements. Our business plan prioritizes cleaner raw materials, faster loading and improved production capacity to better fulfill customer orders.</p>
            </div>
        </section>

        <section class="supply section section-white">
            <div class="section-inner supply-layout">
                <div class="supply-images">
                    <img class="supply-image-back" src="{{ asset('images/others/5a.png') }}" alt="Logs moving through a timber processing line" loading="lazy">
                    <img class="supply-image-front" src="{{ asset('images/others/5b.png') }}" alt="Timber being processed by sawmill equipment" loading="lazy">
                </div>
                <div class="supply-copy">
                    <span class="eyebrow eyebrow-dark">Built on partnership</span>
                    <h2>B2B Supply</h2>
                    <p>Arbo connects industrial customers with dependable wood materials and products. We value clear communication, consistent quality, and a supply approach shaped around your business needs.</p>
                    <p>Whether you are sourcing timber, wood residues, or processed materials, our team is ready to discuss the right fit for your operation.</p>
                    <a class="button button-dark" href="#contact">Discuss a partnership <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </section>

        <section class="blog section section-warm" id="blog">
            <div class="section-inner">
                <div class="section-heading">
                    <span class="eyebrow eyebrow-dark">Notes from the forest</span>
                    <h2>Our Blog</h2>
                    <p>Perspectives on responsible materials, better resource use, and the people shaping a more thoughtful wood industry.</p>
                </div>
                <div class="blog-grid">
                    <article class="blog-card">
                        <a href="#contact" class="blog-image"><img src="{{ asset('images/others/3f.png') }}" alt="Cut logs stacked together" loading="lazy"></a>
                        <span class="blog-meta">Materials · 5 min read</span>
                        <h3><a href="#contact">Wood Waste</a></h3>
                        <p>Small changes in how we use wood can create meaningful value across the material lifecycle.</p>
                    </article>
                    <article class="blog-card">
                        <a href="#contact" class="blog-image"><img src="{{ asset('images/others/3d.png') }}" alt="Timber stored on warehouse racks" loading="lazy"></a>
                        <span class="blog-meta">Insights · 4 min read</span>
                        <h3><a href="#contact">Biomass Use</a></h3>
                        <p>Thoughtful processing can turn wood by-products into a useful part of the resource cycle.</p>
                    </article>
                    <article class="blog-card">
                        <a href="#contact" class="blog-image"><img src="{{ asset('images/others/3c.png') }}" alt="Trees in a deep red forest" loading="lazy"></a>
                        <span class="blog-meta">Our approach · 6 min read</span>
                        <h3><a href="#contact">Quality First</a></h3>
                        <p>Quality is built into every decision, from sourcing and sorting through to the final product.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="partner-banner">
            <img src="{{ asset('images/others/4.png') }}" alt="" loading="lazy">
            <div class="partner-overlay"></div>
            <div class="partner-copy">
                <span class="eyebrow">Better materials. Better together.</span>
                <h2>Let’s Partner!</h2>
                <p>Let’s create more value from every resource.</p>
                <a class="button button-light" href="#contact">Start a conversation <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        <section class="team section section-warm" id="team">
            <div class="section-inner">
                <div class="section-heading">
                    <h2>Our Team</h2>
                    <p>Meet the members of highly skilled, committed and motivated professionals specializing in respective core fields.</p>
                </div>
                <div class="team-grid">
                    @foreach ($displayMembers as $member)
                        <article class="team-card">
                            <div class="team-photo"><img src="{{ asset('images/' . ltrim($member->image, '/')) }}" alt="{{ $member->name }}" loading="lazy"></div>
                            <h3>{{ $member->name }}</h3>
                            <p>{{ $member->title }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="location" id="location" aria-label="Arbo location">
            <img src="{{ asset('images/others/map.png') }}" alt="Map showing the Arbo Resources location in Central Java" loading="lazy">
        </section>
    </main>

    <footer class="site-footer" id="contact">
        <div class="footer-inner">
            <div class="footer-primary">
                <a class="brand footer-brand" href="#home">
                    <img class="brand-logo" src="{{ asset('images/others/White logo.png') }}" alt="Arbo">
                </a>
                <div class="footer-details">
                    <div class="footer-column footer-contact">
                        <h2>Contact Us</h2>
                        <a class="footer-detail-row footer-address" href="#location">
                            <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M8 14s5-4.4 5-8A5 5 0 0 0 3 6c0 3.6 5 8 5 8Z"/><circle cx="8" cy="6" r="1.7"/></svg>
                            <span>Jl. Raya Bringkang No.88A, Buyuk,<br>Bringkang, Kec. Menganti, Kabupaten Gresik,<br>Jawa Timur 61174</span>
                        </a>
                        <a class="footer-detail-row" href="tel:+6285940790005">
                            <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M4.2 2.2h2l1 3-1.4 1.4a10 10 0 0 0 3.6 3.6l1.4-1.4 3 1v2c0 .7-.6 1.2-1.3 1.2A10.7 10.7 0 0 1 3 3.5c0-.7.5-1.3 1.2-1.3Z"/></svg>
                            <span>+62 859-4079-0005</span>
                        </a>
                        <a class="footer-detail-row" href="mailto:arboresources@gmail.com">
                            <svg viewBox="0 0 16 16" aria-hidden="true"><rect x="1.5" y="3" width="13" height="10" rx="1"/><path d="m2 4 6 5 6-5"/></svg>
                            <span>arboresources@gmail.com</span>
                        </a>
                    </div>
                    <div class="footer-column footer-hours">
                        <h2>Working Hours</h2>
                        <p><strong>Monday to Saturday</strong> <span>24 hours</span></p>
                    </div>
                    <div class="footer-column footer-social">
                        <h2>Social Media</h2>
                        <div class="footer-social-icons" aria-label="Social media">
                            <span aria-label="YouTube">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="4"/><path d="m10 8 6 4-6 4V8Z"/></svg>
                            </span>
                            <span aria-label="Instagram">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"/></svg>
                            </span>
                            <span aria-label="LinkedIn">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M7.5 10v7m0-9.5v.1M11 17v-7m0 3c0-1.7 1-3 2.6-3s2.7 1.1 2.7 3v4"/></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span>Copyright © {{ date('Y') }} Arbo. All Rights Reserved.</span>
            </div>
        </div>
    </footer>

    <a class="floating-contact" href="#contact" aria-label="Contact Arbo">
        <span class="floating-contact-label">Contact Us</span>
        <span class="floating-contact-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.19 19a19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.09 4.18 2 2 0 0 1 4.08 2h3a2 2 0 0 1 2 1.72c.12.96.35 1.9.69 2.8a2 2 0 0 1-.45 2.11L8.05 9.9a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.69A2 2 0 0 1 22 16.92Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 5a5 5 0 0 1 4 4M15 1a9 9 0 0 1 8 8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </span>
    </a>
</body>
</html>
