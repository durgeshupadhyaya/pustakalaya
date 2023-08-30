<section class="footer mt-24 mt-sm-40 py-24 bg-primary100">
    <div class="container">
        <div class="row gap-16-row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ $settings['site_footer_logo'] ? asset('admin/images/setting/' . $settings['site_footer_logo']) : asset('frontend/assets/images/footer_logo.png') }}"
                        alt="logo" width="180px" height="60px" />
                </a>
                <p class="text-white mt-12 x-small px-8">
                    {{ $settings['site_information'] ?? '' }}
                </p>

                <div class="social d-flex gap-12 px-8 mt-12">
                    @foreach ($socialmedias as $media)
                        <a class="text-white h5" href="{{ $media->link ?? '' }}" target="_blank">
                            <i class="fa-brands {{ $media->icon ?? '' }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="align-center gap-12 text-white py-12 heading">
                    <h6>CONTACT DETAILS</h6>
                </div>
                <div class="info mt-24">
                    <ul class="flex-column gap-12">
                        <li class="text-cGray300 x-small fw-medium">
                            Phone: {{ $settings['site_contact'] ?? '' }}
                        </li>
                        <li class="text-cGray300 x-small fw-medium">
                            Email: {{ $settings['site_email'] ?? '' }}
                        </li>

                        <li class="text-cGray300 x-small fw-medium">
                            Location: {{ $settings['site_location'] ?? '' }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="align-center gap-12 text-white py-12 heading">
                    <!-- <i class="fa-solid fa-envelope h6"></i> -->
                    <h6>KNOW US MORE</h6>
                </div>
                <div class="info mt-24">
                    <ul class="flex-column gap-12">
                        @foreach (getAllPages() as $item)
                            <li class="text-cGray300 x-small fw-medium">
                                <a href="{{ route('page.show', $item->slug) }}">{{ $item->title ?? '' }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="align-center gap-12 text-white py-12 heading">
                    <!-- <i class="fa-solid fa-file-shield h6"></i> -->
                    <h6>QUICK LINKS</h6>
                </div>
                <div class="info mt-24">
                    <ul class="flex-column gap-12">
                        <li class="text-cGray300 x-small fw-medium">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="text-cGray300 x-small fw-medium">
                            <a href="{{ route('page.show', 'about') }}">About Us</a>
                        </li>

                        <li class="text-cGray300 x-small fw-medium">
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
