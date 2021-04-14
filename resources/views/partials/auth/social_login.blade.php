<div class="col-md-4">
    <div class="card">
        <div class="card-header">{{ __("Socialite") }}</div>
        <div class="card-body">            
            <a
                href="{{ route('social_auth', ['driver' => 'facebook']) }}"
                class="btn btn-facebook btn-lg btn-block"
            >
                {{ __("Facebook") }} <i class="fa fa-facebook"></i>
            </a>
            <a
                href="{{ route('social_auth', ['driver' => 'google']) }}"
                class="btn btn-google btn-lg btn-block"
            >
                {{ __("Google") }} <i class="fa fa-google"></i>
            </a>     
    </div>
</div>