@extends('public.layout.master')
@section('title', 'Subscription Completed')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
<style>
    .wrapper-1 {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .wrapper-2 {
        padding: 30px;
        text-align: center;
    }

    .subscribe-title {
        font-family: 'Kaushan Script', cursive;
        font-size: 4em;
        letter-spacing: 3px;
        color: #1e59a5;
        margin: 0;
        margin-bottom: 20px;
    }

    .wrapper-2 p {
        margin: 0;
        font-size: 1.3em;
        color: #aaa;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .go-home {
        color: #fff;
        background: #0a378c;
        border: none;
        padding: 10px 50px;
        margin: 30px 0;
        border-radius: 30px;
        text-transform: capitalize;
        box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
    }

    .footer-like {
        margin-top: auto;
        background: #D7E6FE;
        padding: 6px;
        text-align: center;
    }

    .footer-like p {
        margin: 0;
        padding: 4px;
        color: #5892FF;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .footer-like p a {
        text-decoration: none;
        color: #5892FF;
        font-weight: 600;
    }

    @media (min-width:360px) {
        .subscribe-title {
            font-size: 3.5em;
        }

        .go-home {
            margin-bottom: 20px;
        }
    }

    @media (min-width:600px) {
        .subscribe-title {
            font-size: 4.5em;
        }

        .content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .wrapper-1 {
            height: initial;
            max-width: 620px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
        }

    }
</style>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Subscription Completed') !!}
    <!-- End Breadcrumbs -->

    <div class="container">

        <div class=content>
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <img src="{{ Vite::asset(\App\Library\Enum::STAR_IMAGE_PATH) }}" alt="logo" />
                    <h1 class="subscribe-title">Thank you For Subscribing!</h1>
                    <p>Thanks for subscribing to our <strong> {{ $message }} </strong> </p>
                    <p>you should receive a confirmation email soon </p>
                    <div class="my-5">
                        <a href="{{ url('/member/dashboard/') }}" class="go-home">
                            Dashboard
                        </a>
                    </div>
                </div>
                <div class="footer-like">
                    <p>You Want to Show Your Subscription?
                        <a href="{{ route('member.dashboard.profile.index') }}">Click here to go Profile</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->
@stop
