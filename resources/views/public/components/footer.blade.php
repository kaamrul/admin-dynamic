@php
$pages = App\Models\Page::active()->get();
@endphp
<footer id="footer" class="footer">
    <div class="container">
      <div class="footer-info">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ url('/')}}" class="logo d-flex align-items-center">
        <img src="{{ settings('logo') ? asset(settings('logo')) : Vite::asset(\App\Library\Enum::LOGO_PATH) }}" alt="">
      </a>
            </div>
          </div>

          <div class="col-lg-4">
            <p><i class="fa-solid fa-location-dot me-3"></i> <span>{{ getCompanyFullAddress() }} </span></p>
            <div class="mt-4 row">
              <div class="col-md-6 col-lg-5 text-center text-md-start">
                <i class="fa-solid fa-phone me-2"></i>
                <span>{{ settings('phone') ? settings('phone') : '+58545445' }}</span>
              </div>
              <div class="col-md-6 col-lg-7 text-center text-md-start">
                <i class="fa-solid fa-envelope me-2"></i>
                <span>{{ settings('email') ? settings('email') : 'office@mbgfc.co.nz' }}</span>
              </div>
            </div>
            <div class="d-flex align-items-center gap-4 mt-3">
              @if(settings('facebook_link') ||
              settings('twitter_link')||
              settings('linkedin_link'))
              <p class="m-0">Social Media</p>
              <div class="social-links d-flex gap-3">
                @if(settings('facebook_link'))<a href="{{ settings('facebook_link') }}" tabindex="_blank" class="facebook"><i class="fa-brands fa-facebook-f"></i></a> @endif
                @if(settings('twitter_link'))<a href="{{ settings('twitter_link') }}" tabindex="_blank" class="twitter"><i class="bi bi-twitter"></i></a>@endif
                @if(settings('linkedin_link'))<a href="{{ settings('linkedin_link') }}" tabindex="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>@endif
              </div>
              @endif
            </div>
          </div>

          <div class="col-lg-4">
            <ul>
                <li>WEIGHMASTER +64 21 025 62849</li>
                <li>VHF Channel 61</li>
                <li>COURTESY VAN (Operates Thursdays only) +64 0284112845</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-4">
        @if(settings('copyright'))
        <p><a href="{{ settings('copyright_url') }}" > {{ settings('copyright') }}</a> </p>
        @else
        <p>Copyright © {{ Carbon\Carbon::now()->year }} Paws on Tour </p>
        @endif

        <a href="https://www.downperiscope.co.nz/" target="_blank"><span><i class="fa fa-laptop"></i> </span><span>Down Periscope Limited</span></a>
      </div>
    </div>
  </footer>
