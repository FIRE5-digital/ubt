<!-- footer -->
@if(\Request::path()!='contact'&&is_null(@$derivative))
<section class="footer-enquiry contact-details-form">
    <div class="ctr">
        <div class="footer-enquiry-form contact-content">
            <h1>Get in touch, we’re here to help</h1>
            <form id="contact-form" class="contact-form" data-recaptcha="{{ config('google.recaptcha_key') }}">
                  {!! \Form::token() !!}
                  {!! \Form::hidden('g-recaptcha-response', null) !!}
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="telephone" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" placeholder="Please tell us information such as when vehicle needed for, I’m new to leasing would like some help, I’m unsure of my Credit Score and criteria to qualify" name="comments" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button class="button" id="send-contact-form">
                        Send Enquiry
                    </button>
                </div>
            </form>
        </div>
        <div class="thank-you hidden">
            <h1>Thank You</h1>
            <p>A member of our team will be in touch as soon as possible</p>
        </div>
    </div>
</section>
@endif
<footer class="site-footer">
    <div class="ctr">
        <div class="footer-links">
            <div class="footer-logo">
                <img src="/themes/ubt/img/logo-mono.png" alt="{{ config('company.name') }}" width="" height="">
            </div>
            <div class="footer-links-list">
                <div class="footer-contact">
                    <p>{!! str_replace(",", "<br>", config('company.address')) !!}</p>
                    <ul class="contact-info">
                        <li class="contact-tel">
                            <a href="tel:{{ @$page->content->global->telephone }}">{{ @$page->content->global->telephone }}</a>
                        </li>
                        <li class="contact-email">
                            <a href="mailto:{{ @$page->content->global->email }}">{{ @$page->content->global->email }}</a>
                        </li>
                    </ul>
                    <ul class="social-links">
                        @if(@$page->content->global->twitter_url)
                        <li><a href="{{ @$page->content->global->twitter_url  }}"><img src="/themes/ubt/img/icons/sm/twitter-white.svg" alt="Twitter" width="20" height="16"></a></li>
                        @endif
                        @if(@$page->content->global->facebook_url)
                        <li><a href="{{ @$page->content->global->facebook_url }}"><img src="/themes/ubt/img/icons/sm/facebook-white.svg" alt="Facebook" width="11" height="20"></a></li>
                        @endif
                        @if(@$page->content->global->linkedin_url)
                        <li><a href="{{ @$page->content->global->linkedin_url }}"><img src="/themes/ubt/img/icons/sm/linkedin-white.svg" alt="Linkedin" width="20" height="20"></a></li>
                        @endif
                        @if(@$page->content->global->instagram_url)
                        <li><a href="{{ @$page->content->global->instagram_url }}"><img src="/themes/ubt/img/icons/sm/instagram-white.svg" alt="Instagram" width="20" height="20"></a></li>
                        @endif
                    </ul>
                    <div class="group-logo">
                        <img src="/themes/ubt/img/bridle-franchise.png" alt="{{ config('company.name') }}" width="" height="">
                    </div>
                </div>
                <div class="footer-list">
                    <h3>About Us</h3>
                    @php($about=\App\Nav::where('name','About Us')->first())
                    <ul>
                        @if($about)
                            @forelse($about->getChildren as $item)
                                <li @if($item->getChildren()->count())class="dropdown-menu more-dropdown"@endif>
                                    <a href="{{ $item->destination }}">
                                        {{ $item->name }}
                                        @if($item->getChildren()->count())
                                            <svg class="icon after">
                                                <use xlink:href="/themes/ubt/img/sprite.svg#icon-chevron-down"></use>
                                            </svg>
                                        @endif
                                    </a>
                                    @if($item->getChildren()->count())
                                        <div class="dropdown">
                                            <ul class="layout module">
                                                @foreach($item->getChildren as $subitem)
                                                    <li><a href="{{ $subitem->destination }}">{{ $subitem->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @empty
                            @endforelse
                        @endif
                    </ul>
                </div>
                <div class="footer-list">
                    <h3>Other Info</h3>
                    @php($other=\App\Nav::where('name','Other Info')->first())
                    <ul>
                        @if($other)
                            @forelse($other->getChildren as $item)
                                <li @if($item->getChildren()->count())class="dropdown-menu more-dropdown"@endif>
                                    <a href="{{ $item->destination }}">
                                        {{ $item->name }}
                                        @if($item->getChildren()->count())
                                            <svg class="icon after">
                                                <use xlink:href="/themes/ubt/img/sprite.svg#icon-chevron-down"></use>
                                            </svg>
                                        @endif
                                    </a>
                                    @if($item->getChildren()->count())
                                        <div class="dropdown">
                                            <ul class="layout module">
                                                @foreach($item->getChildren as $subitem)
                                                    <li><a href="{{ $subitem->destination }}">{{ $subitem->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @empty
                            @endforelse
                        @endif
                    </ul>
                </div>
                <div class="footer-newsletter">
                    <h3>Newsletter Signup</h3>
                    <form class="form newsletter-form" action="/newsletter" data-recaptcha="{{ config('google.recaptcha_key') }}">
                        {!! \Form::hidden('g-recaptcha-response', null) !!}
                        <div class="form-row">
                            <div class="form-group">
                                <label class="visuallyhidden" for="newsletterName">Forename</label>
                                <input type="text" class="form-control" name="newsletterName" id="newsletter-forename" placeholder="Forename">
                            </div>
                            <div class="form-group">
                                <label class="visuallyhidden" for="newsletterName">Surname</label>
                                <input type="text" class="form-control" name="newsletterName" id="newsletter-surname" placeholder="Surname">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="visuallyhidden" for="newsletterEmail">Email</label>
                            <input type="email" class="form-control" name="newsletterEmail" id="newsletter-email"  placeholder="Email Address">
                        </div>

                        <div class="form-group">
                            <button class="button button-accent button-block" id="email-signup">
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-info">
            <p>Copyright &copy; {{ date('Y') }} {{ config('company.name') }}</p>
            <p>Powered by <a href="https://www.automotus.co.uk/">Automotus</a>, a <a class="fire5" href="https://fire5.co.uk/">FIRE<span class="fire">5</span> <span class="fire-grey">digital</span></a> product</p>
        </div>

        <div class="footer-legal">
          
          {!! @$page->content->global->legal_footer !!}

        </div>

    </div>
</footer> 
<!-- /footer -->      






