<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#17251b">
    <link rel="icon" type="image/png" href="{{ asset('images/others/Small logo.png') }}">
    <title>Arbo Resources | Thoughtful wood, better futures</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
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
                <div class="header-socials" aria-label="Social media links">
                    @foreach ($socialMedias->take(3) as $socialMedia)
                        <a class="{{ strtolower($socialMedia->{'aria-label'}) === 'instagram' ? 'social-media-icon-link' : '' }}" href="{{ $socialMedia->url }}" aria-label="{{ $socialMedia->{'aria-label'} }}" title="{{ $socialMedia->{'aria-label'} }}">
                            @if (strtolower($socialMedia->{'aria-label'}) === 'instagram')
                                <img src="{{ asset('images/others/instagram white.png') }}" alt="">
                            @else
                                {{ $socialMedia->{'aria-label'} }}
                            @endif
                        </a>
                    @endforeach
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
                @php($valuePages = $companyValues->chunk(3))
                <div class="values-carousel-container">
                    <div class="values-carousel content-track {{ $valuePages->count() > 1 ? 'is-carousel' : '' }}" data-carousel-track role="region" aria-label="Company values">
                        @foreach ($valuePages as $valuePage)
                            <div class="value-page" role="group" aria-label="Company values page {{ $loop->iteration }} of {{ $valuePages->count() }}">
                                <div class="value-grid value-grid-{{ $valuePage->count() }}">
                                    @foreach ($valuePage as $value)
                                        <article class="value-card">
                                            <span class="value-icon" aria-hidden="true">
                                                <svg viewBox="0 0 32 32">
                                                    @switch(strtolower($value->icon))
                                                        @case('accountability')
                                                            <circle cx="11" cy="9" r="4"/><path d="M3 27v-2a8 8 0 0 1 8-8h1a8 8 0 0 1 8 8v2M21 19l3 3 6-7"/>
                                                            @break
                                                        @case('reliability')
                                                            <path d="M16 4 25 8v7c0 6-3.8 10.2-9 13-5.2-2.8-9-7-9-13V8l9-4Z"/><path d="m12 16 2.5 2.5L20 13"/>
                                                            @break
                                                        @case('breakthrough')
                                                            <path d="M8 22H6a4 4 0 0 1-.5-8A8 8 0 0 1 21 12a5 5 0 0 1 2 10h-2"/><path d="m12 21 4-5 4 5m-4-5v12"/>
                                                            @break
                                                        @case('ownership')
                                                            <path d="M6 22 21 7a4 4 0 0 1 6 6L12 28H6v-6Z"/><path d="m18 10 6 6M6 22l6 6"/>
                                                            @break
                                                        @default
                                                            <path d="M27 5C16 5 7 8 5 17c-1 5 3 9 8 8 9-2 12-11 14-20ZM5 27c4-7 9-11 16-15"/>
                                                    @endswitch
                                                </svg>
                                            </span>
                                            <h3>{{ $value->title }}</h3>
                                            <p>{{ $value->description }}</p>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($valuePages->count() > 1)
                        <div class="content-carousel-controls" aria-label="Company values carousel controls">
                            <button class="content-carousel-arrow" type="button" data-content-previous aria-label="Previous company values" disabled>←</button>
                            <button class="content-carousel-arrow" type="button" data-content-next aria-label="Next company values">→</button>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="gallery section section-warm" id="gallery">
            <div class="section-inner">
                <div class="section-heading">
                    <h2>Our Gallery</h2>
                    <p>From wood-waste collection to sawdust processing, our gallery reflects the materials and industrial applications behind Arbo. We focus on giving wood residues a productive role as raw material for briquettes, wood pellets and MDF.</p>
                </div>
                @php($galleryPages = $ourGalleries->filter(fn ($gallery) => filled($gallery->image))->values()->chunk(10))
                <div class="gallery-carousel-container">
                    <div class="gallery-carousel content-track {{ $galleryPages->count() > 1 ? 'is-carousel' : '' }}" data-carousel-track role="region" aria-label="Our gallery">
                        @foreach ($galleryPages as $galleryPage)
                            <div class="gallery-page" role="group" aria-label="Gallery page {{ $loop->iteration }} of {{ $galleryPages->count() }}">
                                <div class="gallery-grid">
                                    @foreach ($galleryPage as $gallery)
                                        <figure class="gallery-item">
                                            <img src="{{ asset('images/' . ltrim($gallery->image, '/')) }}" alt="{{ $gallery->alt_text ?: 'Arbo wood materials and production' }}" loading="lazy">
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($galleryPages->count() > 1)
                        <div class="content-carousel-controls" aria-label="Gallery carousel controls">
                            <button class="content-carousel-arrow" type="button" data-content-previous aria-label="Previous gallery images" disabled>←</button>
                            <button class="content-carousel-arrow" type="button" data-content-next aria-label="Next gallery images">→</button>
                        </div>
                    @endif
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
                <div class="product-grid content-track {{ $products->count() > 3 ? 'is-carousel' : '' }}" data-carousel-track role="list" aria-label="Our products">
                    @foreach ($products as $product)
                        <article class="product-card" role="listitem">
                            <div class="product-image"><img src="{{ asset('images/' . ltrim($product->image, '/')) }}" alt="{{ $product->name }}" loading="lazy"></div>
                            <div class="product-copy">
                                <span class="card-kicker">Arbo collection</span>
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <a href="https://wa.me/6281234567890" aria-label="Ask about {{ $product->name }}">Learn more <span aria-hidden="true">↗</span></a>
                            </div>
                        </article>
                    @endforeach
                </div>
                @if ($products->count() > 3)
                    <div class="content-carousel-controls" aria-label="Product carousel controls">
                        <button class="content-carousel-arrow" type="button" data-content-previous aria-label="Previous products" disabled>←</button>
                        <button class="content-carousel-arrow" type="button" data-content-next aria-label="Next products">→</button>
                    </div>
                @endif
            </div>
        </section>

        <section class="process" id="process">
            <img class="process-image" src="{{ asset('images/others/4.png') }}" alt="Stacks of timber inside a wood storage facility" loading="lazy">
            <div class="process-card">
                <h2>Our Process <img src="{{ asset('images/others/white hand.png') }}" alt="" aria-hidden="true"></h2>
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
                    <a class="button button-dark" href="https://wa.me/6281234567890">Discuss a partnership <span aria-hidden="true">↗</span></a>
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
                @php($blogPages = $blogs->chunk(3))
                <div class="blog-carousel-container">
                    <div class="blog-carousel content-track {{ $blogPages->count() > 1 ? 'is-carousel' : '' }}" data-carousel-track role="region" aria-label="Our blog">
                        @foreach ($blogPages as $blogPage)
                            <div class="blog-page" role="group" aria-label="Blog page {{ $loop->iteration }} of {{ $blogPages->count() }}">
                                <div class="blog-grid blog-grid-{{ $blogPage->count() }}" role="list">
                                    @foreach ($blogPage as $blog)
                                        <article class="blog-card" role="listitem">
                                            <a href="#contact" class="blog-image"><img src="{{ asset('images/' . ltrim($blog->image, '/')) }}" alt="{{ $blog->title }}" loading="lazy"></a>
                                            <span class="blog-meta">{{ $blog->subtext }}</span>
                                            <h3><a href="#contact">{{ $blog->title }}</a></h3>
                                            <p>{{ $blog->description }}</p>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($blogPages->count() > 1)
                        <div class="content-carousel-controls" aria-label="Blog carousel controls">
                            <button class="content-carousel-arrow" type="button" data-content-previous aria-label="Previous blog posts" disabled>←</button>
                            <button class="content-carousel-arrow" type="button" data-content-next aria-label="Next blog posts">→</button>
                        </div>
                    @endif
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
                <a class="button button-light" href="https://wa.me/6281234567890">Start a conversation <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        <section class="team section section-warm" id="team">
            <div class="section-inner">
                <div class="section-heading">
                    <h2>Our Team</h2>
                    <p>Meet the members of highly skilled, committed and motivated professionals specializing in respective core fields.</p>
                </div>
                <div class="team-grid">
                    @foreach ($members->chunk(3) as $teamRow)
                        <div class="team-grid-row team-grid-row-{{ $teamRow->count() }}">
                            @foreach ($teamRow as $member)
                                <article class="team-card">
                                    <div class="team-photo"><img src="{{ asset('images/' . ltrim($member->image, '/')) }}" alt="{{ $member->name }}" loading="lazy"></div>
                                    <h3>{{ $member->name }}</h3>
                                    <p>{{ $member->title }}</p>
                                </article>
                            @endforeach
                        </div>
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
                        <a class="footer-detail-row footer-address" href="https://maps.app.goo.gl/S2T1cNASHiVSVogE6?g_st=ac">
                            <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M8 14s5-4.4 5-8A5 5 0 0 0 3 6c0 3.6 5 8 5 8Z"/><circle cx="8" cy="6" r="1.7"/></svg>
                            <span>Jl. Raya Bringkang No.88A, Buyuk,<br>Bringkang, Kec. Menganti, Kabupaten Gresik,<br>Jawa Timur 61174</span>
                        </a>
                        <a class="footer-detail-row" href="https://wa.me/6285940790005">
                            <img src="{{ asset('images/others/Whatsapp.png') }}"
                                width="18"
                                height="18"
                                viewBox="0 0 20 20"
                                aria-hidden="true"
                                alt="WhatsApp">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c.002-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.034-.099.015-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                            </svg>
                            <span>+62 859-4079-0005</span>
                        </a>
                        <a class="footer-detail-row" href="mailto:arboresources@gmail.com">
                            <svg viewBox="0 0 16 16" aria-hidden="true"><rect x="1.5" y="3" width="13" height="10" rx="1"/><path d="m2 4 6 5 6-5"/></svg>
                            <span>arboresources@gmail.com</span>
                        </a>
                    </div>
                    <div class="footer-column footer-hours">
                        <h2>Working Hours</h2>
                        <p><strong>Monday to Saturday</strong><br>
                        <span>24 hours</span></p>
                    </div>
                    <div class="footer-column footer-social">
                        <h2>Social Media</h2>
                        <div class="footer-social-icons" aria-label="Social media links">
                            @foreach ($socialMedias as $socialMedia)
                                <a class="{{ strtolower($socialMedia->{'aria-label'}) === 'instagram' ? 'social-media-icon-link' : '' }}" href="{{ $socialMedia->url }}" aria-label="{{ $socialMedia->{'aria-label'} }}">
                                    @if (strtolower($socialMedia->{'aria-label'}) === 'instagram')
                                        <img src="{{ asset('images/others/instagram white.png') }}" alt="">
                                    @else
                                        {{ $socialMedia->{'aria-label'} }}
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span>Copyright © {{ date('Y') }} Arbo. All Rights Reserved.</span>
            </div>
        </div>
    </footer>

    <a class="floating-contact" href="https://wa.me/6281234567890" aria-label="Contact Arbo on WhatsApp">
        <span class="floating-contact-label">Contact Us</span>
        <span class="floating-contact-icon" aria-hidden="true">
            <img src="{{ asset('images/others/Whatsapp.png') }}" alt="">
        </span>
    </a>
</body>
</html> 
