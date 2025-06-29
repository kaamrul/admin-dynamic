<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EzziCo">
    <meta name="keywords" content="EzziCo">
    <meta name="author" content="EzziCo">

    <title>Paws on Tour || Invoice</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="currency_symbol"
        content="{{ settings('currency_symbol') ? settings('currency_symbol') : config('app.currency_sign') }}">
    <link rel="icon"
        href="{{ settings('favicon') ? asset(settings('favicon')) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
        type="image/x-icon">
    <link rel="shortcut icon"
        href="{{ settings('favicon') ? asset(settings('favicon')) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --theme-color: #0da487
        }

        @-webkit-keyframes scaleUpDown {

            0%,
            100% {
                -webkit-transform: scaleY(1) scaleX(1);
                transform: scaleY(1) scaleX(1)
            }

            50%,
            90% {
                -webkit-transform: scaleY(1.1);
                transform: scaleY(1.1)
            }

            75% {
                -webkit-transform: scaleY(0.95);
                transform: scaleY(0.95)
            }

            80% {
                -webkit-transform: scaleX(0.95);
                transform: scaleX(0.95)
            }
        }

        @keyframes scaleUpDown {

            0%,
            100% {
                -webkit-transform: scaleY(1) scaleX(1);
                transform: scaleY(1) scaleX(1)
            }

            50%,
            90% {
                -webkit-transform: scaleY(1.1);
                transform: scaleY(1.1)
            }

            75% {
                -webkit-transform: scaleY(0.95);
                transform: scaleY(0.95)
            }

            80% {
                -webkit-transform: scaleX(0.95);
                transform: scaleX(0.95)
            }
        }

        @-webkit-keyframes shake {

            0%,
            100% {
                -webkit-transform: skewX(0) scale(1);
                transform: skewX(0) scale(1)
            }

            50% {
                -webkit-transform: skewX(5deg) scale(0.9);
                transform: skewX(5deg) scale(0.9)
            }
        }

        @keyframes shake {

            0%,
            100% {
                -webkit-transform: skewX(0) scale(1);
                transform: skewX(0) scale(1)
            }

            50% {
                -webkit-transform: skewX(5deg) scale(0.9);
                transform: skewX(5deg) scale(0.9)
            }
        }

        @-webkit-keyframes particleUp {
            0% {
                opacity: 0
            }

            20% {
                opacity: 1
            }

            80% {
                opacity: 1
            }

            100% {
                opacity: 0;
                top: -100%;
                -webkit-transform: scale(0.5);
                transform: scale(0.5)
            }
        }

        @keyframes particleUp {
            0% {
                opacity: 0
            }

            20% {
                opacity: 1
            }

            80% {
                opacity: 1
            }

            100% {
                opacity: 0;
                top: -100%;
                -webkit-transform: scale(0.5);
                transform: scale(0.5)
            }
        }

        @-webkit-keyframes shape {
            0% {
                background-position: 100% 0
            }

            50% {
                background-position: 50% 50%
            }

            100% {
                background-position: 0 100%
            }
        }

        @keyframes shape {
            0% {
                background-position: 100% 0
            }

            50% {
                background-position: 50% 50%
            }

            100% {
                background-position: 0 100%
            }
        }

        @-webkit-keyframes rounded {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            50% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes rounded {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            50% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @-webkit-keyframes move {
            0% {
                -webkit-transform: scale(1) rotate(0deg) translate3d(0, 0, 1px);
                transform: scale(1) rotate(0deg) translate3d(0, 0, 1px)
            }

            30% {
                opacity: 1
            }

            100% {
                z-index: 10;
                -webkit-transform: scale(0) rotate(360deg) translate3d(0, 0, 1px);
                transform: scale(0) rotate(360deg) translate3d(0, 0, 1px)
            }
        }

        @keyframes move {
            0% {
                -webkit-transform: scale(1) rotate(0deg) translate3d(0, 0, 1px);
                transform: scale(1) rotate(0deg) translate3d(0, 0, 1px)
            }

            30% {
                opacity: 1
            }

            100% {
                z-index: 10;
                -webkit-transform: scale(0) rotate(360deg) translate3d(0, 0, 1px);
                transform: scale(0) rotate(360deg) translate3d(0, 0, 1px)
            }
        }

        @-webkit-keyframes mover {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0)
            }

            100% {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }
        }

        @keyframes mover {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0)
            }

            100% {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }
        }

        @-webkit-keyframes flash {
            0% {
                opacity: 0.4;
                -webkit-transition: 0.3s ease-in-out;
                transition: 0.3s ease-in-out
            }

            100% {
                opacity: 1;
                -webkit-transition: 0.3s ease-in-out;
                transition: 0.3s ease-in-out
            }
        }

        @keyframes flash {
            0% {
                opacity: 0.4;
                -webkit-transition: 0.3s ease-in-out;
                transition: 0.3s ease-in-out
            }

            100% {
                opacity: 1;
                -webkit-transition: 0.3s ease-in-out;
                transition: 0.3s ease-in-out
            }
        }

        @keyframes shake {
            0% {
                -webkit-transform: translate(3px, 0);
                transform: translate(3px, 0)
            }

            50% {
                -webkit-transform: translate(-3px, 0);
                transform: translate(-3px, 0)
            }

            100% {
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0)
            }
        }

        @-webkit-keyframes grow {

            0%,
            100% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
        }

        @keyframes grow {

            0%,
            100% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0
            }

            50% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
        }

        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: 13, 110, 253;
            --bs-secondary-rgb: 108, 117, 125;
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 33, 37, 41;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #212529;
            --bs-body-bg: #fff
        }

        *,
        *::before,
        *::after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        @media (prefers-reduced-motion: no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
        }

        hr {
            margin: 1rem 0;
            color: inherit;
            background-color: currentColor;
            border: 0;
            opacity: .25
        }

        hr:not([size]) {
            height: 1px
        }

        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3,
        h4,
        .h4,
        h5,
        .h5,
        h6,
        .h6 {
            margin-top: 0;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2
        }

        h1,
        .h1 {
            font-size: calc(1.375rem + 1.5vw)
        }

        @media (min-width: 1200px) {

            h1,
            .h1 {
                font-size: 2.5rem
            }
        }

        h2,
        .h2 {
            font-size: calc(1.325rem + .9vw)
        }

        @media (min-width: 1200px) {

            h2,
            .h2 {
                font-size: 2rem
            }
        }

        h3,
        .h3 {
            font-size: calc(1.3rem + .6vw)
        }

        @media (min-width: 1200px) {

            h3,
            .h3 {
                font-size: 1.75rem
            }
        }

        h4,
        .h4 {
            font-size: calc(1.275rem + .3vw)
        }

        @media (min-width: 1200px) {

            h4,
            .h4 {
                font-size: 1.5rem
            }
        }

        h5,
        .h5 {
            font-size: 1.25rem
        }

        h6,
        .h6 {
            font-size: 1rem
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        abbr[title],
        abbr[data-bs-original-title] {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
            cursor: help;
            -webkit-text-decoration-skip-ink: none;
            text-decoration-skip-ink: none
        }

        address {
            margin-bottom: 1rem;
            font-style: normal;
            line-height: inherit
        }

        ol,
        ul {
            padding-left: 2rem
        }

        ol,
        ul,
        dl {
            margin-top: 0;
            margin-bottom: 1rem
        }

        ol ol,
        ul ul,
        ol ul,
        ul ol {
            margin-bottom: 0
        }

        dt {
            font-weight: 700
        }

        dd {
            margin-bottom: .5rem;
            margin-left: 0
        }

        blockquote {
            margin: 0 0 1rem
        }

        b,
        strong {
            font-weight: bolder
        }

        small,
        .small {
            font-size: .875em
        }

        mark,
        .mark {
            padding: .2em;
            background-color: #fcf8e3
        }

        sub,
        sup {
            position: relative;
            font-size: .75em;
            line-height: 0;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        a {
            color: #0d6efd;
            text-decoration: underline
        }

        a:hover {
            color: #0a58ca
        }

        a:not([href]):not([class]),
        a:not([href]):not([class]):hover {
            color: inherit;
            text-decoration: none
        }

        pre,
        code,
        kbd,
        samp {
            font-family: var(--bs-font-monospace);
            font-size: 1em;
            direction: ltr
                /* rtl:ignore */
            ;
            unicode-bidi: bidi-override
        }

        pre {
            display: block;
            margin-top: 0;
            margin-bottom: 1rem;
            overflow: auto;
            font-size: .875em
        }

        pre code {
            font-size: inherit;
            color: inherit;
            word-break: normal
        }

        code {
            font-size: .875em;
            color: #d63384;
            word-wrap: break-word
        }

        a>code {
            color: inherit
        }

        kbd {
            padding: .2rem .4rem;
            font-size: .875em;
            color: #fff;
            background-color: #212529;
            border-radius: .2rem
        }

        kbd kbd {
            padding: 0;
            font-size: 1em;
            font-weight: 700
        }

        figure {
            margin: 0 0 1rem
        }

        img,
        svg {
            vertical-align: middle
        }

        table {
            caption-side: bottom;
            border-collapse: collapse
        }

        caption {
            padding-top: .5rem;
            padding-bottom: .5rem;
            color: #6c757d;
            text-align: left
        }

        th {
            text-align: inherit;
            text-align: -webkit-match-parent
        }

        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
            border-color: inherit;
            border-style: solid;
            border-width: 0
        }

        label {
            display: inline-block
        }

        button {
            border-radius: 0
        }

        button:focus:not(:focus-visible) {
            outline: 0
        }

        input,
        button,
        select,
        optgroup,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button,
        select {
            text-transform: none
        }

        [role="button"] {
            cursor: pointer
        }

        select {
            word-wrap: normal
        }

        select:disabled {
            opacity: 1
        }

        [list]::-webkit-calendar-picker-indicator {
            display: none
        }

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button
        }

        button:not(:disabled),
        [type="button"]:not(:disabled),
        [type="reset"]:not(:disabled),
        [type="submit"]:not(:disabled) {
            cursor: pointer
        }

        ::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        textarea {
            resize: vertical
        }

        fieldset {
            min-width: 0;
            padding: 0;
            margin: 0;
            border: 0
        }

        legend {
            float: left;
            width: 100%;
            padding: 0;
            margin-bottom: .5rem;
            font-size: calc(1.275rem + .3vw);
            line-height: inherit
        }

        @media (min-width: 1200px) {
            legend {
                font-size: 1.5rem
            }
        }

        legend+* {
            clear: left
        }

        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        [type="search"] {
            outline-offset: -2px;
            -webkit-appearance: textfield
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::file-selector-button {
            font: inherit
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        output {
            display: inline-block
        }

        iframe {
            border: 0
        }

        summary {
            display: list-item;
            cursor: pointer
        }

        progress {
            vertical-align: baseline
        }

        [hidden] {
            display: none !important
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 300
        }

        .display-1 {
            font-size: calc(1.625rem + 4.5vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width: 1200px) {
            .display-1 {
                font-size: 5rem
            }
        }

        .display-2 {
            font-size: calc(1.575rem + 3.9vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width: 1200px) {
            .display-2 {
                font-size: 4.5rem
            }
        }

        .display-3 {
            font-size: calc(1.525rem + 3.3vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width: 1200px) {
            .display-3 {
                font-size: 4rem
            }
        }

        .display-4 {
            font-size: calc(1.475rem + 2.7vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width: 1200px) {
            .display-4 {
                font-size: 3.5rem
            }
        }

        .display-5 {
            font-size: calc(1.425rem + 2.1vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width: 1200px) {
            .display-5 {
                font-size: 3rem
            }
        }

        .display-6 {
            font-size: calc(1.375rem + 1.5vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width: 1200px) {
            .display-6 {
                font-size: 2.5rem
            }
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none
        }

        .list-inline {
            padding-left: 0;
            list-style: none
        }

        .list-inline-item {
            display: inline-block
        }

        .list-inline-item:not(:last-child) {
            margin-right: .5rem
        }

        .initialism {
            font-size: .875em;
            text-transform: uppercase
        }

        .blockquote {
            margin-bottom: 1rem;
            font-size: 1.25rem
        }

        .blockquote>:last-child {
            margin-bottom: 0
        }

        .blockquote-footer {
            margin-top: -1rem;
            margin-bottom: 1rem;
            font-size: .875em;
            color: #6c757d
        }

        .blockquote-footer::before {
            content: "\2014\00A0"
        }

        .img-fluid {
            max-width: 100%;
            height: auto
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            max-width: 100%;
            height: auto
        }

        .figure {
            display: inline-block
        }

        .figure-img {
            margin-bottom: .5rem;
            line-height: 1
        }

        .figure-caption {
            font-size: .875em;
            color: #6c757d
        }

        .container,
        .container-fluid,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl,
        .container-xxl {
            width: 100%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width: 576px) {

            .container,
            .container-sm {
                max-width: 540px
            }
        }

        @media (min-width: 768px) {

            .container,
            .container-sm,
            .container-md {
                max-width: 720px
            }
        }

        @media (min-width: 992px) {

            .container,
            .container-sm,
            .container-md,
            .container-lg {
                max-width: 960px
            }
        }

        @media (min-width: 1200px) {

            .container,
            .container-sm,
            .container-md,
            .container-lg,
            .container-xl {
                max-width: 1140px
            }
        }

        @media (min-width: 1400px) {

            .container,
            .container-sm,
            .container-md,
            .container-lg,
            .container-xl,
            .container-xxl {
                max-width: 1320px
            }
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-.5 * var(--bs-gutter-x));
            margin-left: calc(-.5 * var(--bs-gutter-x))
        }

        .row>* {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y)
        }

        .col {
            -webkit-box-flex: 1;
            -ms-flex: 1 0 0%;
            flex: 1 0 0%
        }

        .row-cols-auto>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto
        }

        .row-cols-1>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 100%
        }

        .row-cols-2>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 50%
        }

        .row-cols-3>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 33.33333%
        }

        .row-cols-4>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 25%
        }

        .row-cols-5>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 20%
        }

        .row-cols-6>* {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 16.66667%
        }

        .col-auto {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto
        }

        .col-1 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 8.33333%
        }

        .col-2 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 16.66667%
        }

        .col-3 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 25%
        }

        .col-4 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 33.33333%
        }

        .col-5 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 41.66667%
        }

        .col-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 50%
        }

        .col-7 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 58.33333%
        }

        .col-8 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 66.66667%
        }

        .col-9 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 75%
        }

        .col-10 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 83.33333%
        }

        .col-11 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 91.66667%
        }

        .col-12 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 100%
        }

        .offset-1 {
            margin-left: 8.33333%
        }

        .offset-2 {
            margin-left: 16.66667%
        }

        .offset-3 {
            margin-left: 25%
        }

        .offset-4 {
            margin-left: 33.33333%
        }

        .offset-5 {
            margin-left: 41.66667%
        }

        .offset-6 {
            margin-left: 50%
        }

        .offset-7 {
            margin-left: 58.33333%
        }

        .offset-8 {
            margin-left: 66.66667%
        }

        .offset-9 {
            margin-left: 75%
        }

        .offset-10 {
            margin-left: 83.33333%
        }

        .offset-11 {
            margin-left: 91.66667%
        }

        .g-0,
        .gx-0 {
            --bs-gutter-x: 0
        }

        .g-0,
        .gy-0 {
            --bs-gutter-y: 0
        }

        .g-1,
        .gx-1 {
            --bs-gutter-x: .25rem
        }

        .g-1,
        .gy-1 {
            --bs-gutter-y: .25rem
        }

        .g-2,
        .gx-2 {
            --bs-gutter-x: .5rem
        }

        .g-2,
        .gy-2 {
            --bs-gutter-y: .5rem
        }

        .g-3,
        .gx-3 {
            --bs-gutter-x: 1rem
        }

        .g-3,
        .gy-3 {
            --bs-gutter-y: 1rem
        }

        .g-4,
        .gx-4 {
            --bs-gutter-x: 1.5rem
        }

        .g-4,
        .gy-4 {
            --bs-gutter-y: 1.5rem
        }

        .g-5,
        .gx-5 {
            --bs-gutter-x: 3rem
        }

        .g-5,
        .gy-5 {
            --bs-gutter-y: 3rem
        }

        @media (min-width: 576px) {
            .col-sm {
                -webkit-box-flex: 1;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%
            }

            .row-cols-sm-auto>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-sm-1>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-sm-2>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-sm-3>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .row-cols-sm-4>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-sm-5>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-sm-6>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-sm-auto {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .col-sm-1 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 8.33333%
            }

            .col-sm-2 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-sm-3 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .col-sm-4 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .col-sm-5 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 41.66667%
            }

            .col-sm-6 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .col-sm-7 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 58.33333%
            }

            .col-sm-8 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 66.66667%
            }

            .col-sm-9 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 75%
            }

            .col-sm-10 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 83.33333%
            }

            .col-sm-11 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 91.66667%
            }

            .col-sm-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .offset-sm-0 {
                margin-left: 0
            }

            .offset-sm-1 {
                margin-left: 8.33333%
            }

            .offset-sm-2 {
                margin-left: 16.66667%
            }

            .offset-sm-3 {
                margin-left: 25%
            }

            .offset-sm-4 {
                margin-left: 33.33333%
            }

            .offset-sm-5 {
                margin-left: 41.66667%
            }

            .offset-sm-6 {
                margin-left: 50%
            }

            .offset-sm-7 {
                margin-left: 58.33333%
            }

            .offset-sm-8 {
                margin-left: 66.66667%
            }

            .offset-sm-9 {
                margin-left: 75%
            }

            .offset-sm-10 {
                margin-left: 83.33333%
            }

            .offset-sm-11 {
                margin-left: 91.66667%
            }

            .g-sm-0,
            .gx-sm-0 {
                --bs-gutter-x: 0
            }

            .g-sm-0,
            .gy-sm-0 {
                --bs-gutter-y: 0
            }

            .g-sm-1,
            .gx-sm-1 {
                --bs-gutter-x: .25rem
            }

            .g-sm-1,
            .gy-sm-1 {
                --bs-gutter-y: .25rem
            }

            .g-sm-2,
            .gx-sm-2 {
                --bs-gutter-x: .5rem
            }

            .g-sm-2,
            .gy-sm-2 {
                --bs-gutter-y: .5rem
            }

            .g-sm-3,
            .gx-sm-3 {
                --bs-gutter-x: 1rem
            }

            .g-sm-3,
            .gy-sm-3 {
                --bs-gutter-y: 1rem
            }

            .g-sm-4,
            .gx-sm-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-sm-4,
            .gy-sm-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-sm-5,
            .gx-sm-5 {
                --bs-gutter-x: 3rem
            }

            .g-sm-5,
            .gy-sm-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width: 768px) {
            .col-md {
                -webkit-box-flex: 1;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%
            }

            .row-cols-md-auto>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-md-1>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-md-2>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-md-3>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .row-cols-md-4>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-md-5>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-md-6>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-md-auto {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .col-md-1 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 8.33333%
            }

            .col-md-2 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-md-3 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .col-md-4 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .col-md-5 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 41.66667%
            }

            .col-md-6 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .col-md-7 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 58.33333%
            }

            .col-md-8 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 66.66667%
            }

            .col-md-9 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 75%
            }

            .col-md-10 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 83.33333%
            }

            .col-md-11 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 91.66667%
            }

            .col-md-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .offset-md-0 {
                margin-left: 0
            }

            .offset-md-1 {
                margin-left: 8.33333%
            }

            .offset-md-2 {
                margin-left: 16.66667%
            }

            .offset-md-3 {
                margin-left: 25%
            }

            .offset-md-4 {
                margin-left: 33.33333%
            }

            .offset-md-5 {
                margin-left: 41.66667%
            }

            .offset-md-6 {
                margin-left: 50%
            }

            .offset-md-7 {
                margin-left: 58.33333%
            }

            .offset-md-8 {
                margin-left: 66.66667%
            }

            .offset-md-9 {
                margin-left: 75%
            }

            .offset-md-10 {
                margin-left: 83.33333%
            }

            .offset-md-11 {
                margin-left: 91.66667%
            }

            .g-md-0,
            .gx-md-0 {
                --bs-gutter-x: 0
            }

            .g-md-0,
            .gy-md-0 {
                --bs-gutter-y: 0
            }

            .g-md-1,
            .gx-md-1 {
                --bs-gutter-x: .25rem
            }

            .g-md-1,
            .gy-md-1 {
                --bs-gutter-y: .25rem
            }

            .g-md-2,
            .gx-md-2 {
                --bs-gutter-x: .5rem
            }

            .g-md-2,
            .gy-md-2 {
                --bs-gutter-y: .5rem
            }

            .g-md-3,
            .gx-md-3 {
                --bs-gutter-x: 1rem
            }

            .g-md-3,
            .gy-md-3 {
                --bs-gutter-y: 1rem
            }

            .g-md-4,
            .gx-md-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-md-4,
            .gy-md-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-md-5,
            .gx-md-5 {
                --bs-gutter-x: 3rem
            }

            .g-md-5,
            .gy-md-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width: 992px) {
            .col-lg {
                -webkit-box-flex: 1;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%
            }

            .row-cols-lg-auto>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-lg-1>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-lg-2>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-lg-3>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .row-cols-lg-4>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-lg-5>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-lg-6>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-lg-auto {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .col-lg-1 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 8.33333%
            }

            .col-lg-2 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-lg-3 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .col-lg-4 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .col-lg-5 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 41.66667%
            }

            .col-lg-6 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .col-lg-7 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 58.33333%
            }

            .col-lg-8 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 66.66667%
            }

            .col-lg-9 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 75%
            }

            .col-lg-10 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 83.33333%
            }

            .col-lg-11 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 91.66667%
            }

            .col-lg-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .offset-lg-0 {
                margin-left: 0
            }

            .offset-lg-1 {
                margin-left: 8.33333%
            }

            .offset-lg-2 {
                margin-left: 16.66667%
            }

            .offset-lg-3 {
                margin-left: 25%
            }

            .offset-lg-4 {
                margin-left: 33.33333%
            }

            .offset-lg-5 {
                margin-left: 41.66667%
            }

            .offset-lg-6 {
                margin-left: 50%
            }

            .offset-lg-7 {
                margin-left: 58.33333%
            }

            .offset-lg-8 {
                margin-left: 66.66667%
            }

            .offset-lg-9 {
                margin-left: 75%
            }

            .offset-lg-10 {
                margin-left: 83.33333%
            }

            .offset-lg-11 {
                margin-left: 91.66667%
            }

            .g-lg-0,
            .gx-lg-0 {
                --bs-gutter-x: 0
            }

            .g-lg-0,
            .gy-lg-0 {
                --bs-gutter-y: 0
            }

            .g-lg-1,
            .gx-lg-1 {
                --bs-gutter-x: .25rem
            }

            .g-lg-1,
            .gy-lg-1 {
                --bs-gutter-y: .25rem
            }

            .g-lg-2,
            .gx-lg-2 {
                --bs-gutter-x: .5rem
            }

            .g-lg-2,
            .gy-lg-2 {
                --bs-gutter-y: .5rem
            }

            .g-lg-3,
            .gx-lg-3 {
                --bs-gutter-x: 1rem
            }

            .g-lg-3,
            .gy-lg-3 {
                --bs-gutter-y: 1rem
            }

            .g-lg-4,
            .gx-lg-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-lg-4,
            .gy-lg-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-lg-5,
            .gx-lg-5 {
                --bs-gutter-x: 3rem
            }

            .g-lg-5,
            .gy-lg-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width: 1200px) {
            .col-xl {
                -webkit-box-flex: 1;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%
            }

            .row-cols-xl-auto>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-xl-1>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-xl-2>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-xl-3>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .row-cols-xl-4>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-xl-5>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-xl-6>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-xl-auto {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .col-xl-1 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 8.33333%
            }

            .col-xl-2 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-xl-3 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .col-xl-4 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .col-xl-5 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 41.66667%
            }

            .col-xl-6 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .col-xl-7 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 58.33333%
            }

            .col-xl-8 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 66.66667%
            }

            .col-xl-9 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 75%
            }

            .col-xl-10 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 83.33333%
            }

            .col-xl-11 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 91.66667%
            }

            .col-xl-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .offset-xl-0 {
                margin-left: 0
            }

            .offset-xl-1 {
                margin-left: 8.33333%
            }

            .offset-xl-2 {
                margin-left: 16.66667%
            }

            .offset-xl-3 {
                margin-left: 25%
            }

            .offset-xl-4 {
                margin-left: 33.33333%
            }

            .offset-xl-5 {
                margin-left: 41.66667%
            }

            .offset-xl-6 {
                margin-left: 50%
            }

            .offset-xl-7 {
                margin-left: 58.33333%
            }

            .offset-xl-8 {
                margin-left: 66.66667%
            }

            .offset-xl-9 {
                margin-left: 75%
            }

            .offset-xl-10 {
                margin-left: 83.33333%
            }

            .offset-xl-11 {
                margin-left: 91.66667%
            }

            .g-xl-0,
            .gx-xl-0 {
                --bs-gutter-x: 0
            }

            .g-xl-0,
            .gy-xl-0 {
                --bs-gutter-y: 0
            }

            .g-xl-1,
            .gx-xl-1 {
                --bs-gutter-x: .25rem
            }

            .g-xl-1,
            .gy-xl-1 {
                --bs-gutter-y: .25rem
            }

            .g-xl-2,
            .gx-xl-2 {
                --bs-gutter-x: .5rem
            }

            .g-xl-2,
            .gy-xl-2 {
                --bs-gutter-y: .5rem
            }

            .g-xl-3,
            .gx-xl-3 {
                --bs-gutter-x: 1rem
            }

            .g-xl-3,
            .gy-xl-3 {
                --bs-gutter-y: 1rem
            }

            .g-xl-4,
            .gx-xl-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-xl-4,
            .gy-xl-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-xl-5,
            .gx-xl-5 {
                --bs-gutter-x: 3rem
            }

            .g-xl-5,
            .gy-xl-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width: 1400px) {
            .col-xxl {
                -webkit-box-flex: 1;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%
            }

            .row-cols-xxl-auto>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-xxl-1>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-xxl-2>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-xxl-3>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .row-cols-xxl-4>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-xxl-5>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-xxl-6>* {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-xxl-auto {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto
            }

            .col-xxl-1 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 8.33333%
            }

            .col-xxl-2 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66667%
            }

            .col-xxl-3 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%
            }

            .col-xxl-4 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 33.33333%
            }

            .col-xxl-5 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 41.66667%
            }

            .col-xxl-6 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 50%
            }

            .col-xxl-7 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 58.33333%
            }

            .col-xxl-8 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 66.66667%
            }

            .col-xxl-9 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 75%
            }

            .col-xxl-10 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 83.33333%
            }

            .col-xxl-11 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 91.66667%
            }

            .col-xxl-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 100%
            }

            .offset-xxl-0 {
                margin-left: 0
            }

            .offset-xxl-1 {
                margin-left: 8.33333%
            }

            .offset-xxl-2 {
                margin-left: 16.66667%
            }

            .offset-xxl-3 {
                margin-left: 25%
            }

            .offset-xxl-4 {
                margin-left: 33.33333%
            }

            .offset-xxl-5 {
                margin-left: 41.66667%
            }

            .offset-xxl-6 {
                margin-left: 50%
            }

            .offset-xxl-7 {
                margin-left: 58.33333%
            }

            .offset-xxl-8 {
                margin-left: 66.66667%
            }

            .offset-xxl-9 {
                margin-left: 75%
            }

            .offset-xxl-10 {
                margin-left: 83.33333%
            }

            .offset-xxl-11 {
                margin-left: 91.66667%
            }

            .g-xxl-0,
            .gx-xxl-0 {
                --bs-gutter-x: 0
            }

            .g-xxl-0,
            .gy-xxl-0 {
                --bs-gutter-y: 0
            }

            .g-xxl-1,
            .gx-xxl-1 {
                --bs-gutter-x: .25rem
            }

            .g-xxl-1,
            .gy-xxl-1 {
                --bs-gutter-y: .25rem
            }

            .g-xxl-2,
            .gx-xxl-2 {
                --bs-gutter-x: .5rem
            }

            .g-xxl-2,
            .gy-xxl-2 {
                --bs-gutter-y: .5rem
            }

            .g-xxl-3,
            .gx-xxl-3 {
                --bs-gutter-x: 1rem
            }

            .g-xxl-3,
            .gy-xxl-3 {
                --bs-gutter-y: 1rem
            }

            .g-xxl-4,
            .gx-xxl-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-xxl-4,
            .gy-xxl-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-xxl-5,
            .gx-xxl-5 {
                --bs-gutter-x: 3rem
            }

            .g-xxl-5,
            .gy-xxl-5 {
                --bs-gutter-y: 3rem
            }
        }

        .table {
            --bs-table-bg: rgba(0, 0, 0, 0);
            --bs-table-accent-bg: rgba(0, 0, 0, 0);
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #ececec
        }

        .table>:not(caption)>*>* {
            padding: .5rem .5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            -webkit-box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg)
        }

        .table>tbody {
            vertical-align: inherit
        }

        .table>thead {
            vertical-align: bottom
        }

        .table>:not(:first-child) {
            border-top: 2px solid currentColor
        }

        .caption-top {
            caption-side: top
        }

        .table-sm>:not(caption)>*>* {
            padding: .25rem .25rem
        }

        .table-bordered>:not(caption)>* {
            border-width: 1px 0
        }

        .table-bordered>:not(caption)>*>* {
            border-width: 0 1px
        }

        .table-borderless>:not(caption)>*>* {
            border-bottom-width: 0
        }

        .table-borderless>:not(:first-child) {
            border-top-width: 0
        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            --bs-table-accent-bg: var(--bs-table-striped-bg);
            color: var(--bs-table-striped-color)
        }

        .table-active {
            --bs-table-accent-bg: var(--bs-table-active-bg);
            color: var(--bs-table-active-color)
        }

        .table-hover>tbody>tr:hover>* {
            --bs-table-accent-bg: var(--bs-table-hover-bg);
            color: var(--bs-table-hover-color)
        }

        .table-primary {
            --bs-table-bg: #cfe2ff;
            --bs-table-striped-bg: #c5d7f2;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #bacbe6;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #bfd1ec;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #bacbe6
        }

        .table-secondary {
            --bs-table-bg: #e2e3e5;
            --bs-table-striped-bg: #d7d8da;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #cbccce;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #d1d2d4;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #cbccce
        }

        .table-success {
            --bs-table-bg: #d1e7dd;
            --bs-table-striped-bg: #c7dbd2;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #bcd0c7;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #c1d6cc;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #bcd0c7
        }

        .table-info {
            --bs-table-bg: #cff4fc;
            --bs-table-striped-bg: #c5e8ef;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #badce3;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #bfe2e9;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #badce3
        }

        .table-warning {
            --bs-table-bg: #fff3cd;
            --bs-table-striped-bg: #f2e7c3;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #e6dbb9;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #ece1be;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #e6dbb9
        }

        .table-danger {
            --bs-table-bg: #f8d7da;
            --bs-table-striped-bg: #eccccf;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #dfc2c4;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #e5c7ca;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #dfc2c4
        }

        .table-light {
            --bs-table-bg: #f8f9fa;
            --bs-table-striped-bg: #ecedee;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #dfe0e1;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #e5e6e7;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #dfe0e1
        }

        .table-dark {
            --bs-table-bg: #212529;
            --bs-table-striped-bg: #2c3034;
            --bs-table-striped-color: #fff;
            --bs-table-active-bg: #373b3e;
            --bs-table-active-color: #fff;
            --bs-table-hover-bg: #323539;
            --bs-table-hover-color: #fff;
            color: #fff;
            border-color: #373b3e
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }

        @media (max-width: 575.98px) {
            .table-responsive-sm {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
        }

        @media (max-width: 767.98px) {
            .table-responsive-md {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
        }

        @media (max-width: 991.98px) {
            .table-responsive-lg {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
        }

        @media (max-width: 1199.98px) {
            .table-responsive-xl {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
        }

        @media (max-width: 1399.98px) {
            .table-responsive-xxl {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
        }

        .form-label {
            margin-bottom: .5rem
        }

        .col-form-label {
            padding-top: calc(.375rem + 1px);
            padding-bottom: calc(.375rem + 1px);
            margin-bottom: 0;
            font-size: inherit;
            line-height: 1.5
        }

        .col-form-label-lg {
            padding-top: calc(.5rem + 1px);
            padding-bottom: calc(.5rem + 1px);
            font-size: 1.25rem
        }

        .col-form-label-sm {
            padding-top: calc(.25rem + 1px);
            padding-bottom: calc(.25rem + 1px);
            font-size: .875rem
        }

        .form-text {
            margin-top: .25rem;
            font-size: .875em;
            color: #6c757d
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .form-control {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-control[type="file"] {
            overflow: hidden
        }

        .form-control[type="file"]:not(:disabled):not([readonly]) {
            cursor: pointer
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #86b7fe;
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .form-control::-webkit-date-and-time-value {
            height: 1.5em
        }

        .form-control::-webkit-input-placeholder {
            color: #6c757d;
            opacity: 1
        }

        .form-control::-moz-placeholder {
            color: #6c757d;
            opacity: 1
        }

        .form-control:-ms-input-placeholder {
            color: #6c757d;
            opacity: 1
        }

        .form-control::-ms-input-placeholder {
            color: #6c757d;
            opacity: 1
        }

        .form-control::placeholder {
            color: #6c757d;
            opacity: 1
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1
        }

        .form-control::file-selector-button {
            padding: .375rem .75rem;
            margin: -.375rem -.75rem;
            -webkit-margin-end: .75rem;
            margin-inline-end: .75rem;
            color: #212529;
            background-color: #e9ecef;
            pointer-events: none;
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-inline-end-width: 1px;
            border-radius: 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .form-control::file-selector-button {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-control:hover:not(:disabled):not([readonly])::file-selector-button {
            background-color: #dde0e3
        }

        .form-control::-webkit-file-upload-button {
            padding: .375rem .75rem;
            margin: -.375rem -.75rem;
            -webkit-margin-end: .75rem;
            margin-inline-end: .75rem;
            color: #212529;
            background-color: #e9ecef;
            pointer-events: none;
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-inline-end-width: 1px;
            border-radius: 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .form-control::-webkit-file-upload-button {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-control:hover:not(:disabled):not([readonly])::-webkit-file-upload-button {
            background-color: #dde0e3
        }

        .form-control-plaintext {
            display: block;
            width: 100%;
            padding: .375rem 0;
            margin-bottom: 0;
            line-height: 1.5;
            color: #212529;
            background-color: transparent;
            border: solid transparent;
            border-width: 1px 0
        }

        .form-control-plaintext.form-control-sm,
        .form-control-plaintext.form-control-lg {
            padding-right: 0;
            padding-left: 0
        }

        .form-control-sm {
            min-height: calc(1.5em + .5rem + 2px);
            padding: .25rem .5rem;
            font-size: .875rem;
            border-radius: .2rem
        }

        .form-control-sm::file-selector-button {
            padding: .25rem .5rem;
            margin: -.25rem -.5rem;
            -webkit-margin-end: .5rem;
            margin-inline-end: .5rem
        }

        .form-control-sm::-webkit-file-upload-button {
            padding: .25rem .5rem;
            margin: -.25rem -.5rem;
            -webkit-margin-end: .5rem;
            margin-inline-end: .5rem
        }

        .form-control-lg {
            min-height: calc(1.5em + 1rem + 2px);
            padding: .5rem 1rem;
            font-size: 1.25rem;
            border-radius: .3rem
        }

        .form-control-lg::file-selector-button {
            padding: .5rem 1rem;
            margin: -.5rem -1rem;
            -webkit-margin-end: 1rem;
            margin-inline-end: 1rem
        }

        .form-control-lg::-webkit-file-upload-button {
            padding: .5rem 1rem;
            margin: -.5rem -1rem;
            -webkit-margin-end: 1rem;
            margin-inline-end: 1rem
        }

        textarea.form-control {
            min-height: calc(1.5em + .75rem + 2px)
        }

        textarea.form-control-sm {
            min-height: calc(1.5em + .5rem + 2px)
        }

        textarea.form-control-lg {
            min-height: calc(1.5em + 1rem + 2px)
        }

        .form-control-color {
            width: 3rem;
            height: auto;
            padding: .375rem
        }

        .form-control-color:not(:disabled):not([readonly]) {
            cursor: pointer
        }

        .form-control-color::-moz-color-swatch {
            height: 1.5em;
            border-radius: .25rem
        }

        .form-control-color::-webkit-color-swatch {
            height: 1.5em;
            border-radius: .25rem
        }

        .form-select {
            display: block;
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
            -moz-padding-start: calc(.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        @media (prefers-reduced-motion: reduce) {
            .form-select {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-select:focus {
            border-color: #86b7fe;
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .form-select[multiple],
        .form-select[size]:not([size="1"]) {
            padding-right: .75rem;
            background-image: none
        }

        .form-select:disabled {
            background-color: #e9ecef
        }

        .form-select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #212529
        }

        .form-select-sm {
            padding-top: .25rem;
            padding-bottom: .25rem;
            padding-left: .5rem;
            font-size: .875rem;
            border-radius: .2rem
        }

        .form-select-lg {
            padding-top: .5rem;
            padding-bottom: .5rem;
            padding-left: 1rem;
            font-size: 1.25rem;
            border-radius: .3rem
        }

        .form-check {
            display: block;
            min-height: 1.5rem;
            padding-left: 1.5em;
            margin-bottom: .125rem
        }

        .form-check .form-check-input {
            float: left;
            margin-left: -1.5em
        }

        .form-check-input {
            width: 1em;
            height: 1em;
            margin-top: .25em;
            vertical-align: top;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            border: 1px solid rgba(0, 0, 0, 0.25);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact
        }

        .form-check-input[type="checkbox"] {
            border-radius: .25em
        }

        .form-check-input[type="radio"] {
            border-radius: 50%
        }

        .form-check-input:active {
            -webkit-filter: brightness(90%);
            filter: brightness(90%)
        }

        .form-check-input:focus {
            border-color: #86b7fe;
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .form-check-input:checked[type="checkbox"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e")
        }

        .form-check-input:checked[type="radio"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e")
        }

        .form-check-input[type="checkbox"]:indeterminate {
            background-color: #0d6efd;
            border-color: #0d6efd;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10h8'/%3e%3c/svg%3e")
        }

        .form-check-input:disabled {
            pointer-events: none;
            -webkit-filter: none;
            filter: none;
            opacity: .5
        }

        .form-check-input[disabled]~.form-check-label,
        .form-check-input:disabled~.form-check-label {
            opacity: .5
        }

        .form-switch {
            padding-left: 2.5em
        }

        .form-switch .form-check-input {
            width: 2em;
            margin-left: -2.5em;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280,0,0,0.25%29'/%3e%3c/svg%3e");
            background-position: left center;
            border-radius: 2em;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .form-switch .form-check-input {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-switch .form-check-input:focus {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%2386b7fe'/%3e%3c/svg%3e")
        }

        .form-switch .form-check-input:checked {
            background-position: right center;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e")
        }

        .form-check-inline {
            display: inline-block;
            margin-right: 1rem
        }

        .btn-check {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none
        }

        .btn-check[disabled]+.btn,
        .btn-check:disabled+.btn {
            pointer-events: none;
            -webkit-filter: none;
            filter: none;
            opacity: .65
        }

        .form-range {
            width: 100%;
            height: 1.5rem;
            padding: 0;
            background-color: transparent;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        .form-range:focus {
            outline: 0
        }

        .form-range:focus::-webkit-slider-thumb {
            -webkit-box-shadow: 0 0 0 1px #fff, 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 1px #fff, 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .form-range:focus::-moz-range-thumb {
            box-shadow: 0 0 0 1px #fff, 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .form-range::-moz-focus-outer {
            border: 0
        }

        .form-range::-webkit-slider-thumb {
            width: 1rem;
            height: 1rem;
            margin-top: -.25rem;
            background-color: #0d6efd;
            border: 0;
            border-radius: 1rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-appearance: none;
            appearance: none
        }

        @media (prefers-reduced-motion: reduce) {
            .form-range::-webkit-slider-thumb {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-range::-webkit-slider-thumb:active {
            background-color: #b6d4fe
        }

        .form-range::-webkit-slider-runnable-track {
            width: 100%;
            height: .5rem;
            color: transparent;
            cursor: pointer;
            background-color: #dee2e6;
            border-color: transparent;
            border-radius: 1rem
        }

        .form-range::-moz-range-thumb {
            width: 1rem;
            height: 1rem;
            background-color: #0d6efd;
            border: 0;
            border-radius: 1rem;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -moz-appearance: none;
            appearance: none
        }

        @media (prefers-reduced-motion: reduce) {
            .form-range::-moz-range-thumb {
                -moz-transition: none;
                transition: none
            }
        }

        .form-range::-moz-range-thumb:active {
            background-color: #b6d4fe
        }

        .form-range::-moz-range-track {
            width: 100%;
            height: .5rem;
            color: transparent;
            cursor: pointer;
            background-color: #dee2e6;
            border-color: transparent;
            border-radius: 1rem
        }

        .form-range:disabled {
            pointer-events: none
        }

        .form-range:disabled::-webkit-slider-thumb {
            background-color: #adb5bd
        }

        .form-range:disabled::-moz-range-thumb {
            background-color: #adb5bd
        }

        .form-floating {
            position: relative
        }

        .form-floating>.form-control,
        .form-floating>.form-select {
            height: calc(3.5rem + 2px);
            line-height: 1.25
        }

        .form-floating>label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            padding: 1rem .75rem;
            pointer-events: none;
            border: 1px solid transparent;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .form-floating>label {
                -webkit-transition: none;
                transition: none
            }
        }

        .form-floating>.form-control {
            padding: 1rem .75rem
        }

        .form-floating>.form-control::-webkit-input-placeholder {
            color: transparent
        }

        .form-floating>.form-control::-moz-placeholder {
            color: transparent
        }

        .form-floating>.form-control:-ms-input-placeholder {
            color: transparent
        }

        .form-floating>.form-control::-ms-input-placeholder {
            color: transparent
        }

        .form-floating>.form-control::placeholder {
            color: transparent
        }

        .form-floating>.form-control:not(:-moz-placeholder-shown) {
            padding-top: 1.625rem;
            padding-bottom: .625rem
        }

        .form-floating>.form-control:not(:-ms-input-placeholder) {
            padding-top: 1.625rem;
            padding-bottom: .625rem
        }

        .form-floating>.form-control:focus,
        .form-floating>.form-control:not(:placeholder-shown) {
            padding-top: 1.625rem;
            padding-bottom: .625rem
        }

        .form-floating>.form-control:-webkit-autofill {
            padding-top: 1.625rem;
            padding-bottom: .625rem
        }

        .form-floating>.form-select {
            padding-top: 1.625rem;
            padding-bottom: .625rem
        }

        .form-floating>.form-control:not(:-moz-placeholder-shown)~label {
            opacity: .65;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem)
        }

        .form-floating>.form-control:not(:-ms-input-placeholder)~label {
            opacity: .65;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem)
        }

        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label,
        .form-floating>.form-select~label {
            opacity: .65;
            -webkit-transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem)
        }

        .form-floating>.form-control:-webkit-autofill~label {
            opacity: .65;
            -webkit-transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem)
        }

        .input-group {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%
        }

        .input-group>.form-control,
        .input-group>.form-select {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            min-width: 0
        }

        .input-group>.form-control:focus,
        .input-group>.form-select:focus {
            z-index: 3
        }

        .input-group .btn {
            position: relative;
            z-index: 2
        }

        .input-group .btn:focus {
            z-index: 3
        }

        .input-group-text {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: .25rem
        }

        .input-group-lg>.form-control,
        .input-group-lg>.form-select,
        .input-group-lg>.input-group-text,
        .input-group-lg>.btn {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            border-radius: .3rem
        }

        .input-group-sm>.form-control,
        .input-group-sm>.form-select,
        .input-group-sm>.input-group-text,
        .input-group-sm>.btn {
            padding: .25rem .5rem;
            font-size: .875rem;
            border-radius: .2rem
        }

        .input-group-lg>.form-select,
        .input-group-sm>.form-select {
            padding-right: 3rem
        }

        .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu),
        .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n+3) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .input-group.has-validation>:nth-last-child(n+3):not(.dropdown-toggle):not(.dropdown-menu),
        .input-group.has-validation>.dropdown-toggle:nth-last-child(n+4) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
            margin-left: -1px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .valid-feedback {
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #198754
        }

        .valid-tooltip {
            position: absolute;
            top: 100%;
            z-index: 5;
            display: none;
            max-width: 100%;
            padding: .25rem .5rem;
            margin-top: .1rem;
            font-size: .875rem;
            color: #fff;
            background-color: rgba(25, 135, 84, 0.9);
            border-radius: .25rem
        }

        .was-validated :valid~.valid-feedback,
        .was-validated :valid~.valid-tooltip,
        .is-valid~.valid-feedback,
        .is-valid~.valid-tooltip {
            display: block
        }

        .was-validated .form-control:valid,
        .form-control.is-valid {
            border-color: #198754;
            padding-right: calc(1.5em + .75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem)
        }

        .was-validated .form-control:valid:focus,
        .form-control.is-valid:focus {
            border-color: #198754;
            -webkit-box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.25);
            box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.25)
        }

        .was-validated textarea.form-control:valid,
        textarea.form-control.is-valid {
            padding-right: calc(1.5em + .75rem);
            background-position: top calc(.375em + .1875rem) right calc(.375em + .1875rem)
        }

        .was-validated .form-select:valid,
        .form-select.is-valid {
            border-color: #198754
        }

        .was-validated .form-select:valid:not([multiple]):not([size]),
        .was-validated .form-select:valid:not([multiple])[size="1"],
        .form-select.is-valid:not([multiple]):not([size]),
        .form-select.is-valid:not([multiple])[size="1"] {
            padding-right: 4.125rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e"), url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-position: right .75rem center, center right 2.25rem;
            background-size: 16px 12px, calc(.75em + .375rem) calc(.75em + .375rem)
        }

        .was-validated .form-select:valid:focus,
        .form-select.is-valid:focus {
            border-color: #198754;
            -webkit-box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.25);
            box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.25)
        }

        .was-validated .form-check-input:valid,
        .form-check-input.is-valid {
            border-color: #198754
        }

        .was-validated .form-check-input:valid:checked,
        .form-check-input.is-valid:checked {
            background-color: #198754
        }

        .was-validated .form-check-input:valid:focus,
        .form-check-input.is-valid:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.25);
            box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.25)
        }

        .was-validated .form-check-input:valid~.form-check-label,
        .form-check-input.is-valid~.form-check-label {
            color: #198754
        }

        .form-check-inline .form-check-input~.valid-feedback {
            margin-left: .5em
        }

        .was-validated .input-group .form-control:valid,
        .input-group .form-control.is-valid,
        .was-validated .input-group .form-select:valid,
        .input-group .form-select.is-valid {
            z-index: 1
        }

        .was-validated .input-group .form-control:valid:focus,
        .input-group .form-control.is-valid:focus,
        .was-validated .input-group .form-select:valid:focus,
        .input-group .form-select.is-valid:focus {
            z-index: 3
        }

        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545
        }

        .invalid-tooltip {
            position: absolute;
            top: 100%;
            z-index: 5;
            display: none;
            max-width: 100%;
            padding: .25rem .5rem;
            margin-top: .1rem;
            font-size: .875rem;
            color: #fff;
            background-color: rgba(220, 53, 69, 0.9);
            border-radius: .25rem
        }

        .was-validated :invalid~.invalid-feedback,
        .was-validated :invalid~.invalid-tooltip,
        .is-invalid~.invalid-feedback,
        .is-invalid~.invalid-tooltip {
            display: block
        }

        .was-validated .form-control:invalid,
        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + .75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem)
        }

        .was-validated .form-control:invalid:focus,
        .form-control.is-invalid:focus {
            border-color: #dc3545;
            -webkit-box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.25);
            box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.25)
        }

        .was-validated textarea.form-control:invalid,
        textarea.form-control.is-invalid {
            padding-right: calc(1.5em + .75rem);
            background-position: top calc(.375em + .1875rem) right calc(.375em + .1875rem)
        }

        .was-validated .form-select:invalid,
        .form-select.is-invalid {
            border-color: #dc3545
        }

        .was-validated .form-select:invalid:not([multiple]):not([size]),
        .was-validated .form-select:invalid:not([multiple])[size="1"],
        .form-select.is-invalid:not([multiple]):not([size]),
        .form-select.is-invalid:not([multiple])[size="1"] {
            padding-right: 4.125rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e"), url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-position: right .75rem center, center right 2.25rem;
            background-size: 16px 12px, calc(.75em + .375rem) calc(.75em + .375rem)
        }

        .was-validated .form-select:invalid:focus,
        .form-select.is-invalid:focus {
            border-color: #dc3545;
            -webkit-box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.25);
            box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.25)
        }

        .was-validated .form-check-input:invalid,
        .form-check-input.is-invalid {
            border-color: #dc3545
        }

        .was-validated .form-check-input:invalid:checked,
        .form-check-input.is-invalid:checked {
            background-color: #dc3545
        }

        .was-validated .form-check-input:invalid:focus,
        .form-check-input.is-invalid:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.25);
            box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.25)
        }

        .was-validated .form-check-input:invalid~.form-check-label,
        .form-check-input.is-invalid~.form-check-label {
            color: #dc3545
        }

        .form-check-inline .form-check-input~.invalid-feedback {
            margin-left: .5em
        }

        .was-validated .input-group .form-control:invalid,
        .input-group .form-control.is-invalid,
        .was-validated .input-group .form-select:invalid,
        .input-group .form-select.is-invalid {
            z-index: 2
        }

        .was-validated .input-group .form-control:invalid:focus,
        .input-group .form-control.is-invalid:focus,
        .was-validated .input-group .form-select:invalid:focus,
        .input-group .form-select.is-invalid:focus {
            z-index: 3
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .btn {
                -webkit-transition: none;
                transition: none
            }
        }

        .btn:hover {
            color: #212529
        }

        .btn-check:focus+.btn,
        .btn:focus {
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .btn:disabled,
        .btn.disabled,
        fieldset:disabled .btn {
            pointer-events: none;
            opacity: .65
        }

        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca
        }

        .btn-check:focus+.btn-primary,
        .btn-primary:focus {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
            -webkit-box-shadow: 0 0 0 .25rem rgba(49, 132, 253, 0.5);
            box-shadow: 0 0 0 .25rem rgba(49, 132, 253, 0.5)
        }

        .btn-check:checked+.btn-primary,
        .btn-check:active+.btn-primary,
        .btn-primary:active,
        .btn-primary.active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0a58ca;
            border-color: #0a53be
        }

        .btn-check:checked+.btn-primary:focus,
        .btn-check:active+.btn-primary:focus,
        .btn-primary:active:focus,
        .btn-primary.active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(49, 132, 253, 0.5);
            box-shadow: 0 0 0 .25rem rgba(49, 132, 253, 0.5)
        }

        .btn-primary:disabled,
        .btn-primary.disabled {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64
        }

        .btn-check:focus+.btn-secondary,
        .btn-secondary:focus {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
            -webkit-box-shadow: 0 0 0 .25rem rgba(130, 138, 145, 0.5);
            box-shadow: 0 0 0 .25rem rgba(130, 138, 145, 0.5)
        }

        .btn-check:checked+.btn-secondary,
        .btn-check:active+.btn-secondary,
        .btn-secondary:active,
        .btn-secondary.active,
        .show>.btn-secondary.dropdown-toggle {
            color: #fff;
            background-color: #565e64;
            border-color: #51585e
        }

        .btn-check:checked+.btn-secondary:focus,
        .btn-check:active+.btn-secondary:focus,
        .btn-secondary:active:focus,
        .btn-secondary.active:focus,
        .show>.btn-secondary.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(130, 138, 145, 0.5);
            box-shadow: 0 0 0 .25rem rgba(130, 138, 145, 0.5)
        }

        .btn-secondary:disabled,
        .btn-secondary.disabled {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d
        }

        .btn-success {
            color: #fff;
            background-color: #198754;
            border-color: #198754
        }

        .btn-success:hover {
            color: #fff;
            background-color: #157347;
            border-color: #146c43
        }

        .btn-check:focus+.btn-success,
        .btn-success:focus {
            color: #fff;
            background-color: #157347;
            border-color: #146c43;
            -webkit-box-shadow: 0 0 0 .25rem rgba(60, 153, 110, 0.5);
            box-shadow: 0 0 0 .25rem rgba(60, 153, 110, 0.5)
        }

        .btn-check:checked+.btn-success,
        .btn-check:active+.btn-success,
        .btn-success:active,
        .btn-success.active,
        .show>.btn-success.dropdown-toggle {
            color: #fff;
            background-color: #146c43;
            border-color: #13653f
        }

        .btn-check:checked+.btn-success:focus,
        .btn-check:active+.btn-success:focus,
        .btn-success:active:focus,
        .btn-success.active:focus,
        .show>.btn-success.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(60, 153, 110, 0.5);
            box-shadow: 0 0 0 .25rem rgba(60, 153, 110, 0.5)
        }

        .btn-success:disabled,
        .btn-success.disabled {
            color: #fff;
            background-color: #198754;
            border-color: #198754
        }

        .btn-info {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0
        }

        .btn-info:hover {
            color: #000;
            background-color: #31d2f2;
            border-color: #25cff2
        }

        .btn-check:focus+.btn-info,
        .btn-info:focus {
            color: #000;
            background-color: #31d2f2;
            border-color: #25cff2;
            -webkit-box-shadow: 0 0 0 .25rem rgba(11, 172, 204, 0.5);
            box-shadow: 0 0 0 .25rem rgba(11, 172, 204, 0.5)
        }

        .btn-check:checked+.btn-info,
        .btn-check:active+.btn-info,
        .btn-info:active,
        .btn-info.active,
        .show>.btn-info.dropdown-toggle {
            color: #000;
            background-color: #3dd5f3;
            border-color: #25cff2
        }

        .btn-check:checked+.btn-info:focus,
        .btn-check:active+.btn-info:focus,
        .btn-info:active:focus,
        .btn-info.active:focus,
        .show>.btn-info.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(11, 172, 204, 0.5);
            box-shadow: 0 0 0 .25rem rgba(11, 172, 204, 0.5)
        }

        .btn-info:disabled,
        .btn-info.disabled {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0
        }

        .btn-warning {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-warning:hover {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720
        }

        .btn-check:focus+.btn-warning,
        .btn-warning:focus {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720;
            -webkit-box-shadow: 0 0 0 .25rem rgba(217, 164, 6, 0.5);
            box-shadow: 0 0 0 .25rem rgba(217, 164, 6, 0.5)
        }

        .btn-check:checked+.btn-warning,
        .btn-check:active+.btn-warning,
        .btn-warning:active,
        .btn-warning.active,
        .show>.btn-warning.dropdown-toggle {
            color: #000;
            background-color: #ffcd39;
            border-color: #ffc720
        }

        .btn-check:checked+.btn-warning:focus,
        .btn-check:active+.btn-warning:focus,
        .btn-warning:active:focus,
        .btn-warning.active:focus,
        .show>.btn-warning.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(217, 164, 6, 0.5);
            box-shadow: 0 0 0 .25rem rgba(217, 164, 6, 0.5)
        }

        .btn-warning:disabled,
        .btn-warning.disabled {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #bb2d3b;
            border-color: #b02a37
        }

        .btn-check:focus+.btn-danger,
        .btn-danger:focus {
            color: #fff;
            background-color: #bb2d3b;
            border-color: #b02a37;
            -webkit-box-shadow: 0 0 0 .25rem rgba(225, 83, 97, 0.5);
            box-shadow: 0 0 0 .25rem rgba(225, 83, 97, 0.5)
        }

        .btn-check:checked+.btn-danger,
        .btn-check:active+.btn-danger,
        .btn-danger:active,
        .btn-danger.active,
        .show>.btn-danger.dropdown-toggle {
            color: #fff;
            background-color: #b02a37;
            border-color: #a52834
        }

        .btn-check:checked+.btn-danger:focus,
        .btn-check:active+.btn-danger:focus,
        .btn-danger:active:focus,
        .btn-danger.active:focus,
        .show>.btn-danger.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(225, 83, 97, 0.5);
            box-shadow: 0 0 0 .25rem rgba(225, 83, 97, 0.5)
        }

        .btn-danger:disabled,
        .btn-danger.disabled {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-light {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-light:hover {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb
        }

        .btn-check:focus+.btn-light,
        .btn-light:focus {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
            -webkit-box-shadow: 0 0 0 .25rem rgba(211, 212, 213, 0.5);
            box-shadow: 0 0 0 .25rem rgba(211, 212, 213, 0.5)
        }

        .btn-check:checked+.btn-light,
        .btn-check:active+.btn-light,
        .btn-light:active,
        .btn-light.active,
        .show>.btn-light.dropdown-toggle {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb
        }

        .btn-check:checked+.btn-light:focus,
        .btn-check:active+.btn-light:focus,
        .btn-light:active:focus,
        .btn-light.active:focus,
        .show>.btn-light.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(211, 212, 213, 0.5);
            box-shadow: 0 0 0 .25rem rgba(211, 212, 213, 0.5)
        }

        .btn-light:disabled,
        .btn-light.disabled {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-dark {
            color: #fff;
            background-color: #212529;
            border-color: #212529
        }

        .btn-dark:hover {
            color: #fff;
            background-color: #1c1f23;
            border-color: #1a1e21
        }

        .btn-check:focus+.btn-dark,
        .btn-dark:focus {
            color: #fff;
            background-color: #1c1f23;
            border-color: #1a1e21;
            -webkit-box-shadow: 0 0 0 .25rem rgba(66, 70, 73, 0.5);
            box-shadow: 0 0 0 .25rem rgba(66, 70, 73, 0.5)
        }

        .btn-check:checked+.btn-dark,
        .btn-check:active+.btn-dark,
        .btn-dark:active,
        .btn-dark.active,
        .show>.btn-dark.dropdown-toggle {
            color: #fff;
            background-color: #1a1e21;
            border-color: #191c1f
        }

        .btn-check:checked+.btn-dark:focus,
        .btn-check:active+.btn-dark:focus,
        .btn-dark:active:focus,
        .btn-dark.active:focus,
        .show>.btn-dark.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(66, 70, 73, 0.5);
            box-shadow: 0 0 0 .25rem rgba(66, 70, 73, 0.5)
        }

        .btn-dark:disabled,
        .btn-dark.disabled {
            color: #fff;
            background-color: #212529;
            border-color: #212529
        }

        .btn-outline-primary {
            color: #0d6efd;
            border-color: #0d6efd
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .btn-check:focus+.btn-outline-primary,
        .btn-outline-primary:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.5);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.5)
        }

        .btn-check:checked+.btn-outline-primary,
        .btn-check:active+.btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .btn-check:checked+.btn-outline-primary:focus,
        .btn-check:active+.btn-outline-primary:focus,
        .btn-outline-primary:active:focus,
        .btn-outline-primary.active:focus,
        .btn-outline-primary.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.5);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.5)
        }

        .btn-outline-primary:disabled,
        .btn-outline-primary.disabled {
            color: #0d6efd;
            background-color: transparent
        }

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d
        }

        .btn-check:focus+.btn-outline-secondary,
        .btn-outline-secondary:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(108, 117, 125, 0.5);
            box-shadow: 0 0 0 .25rem rgba(108, 117, 125, 0.5)
        }

        .btn-check:checked+.btn-outline-secondary,
        .btn-check:active+.btn-outline-secondary,
        .btn-outline-secondary:active,
        .btn-outline-secondary.active,
        .btn-outline-secondary.dropdown-toggle.show {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d
        }

        .btn-check:checked+.btn-outline-secondary:focus,
        .btn-check:active+.btn-outline-secondary:focus,
        .btn-outline-secondary:active:focus,
        .btn-outline-secondary.active:focus,
        .btn-outline-secondary.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(108, 117, 125, 0.5);
            box-shadow: 0 0 0 .25rem rgba(108, 117, 125, 0.5)
        }

        .btn-outline-secondary:disabled,
        .btn-outline-secondary.disabled {
            color: #6c757d;
            background-color: transparent
        }

        .btn-outline-success {
            color: #198754;
            border-color: #198754
        }

        .btn-outline-success:hover {
            color: #fff;
            background-color: #198754;
            border-color: #198754
        }

        .btn-check:focus+.btn-outline-success,
        .btn-outline-success:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.5);
            box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.5)
        }

        .btn-check:checked+.btn-outline-success,
        .btn-check:active+.btn-outline-success,
        .btn-outline-success:active,
        .btn-outline-success.active,
        .btn-outline-success.dropdown-toggle.show {
            color: #fff;
            background-color: #198754;
            border-color: #198754
        }

        .btn-check:checked+.btn-outline-success:focus,
        .btn-check:active+.btn-outline-success:focus,
        .btn-outline-success:active:focus,
        .btn-outline-success.active:focus,
        .btn-outline-success.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.5);
            box-shadow: 0 0 0 .25rem rgba(25, 135, 84, 0.5)
        }

        .btn-outline-success:disabled,
        .btn-outline-success.disabled {
            color: #198754;
            background-color: transparent
        }

        .btn-outline-info {
            color: #0dcaf0;
            border-color: #0dcaf0
        }

        .btn-outline-info:hover {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0
        }

        .btn-check:focus+.btn-outline-info,
        .btn-outline-info:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 202, 240, 0.5);
            box-shadow: 0 0 0 .25rem rgba(13, 202, 240, 0.5)
        }

        .btn-check:checked+.btn-outline-info,
        .btn-check:active+.btn-outline-info,
        .btn-outline-info:active,
        .btn-outline-info.active,
        .btn-outline-info.dropdown-toggle.show {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0
        }

        .btn-check:checked+.btn-outline-info:focus,
        .btn-check:active+.btn-outline-info:focus,
        .btn-outline-info:active:focus,
        .btn-outline-info.active:focus,
        .btn-outline-info.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 202, 240, 0.5);
            box-shadow: 0 0 0 .25rem rgba(13, 202, 240, 0.5)
        }

        .btn-outline-info:disabled,
        .btn-outline-info.disabled {
            color: #0dcaf0;
            background-color: transparent
        }

        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107
        }

        .btn-outline-warning:hover {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-check:focus+.btn-outline-warning,
        .btn-outline-warning:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(255, 193, 7, 0.5);
            box-shadow: 0 0 0 .25rem rgba(255, 193, 7, 0.5)
        }

        .btn-check:checked+.btn-outline-warning,
        .btn-check:active+.btn-outline-warning,
        .btn-outline-warning:active,
        .btn-outline-warning.active,
        .btn-outline-warning.dropdown-toggle.show {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-check:checked+.btn-outline-warning:focus,
        .btn-check:active+.btn-outline-warning:focus,
        .btn-outline-warning:active:focus,
        .btn-outline-warning.active:focus,
        .btn-outline-warning.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(255, 193, 7, 0.5);
            box-shadow: 0 0 0 .25rem rgba(255, 193, 7, 0.5)
        }

        .btn-outline-warning:disabled,
        .btn-outline-warning.disabled {
            color: #ffc107;
            background-color: transparent
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-check:focus+.btn-outline-danger,
        .btn-outline-danger:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.5);
            box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.5)
        }

        .btn-check:checked+.btn-outline-danger,
        .btn-check:active+.btn-outline-danger,
        .btn-outline-danger:active,
        .btn-outline-danger.active,
        .btn-outline-danger.dropdown-toggle.show {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-check:checked+.btn-outline-danger:focus,
        .btn-check:active+.btn-outline-danger:focus,
        .btn-outline-danger:active:focus,
        .btn-outline-danger.active:focus,
        .btn-outline-danger.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.5);
            box-shadow: 0 0 0 .25rem rgba(220, 53, 69, 0.5)
        }

        .btn-outline-danger:disabled,
        .btn-outline-danger.disabled {
            color: #dc3545;
            background-color: transparent
        }

        .btn-outline-light {
            color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-outline-light:hover {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-check:focus+.btn-outline-light,
        .btn-outline-light:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(248, 249, 250, 0.5);
            box-shadow: 0 0 0 .25rem rgba(248, 249, 250, 0.5)
        }

        .btn-check:checked+.btn-outline-light,
        .btn-check:active+.btn-outline-light,
        .btn-outline-light:active,
        .btn-outline-light.active,
        .btn-outline-light.dropdown-toggle.show {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-check:checked+.btn-outline-light:focus,
        .btn-check:active+.btn-outline-light:focus,
        .btn-outline-light:active:focus,
        .btn-outline-light.active:focus,
        .btn-outline-light.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(248, 249, 250, 0.5);
            box-shadow: 0 0 0 .25rem rgba(248, 249, 250, 0.5)
        }

        .btn-outline-light:disabled,
        .btn-outline-light.disabled {
            color: #f8f9fa;
            background-color: transparent
        }

        .btn-outline-dark {
            color: #212529;
            border-color: #212529
        }

        .btn-outline-dark:hover {
            color: #fff;
            background-color: #212529;
            border-color: #212529
        }

        .btn-check:focus+.btn-outline-dark,
        .btn-outline-dark:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(33, 37, 41, 0.5);
            box-shadow: 0 0 0 .25rem rgba(33, 37, 41, 0.5)
        }

        .btn-check:checked+.btn-outline-dark,
        .btn-check:active+.btn-outline-dark,
        .btn-outline-dark:active,
        .btn-outline-dark.active,
        .btn-outline-dark.dropdown-toggle.show {
            color: #fff;
            background-color: #212529;
            border-color: #212529
        }

        .btn-check:checked+.btn-outline-dark:focus,
        .btn-check:active+.btn-outline-dark:focus,
        .btn-outline-dark:active:focus,
        .btn-outline-dark.active:focus,
        .btn-outline-dark.dropdown-toggle.show:focus {
            -webkit-box-shadow: 0 0 0 .25rem rgba(33, 37, 41, 0.5);
            box-shadow: 0 0 0 .25rem rgba(33, 37, 41, 0.5)
        }

        .btn-outline-dark:disabled,
        .btn-outline-dark.disabled {
            color: #212529;
            background-color: transparent
        }

        .btn-link {
            font-weight: 400;
            color: #0d6efd;
            text-decoration: underline
        }

        .btn-link:hover {
            color: #0a58ca
        }

        .btn-link:disabled,
        .btn-link.disabled {
            color: #6c757d
        }

        .btn-lg,
        .btn-group-lg>.btn {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            border-radius: .3rem
        }

        .btn-sm,
        .btn-group-sm>.btn {
            padding: .25rem .5rem;
            font-size: .875rem;
            border-radius: .2rem
        }

        .fade {
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .fade {
                -webkit-transition: none;
                transition: none
            }
        }

        .fade:not(.show) {
            opacity: 0
        }

        .collapse:not(.show) {
            display: none
        }

        .collapsing {
            height: 0;
            overflow: hidden;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .collapsing {
                -webkit-transition: none;
                transition: none
            }
        }

        .collapsing.collapse-horizontal {
            width: 0;
            height: auto;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .collapsing.collapse-horizontal {
                -webkit-transition: none;
                transition: none
            }
        }

        .dropup,
        .dropend,
        .dropdown,
        .dropstart {
            position: relative
        }

        .dropdown-toggle {
            white-space: nowrap
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent
        }

        .dropdown-toggle:empty::after {
            margin-left: 0
        }

        .dropdown-menu {
            position: absolute;
            z-index: 1000;
            display: none;
            min-width: 10rem;
            padding: .5rem 0;
            margin: 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: .25rem
        }

        .dropdown-menu[data-bs-popper] {
            top: 100%;
            left: 0;
            margin-top: .125rem
        }

        .dropdown-menu-start {
            --bs-position: start
        }

        .dropdown-menu-start[data-bs-popper] {
            right: auto;
            left: 0
        }

        .dropdown-menu-end {
            --bs-position: end
        }

        .dropdown-menu-end[data-bs-popper] {
            right: 0;
            left: auto
        }

        @media (min-width: 576px) {
            .dropdown-menu-sm-start {
                --bs-position: start
            }

            .dropdown-menu-sm-start[data-bs-popper] {
                right: auto;
                left: 0
            }

            .dropdown-menu-sm-end {
                --bs-position: end
            }

            .dropdown-menu-sm-end[data-bs-popper] {
                right: 0;
                left: auto
            }
        }

        @media (min-width: 768px) {
            .dropdown-menu-md-start {
                --bs-position: start
            }

            .dropdown-menu-md-start[data-bs-popper] {
                right: auto;
                left: 0
            }

            .dropdown-menu-md-end {
                --bs-position: end
            }

            .dropdown-menu-md-end[data-bs-popper] {
                right: 0;
                left: auto
            }
        }

        @media (min-width: 992px) {
            .dropdown-menu-lg-start {
                --bs-position: start
            }

            .dropdown-menu-lg-start[data-bs-popper] {
                right: auto;
                left: 0
            }

            .dropdown-menu-lg-end {
                --bs-position: end
            }

            .dropdown-menu-lg-end[data-bs-popper] {
                right: 0;
                left: auto
            }
        }

        @media (min-width: 1200px) {
            .dropdown-menu-xl-start {
                --bs-position: start
            }

            .dropdown-menu-xl-start[data-bs-popper] {
                right: auto;
                left: 0
            }

            .dropdown-menu-xl-end {
                --bs-position: end
            }

            .dropdown-menu-xl-end[data-bs-popper] {
                right: 0;
                left: auto
            }
        }

        @media (min-width: 1400px) {
            .dropdown-menu-xxl-start {
                --bs-position: start
            }

            .dropdown-menu-xxl-start[data-bs-popper] {
                right: auto;
                left: 0
            }

            .dropdown-menu-xxl-end {
                --bs-position: end
            }

            .dropdown-menu-xxl-end[data-bs-popper] {
                right: 0;
                left: auto
            }
        }

        .dropup .dropdown-menu[data-bs-popper] {
            top: auto;
            bottom: 100%;
            margin-top: 0;
            margin-bottom: .125rem
        }

        .dropup .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: 0;
            border-right: .3em solid transparent;
            border-bottom: .3em solid;
            border-left: .3em solid transparent
        }

        .dropup .dropdown-toggle:empty::after {
            margin-left: 0
        }

        .dropend .dropdown-menu[data-bs-popper] {
            top: 0;
            right: auto;
            left: 100%;
            margin-top: 0;
            margin-left: .125rem
        }

        .dropend .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid transparent;
            border-right: 0;
            border-bottom: .3em solid transparent;
            border-left: .3em solid
        }

        .dropend .dropdown-toggle:empty::after {
            margin-left: 0
        }

        .dropend .dropdown-toggle::after {
            vertical-align: 0
        }

        .dropstart .dropdown-menu[data-bs-popper] {
            top: 0;
            right: 100%;
            left: auto;
            margin-top: 0;
            margin-right: .125rem
        }

        .dropstart .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: ""
        }

        .dropstart .dropdown-toggle::after {
            display: none
        }

        .dropstart .dropdown-toggle::before {
            display: inline-block;
            margin-right: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid transparent;
            border-right: .3em solid;
            border-bottom: .3em solid transparent
        }

        .dropstart .dropdown-toggle:empty::after {
            margin-left: 0
        }

        .dropstart .dropdown-toggle::before {
            vertical-align: 0
        }

        .dropdown-divider {
            height: 0;
            margin: .5rem 0;
            overflow: hidden;
            border-top: 1px solid rgba(0, 0, 0, 0.15)
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: .25rem 1rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border: 0
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #1e2125;
            background-color: #e9ecef
        }

        .dropdown-item.active,
        .dropdown-item:active {
            color: #fff;
            text-decoration: none;
            background-color: #0d6efd
        }

        .dropdown-item.disabled,
        .dropdown-item:disabled {
            color: #adb5bd;
            pointer-events: none;
            background-color: transparent
        }

        .dropdown-menu.show {
            display: block
        }

        .dropdown-header {
            display: block;
            padding: .5rem 1rem;
            margin-bottom: 0;
            font-size: .875rem;
            color: #6c757d;
            white-space: nowrap
        }

        .dropdown-item-text {
            display: block;
            padding: .25rem 1rem;
            color: #212529
        }

        .dropdown-menu-dark {
            color: #dee2e6;
            background-color: #343a40;
            border-color: rgba(0, 0, 0, 0.15)
        }

        .dropdown-menu-dark .dropdown-item {
            color: #dee2e6
        }

        .dropdown-menu-dark .dropdown-item:hover,
        .dropdown-menu-dark .dropdown-item:focus {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.15)
        }

        .dropdown-menu-dark .dropdown-item.active,
        .dropdown-menu-dark .dropdown-item:active {
            color: #fff;
            background-color: #0d6efd
        }

        .dropdown-menu-dark .dropdown-item.disabled,
        .dropdown-menu-dark .dropdown-item:disabled {
            color: #adb5bd
        }

        .dropdown-menu-dark .dropdown-divider {
            border-color: rgba(0, 0, 0, 0.15)
        }

        .dropdown-menu-dark .dropdown-item-text {
            color: #dee2e6
        }

        .dropdown-menu-dark .dropdown-header {
            color: #adb5bd
        }

        .btn-group,
        .btn-group-vertical {
            position: relative;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            vertical-align: middle
        }

        .btn-group>.btn,
        .btn-group-vertical>.btn {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }

        .btn-group>.btn-check:checked+.btn,
        .btn-group>.btn-check:focus+.btn,
        .btn-group>.btn:hover,
        .btn-group>.btn:focus,
        .btn-group>.btn:active,
        .btn-group>.btn.active,
        .btn-group-vertical>.btn-check:checked+.btn,
        .btn-group-vertical>.btn-check:focus+.btn,
        .btn-group-vertical>.btn:hover,
        .btn-group-vertical>.btn:focus,
        .btn-group-vertical>.btn:active,
        .btn-group-vertical>.btn.active {
            z-index: 1
        }

        .btn-toolbar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }

        .btn-toolbar .input-group {
            width: auto
        }

        .btn-group>.btn:not(:first-child),
        .btn-group>.btn-group:not(:first-child) {
            margin-left: -1px
        }

        .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
        .btn-group>.btn-group:not(:last-child)>.btn {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .btn-group>.btn:nth-child(n+3),
        .btn-group>:not(.btn-check)+.btn,
        .btn-group>.btn-group:not(:first-child)>.btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .dropdown-toggle-split {
            padding-right: .5625rem;
            padding-left: .5625rem
        }

        .dropdown-toggle-split::after,
        .dropup .dropdown-toggle-split::after,
        .dropend .dropdown-toggle-split::after {
            margin-left: 0
        }

        .dropstart .dropdown-toggle-split::before {
            margin-right: 0
        }

        .btn-sm+.dropdown-toggle-split,
        .btn-group-sm>.btn+.dropdown-toggle-split {
            padding-right: .375rem;
            padding-left: .375rem
        }

        .btn-lg+.dropdown-toggle-split,
        .btn-group-lg>.btn+.dropdown-toggle-split {
            padding-right: .75rem;
            padding-left: .75rem
        }

        .btn-group-vertical {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }

        .btn-group-vertical>.btn,
        .btn-group-vertical>.btn-group {
            width: 100%
        }

        .btn-group-vertical>.btn:not(:first-child),
        .btn-group-vertical>.btn-group:not(:first-child) {
            margin-top: -1px
        }

        .btn-group-vertical>.btn:not(:last-child):not(.dropdown-toggle),
        .btn-group-vertical>.btn-group:not(:last-child)>.btn {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0
        }

        .btn-group-vertical>.btn~.btn,
        .btn-group-vertical>.btn-group:not(:first-child)>.btn {
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .nav-link {
            display: block;
            padding: .5rem 1rem;
            color: #0d6efd;
            text-decoration: none;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .nav-link {
                -webkit-transition: none;
                transition: none
            }
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #0a58ca
        }

        .nav-link.disabled {
            color: #6c757d;
            pointer-events: none;
            cursor: default
        }

        .nav-tabs {
            border-bottom: 1px solid #dee2e6
        }

        .nav-tabs .nav-link {
            margin-bottom: -1px;
            background: none;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem
        }

        .nav-tabs .nav-link:hover,
        .nav-tabs .nav-link:focus {
            border-color: #e9ecef #e9ecef #dee2e6;
            isolation: isolate
        }

        .nav-tabs .nav-link.disabled {
            color: #6c757d;
            background-color: transparent;
            border-color: transparent
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff
        }

        .nav-tabs .dropdown-menu {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .nav-pills .nav-link {
            background: none;
            border: 0;
            border-radius: .25rem
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #0d6efd
        }

        .nav-fill>.nav-link,
        .nav-fill .nav-item {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            text-align: center
        }

        .nav-justified>.nav-link,
        .nav-justified .nav-item {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            text-align: center
        }

        .nav-fill .nav-item .nav-link,
        .nav-justified .nav-item .nav-link {
            width: 100%
        }

        .tab-content>.tab-pane {
            display: none
        }

        .tab-content>.active {
            display: block
        }

        .navbar {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .navbar>.container,
        .navbar>.container-fluid,
        .navbar>.container-sm,
        .navbar>.container-md,
        .navbar>.container-lg,
        .navbar>.container-xl,
        .navbar>.container-xxl {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: inherit;
            flex-wrap: inherit;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }

        .navbar-brand {
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            text-decoration: none;
            white-space: nowrap
        }

        .navbar-nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .navbar-nav .nav-link {
            padding-right: 0;
            padding-left: 0
        }

        .navbar-nav .dropdown-menu {
            position: static
        }

        .navbar-text {
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .navbar-collapse {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }

        .navbar-toggler {
            padding: .25rem .75rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: .25rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .navbar-toggler {
                -webkit-transition: none;
                transition: none
            }
        }

        .navbar-toggler:hover {
            text-decoration: none
        }

        .navbar-toggler:focus {
            text-decoration: none;
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem;
            box-shadow: 0 0 0 .25rem
        }

        .navbar-toggler-icon {
            display: inline-block;
            width: 1.5em;
            height: 1.5em;
            vertical-align: middle;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%
        }

        .navbar-nav-scroll {
            max-height: var(--bs-scroll-height, 75vh);
            overflow-y: auto
        }

        @media (min-width: 576px) {
            .navbar-expand-sm {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-sm .navbar-nav {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-sm .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-sm .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-sm .navbar-nav-scroll {
                overflow: visible
            }

            .navbar-expand-sm .navbar-collapse {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-sm .navbar-toggler {
                display: none
            }

            .navbar-expand-sm .offcanvas-header {
                display: none
            }

            .navbar-expand-sm .offcanvas {
                position: inherit;
                bottom: 0;
                z-index: 1000;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                visibility: visible !important;
                background-color: transparent;
                border-right: 0;
                border-left: 0;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                -webkit-transform: none;
                transform: none
            }

            .navbar-expand-sm .offcanvas-top,
            .navbar-expand-sm .offcanvas-bottom {
                height: auto;
                border-top: 0;
                border-bottom: 0
            }

            .navbar-expand-sm .offcanvas-body {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-flex: 0;
                -ms-flex-positive: 0;
                flex-grow: 0;
                padding: 0;
                overflow-y: visible
            }
        }

        @media (min-width: 768px) {
            .navbar-expand-md {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-md .navbar-nav {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-md .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-md .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-md .navbar-nav-scroll {
                overflow: visible
            }

            .navbar-expand-md .navbar-collapse {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-md .navbar-toggler {
                display: none
            }

            .navbar-expand-md .offcanvas-header {
                display: none
            }

            .navbar-expand-md .offcanvas {
                position: inherit;
                bottom: 0;
                z-index: 1000;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                visibility: visible !important;
                background-color: transparent;
                border-right: 0;
                border-left: 0;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                -webkit-transform: none;
                transform: none
            }

            .navbar-expand-md .offcanvas-top,
            .navbar-expand-md .offcanvas-bottom {
                height: auto;
                border-top: 0;
                border-bottom: 0
            }

            .navbar-expand-md .offcanvas-body {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-flex: 0;
                -ms-flex-positive: 0;
                flex-grow: 0;
                padding: 0;
                overflow-y: visible
            }
        }

        @media (min-width: 992px) {
            .navbar-expand-lg {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-lg .navbar-nav {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-lg .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-lg .navbar-nav-scroll {
                overflow: visible
            }

            .navbar-expand-lg .navbar-collapse {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-lg .navbar-toggler {
                display: none
            }

            .navbar-expand-lg .offcanvas-header {
                display: none
            }

            .navbar-expand-lg .offcanvas {
                position: inherit;
                bottom: 0;
                z-index: 1000;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                visibility: visible !important;
                background-color: transparent;
                border-right: 0;
                border-left: 0;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                -webkit-transform: none;
                transform: none
            }

            .navbar-expand-lg .offcanvas-top,
            .navbar-expand-lg .offcanvas-bottom {
                height: auto;
                border-top: 0;
                border-bottom: 0
            }

            .navbar-expand-lg .offcanvas-body {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-flex: 0;
                -ms-flex-positive: 0;
                flex-grow: 0;
                padding: 0;
                overflow-y: visible
            }
        }

        @media (min-width: 1200px) {
            .navbar-expand-xl {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-xl .navbar-nav {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-xl .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-xl .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-xl .navbar-nav-scroll {
                overflow: visible
            }

            .navbar-expand-xl .navbar-collapse {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-xl .navbar-toggler {
                display: none
            }

            .navbar-expand-xl .offcanvas-header {
                display: none
            }

            .navbar-expand-xl .offcanvas {
                position: inherit;
                bottom: 0;
                z-index: 1000;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                visibility: visible !important;
                background-color: transparent;
                border-right: 0;
                border-left: 0;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                -webkit-transform: none;
                transform: none
            }

            .navbar-expand-xl .offcanvas-top,
            .navbar-expand-xl .offcanvas-bottom {
                height: auto;
                border-top: 0;
                border-bottom: 0
            }

            .navbar-expand-xl .offcanvas-body {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-flex: 0;
                -ms-flex-positive: 0;
                flex-grow: 0;
                padding: 0;
                overflow-y: visible
            }
        }

        @media (min-width: 1400px) {
            .navbar-expand-xxl {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-xxl .navbar-nav {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-xxl .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-xxl .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-xxl .navbar-nav-scroll {
                overflow: visible
            }

            .navbar-expand-xxl .navbar-collapse {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-xxl .navbar-toggler {
                display: none
            }

            .navbar-expand-xxl .offcanvas-header {
                display: none
            }

            .navbar-expand-xxl .offcanvas {
                position: inherit;
                bottom: 0;
                z-index: 1000;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                visibility: visible !important;
                background-color: transparent;
                border-right: 0;
                border-left: 0;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                -webkit-transform: none;
                transform: none
            }

            .navbar-expand-xxl .offcanvas-top,
            .navbar-expand-xxl .offcanvas-bottom {
                height: auto;
                border-top: 0;
                border-bottom: 0
            }

            .navbar-expand-xxl .offcanvas-body {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-flex: 0;
                -ms-flex-positive: 0;
                flex-grow: 0;
                padding: 0;
                overflow-y: visible
            }
        }

        .navbar-expand {
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }

        .navbar-expand .navbar-nav {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row
        }

        .navbar-expand .navbar-nav .dropdown-menu {
            position: absolute
        }

        .navbar-expand .navbar-nav .nav-link {
            padding-right: .5rem;
            padding-left: .5rem
        }

        .navbar-expand .navbar-nav-scroll {
            overflow: visible
        }

        .navbar-expand .navbar-collapse {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-preferred-size: auto;
            flex-basis: auto
        }

        .navbar-expand .navbar-toggler {
            display: none
        }

        .navbar-expand .offcanvas-header {
            display: none
        }

        .navbar-expand .offcanvas {
            position: inherit;
            bottom: 0;
            z-index: 1000;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            visibility: visible !important;
            background-color: transparent;
            border-right: 0;
            border-left: 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-transform: none;
            transform: none
        }

        .navbar-expand .offcanvas-top,
        .navbar-expand .offcanvas-bottom {
            height: auto;
            border-top: 0;
            border-bottom: 0
        }

        .navbar-expand .offcanvas-body {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            padding: 0;
            overflow-y: visible
        }

        .navbar-light .navbar-brand {
            color: rgba(0, 0, 0, 0.9)
        }

        .navbar-light .navbar-brand:hover,
        .navbar-light .navbar-brand:focus {
            color: rgba(0, 0, 0, 0.9)
        }

        .navbar-light .navbar-nav .nav-link {
            color: rgba(0, 0, 0, 0.55)
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link:focus {
            color: rgba(0, 0, 0, 0.7)
        }

        .navbar-light .navbar-nav .nav-link.disabled {
            color: rgba(0, 0, 0, 0.3)
        }

        .navbar-light .navbar-nav .show>.nav-link,
        .navbar-light .navbar-nav .nav-link.active {
            color: rgba(0, 0, 0, 0.9)
        }

        .navbar-light .navbar-toggler {
            color: rgba(0, 0, 0, 0.55);
            border-color: rgba(0, 0, 0, 0.1)
        }

        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280,0,0,0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")
        }

        .navbar-light .navbar-text {
            color: rgba(0, 0, 0, 0.55)
        }

        .navbar-light .navbar-text a,
        .navbar-light .navbar-text a:hover,
        .navbar-light .navbar-text a:focus {
            color: rgba(0, 0, 0, 0.9)
        }

        .navbar-dark .navbar-brand {
            color: #fff
        }

        .navbar-dark .navbar-brand:hover,
        .navbar-dark .navbar-brand:focus {
            color: #fff
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.55)
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link:focus {
            color: rgba(255, 255, 255, 0.75)
        }

        .navbar-dark .navbar-nav .nav-link.disabled {
            color: rgba(255, 255, 255, 0.25)
        }

        .navbar-dark .navbar-nav .show>.nav-link,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #fff
        }

        .navbar-dark .navbar-toggler {
            color: rgba(255, 255, 255, 0.55);
            border-color: rgba(255, 255, 255, 0.1)
        }

        .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255,255,255,0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")
        }

        .navbar-dark .navbar-text {
            color: rgba(255, 255, 255, 0.55)
        }

        .navbar-dark .navbar-text a,
        .navbar-dark .navbar-text a:hover,
        .navbar-dark .navbar-text a:focus {
            color: #fff
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: .25rem
        }

        .card>hr {
            margin-right: 0;
            margin-left: 0
        }

        .card>.list-group {
            border-top: inherit;
            border-bottom: inherit
        }

        .card>.list-group:first-child {
            border-top-width: 0;
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px)
        }

        .card>.list-group:last-child {
            border-bottom-width: 0;
            border-bottom-right-radius: calc(.25rem - 1px);
            border-bottom-left-radius: calc(.25rem - 1px)
        }

        .card>.card-header+.list-group,
        .card>.list-group+.card-footer {
            border-top: 0
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1rem 1rem
        }

        .card-title {
            margin-bottom: .5rem
        }

        .card-subtitle {
            margin-top: -.25rem;
            margin-bottom: 0
        }

        .card-text:last-child {
            margin-bottom: 0
        }

        .card-link+.card-link {
            margin-left: 1rem
        }

        .card-header {
            padding: .5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125)
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card-footer {
            padding: .5rem 1rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125)
        }

        .card-footer:last-child {
            border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px)
        }

        .card-header-tabs {
            margin-right: -.5rem;
            margin-bottom: -.5rem;
            margin-left: -.5rem;
            border-bottom: 0
        }

        .card-header-pills {
            margin-right: -.5rem;
            margin-left: -.5rem
        }

        .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            border-radius: calc(.25rem - 1px)
        }

        .card-img,
        .card-img-top,
        .card-img-bottom {
            width: 100%
        }

        .card-img,
        .card-img-top {
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px)
        }

        .card-img,
        .card-img-bottom {
            border-bottom-right-radius: calc(.25rem - 1px);
            border-bottom-left-radius: calc(.25rem - 1px)
        }

        .card-group>.card {
            margin-bottom: .75rem
        }

        @media (min-width: 576px) {
            .card-group {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap
            }

            .card-group>.card {
                -webkit-box-flex: 1;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%;
                margin-bottom: 0
            }

            .card-group>.card+.card {
                margin-left: 0;
                border-left: 0
            }

            .card-group>.card:not(:last-child) {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0
            }

            .card-group>.card:not(:last-child) .card-img-top,
            .card-group>.card:not(:last-child) .card-header {
                border-top-right-radius: 0
            }

            .card-group>.card:not(:last-child) .card-img-bottom,
            .card-group>.card:not(:last-child) .card-footer {
                border-bottom-right-radius: 0
            }

            .card-group>.card:not(:first-child) {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0
            }

            .card-group>.card:not(:first-child) .card-img-top,
            .card-group>.card:not(:first-child) .card-header {
                border-top-left-radius: 0
            }

            .card-group>.card:not(:first-child) .card-img-bottom,
            .card-group>.card:not(:first-child) .card-footer {
                border-bottom-left-radius: 0
            }
        }

        .accordion-button {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            background-color: #fff;
            border: 0;
            border-radius: 0;
            overflow-anchor: none;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .accordion-button {
                -webkit-transition: none;
                transition: none
            }
        }

        .accordion-button:not(.collapsed) {
            color: #0c63e4;
            background-color: #e7f1ff;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125)
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg)
        }

        .accordion-button::after {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            margin-left: auto;
            content: "";
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 1.25rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .accordion-button::after {
                -webkit-transition: none;
                transition: none
            }
        }

        .accordion-button:hover {
            z-index: 2
        }

        .accordion-button:focus {
            z-index: 3;
            border-color: #86b7fe;
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .accordion-header {
            margin-bottom: 0
        }

        .accordion-item {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125)
        }

        .accordion-item:first-of-type {
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem
        }

        .accordion-item:first-of-type .accordion-button {
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px)
        }

        .accordion-item:not(:first-of-type) {
            border-top: 0
        }

        .accordion-item:last-of-type {
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .accordion-item:last-of-type .accordion-button.collapsed {
            border-bottom-right-radius: calc(.25rem - 1px);
            border-bottom-left-radius: calc(.25rem - 1px)
        }

        .accordion-item:last-of-type .accordion-collapse {
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .accordion-body {
            padding: 1rem 1.25rem
        }

        .accordion-flush .accordion-collapse {
            border-width: 0
        }

        .accordion-flush .accordion-item {
            border-right: 0;
            border-left: 0;
            border-radius: 0
        }

        .accordion-flush .accordion-item:first-child {
            border-top: 0
        }

        .accordion-flush .accordion-item:last-child {
            border-bottom: 0
        }

        .accordion-flush .accordion-item .accordion-button {
            border-radius: 0
        }

        .breadcrumb {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 0 0;
            margin-bottom: 1rem;
            list-style: none
        }

        .breadcrumb-item+.breadcrumb-item {
            padding-left: .5rem
        }

        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: .5rem;
            color: #6c757d;
            content: var(--bs-breadcrumb-divider, "/")
                /* rtl: var(--bs-breadcrumb-divider, "/") */
        }

        .breadcrumb-item.active {
            color: #6c757d
        }

        .pagination {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding-left: 0;
            list-style: none
        }

        .page-link {
            position: relative;
            display: block;
            color: #0d6efd;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #dee2e6;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .page-link {
                -webkit-transition: none;
                transition: none
            }
        }

        .page-link:hover {
            z-index: 2;
            color: #0a58ca;
            background-color: #e9ecef;
            border-color: #dee2e6
        }

        .page-link:focus {
            z-index: 3;
            color: #0a58ca;
            background-color: #e9ecef;
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25)
        }

        .page-item:not(:first-child) .page-link {
            margin-left: -1px
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6
        }

        .page-link {
            padding: .375rem .75rem
        }

        .page-item:first-child .page-link {
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .page-item:last-child .page-link {
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem
        }

        .pagination-lg .page-link {
            padding: .75rem 1.5rem;
            font-size: 1.25rem
        }

        .pagination-lg .page-item:first-child .page-link {
            border-top-left-radius: .3rem;
            border-bottom-left-radius: .3rem
        }

        .pagination-lg .page-item:last-child .page-link {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem
        }

        .pagination-sm .page-link {
            padding: .25rem .5rem;
            font-size: .875rem
        }

        .pagination-sm .page-item:first-child .page-link {
            border-top-left-radius: .2rem;
            border-bottom-left-radius: .2rem
        }

        .pagination-sm .page-item:last-child .page-link {
            border-top-right-radius: .2rem;
            border-bottom-right-radius: .2rem
        }

        .badge {
            display: inline-block;
            padding: .35em .65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem
        }

        .badge:empty {
            display: none
        }

        .btn .badge {
            position: relative;
            top: -1px
        }

        .alert {
            position: relative;
            padding: 1rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem
        }

        .alert-heading {
            color: inherit
        }

        .alert-link {
            font-weight: 700
        }

        .alert-dismissible {
            padding-right: 3rem
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            padding: 1.25rem 1rem
        }

        .alert-primary {
            color: #084298;
            background-color: #cfe2ff;
            border-color: #b6d4fe
        }

        .alert-primary .alert-link {
            color: #06357a
        }

        .alert-secondary {
            color: #41464b;
            background-color: #e2e3e5;
            border-color: #d3d6d8
        }

        .alert-secondary .alert-link {
            color: #34383c
        }

        .alert-success {
            color: #0f5132;
            background-color: #d1e7dd;
            border-color: #badbcc
        }

        .alert-success .alert-link {
            color: #0c4128
        }

        .alert-info {
            color: #055160;
            background-color: #cff4fc;
            border-color: #b6effb
        }

        .alert-info .alert-link {
            color: #04414d
        }

        .alert-warning {
            color: #664d03;
            background-color: #fff3cd;
            border-color: #ffecb5
        }

        .alert-warning .alert-link {
            color: #523e02
        }

        .alert-danger {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7
        }

        .alert-danger .alert-link {
            color: #6a1a21
        }

        .alert-light {
            color: #636464;
            background-color: #fefefe;
            border-color: #fdfdfe
        }

        .alert-light .alert-link {
            color: #4f5050
        }

        .alert-dark {
            color: #141619;
            background-color: #d3d3d4;
            border-color: #bcbebf
        }

        .alert-dark .alert-link {
            color: #101214
        }

        @-webkit-keyframes progress-bar-stripes {
            0% {
                background-position-x: 1rem
            }
        }

        @keyframes progress-bar-stripes {
            0% {
                background-position-x: 1rem
            }
        }

        .progress {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem
        }

        .progress-bar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            background-color: #0d6efd;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .progress-bar {
                -webkit-transition: none;
                transition: none
            }
        }

        .progress-bar-striped {
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
            background-size: 1rem 1rem
        }

        .progress-bar-animated {
            -webkit-animation: 1s linear infinite progress-bar-stripes;
            animation: 1s linear infinite progress-bar-stripes
        }

        @media (prefers-reduced-motion: reduce) {
            .progress-bar-animated {
                -webkit-animation: none;
                animation: none
            }
        }

        .list-group {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            border-radius: .25rem
        }

        .list-group-numbered {
            list-style-type: none;
            counter-reset: section
        }

        .list-group-numbered>li::before {
            content: counters(section, ".") ". ";
            counter-increment: section
        }

        .list-group-item-action {
            width: 100%;
            color: #495057;
            text-align: inherit
        }

        .list-group-item-action:hover,
        .list-group-item-action:focus {
            z-index: 1;
            color: #495057;
            text-decoration: none;
            background-color: #f8f9fa
        }

        .list-group-item-action:active {
            color: #212529;
            background-color: #e9ecef
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: .5rem 1rem;
            color: #212529;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125)
        }

        .list-group-item:first-child {
            border-top-left-radius: inherit;
            border-top-right-radius: inherit
        }

        .list-group-item:last-child {
            border-bottom-right-radius: inherit;
            border-bottom-left-radius: inherit
        }

        .list-group-item.disabled,
        .list-group-item:disabled {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd
        }

        .list-group-item+.list-group-item {
            border-top-width: 0
        }

        .list-group-item+.list-group-item.active {
            margin-top: -1px;
            border-top-width: 1px
        }

        .list-group-horizontal {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row
        }

        .list-group-horizontal>.list-group-item:first-child {
            border-bottom-left-radius: .25rem;
            border-top-right-radius: 0
        }

        .list-group-horizontal>.list-group-item:last-child {
            border-top-right-radius: .25rem;
            border-bottom-left-radius: 0
        }

        .list-group-horizontal>.list-group-item.active {
            margin-top: 0
        }

        .list-group-horizontal>.list-group-item+.list-group-item {
            border-top-width: 1px;
            border-left-width: 0
        }

        .list-group-horizontal>.list-group-item+.list-group-item.active {
            margin-left: -1px;
            border-left-width: 1px
        }

        @media (min-width: 576px) {
            .list-group-horizontal-sm {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .list-group-horizontal-sm>.list-group-item:first-child {
                border-bottom-left-radius: .25rem;
                border-top-right-radius: 0
            }

            .list-group-horizontal-sm>.list-group-item:last-child {
                border-top-right-radius: .25rem;
                border-bottom-left-radius: 0
            }

            .list-group-horizontal-sm>.list-group-item.active {
                margin-top: 0
            }

            .list-group-horizontal-sm>.list-group-item+.list-group-item {
                border-top-width: 1px;
                border-left-width: 0
            }

            .list-group-horizontal-sm>.list-group-item+.list-group-item.active {
                margin-left: -1px;
                border-left-width: 1px
            }
        }

        @media (min-width: 768px) {
            .list-group-horizontal-md {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .list-group-horizontal-md>.list-group-item:first-child {
                border-bottom-left-radius: .25rem;
                border-top-right-radius: 0
            }

            .list-group-horizontal-md>.list-group-item:last-child {
                border-top-right-radius: .25rem;
                border-bottom-left-radius: 0
            }

            .list-group-horizontal-md>.list-group-item.active {
                margin-top: 0
            }

            .list-group-horizontal-md>.list-group-item+.list-group-item {
                border-top-width: 1px;
                border-left-width: 0
            }

            .list-group-horizontal-md>.list-group-item+.list-group-item.active {
                margin-left: -1px;
                border-left-width: 1px
            }
        }

        @media (min-width: 992px) {
            .list-group-horizontal-lg {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .list-group-horizontal-lg>.list-group-item:first-child {
                border-bottom-left-radius: .25rem;
                border-top-right-radius: 0
            }

            .list-group-horizontal-lg>.list-group-item:last-child {
                border-top-right-radius: .25rem;
                border-bottom-left-radius: 0
            }

            .list-group-horizontal-lg>.list-group-item.active {
                margin-top: 0
            }

            .list-group-horizontal-lg>.list-group-item+.list-group-item {
                border-top-width: 1px;
                border-left-width: 0
            }

            .list-group-horizontal-lg>.list-group-item+.list-group-item.active {
                margin-left: -1px;
                border-left-width: 1px
            }
        }

        @media (min-width: 1200px) {
            .list-group-horizontal-xl {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .list-group-horizontal-xl>.list-group-item:first-child {
                border-bottom-left-radius: .25rem;
                border-top-right-radius: 0
            }

            .list-group-horizontal-xl>.list-group-item:last-child {
                border-top-right-radius: .25rem;
                border-bottom-left-radius: 0
            }

            .list-group-horizontal-xl>.list-group-item.active {
                margin-top: 0
            }

            .list-group-horizontal-xl>.list-group-item+.list-group-item {
                border-top-width: 1px;
                border-left-width: 0
            }

            .list-group-horizontal-xl>.list-group-item+.list-group-item.active {
                margin-left: -1px;
                border-left-width: 1px
            }
        }

        @media (min-width: 1400px) {
            .list-group-horizontal-xxl {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .list-group-horizontal-xxl>.list-group-item:first-child {
                border-bottom-left-radius: .25rem;
                border-top-right-radius: 0
            }

            .list-group-horizontal-xxl>.list-group-item:last-child {
                border-top-right-radius: .25rem;
                border-bottom-left-radius: 0
            }

            .list-group-horizontal-xxl>.list-group-item.active {
                margin-top: 0
            }

            .list-group-horizontal-xxl>.list-group-item+.list-group-item {
                border-top-width: 1px;
                border-left-width: 0
            }

            .list-group-horizontal-xxl>.list-group-item+.list-group-item.active {
                margin-left: -1px;
                border-left-width: 1px
            }
        }

        .list-group-flush {
            border-radius: 0
        }

        .list-group-flush>.list-group-item {
            border-width: 0 0 1px
        }

        .list-group-flush>.list-group-item:last-child {
            border-bottom-width: 0
        }

        .list-group-item-primary {
            color: #084298;
            background-color: #cfe2ff
        }

        .list-group-item-primary.list-group-item-action:hover,
        .list-group-item-primary.list-group-item-action:focus {
            color: #084298;
            background-color: #bacbe6
        }

        .list-group-item-primary.list-group-item-action.active {
            color: #fff;
            background-color: #084298;
            border-color: #084298
        }

        .list-group-item-secondary {
            color: #41464b;
            background-color: #e2e3e5
        }

        .list-group-item-secondary.list-group-item-action:hover,
        .list-group-item-secondary.list-group-item-action:focus {
            color: #41464b;
            background-color: #cbccce
        }

        .list-group-item-secondary.list-group-item-action.active {
            color: #fff;
            background-color: #41464b;
            border-color: #41464b
        }

        .list-group-item-success {
            color: #0f5132;
            background-color: #d1e7dd
        }

        .list-group-item-success.list-group-item-action:hover,
        .list-group-item-success.list-group-item-action:focus {
            color: #0f5132;
            background-color: #bcd0c7
        }

        .list-group-item-success.list-group-item-action.active {
            color: #fff;
            background-color: #0f5132;
            border-color: #0f5132
        }

        .list-group-item-info {
            color: #055160;
            background-color: #cff4fc
        }

        .list-group-item-info.list-group-item-action:hover,
        .list-group-item-info.list-group-item-action:focus {
            color: #055160;
            background-color: #badce3
        }

        .list-group-item-info.list-group-item-action.active {
            color: #fff;
            background-color: #055160;
            border-color: #055160
        }

        .list-group-item-warning {
            color: #664d03;
            background-color: #fff3cd
        }

        .list-group-item-warning.list-group-item-action:hover,
        .list-group-item-warning.list-group-item-action:focus {
            color: #664d03;
            background-color: #e6dbb9
        }

        .list-group-item-warning.list-group-item-action.active {
            color: #fff;
            background-color: #664d03;
            border-color: #664d03
        }

        .list-group-item-danger {
            color: #842029;
            background-color: #f8d7da
        }

        .list-group-item-danger.list-group-item-action:hover,
        .list-group-item-danger.list-group-item-action:focus {
            color: #842029;
            background-color: #dfc2c4
        }

        .list-group-item-danger.list-group-item-action.active {
            color: #fff;
            background-color: #842029;
            border-color: #842029
        }

        .list-group-item-light {
            color: #636464;
            background-color: #fefefe
        }

        .list-group-item-light.list-group-item-action:hover,
        .list-group-item-light.list-group-item-action:focus {
            color: #636464;
            background-color: #e5e5e5
        }

        .list-group-item-light.list-group-item-action.active {
            color: #fff;
            background-color: #636464;
            border-color: #636464
        }

        .list-group-item-dark {
            color: #141619;
            background-color: #d3d3d4
        }

        .list-group-item-dark.list-group-item-action:hover,
        .list-group-item-dark.list-group-item-action:focus {
            color: #141619;
            background-color: #bebebf
        }

        .list-group-item-dark.list-group-item-action.active {
            color: #fff;
            background-color: #141619;
            border-color: #141619
        }

        .btn-close {
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: .25em .25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: .25rem;
            opacity: .5
        }

        .btn-close:hover {
            color: #000;
            text-decoration: none;
            opacity: .75
        }

        .btn-close:focus {
            outline: 0;
            -webkit-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, 0.25);
            opacity: 1
        }

        .btn-close:disabled,
        .btn-close.disabled {
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            opacity: .25
        }

        .btn-close-white {
            -webkit-filter: invert(1) grayscale(100%) brightness(200%);
            filter: invert(1) grayscale(100%) brightness(200%)
        }

        .toast {
            width: 350px;
            max-width: 100%;
            font-size: .875rem;
            pointer-events: auto;
            background-color: rgba(255, 255, 255, 0.85);
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: .25rem
        }

        .toast.showing {
            opacity: 0
        }

        .toast:not(.show) {
            display: none
        }

        .toast-container {
            width: -webkit-max-content;
            width: -moz-max-content;
            width: max-content;
            max-width: 100%;
            pointer-events: none
        }

        .toast-container>:not(:last-child) {
            margin-bottom: .75rem
        }

        .toast-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: .5rem .75rem;
            color: #6c757d;
            background-color: rgba(255, 255, 255, 0.85);
            background-clip: padding-box;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px)
        }

        .toast-header .btn-close {
            margin-right: -.375rem;
            margin-left: .75rem
        }

        .toast-body {
            padding: .75rem;
            word-wrap: break-word
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1055;
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: .5rem;
            pointer-events: none
        }

        .modal.fade .modal-dialog {
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-transform: translate(0, -50px);
            transform: translate(0, -50px)
        }

        @media (prefers-reduced-motion: reduce) {
            .modal.fade .modal-dialog {
                -webkit-transition: none;
                transition: none
            }
        }

        .modal.show .modal-dialog {
            -webkit-transform: none;
            transform: none
        }

        .modal.modal-static .modal-dialog {
            -webkit-transform: scale(1.02);
            transform: scale(1.02)
        }

        .modal-dialog-scrollable {
            height: calc(100% - 1rem)
        }

        .modal-dialog-scrollable .modal-content {
            max-height: 100%;
            overflow: hidden
        }

        .modal-dialog-scrollable .modal-body {
            overflow-y: auto
        }

        .modal-dialog-centered {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            min-height: calc(100% - 1rem)
        }

        .modal-content {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: .3rem;
            outline: 0
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            width: 100vw;
            height: 100vh;
            background-color: #000
        }

        .modal-backdrop.fade {
            opacity: 0
        }

        .modal-backdrop.show {
            opacity: .5
        }

        .modal-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 1px solid #ececec;
            border-top-left-radius: calc(.3rem - 1px);
            border-top-right-radius: calc(.3rem - 1px)
        }

        .modal-header .btn-close {
            padding: .5rem .5rem;
            margin: -.5rem -.5rem -.5rem auto
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5
        }

        .modal-body {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1rem
        }

        .modal-footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            padding: .75rem;
            border-top: 1px solid #ececec;
            border-bottom-right-radius: calc(.3rem - 1px);
            border-bottom-left-radius: calc(.3rem - 1px)
        }

        .modal-footer>* {
            margin: .25rem
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 500px;
                margin: 1.75rem auto
            }

            .modal-dialog-scrollable {
                height: calc(100% - 3.5rem)
            }

            .modal-dialog-centered {
                min-height: calc(100% - 3.5rem)
            }

            .modal-sm {
                max-width: 300px
            }
        }

        @media (min-width: 992px) {

            .modal-lg,
            .modal-xl {
                max-width: 800px
            }
        }

        @media (min-width: 1200px) {
            .modal-xl {
                max-width: 1140px
            }
        }

        .modal-fullscreen {
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0
        }

        .modal-fullscreen .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0
        }

        .modal-fullscreen .modal-header {
            border-radius: 0
        }

        .modal-fullscreen .modal-body {
            overflow-y: auto
        }

        .modal-fullscreen .modal-footer {
            border-radius: 0
        }

        @media (max-width: 575.98px) {
            .modal-fullscreen-sm-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0
            }

            .modal-fullscreen-sm-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0
            }

            .modal-fullscreen-sm-down .modal-header {
                border-radius: 0
            }

            .modal-fullscreen-sm-down .modal-body {
                overflow-y: auto
            }

            .modal-fullscreen-sm-down .modal-footer {
                border-radius: 0
            }
        }

        @media (max-width: 767.98px) {
            .modal-fullscreen-md-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0
            }

            .modal-fullscreen-md-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0
            }

            .modal-fullscreen-md-down .modal-header {
                border-radius: 0
            }

            .modal-fullscreen-md-down .modal-body {
                overflow-y: auto
            }

            .modal-fullscreen-md-down .modal-footer {
                border-radius: 0
            }
        }

        @media (max-width: 991.98px) {
            .modal-fullscreen-lg-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0
            }

            .modal-fullscreen-lg-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0
            }

            .modal-fullscreen-lg-down .modal-header {
                border-radius: 0
            }

            .modal-fullscreen-lg-down .modal-body {
                overflow-y: auto
            }

            .modal-fullscreen-lg-down .modal-footer {
                border-radius: 0
            }
        }

        @media (max-width: 1199.98px) {
            .modal-fullscreen-xl-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0
            }

            .modal-fullscreen-xl-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0
            }

            .modal-fullscreen-xl-down .modal-header {
                border-radius: 0
            }

            .modal-fullscreen-xl-down .modal-body {
                overflow-y: auto
            }

            .modal-fullscreen-xl-down .modal-footer {
                border-radius: 0
            }
        }

        @media (max-width: 1399.98px) {
            .modal-fullscreen-xxl-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0
            }

            .modal-fullscreen-xxl-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0
            }

            .modal-fullscreen-xxl-down .modal-header {
                border-radius: 0
            }

            .modal-fullscreen-xxl-down .modal-body {
                overflow-y: auto
            }

            .modal-fullscreen-xxl-down .modal-footer {
                border-radius: 0
            }
        }

        .tooltip {
            position: absolute;
            z-index: 1080;
            display: block;
            margin: 0;
            font-family: var(--bs-font-sans-serif);
            font-style: normal;
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            white-space: normal;
            line-break: auto;
            font-size: .875rem;
            word-wrap: break-word;
            opacity: 0
        }

        .tooltip.show {
            opacity: .9
        }

        .tooltip .tooltip-arrow {
            position: absolute;
            display: block;
            width: .8rem;
            height: .4rem
        }

        .tooltip .tooltip-arrow::before {
            position: absolute;
            content: "";
            border-color: transparent;
            border-style: solid
        }

        .bs-tooltip-top,
        .bs-tooltip-auto[data-popper-placement^="top"] {
            padding: .4rem 0
        }

        .bs-tooltip-top .tooltip-arrow,
        .bs-tooltip-auto[data-popper-placement^="top"] .tooltip-arrow {
            bottom: 0
        }

        .bs-tooltip-top .tooltip-arrow::before,
        .bs-tooltip-auto[data-popper-placement^="top"] .tooltip-arrow::before {
            top: -1px;
            border-width: .4rem .4rem 0;
            border-top-color: #000
        }

        .bs-tooltip-end,
        .bs-tooltip-auto[data-popper-placement^="right"] {
            padding: 0 .4rem
        }

        .bs-tooltip-end .tooltip-arrow,
        .bs-tooltip-auto[data-popper-placement^="right"] .tooltip-arrow {
            left: 0;
            width: .4rem;
            height: .8rem
        }

        .bs-tooltip-end .tooltip-arrow::before,
        .bs-tooltip-auto[data-popper-placement^="right"] .tooltip-arrow::before {
            right: -1px;
            border-width: .4rem .4rem .4rem 0;
            border-right-color: #000
        }

        .bs-tooltip-bottom,
        .bs-tooltip-auto[data-popper-placement^="bottom"] {
            padding: .4rem 0
        }

        .bs-tooltip-bottom .tooltip-arrow,
        .bs-tooltip-auto[data-popper-placement^="bottom"] .tooltip-arrow {
            top: 0
        }

        .bs-tooltip-bottom .tooltip-arrow::before,
        .bs-tooltip-auto[data-popper-placement^="bottom"] .tooltip-arrow::before {
            bottom: -1px;
            border-width: 0 .4rem .4rem;
            border-bottom-color: #000
        }

        .bs-tooltip-start,
        .bs-tooltip-auto[data-popper-placement^="left"] {
            padding: 0 .4rem
        }

        .bs-tooltip-start .tooltip-arrow,
        .bs-tooltip-auto[data-popper-placement^="left"] .tooltip-arrow {
            right: 0;
            width: .4rem;
            height: .8rem
        }

        .bs-tooltip-start .tooltip-arrow::before,
        .bs-tooltip-auto[data-popper-placement^="left"] .tooltip-arrow::before {
            left: -1px;
            border-width: .4rem 0 .4rem .4rem;
            border-left-color: #000
        }

        .tooltip-inner {
            max-width: 200px;
            padding: .25rem .5rem;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: .25rem
        }

        .popover {
            position: absolute;
            top: 0;
            left: 0
                /* rtl:ignore */
            ;
            z-index: 1070;
            display: block;
            max-width: 276px;
            font-family: var(--bs-font-sans-serif);
            font-style: normal;
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            white-space: normal;
            line-break: auto;
            font-size: .875rem;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: .3rem
        }

        .popover .popover-arrow {
            position: absolute;
            display: block;
            width: 1rem;
            height: .5rem
        }

        .popover .popover-arrow::before,
        .popover .popover-arrow::after {
            position: absolute;
            display: block;
            content: "";
            border-color: transparent;
            border-style: solid
        }

        .bs-popover-top>.popover-arrow,
        .bs-popover-auto[data-popper-placement^="top"]>.popover-arrow {
            bottom: calc(-.5rem - 1px)
        }

        .bs-popover-top>.popover-arrow::before,
        .bs-popover-auto[data-popper-placement^="top"]>.popover-arrow::before {
            bottom: 0;
            border-width: .5rem .5rem 0;
            border-top-color: rgba(0, 0, 0, 0.25)
        }

        .bs-popover-top>.popover-arrow::after,
        .bs-popover-auto[data-popper-placement^="top"]>.popover-arrow::after {
            bottom: 1px;
            border-width: .5rem .5rem 0;
            border-top-color: #fff
        }

        .bs-popover-end>.popover-arrow,
        .bs-popover-auto[data-popper-placement^="right"]>.popover-arrow {
            left: calc(-.5rem - 1px);
            width: .5rem;
            height: 1rem
        }

        .bs-popover-end>.popover-arrow::before,
        .bs-popover-auto[data-popper-placement^="right"]>.popover-arrow::before {
            left: 0;
            border-width: .5rem .5rem .5rem 0;
            border-right-color: rgba(0, 0, 0, 0.25)
        }

        .bs-popover-end>.popover-arrow::after,
        .bs-popover-auto[data-popper-placement^="right"]>.popover-arrow::after {
            left: 1px;
            border-width: .5rem .5rem .5rem 0;
            border-right-color: #fff
        }

        .bs-popover-bottom>.popover-arrow,
        .bs-popover-auto[data-popper-placement^="bottom"]>.popover-arrow {
            top: calc(-.5rem - 1px)
        }

        .bs-popover-bottom>.popover-arrow::before,
        .bs-popover-auto[data-popper-placement^="bottom"]>.popover-arrow::before {
            top: 0;
            border-width: 0 .5rem .5rem .5rem;
            border-bottom-color: rgba(0, 0, 0, 0.25)
        }

        .bs-popover-bottom>.popover-arrow::after,
        .bs-popover-auto[data-popper-placement^="bottom"]>.popover-arrow::after {
            top: 1px;
            border-width: 0 .5rem .5rem .5rem;
            border-bottom-color: #fff
        }

        .bs-popover-bottom .popover-header::before,
        .bs-popover-auto[data-popper-placement^="bottom"] .popover-header::before {
            position: absolute;
            top: 0;
            left: 50%;
            display: block;
            width: 1rem;
            margin-left: -.5rem;
            content: "";
            border-bottom: 1px solid #f0f0f0
        }

        .bs-popover-start>.popover-arrow,
        .bs-popover-auto[data-popper-placement^="left"]>.popover-arrow {
            right: calc(-.5rem - 1px);
            width: .5rem;
            height: 1rem
        }

        .bs-popover-start>.popover-arrow::before,
        .bs-popover-auto[data-popper-placement^="left"]>.popover-arrow::before {
            right: 0;
            border-width: .5rem 0 .5rem .5rem;
            border-left-color: rgba(0, 0, 0, 0.25)
        }

        .bs-popover-start>.popover-arrow::after,
        .bs-popover-auto[data-popper-placement^="left"]>.popover-arrow::after {
            right: 1px;
            border-width: .5rem 0 .5rem .5rem;
            border-left-color: #fff
        }

        .popover-header {
            padding: .5rem 1rem;
            margin-bottom: 0;
            font-size: 1rem;
            background-color: #f0f0f0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            border-top-left-radius: calc(.3rem - 1px);
            border-top-right-radius: calc(.3rem - 1px)
        }

        .popover-header:empty {
            display: none
        }

        .popover-body {
            padding: 1rem 1rem;
            color: #212529
        }

        .carousel {
            position: relative
        }

        .carousel.pointer-event {
            -ms-touch-action: pan-y;
            touch-action: pan-y
        }

        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden
        }

        .carousel-inner::after {
            display: block;
            clear: both;
            content: ""
        }

        .carousel-item {
            position: relative;
            display: none;
            float: left;
            width: 100%;
            margin-right: -100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .carousel-item {
                -webkit-transition: none;
                transition: none
            }
        }

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: block
        }

        .carousel-item-next:not(.carousel-item-start),
        .active.carousel-item-end {
            -webkit-transform: translateX(100%);
            transform: translateX(100%)
        }

        .carousel-item-prev:not(.carousel-item-end),
        .active.carousel-item-start {
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%)
        }

        .carousel-fade .carousel-item {
            opacity: 0;
            -webkit-transition-property: opacity;
            transition-property: opacity;
            -webkit-transform: none;
            transform: none
        }

        .carousel-fade .carousel-item.active,
        .carousel-fade .carousel-item-next.carousel-item-start,
        .carousel-fade .carousel-item-prev.carousel-item-end {
            z-index: 1;
            opacity: 1
        }

        .carousel-fade .active.carousel-item-start,
        .carousel-fade .active.carousel-item-end {
            z-index: 0;
            opacity: 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {

            .carousel-fade .active.carousel-item-start,
            .carousel-fade .active.carousel-item-end {
                -webkit-transition: none;
                transition: none
            }
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 15%;
            padding: 0;
            color: #fff;
            text-align: center;
            background: none;
            border: 0;
            opacity: .5;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {

            .carousel-control-prev,
            .carousel-control-next {
                -webkit-transition: none;
                transition: none
            }
        }

        .carousel-control-prev:hover,
        .carousel-control-prev:focus,
        .carousel-control-next:hover,
        .carousel-control-next:focus {
            color: #fff;
            text-decoration: none;
            outline: 0;
            opacity: .9
        }

        .carousel-control-prev {
            left: 0
        }

        .carousel-control-next {
            right: 0
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: 100% 100%
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e")
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e")
        }

        .carousel-indicators {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 2;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 0;
            margin-right: 15%;
            margin-bottom: 1rem;
            margin-left: 15%;
            list-style: none
        }

        .carousel-indicators [data-bs-target] {
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-box-flex: 0;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            width: 30px;
            height: 3px;
            padding: 0;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #fff;
            background-clip: padding-box;
            border: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            opacity: .5;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .carousel-indicators [data-bs-target] {
                -webkit-transition: none;
                transition: none
            }
        }

        .carousel-indicators .active {
            opacity: 1
        }

        .carousel-caption {
            position: absolute;
            right: 15%;
            bottom: 1.25rem;
            left: 15%;
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
            color: #fff;
            text-align: center
        }

        .carousel-dark .carousel-control-prev-icon,
        .carousel-dark .carousel-control-next-icon {
            -webkit-filter: invert(1) grayscale(100);
            filter: invert(1) grayscale(100)
        }

        .carousel-dark .carousel-indicators [data-bs-target] {
            background-color: #000
        }

        .carousel-dark .carousel-caption {
            color: #000
        }

        @-webkit-keyframes spinner-border {
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
                    /* rtl:ignore */
            }
        }

        @keyframes spinner-border {
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
                    /* rtl:ignore */
            }
        }

        .spinner-border {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: -.125em;
            border: .25em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: .75s linear infinite spinner-border;
            animation: .75s linear infinite spinner-border
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: .2em
        }

        @-webkit-keyframes spinner-grow {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        @keyframes spinner-grow {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none
            }
        }

        .spinner-grow {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: -.125em;
            background-color: currentColor;
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: .75s linear infinite spinner-grow;
            animation: .75s linear infinite spinner-grow
        }

        .spinner-grow-sm {
            width: 1rem;
            height: 1rem
        }

        @media (prefers-reduced-motion: reduce) {

            .spinner-border,
            .spinner-grow {
                -webkit-animation-duration: 1.5s;
                animation-duration: 1.5s
            }
        }

        .offcanvas {
            position: fixed;
            bottom: 0;
            z-index: 1045;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            max-width: 100%;
            visibility: hidden;
            background-color: #fff;
            background-clip: padding-box;
            outline: 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        @media (prefers-reduced-motion: reduce) {
            .offcanvas {
                -webkit-transition: none;
                transition: none
            }
        }

        .offcanvas-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            width: 100vw;
            height: 100vh;
            background-color: #000
        }

        .offcanvas-backdrop.fade {
            opacity: 0
        }

        .offcanvas-backdrop.show {
            opacity: .5
        }

        .offcanvas-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem 1rem
        }

        .offcanvas-header .btn-close {
            padding: .5rem .5rem;
            margin-top: -.5rem;
            margin-right: -.5rem;
            margin-bottom: -.5rem
        }

        .offcanvas-title {
            margin-bottom: 0;
            line-height: 1.5
        }

        .offcanvas-body {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            padding: 1rem 1rem;
            overflow-y: auto
        }

        .offcanvas-start {
            top: 0;
            left: 0;
            width: 400px;
            border-right: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%)
        }

        .offcanvas-end {
            top: 0;
            right: 0;
            width: 400px;
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-transform: translateX(100%);
            transform: translateX(100%)
        }

        .offcanvas-top {
            top: 0;
            right: 0;
            left: 0;
            height: 30vh;
            max-height: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%)
        }

        .offcanvas-bottom {
            right: 0;
            left: 0;
            height: 30vh;
            max-height: 100%;
            border-top: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-transform: translateY(100%);
            transform: translateY(100%)
        }

        .offcanvas.show {
            -webkit-transform: none;
            transform: none
        }

        .placeholder {
            display: inline-block;
            min-height: 1em;
            vertical-align: middle;
            cursor: wait;
            background-color: currentColor;
            opacity: .5
        }

        .placeholder.btn::before {
            display: inline-block;
            content: ""
        }

        .placeholder-xs {
            min-height: .6em
        }

        .placeholder-sm {
            min-height: .8em
        }

        .placeholder-lg {
            min-height: 1.2em
        }

        .placeholder-glow .placeholder {
            -webkit-animation: placeholder-glow 2s ease-in-out infinite;
            animation: placeholder-glow 2s ease-in-out infinite
        }

        @-webkit-keyframes placeholder-glow {
            50% {
                opacity: .2
            }
        }

        @keyframes placeholder-glow {
            50% {
                opacity: .2
            }
        }

        .placeholder-wave {
            -webkit-mask-image: linear-gradient(130deg, #000 55%, rgba(0, 0, 0, 0.8) 75%, #000 95%);
            mask-image: linear-gradient(130deg, #000 55%, rgba(0, 0, 0, 0.8) 75%, #000 95%);
            -webkit-mask-size: 200% 100%;
            mask-size: 200% 100%;
            -webkit-animation: placeholder-wave 2s linear infinite;
            animation: placeholder-wave 2s linear infinite
        }

        @-webkit-keyframes placeholder-wave {
            100% {
                -webkit-mask-position: -200% 0%;
                mask-position: -200% 0%
            }
        }

        @keyframes placeholder-wave {
            100% {
                -webkit-mask-position: -200% 0%;
                mask-position: -200% 0%
            }
        }

        .clearfix::after {
            display: block;
            clear: both;
            content: ""
        }

        .link-primary {
            color: #0d6efd
        }

        .link-primary:hover,
        .link-primary:focus {
            color: #0a58ca
        }

        .link-secondary {
            color: #6c757d
        }

        .link-secondary:hover,
        .link-secondary:focus {
            color: #565e64
        }

        .link-success {
            color: #198754
        }

        .link-success:hover,
        .link-success:focus {
            color: #146c43
        }

        .link-info {
            color: #0dcaf0
        }

        .link-info:hover,
        .link-info:focus {
            color: #3dd5f3
        }

        .link-warning {
            color: #ffc107
        }

        .link-warning:hover,
        .link-warning:focus {
            color: #ffcd39
        }

        .link-danger {
            color: #dc3545
        }

        .link-danger:hover,
        .link-danger:focus {
            color: #b02a37
        }

        .link-light {
            color: #f8f9fa
        }

        .link-light:hover,
        .link-light:focus {
            color: #f9fafb
        }

        .link-dark {
            color: #212529
        }

        .link-dark:hover,
        .link-dark:focus {
            color: #1a1e21
        }

        .ratio {
            position: relative;
            width: 100%
        }

        .ratio::before {
            display: block;
            padding-top: var(--bs-aspect-ratio);
            content: ""
        }

        .ratio>* {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }

        .ratio-1x1 {
            --bs-aspect-ratio: 100%
        }

        .ratio-4x3 {
            --bs-aspect-ratio: calc(3 / 4 * 100%)
        }

        .ratio-16x9 {
            --bs-aspect-ratio: calc(9 / 16 * 100%)
        }

        .ratio-21x9 {
            --bs-aspect-ratio: calc(9 / 21 * 100%)
        }

        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030
        }

        .fixed-bottom {
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1030
        }

        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1020
        }

        @media (min-width: 576px) {
            .sticky-sm-top {
                position: sticky;
                top: 0;
                z-index: 1020
            }
        }

        @media (min-width: 768px) {
            .sticky-md-top {
                position: sticky;
                top: 0;
                z-index: 1020
            }
        }

        @media (min-width: 992px) {
            .sticky-lg-top {
                position: sticky;
                top: 0;
                z-index: 1020
            }
        }

        @media (min-width: 1200px) {
            .sticky-xl-top {
                position: sticky;
                top: 0;
                z-index: 1020
            }
        }

        @media (min-width: 1400px) {
            .sticky-xxl-top {
                position: sticky;
                top: 0;
                z-index: 1020
            }
        }

        .hstack {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-item-align: stretch;
            align-self: stretch
        }

        .vstack {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-item-align: stretch;
            align-self: stretch
        }

        .visually-hidden,
        .visually-hidden-focusable:not(:focus):not(:focus-within) {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important
        }

        .stretched-link::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            content: ""
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .vr {
            display: inline-block;
            -ms-flex-item-align: stretch;
            align-self: stretch;
            width: 1px;
            min-height: 1em;
            background-color: currentColor;
            opacity: .25
        }

        .align-baseline {
            vertical-align: baseline !important
        }

        .align-top {
            vertical-align: top !important
        }

        .align-middle {
            vertical-align: middle !important
        }

        .align-bottom {
            vertical-align: bottom !important
        }

        .align-text-bottom {
            vertical-align: text-bottom !important
        }

        .align-text-top {
            vertical-align: text-top !important
        }

        .float-start {
            float: left !important
        }

        .float-end {
            float: right !important
        }

        .float-none {
            float: none !important
        }

        .opacity-0 {
            opacity: 0 !important
        }

        .opacity-25 {
            opacity: .25 !important
        }

        .opacity-50 {
            opacity: .5 !important
        }

        .opacity-75 {
            opacity: .75 !important
        }

        .opacity-100 {
            opacity: 1 !important
        }

        .overflow-auto {
            overflow: auto !important
        }

        .overflow-hidden {
            overflow: hidden !important
        }

        .overflow-visible {
            overflow: visible !important
        }

        .overflow-scroll {
            overflow: scroll !important
        }

        .d-inline {
            display: inline !important
        }

        .d-inline-block {
            display: inline-block !important
        }

        .d-block {
            display: block !important
        }

        .d-grid {
            display: grid !important
        }

        .d-table {
            display: table !important
        }

        .d-table-row {
            display: table-row !important
        }

        .d-table-cell {
            display: table-cell !important
        }

        .d-flex {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important
        }

        .d-inline-flex {
            display: -webkit-inline-box !important;
            display: -ms-inline-flexbox !important;
            display: inline-flex !important
        }

        .d-none {
            display: none !important
        }

        .shadow {
            -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important
        }

        .shadow-sm {
            -webkit-box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important
        }

        .shadow-lg {
            -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important
        }

        .shadow-none {
            -webkit-box-shadow: none !important;
            box-shadow: none !important
        }

        .position-static {
            position: static !important
        }

        .position-relative {
            position: relative !important
        }

        .position-absolute {
            position: absolute !important
        }

        .position-fixed {
            position: fixed !important
        }

        .position-sticky {
            position: sticky !important
        }

        .top-0 {
            top: 0 !important
        }

        .top-50 {
            top: 50% !important
        }

        .top-100 {
            top: 100% !important
        }

        .bottom-0 {
            bottom: 0 !important
        }

        .bottom-50 {
            bottom: 50% !important
        }

        .bottom-100 {
            bottom: 100% !important
        }

        .start-0 {
            left: 0 !important
        }

        .start-50 {
            left: 50% !important
        }

        .start-100 {
            left: 100% !important
        }

        .end-0 {
            right: 0 !important
        }

        .end-50 {
            right: 50% !important
        }

        .end-100 {
            right: 100% !important
        }

        .translate-middle {
            -webkit-transform: translate(-50%, -50%) !important;
            transform: translate(-50%, -50%) !important
        }

        .translate-middle-x {
            -webkit-transform: translateX(-50%) !important;
            transform: translateX(-50%) !important
        }

        .translate-middle-y {
            -webkit-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important
        }

        .border {
            border: 1px solid #ececec !important
        }

        .border-0 {
            border: 0 !important
        }

        .border-top {
            border-top: 1px solid #ececec !important
        }

        .border-top-0 {
            border-top: 0 !important
        }

        .border-end {
            border-right: 1px solid #ececec !important
        }

        .border-end-0 {
            border-right: 0 !important
        }

        .border-bottom {
            border-bottom: 1px solid #ececec !important
        }

        .border-bottom-0 {
            border-bottom: 0 !important
        }

        .border-start {
            border-left: 1px solid #ececec !important
        }

        .border-start-0 {
            border-left: 0 !important
        }

        .border-primary {
            border-color: #0d6efd !important
        }

        .border-secondary {
            border-color: #6c757d !important
        }

        .border-success {
            border-color: #198754 !important
        }

        .border-info {
            border-color: #0dcaf0 !important
        }

        .border-warning {
            border-color: #ffc107 !important
        }

        .border-danger {
            border-color: #dc3545 !important
        }

        .border-light {
            border-color: #f8f9fa !important
        }

        .border-dark {
            border-color: #212529 !important
        }

        .border-white {
            border-color: #fff !important
        }

        .border-1 {
            border-width: 1px !important
        }

        .border-2 {
            border-width: 2px !important
        }

        .border-3 {
            border-width: 3px !important
        }

        .border-4 {
            border-width: 4px !important
        }

        .border-5 {
            border-width: 5px !important
        }

        .w-25 {
            width: 25% !important
        }

        .w-50 {
            width: 50% !important
        }

        .w-75 {
            width: 75% !important
        }

        .w-100 {
            width: 100% !important
        }

        .w-auto {
            width: auto !important
        }

        .mw-100 {
            max-width: 100% !important
        }

        .vw-100 {
            width: 100vw !important
        }

        .min-vw-100 {
            min-width: 100vw !important
        }

        .h-25 {
            height: 25% !important
        }

        .h-50 {
            height: 50% !important
        }

        .h-75 {
            height: 75% !important
        }

        .h-100 {
            height: 100% !important
        }

        .h-auto {
            height: auto !important
        }

        .mh-100 {
            max-height: 100% !important
        }

        .vh-100 {
            height: 100vh !important
        }

        .min-vh-100 {
            min-height: 100vh !important
        }

        .flex-fill {
            -webkit-box-flex: 1 !important;
            -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important
        }

        .flex-row {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: normal !important;
            -ms-flex-direction: row !important;
            flex-direction: row !important
        }

        .flex-column {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
            -ms-flex-direction: column !important;
            flex-direction: column !important
        }

        .flex-row-reverse {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: reverse !important;
            -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important
        }

        .flex-column-reverse {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: reverse !important;
            -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important
        }

        .flex-grow-0 {
            -webkit-box-flex: 0 !important;
            -ms-flex-positive: 0 !important;
            flex-grow: 0 !important
        }

        .flex-grow-1 {
            -webkit-box-flex: 1 !important;
            -ms-flex-positive: 1 !important;
            flex-grow: 1 !important
        }

        .flex-shrink-0 {
            -ms-flex-negative: 0 !important;
            flex-shrink: 0 !important
        }

        .flex-shrink-1 {
            -ms-flex-negative: 1 !important;
            flex-shrink: 1 !important
        }

        .flex-wrap {
            -ms-flex-wrap: wrap !important;
            flex-wrap: wrap !important
        }

        .flex-nowrap {
            -ms-flex-wrap: nowrap !important;
            flex-wrap: nowrap !important
        }

        .flex-wrap-reverse {
            -ms-flex-wrap: wrap-reverse !important;
            flex-wrap: wrap-reverse !important
        }

        .gap-0 {
            gap: 0 !important
        }

        .gap-1 {
            gap: .25rem !important
        }

        .gap-2 {
            gap: .5rem !important
        }

        .gap-3 {
            gap: 1rem !important
        }

        .gap-4 {
            gap: 1.5rem !important
        }

        .gap-5 {
            gap: 3rem !important
        }

        .justify-content-start {
            -webkit-box-pack: start !important;
            -ms-flex-pack: start !important;
            justify-content: flex-start !important
        }

        .justify-content-end {
            -webkit-box-pack: end !important;
            -ms-flex-pack: end !important;
            justify-content: flex-end !important
        }

        .justify-content-center {
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important
        }

        .justify-content-between {
            -webkit-box-pack: justify !important;
            -ms-flex-pack: justify !important;
            justify-content: space-between !important
        }

        .justify-content-around {
            -ms-flex-pack: distribute !important;
            justify-content: space-around !important
        }

        .justify-content-evenly {
            -webkit-box-pack: space-evenly !important;
            -ms-flex-pack: space-evenly !important;
            justify-content: space-evenly !important
        }

        .align-items-start {
            -webkit-box-align: start !important;
            -ms-flex-align: start !important;
            align-items: flex-start !important
        }

        .align-items-end {
            -webkit-box-align: end !important;
            -ms-flex-align: end !important;
            align-items: flex-end !important
        }

        .align-items-center {
            -webkit-box-align: center !important;
            -ms-flex-align: center !important;
            align-items: center !important
        }

        .align-items-baseline {
            -webkit-box-align: baseline !important;
            -ms-flex-align: baseline !important;
            align-items: baseline !important
        }

        .align-items-stretch {
            -webkit-box-align: stretch !important;
            -ms-flex-align: stretch !important;
            align-items: stretch !important
        }

        .align-content-start {
            -ms-flex-line-pack: start !important;
            align-content: flex-start !important
        }

        .align-content-end {
            -ms-flex-line-pack: end !important;
            align-content: flex-end !important
        }

        .align-content-center {
            -ms-flex-line-pack: center !important;
            align-content: center !important
        }

        .align-content-between {
            -ms-flex-line-pack: justify !important;
            align-content: space-between !important
        }

        .align-content-around {
            -ms-flex-line-pack: distribute !important;
            align-content: space-around !important
        }

        .align-content-stretch {
            -ms-flex-line-pack: stretch !important;
            align-content: stretch !important
        }

        .align-self-auto {
            -ms-flex-item-align: auto !important;
            align-self: auto !important
        }

        .align-self-start {
            -ms-flex-item-align: start !important;
            align-self: flex-start !important
        }

        .align-self-end {
            -ms-flex-item-align: end !important;
            align-self: flex-end !important
        }

        .align-self-center {
            -ms-flex-item-align: center !important;
            align-self: center !important
        }

        .align-self-baseline {
            -ms-flex-item-align: baseline !important;
            align-self: baseline !important
        }

        .align-self-stretch {
            -ms-flex-item-align: stretch !important;
            align-self: stretch !important
        }

        .order-first {
            -webkit-box-ordinal-group: 0 !important;
            -ms-flex-order: -1 !important;
            order: -1 !important
        }

        .order-0 {
            -webkit-box-ordinal-group: 1 !important;
            -ms-flex-order: 0 !important;
            order: 0 !important
        }

        .order-1 {
            -webkit-box-ordinal-group: 2 !important;
            -ms-flex-order: 1 !important;
            order: 1 !important
        }

        .order-2 {
            -webkit-box-ordinal-group: 3 !important;
            -ms-flex-order: 2 !important;
            order: 2 !important
        }

        .order-3 {
            -webkit-box-ordinal-group: 4 !important;
            -ms-flex-order: 3 !important;
            order: 3 !important
        }

        .order-4 {
            -webkit-box-ordinal-group: 5 !important;
            -ms-flex-order: 4 !important;
            order: 4 !important
        }

        .order-5 {
            -webkit-box-ordinal-group: 6 !important;
            -ms-flex-order: 5 !important;
            order: 5 !important
        }

        .order-last {
            -webkit-box-ordinal-group: 7 !important;
            -ms-flex-order: 6 !important;
            order: 6 !important
        }

        .m-0 {
            margin: 0 !important
        }

        .m-1 {
            margin: .25rem !important
        }

        .m-2 {
            margin: .5rem !important
        }

        .m-3 {
            margin: 1rem !important
        }

        .m-4 {
            margin: 1.5rem !important
        }

        .m-5 {
            margin: 3rem !important
        }

        .m-auto {
            margin: auto !important
        }

        .mx-0 {
            margin-right: 0 !important;
            margin-left: 0 !important
        }

        .mx-1 {
            margin-right: .25rem !important;
            margin-left: .25rem !important
        }

        .mx-2 {
            margin-right: .5rem !important;
            margin-left: .5rem !important
        }

        .mx-3 {
            margin-right: 1rem !important;
            margin-left: 1rem !important
        }

        .mx-4 {
            margin-right: 1.5rem !important;
            margin-left: 1.5rem !important
        }

        .mx-5 {
            margin-right: 3rem !important;
            margin-left: 3rem !important
        }

        .mx-auto {
            margin-right: auto !important;
            margin-left: auto !important
        }

        .my-0 {
            margin-top: 0 !important;
            margin-bottom: 0 !important
        }

        .my-1 {
            margin-top: .25rem !important;
            margin-bottom: .25rem !important
        }

        .my-2 {
            margin-top: .5rem !important;
            margin-bottom: .5rem !important
        }

        .my-3 {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important
        }

        .my-4 {
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important
        }

        .my-5 {
            margin-top: 3rem !important;
            margin-bottom: 3rem !important
        }

        .my-auto {
            margin-top: auto !important;
            margin-bottom: auto !important
        }

        .mt-0 {
            margin-top: 0 !important
        }

        .mt-1 {
            margin-top: .25rem !important
        }

        .mt-2 {
            margin-top: .5rem !important
        }

        .mt-3 {
            margin-top: 1rem !important
        }

        .mt-4 {
            margin-top: 1.5rem !important
        }

        .mt-5 {
            margin-top: 3rem !important
        }

        .mt-auto {
            margin-top: auto !important
        }

        .me-0 {
            margin-right: 0 !important
        }

        .me-1 {
            margin-right: .25rem !important
        }

        .me-2 {
            margin-right: .5rem !important
        }

        .me-3 {
            margin-right: 1rem !important
        }

        .me-4 {
            margin-right: 1.5rem !important
        }

        .me-5 {
            margin-right: 3rem !important
        }

        .me-auto {
            margin-right: auto !important
        }

        .mb-0 {
            margin-bottom: 0 !important
        }

        .mb-1 {
            margin-bottom: .25rem !important
        }

        .mb-2 {
            margin-bottom: .5rem !important
        }

        .mb-3 {
            margin-bottom: 1rem !important
        }

        .mb-4 {
            margin-bottom: 1.5rem !important
        }

        .mb-5 {
            margin-bottom: 3rem !important
        }

        .mb-auto {
            margin-bottom: auto !important
        }

        .ms-0 {
            margin-left: 0 !important
        }

        .ms-1 {
            margin-left: .25rem !important
        }

        .ms-2 {
            margin-left: .5rem !important
        }

        .ms-3 {
            margin-left: 1rem !important
        }

        .ms-4 {
            margin-left: 1.5rem !important
        }

        .ms-5 {
            margin-left: 3rem !important
        }

        .ms-auto {
            margin-left: auto !important
        }

        .p-0 {
            padding: 0 !important
        }

        .p-1 {
            padding: .25rem !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .p-3 {
            padding: 1rem !important
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .p-5 {
            padding: 3rem !important
        }

        .px-0 {
            padding-right: 0 !important;
            padding-left: 0 !important
        }

        .px-1 {
            padding-right: .25rem !important;
            padding-left: .25rem !important
        }

        .px-2 {
            padding-right: .5rem !important;
            padding-left: .5rem !important
        }

        .px-3 {
            padding-right: 1rem !important;
            padding-left: 1rem !important
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important
        }

        .px-5 {
            padding-right: 3rem !important;
            padding-left: 3rem !important
        }

        .py-0 {
            padding-top: 0 !important;
            padding-bottom: 0 !important
        }

        .py-1 {
            padding-top: .25rem !important;
            padding-bottom: .25rem !important
        }

        .py-2 {
            padding-top: .5rem !important;
            padding-bottom: .5rem !important
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important
        }

        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important
        }

        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important
        }

        .pt-0 {
            padding-top: 0 !important
        }

        .pt-1 {
            padding-top: .25rem !important
        }

        .pt-2 {
            padding-top: .5rem !important
        }

        .pt-3 {
            padding-top: 1rem !important
        }

        .pt-4 {
            padding-top: 1.5rem !important
        }

        .pt-5 {
            padding-top: 3rem !important
        }

        .pe-0 {
            padding-right: 0 !important
        }

        .pe-1 {
            padding-right: .25rem !important
        }

        .pe-2 {
            padding-right: .5rem !important
        }

        .pe-3 {
            padding-right: 1rem !important
        }

        .pe-4 {
            padding-right: 1.5rem !important
        }

        .pe-5 {
            padding-right: 3rem !important
        }

        .pb-0 {
            padding-bottom: 0 !important
        }

        .pb-1 {
            padding-bottom: .25rem !important
        }

        .pb-2 {
            padding-bottom: .5rem !important
        }

        .pb-3 {
            padding-bottom: 1rem !important
        }

        .pb-4 {
            padding-bottom: 1.5rem !important
        }

        .pb-5 {
            padding-bottom: 3rem !important
        }

        .ps-0 {
            padding-left: 0 !important
        }

        .ps-1 {
            padding-left: .25rem !important
        }

        .ps-2 {
            padding-left: .5rem !important
        }

        .ps-3 {
            padding-left: 1rem !important
        }

        .ps-4 {
            padding-left: 1.5rem !important
        }

        .ps-5 {
            padding-left: 3rem !important
        }

        .font-monospace {
            font-family: var(--bs-font-monospace) !important
        }

        .fs-1 {
            font-size: calc(1.375rem + 1.5vw) !important
        }

        .fs-2 {
            font-size: calc(1.325rem + .9vw) !important
        }

        .fs-3 {
            font-size: calc(1.3rem + .6vw) !important
        }

        .fs-4 {
            font-size: calc(1.275rem + .3vw) !important
        }

        .fs-5 {
            font-size: 1.25rem !important
        }

        .fs-6 {
            font-size: 1rem !important
        }

        .fst-italic {
            font-style: italic !important
        }

        .fst-normal {
            font-style: normal !important
        }

        .fw-light {
            font-weight: 300 !important
        }

        .fw-lighter {
            font-weight: lighter !important
        }

        .fw-normal {
            font-weight: 400 !important
        }

        .fw-bold {
            font-weight: 700 !important
        }

        .fw-bolder {
            font-weight: bolder !important
        }

        .lh-1 {
            line-height: 1 !important
        }

        .lh-sm {
            line-height: 1.25 !important
        }

        .lh-base {
            line-height: 1.5 !important
        }

        .lh-lg {
            line-height: 2 !important
        }

        .text-start {
            text-align: left !important
        }

        .text-end {
            text-align: right !important
        }

        .text-center {
            text-align: center !important
        }

        .text-decoration-none {
            text-decoration: none !important
        }

        .text-decoration-underline {
            text-decoration: underline !important
        }

        .text-decoration-line-through {
            text-decoration: line-through !important
        }

        .text-lowercase {
            text-transform: lowercase !important
        }

        .text-uppercase {
            text-transform: uppercase !important
        }

        .text-capitalize {
            text-transform: capitalize !important
        }

        .text-wrap {
            white-space: normal !important
        }

        .text-nowrap {
            white-space: nowrap !important
        }

        .text-break {
            word-wrap: break-word !important;
            word-break: break-word !important
        }

        .text-primary {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important
        }

        .text-secondary {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) !important
        }

        .text-success {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important
        }

        .text-info {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-info-rgb), var(--bs-text-opacity)) !important
        }

        .text-warning {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-warning-rgb), var(--bs-text-opacity)) !important
        }

        .text-danger {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important
        }

        .text-light {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-light-rgb), var(--bs-text-opacity)) !important
        }

        .text-dark {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity)) !important
        }

        .text-black {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-black-rgb), var(--bs-text-opacity)) !important
        }

        .text-white {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important
        }

        .text-body {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-body-color-rgb), var(--bs-text-opacity)) !important
        }

        .text-muted {
            --bs-text-opacity: 1;
            color: #6c757d !important
        }

        .text-black-50 {
            --bs-text-opacity: 1;
            color: rgba(0, 0, 0, 0.5) !important
        }

        .text-white-50 {
            --bs-text-opacity: 1;
            color: rgba(255, 255, 255, 0.5) !important
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important
        }

        .text-opacity-25 {
            --bs-text-opacity: .25
        }

        .text-opacity-50 {
            --bs-text-opacity: .5
        }

        .text-opacity-75 {
            --bs-text-opacity: .75
        }

        .text-opacity-100 {
            --bs-text-opacity: 1
        }

        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-secondary {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-secondary-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-success {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-info {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-info-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-warning {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-danger {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-light {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-dark {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-black {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-black-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-white {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-body {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-body-bg-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-transparent {
            --bs-bg-opacity: 1;
            background-color: rgba(0, 0, 0, 0) !important
        }

        .bg-opacity-10 {
            --bs-bg-opacity: .1
        }

        .bg-opacity-25 {
            --bs-bg-opacity: .25
        }

        .bg-opacity-50 {
            --bs-bg-opacity: .5
        }

        .bg-opacity-75 {
            --bs-bg-opacity: .75
        }

        .bg-opacity-100 {
            --bs-bg-opacity: 1
        }

        .bg-gradient {
            background-image: var(--bs-gradient) !important
        }

        .user-select-all {
            -webkit-user-select: all !important;
            -moz-user-select: all !important;
            -ms-user-select: all !important;
            user-select: all !important
        }

        .user-select-auto {
            -webkit-user-select: auto !important;
            -moz-user-select: auto !important;
            -ms-user-select: auto !important;
            user-select: auto !important
        }

        .user-select-none {
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important
        }

        .pe-none {
            pointer-events: none !important
        }

        .pe-auto {
            pointer-events: auto !important
        }

        .rounded {
            border-radius: .25rem !important
        }

        .rounded-0 {
            border-radius: 0 !important
        }

        .rounded-1 {
            border-radius: .2rem !important
        }

        .rounded-2 {
            border-radius: .25rem !important
        }

        .rounded-3 {
            border-radius: .3rem !important
        }

        .rounded-circle {
            border-radius: 50% !important
        }

        .rounded-pill {
            border-radius: 50rem !important
        }

        .rounded-top {
            border-top-left-radius: .25rem !important;
            border-top-right-radius: .25rem !important
        }

        .rounded-end {
            border-top-right-radius: .25rem !important;
            border-bottom-right-radius: .25rem !important
        }

        .rounded-bottom {
            border-bottom-right-radius: .25rem !important;
            border-bottom-left-radius: .25rem !important
        }

        .rounded-start {
            border-bottom-left-radius: .25rem !important;
            border-top-left-radius: .25rem !important
        }

        .visible {
            visibility: visible !important
        }

        .invisible {
            visibility: hidden !important
        }

        @media (min-width: 576px) {
            .float-sm-start {
                float: left !important
            }

            .float-sm-end {
                float: right !important
            }

            .float-sm-none {
                float: none !important
            }

            .d-sm-inline {
                display: inline !important
            }

            .d-sm-inline-block {
                display: inline-block !important
            }

            .d-sm-block {
                display: block !important
            }

            .d-sm-grid {
                display: grid !important
            }

            .d-sm-table {
                display: table !important
            }

            .d-sm-table-row {
                display: table-row !important
            }

            .d-sm-table-cell {
                display: table-cell !important
            }

            .d-sm-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-sm-inline-flex {
                display: -webkit-inline-box !important;
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }

            .d-sm-none {
                display: none !important
            }

            .flex-sm-fill {
                -webkit-box-flex: 1 !important;
                -ms-flex: 1 1 auto !important;
                flex: 1 1 auto !important
            }

            .flex-sm-row {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-sm-column {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-sm-row-reverse {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-sm-column-reverse {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-sm-grow-0 {
                -webkit-box-flex: 0 !important;
                -ms-flex-positive: 0 !important;
                flex-grow: 0 !important
            }

            .flex-sm-grow-1 {
                -webkit-box-flex: 1 !important;
                -ms-flex-positive: 1 !important;
                flex-grow: 1 !important
            }

            .flex-sm-shrink-0 {
                -ms-flex-negative: 0 !important;
                flex-shrink: 0 !important
            }

            .flex-sm-shrink-1 {
                -ms-flex-negative: 1 !important;
                flex-shrink: 1 !important
            }

            .flex-sm-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-sm-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-sm-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .gap-sm-0 {
                gap: 0 !important
            }

            .gap-sm-1 {
                gap: .25rem !important
            }

            .gap-sm-2 {
                gap: .5rem !important
            }

            .gap-sm-3 {
                gap: 1rem !important
            }

            .gap-sm-4 {
                gap: 1.5rem !important
            }

            .gap-sm-5 {
                gap: 3rem !important
            }

            .justify-content-sm-start {
                -webkit-box-pack: start !important;
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-sm-end {
                -webkit-box-pack: end !important;
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-sm-center {
                -webkit-box-pack: center !important;
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-sm-between {
                -webkit-box-pack: justify !important;
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-sm-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .justify-content-sm-evenly {
                -webkit-box-pack: space-evenly !important;
                -ms-flex-pack: space-evenly !important;
                justify-content: space-evenly !important
            }

            .align-items-sm-start {
                -webkit-box-align: start !important;
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-sm-end {
                -webkit-box-align: end !important;
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-sm-center {
                -webkit-box-align: center !important;
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-sm-baseline {
                -webkit-box-align: baseline !important;
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-sm-stretch {
                -webkit-box-align: stretch !important;
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-sm-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-sm-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-sm-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-sm-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-sm-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-sm-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-sm-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-sm-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-sm-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-sm-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-sm-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-sm-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }

            .order-sm-first {
                -webkit-box-ordinal-group: 0 !important;
                -ms-flex-order: -1 !important;
                order: -1 !important
            }

            .order-sm-0 {
                -webkit-box-ordinal-group: 1 !important;
                -ms-flex-order: 0 !important;
                order: 0 !important
            }

            .order-sm-1 {
                -webkit-box-ordinal-group: 2 !important;
                -ms-flex-order: 1 !important;
                order: 1 !important
            }

            .order-sm-2 {
                -webkit-box-ordinal-group: 3 !important;
                -ms-flex-order: 2 !important;
                order: 2 !important
            }

            .order-sm-3 {
                -webkit-box-ordinal-group: 4 !important;
                -ms-flex-order: 3 !important;
                order: 3 !important
            }

            .order-sm-4 {
                -webkit-box-ordinal-group: 5 !important;
                -ms-flex-order: 4 !important;
                order: 4 !important
            }

            .order-sm-5 {
                -webkit-box-ordinal-group: 6 !important;
                -ms-flex-order: 5 !important;
                order: 5 !important
            }

            .order-sm-last {
                -webkit-box-ordinal-group: 7 !important;
                -ms-flex-order: 6 !important;
                order: 6 !important
            }

            .m-sm-0 {
                margin: 0 !important
            }

            .m-sm-1 {
                margin: .25rem !important
            }

            .m-sm-2 {
                margin: .5rem !important
            }

            .m-sm-3 {
                margin: 1rem !important
            }

            .m-sm-4 {
                margin: 1.5rem !important
            }

            .m-sm-5 {
                margin: 3rem !important
            }

            .m-sm-auto {
                margin: auto !important
            }

            .mx-sm-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-sm-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-sm-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-sm-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-sm-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-sm-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-sm-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-sm-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-sm-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-sm-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-sm-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-sm-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-sm-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-sm-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-sm-0 {
                margin-top: 0 !important
            }

            .mt-sm-1 {
                margin-top: .25rem !important
            }

            .mt-sm-2 {
                margin-top: .5rem !important
            }

            .mt-sm-3 {
                margin-top: 1rem !important
            }

            .mt-sm-4 {
                margin-top: 1.5rem !important
            }

            .mt-sm-5 {
                margin-top: 3rem !important
            }

            .mt-sm-auto {
                margin-top: auto !important
            }

            .me-sm-0 {
                margin-right: 0 !important
            }

            .me-sm-1 {
                margin-right: .25rem !important
            }

            .me-sm-2 {
                margin-right: .5rem !important
            }

            .me-sm-3 {
                margin-right: 1rem !important
            }

            .me-sm-4 {
                margin-right: 1.5rem !important
            }

            .me-sm-5 {
                margin-right: 3rem !important
            }

            .me-sm-auto {
                margin-right: auto !important
            }

            .mb-sm-0 {
                margin-bottom: 0 !important
            }

            .mb-sm-1 {
                margin-bottom: .25rem !important
            }

            .mb-sm-2 {
                margin-bottom: .5rem !important
            }

            .mb-sm-3 {
                margin-bottom: 1rem !important
            }

            .mb-sm-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-sm-5 {
                margin-bottom: 3rem !important
            }

            .mb-sm-auto {
                margin-bottom: auto !important
            }

            .ms-sm-0 {
                margin-left: 0 !important
            }

            .ms-sm-1 {
                margin-left: .25rem !important
            }

            .ms-sm-2 {
                margin-left: .5rem !important
            }

            .ms-sm-3 {
                margin-left: 1rem !important
            }

            .ms-sm-4 {
                margin-left: 1.5rem !important
            }

            .ms-sm-5 {
                margin-left: 3rem !important
            }

            .ms-sm-auto {
                margin-left: auto !important
            }

            .p-sm-0 {
                padding: 0 !important
            }

            .p-sm-1 {
                padding: .25rem !important
            }

            .p-sm-2 {
                padding: .5rem !important
            }

            .p-sm-3 {
                padding: 1rem !important
            }

            .p-sm-4 {
                padding: 1.5rem !important
            }

            .p-sm-5 {
                padding: 3rem !important
            }

            .px-sm-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-sm-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-sm-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-sm-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-sm-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-sm-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-sm-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-sm-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-sm-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-sm-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-sm-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-sm-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-sm-0 {
                padding-top: 0 !important
            }

            .pt-sm-1 {
                padding-top: .25rem !important
            }

            .pt-sm-2 {
                padding-top: .5rem !important
            }

            .pt-sm-3 {
                padding-top: 1rem !important
            }

            .pt-sm-4 {
                padding-top: 1.5rem !important
            }

            .pt-sm-5 {
                padding-top: 3rem !important
            }

            .pe-sm-0 {
                padding-right: 0 !important
            }

            .pe-sm-1 {
                padding-right: .25rem !important
            }

            .pe-sm-2 {
                padding-right: .5rem !important
            }

            .pe-sm-3 {
                padding-right: 1rem !important
            }

            .pe-sm-4 {
                padding-right: 1.5rem !important
            }

            .pe-sm-5 {
                padding-right: 3rem !important
            }

            .pb-sm-0 {
                padding-bottom: 0 !important
            }

            .pb-sm-1 {
                padding-bottom: .25rem !important
            }

            .pb-sm-2 {
                padding-bottom: .5rem !important
            }

            .pb-sm-3 {
                padding-bottom: 1rem !important
            }

            .pb-sm-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-sm-5 {
                padding-bottom: 3rem !important
            }

            .ps-sm-0 {
                padding-left: 0 !important
            }

            .ps-sm-1 {
                padding-left: .25rem !important
            }

            .ps-sm-2 {
                padding-left: .5rem !important
            }

            .ps-sm-3 {
                padding-left: 1rem !important
            }

            .ps-sm-4 {
                padding-left: 1.5rem !important
            }

            .ps-sm-5 {
                padding-left: 3rem !important
            }

            .text-sm-start {
                text-align: left !important
            }

            .text-sm-end {
                text-align: right !important
            }

            .text-sm-center {
                text-align: center !important
            }
        }

        @media (min-width: 768px) {
            .float-md-start {
                float: left !important
            }

            .float-md-end {
                float: right !important
            }

            .float-md-none {
                float: none !important
            }

            .d-md-inline {
                display: inline !important
            }

            .d-md-inline-block {
                display: inline-block !important
            }

            .d-md-block {
                display: block !important
            }

            .d-md-grid {
                display: grid !important
            }

            .d-md-table {
                display: table !important
            }

            .d-md-table-row {
                display: table-row !important
            }

            .d-md-table-cell {
                display: table-cell !important
            }

            .d-md-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-md-inline-flex {
                display: -webkit-inline-box !important;
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }

            .d-md-none {
                display: none !important
            }

            .flex-md-fill {
                -webkit-box-flex: 1 !important;
                -ms-flex: 1 1 auto !important;
                flex: 1 1 auto !important
            }

            .flex-md-row {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-md-column {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-md-row-reverse {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-md-column-reverse {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-md-grow-0 {
                -webkit-box-flex: 0 !important;
                -ms-flex-positive: 0 !important;
                flex-grow: 0 !important
            }

            .flex-md-grow-1 {
                -webkit-box-flex: 1 !important;
                -ms-flex-positive: 1 !important;
                flex-grow: 1 !important
            }

            .flex-md-shrink-0 {
                -ms-flex-negative: 0 !important;
                flex-shrink: 0 !important
            }

            .flex-md-shrink-1 {
                -ms-flex-negative: 1 !important;
                flex-shrink: 1 !important
            }

            .flex-md-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-md-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-md-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .gap-md-0 {
                gap: 0 !important
            }

            .gap-md-1 {
                gap: .25rem !important
            }

            .gap-md-2 {
                gap: .5rem !important
            }

            .gap-md-3 {
                gap: 1rem !important
            }

            .gap-md-4 {
                gap: 1.5rem !important
            }

            .gap-md-5 {
                gap: 3rem !important
            }

            .justify-content-md-start {
                -webkit-box-pack: start !important;
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-md-end {
                -webkit-box-pack: end !important;
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-md-center {
                -webkit-box-pack: center !important;
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-md-between {
                -webkit-box-pack: justify !important;
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-md-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .justify-content-md-evenly {
                -webkit-box-pack: space-evenly !important;
                -ms-flex-pack: space-evenly !important;
                justify-content: space-evenly !important
            }

            .align-items-md-start {
                -webkit-box-align: start !important;
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-md-end {
                -webkit-box-align: end !important;
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-md-center {
                -webkit-box-align: center !important;
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-md-baseline {
                -webkit-box-align: baseline !important;
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-md-stretch {
                -webkit-box-align: stretch !important;
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-md-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-md-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-md-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-md-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-md-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-md-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-md-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-md-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-md-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-md-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-md-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-md-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }

            .order-md-first {
                -webkit-box-ordinal-group: 0 !important;
                -ms-flex-order: -1 !important;
                order: -1 !important
            }

            .order-md-0 {
                -webkit-box-ordinal-group: 1 !important;
                -ms-flex-order: 0 !important;
                order: 0 !important
            }

            .order-md-1 {
                -webkit-box-ordinal-group: 2 !important;
                -ms-flex-order: 1 !important;
                order: 1 !important
            }

            .order-md-2 {
                -webkit-box-ordinal-group: 3 !important;
                -ms-flex-order: 2 !important;
                order: 2 !important
            }

            .order-md-3 {
                -webkit-box-ordinal-group: 4 !important;
                -ms-flex-order: 3 !important;
                order: 3 !important
            }

            .order-md-4 {
                -webkit-box-ordinal-group: 5 !important;
                -ms-flex-order: 4 !important;
                order: 4 !important
            }

            .order-md-5 {
                -webkit-box-ordinal-group: 6 !important;
                -ms-flex-order: 5 !important;
                order: 5 !important
            }

            .order-md-last {
                -webkit-box-ordinal-group: 7 !important;
                -ms-flex-order: 6 !important;
                order: 6 !important
            }

            .m-md-0 {
                margin: 0 !important
            }

            .m-md-1 {
                margin: .25rem !important
            }

            .m-md-2 {
                margin: .5rem !important
            }

            .m-md-3 {
                margin: 1rem !important
            }

            .m-md-4 {
                margin: 1.5rem !important
            }

            .m-md-5 {
                margin: 3rem !important
            }

            .m-md-auto {
                margin: auto !important
            }

            .mx-md-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-md-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-md-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-md-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-md-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-md-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-md-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-md-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-md-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-md-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-md-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-md-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-md-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-md-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-md-0 {
                margin-top: 0 !important
            }

            .mt-md-1 {
                margin-top: .25rem !important
            }

            .mt-md-2 {
                margin-top: .5rem !important
            }

            .mt-md-3 {
                margin-top: 1rem !important
            }

            .mt-md-4 {
                margin-top: 1.5rem !important
            }

            .mt-md-5 {
                margin-top: 3rem !important
            }

            .mt-md-auto {
                margin-top: auto !important
            }

            .me-md-0 {
                margin-right: 0 !important
            }

            .me-md-1 {
                margin-right: .25rem !important
            }

            .me-md-2 {
                margin-right: .5rem !important
            }

            .me-md-3 {
                margin-right: 1rem !important
            }

            .me-md-4 {
                margin-right: 1.5rem !important
            }

            .me-md-5 {
                margin-right: 3rem !important
            }

            .me-md-auto {
                margin-right: auto !important
            }

            .mb-md-0 {
                margin-bottom: 0 !important
            }

            .mb-md-1 {
                margin-bottom: .25rem !important
            }

            .mb-md-2 {
                margin-bottom: .5rem !important
            }

            .mb-md-3 {
                margin-bottom: 1rem !important
            }

            .mb-md-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-md-5 {
                margin-bottom: 3rem !important
            }

            .mb-md-auto {
                margin-bottom: auto !important
            }

            .ms-md-0 {
                margin-left: 0 !important
            }

            .ms-md-1 {
                margin-left: .25rem !important
            }

            .ms-md-2 {
                margin-left: .5rem !important
            }

            .ms-md-3 {
                margin-left: 1rem !important
            }

            .ms-md-4 {
                margin-left: 1.5rem !important
            }

            .ms-md-5 {
                margin-left: 3rem !important
            }

            .ms-md-auto {
                margin-left: auto !important
            }

            .p-md-0 {
                padding: 0 !important
            }

            .p-md-1 {
                padding: .25rem !important
            }

            .p-md-2 {
                padding: .5rem !important
            }

            .p-md-3 {
                padding: 1rem !important
            }

            .p-md-4 {
                padding: 1.5rem !important
            }

            .p-md-5 {
                padding: 3rem !important
            }

            .px-md-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-md-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-md-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-md-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-md-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-md-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-md-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-md-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-md-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-md-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-md-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-md-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-md-0 {
                padding-top: 0 !important
            }

            .pt-md-1 {
                padding-top: .25rem !important
            }

            .pt-md-2 {
                padding-top: .5rem !important
            }

            .pt-md-3 {
                padding-top: 1rem !important
            }

            .pt-md-4 {
                padding-top: 1.5rem !important
            }

            .pt-md-5 {
                padding-top: 3rem !important
            }

            .pe-md-0 {
                padding-right: 0 !important
            }

            .pe-md-1 {
                padding-right: .25rem !important
            }

            .pe-md-2 {
                padding-right: .5rem !important
            }

            .pe-md-3 {
                padding-right: 1rem !important
            }

            .pe-md-4 {
                padding-right: 1.5rem !important
            }

            .pe-md-5 {
                padding-right: 3rem !important
            }

            .pb-md-0 {
                padding-bottom: 0 !important
            }

            .pb-md-1 {
                padding-bottom: .25rem !important
            }

            .pb-md-2 {
                padding-bottom: .5rem !important
            }

            .pb-md-3 {
                padding-bottom: 1rem !important
            }

            .pb-md-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-md-5 {
                padding-bottom: 3rem !important
            }

            .ps-md-0 {
                padding-left: 0 !important
            }

            .ps-md-1 {
                padding-left: .25rem !important
            }

            .ps-md-2 {
                padding-left: .5rem !important
            }

            .ps-md-3 {
                padding-left: 1rem !important
            }

            .ps-md-4 {
                padding-left: 1.5rem !important
            }

            .ps-md-5 {
                padding-left: 3rem !important
            }

            .text-md-start {
                text-align: left !important
            }

            .text-md-end {
                text-align: right !important
            }

            .text-md-center {
                text-align: center !important
            }
        }

        @media (min-width: 992px) {
            .float-lg-start {
                float: left !important
            }

            .float-lg-end {
                float: right !important
            }

            .float-lg-none {
                float: none !important
            }

            .d-lg-inline {
                display: inline !important
            }

            .d-lg-inline-block {
                display: inline-block !important
            }

            .d-lg-block {
                display: block !important
            }

            .d-lg-grid {
                display: grid !important
            }

            .d-lg-table {
                display: table !important
            }

            .d-lg-table-row {
                display: table-row !important
            }

            .d-lg-table-cell {
                display: table-cell !important
            }

            .d-lg-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-lg-inline-flex {
                display: -webkit-inline-box !important;
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }

            .d-lg-none {
                display: none !important
            }

            .flex-lg-fill {
                -webkit-box-flex: 1 !important;
                -ms-flex: 1 1 auto !important;
                flex: 1 1 auto !important
            }

            .flex-lg-row {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-lg-column {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-lg-row-reverse {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-lg-column-reverse {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-lg-grow-0 {
                -webkit-box-flex: 0 !important;
                -ms-flex-positive: 0 !important;
                flex-grow: 0 !important
            }

            .flex-lg-grow-1 {
                -webkit-box-flex: 1 !important;
                -ms-flex-positive: 1 !important;
                flex-grow: 1 !important
            }

            .flex-lg-shrink-0 {
                -ms-flex-negative: 0 !important;
                flex-shrink: 0 !important
            }

            .flex-lg-shrink-1 {
                -ms-flex-negative: 1 !important;
                flex-shrink: 1 !important
            }

            .flex-lg-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-lg-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-lg-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .gap-lg-0 {
                gap: 0 !important
            }

            .gap-lg-1 {
                gap: .25rem !important
            }

            .gap-lg-2 {
                gap: .5rem !important
            }

            .gap-lg-3 {
                gap: 1rem !important
            }

            .gap-lg-4 {
                gap: 1.5rem !important
            }

            .gap-lg-5 {
                gap: 3rem !important
            }

            .justify-content-lg-start {
                -webkit-box-pack: start !important;
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-lg-end {
                -webkit-box-pack: end !important;
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-lg-center {
                -webkit-box-pack: center !important;
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-lg-between {
                -webkit-box-pack: justify !important;
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-lg-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .justify-content-lg-evenly {
                -webkit-box-pack: space-evenly !important;
                -ms-flex-pack: space-evenly !important;
                justify-content: space-evenly !important
            }

            .align-items-lg-start {
                -webkit-box-align: start !important;
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-lg-end {
                -webkit-box-align: end !important;
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-lg-center {
                -webkit-box-align: center !important;
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-lg-baseline {
                -webkit-box-align: baseline !important;
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-lg-stretch {
                -webkit-box-align: stretch !important;
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-lg-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-lg-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-lg-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-lg-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-lg-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-lg-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-lg-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-lg-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-lg-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-lg-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-lg-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-lg-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }

            .order-lg-first {
                -webkit-box-ordinal-group: 0 !important;
                -ms-flex-order: -1 !important;
                order: -1 !important
            }

            .order-lg-0 {
                -webkit-box-ordinal-group: 1 !important;
                -ms-flex-order: 0 !important;
                order: 0 !important
            }

            .order-lg-1 {
                -webkit-box-ordinal-group: 2 !important;
                -ms-flex-order: 1 !important;
                order: 1 !important
            }

            .order-lg-2 {
                -webkit-box-ordinal-group: 3 !important;
                -ms-flex-order: 2 !important;
                order: 2 !important
            }

            .order-lg-3 {
                -webkit-box-ordinal-group: 4 !important;
                -ms-flex-order: 3 !important;
                order: 3 !important
            }

            .order-lg-4 {
                -webkit-box-ordinal-group: 5 !important;
                -ms-flex-order: 4 !important;
                order: 4 !important
            }

            .order-lg-5 {
                -webkit-box-ordinal-group: 6 !important;
                -ms-flex-order: 5 !important;
                order: 5 !important
            }

            .order-lg-last {
                -webkit-box-ordinal-group: 7 !important;
                -ms-flex-order: 6 !important;
                order: 6 !important
            }

            .m-lg-0 {
                margin: 0 !important
            }

            .m-lg-1 {
                margin: .25rem !important
            }

            .m-lg-2 {
                margin: .5rem !important
            }

            .m-lg-3 {
                margin: 1rem !important
            }

            .m-lg-4 {
                margin: 1.5rem !important
            }

            .m-lg-5 {
                margin: 3rem !important
            }

            .m-lg-auto {
                margin: auto !important
            }

            .mx-lg-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-lg-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-lg-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-lg-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-lg-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-lg-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-lg-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-lg-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-lg-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-lg-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-lg-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-lg-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-lg-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-lg-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-lg-0 {
                margin-top: 0 !important
            }

            .mt-lg-1 {
                margin-top: .25rem !important
            }

            .mt-lg-2 {
                margin-top: .5rem !important
            }

            .mt-lg-3 {
                margin-top: 1rem !important
            }

            .mt-lg-4 {
                margin-top: 1.5rem !important
            }

            .mt-lg-5 {
                margin-top: 3rem !important
            }

            .mt-lg-auto {
                margin-top: auto !important
            }

            .me-lg-0 {
                margin-right: 0 !important
            }

            .me-lg-1 {
                margin-right: .25rem !important
            }

            .me-lg-2 {
                margin-right: .5rem !important
            }

            .me-lg-3 {
                margin-right: 1rem !important
            }

            .me-lg-4 {
                margin-right: 1.5rem !important
            }

            .me-lg-5 {
                margin-right: 3rem !important
            }

            .me-lg-auto {
                margin-right: auto !important
            }

            .mb-lg-0 {
                margin-bottom: 0 !important
            }

            .mb-lg-1 {
                margin-bottom: .25rem !important
            }

            .mb-lg-2 {
                margin-bottom: .5rem !important
            }

            .mb-lg-3 {
                margin-bottom: 1rem !important
            }

            .mb-lg-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-lg-5 {
                margin-bottom: 3rem !important
            }

            .mb-lg-auto {
                margin-bottom: auto !important
            }

            .ms-lg-0 {
                margin-left: 0 !important
            }

            .ms-lg-1 {
                margin-left: .25rem !important
            }

            .ms-lg-2 {
                margin-left: .5rem !important
            }

            .ms-lg-3 {
                margin-left: 1rem !important
            }

            .ms-lg-4 {
                margin-left: 1.5rem !important
            }

            .ms-lg-5 {
                margin-left: 3rem !important
            }

            .ms-lg-auto {
                margin-left: auto !important
            }

            .p-lg-0 {
                padding: 0 !important
            }

            .p-lg-1 {
                padding: .25rem !important
            }

            .p-lg-2 {
                padding: .5rem !important
            }

            .p-lg-3 {
                padding: 1rem !important
            }

            .p-lg-4 {
                padding: 1.5rem !important
            }

            .p-lg-5 {
                padding: 3rem !important
            }

            .px-lg-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-lg-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-lg-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-lg-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-lg-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-lg-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-lg-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-lg-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-lg-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-lg-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-lg-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-lg-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-lg-0 {
                padding-top: 0 !important
            }

            .pt-lg-1 {
                padding-top: .25rem !important
            }

            .pt-lg-2 {
                padding-top: .5rem !important
            }

            .pt-lg-3 {
                padding-top: 1rem !important
            }

            .pt-lg-4 {
                padding-top: 1.5rem !important
            }

            .pt-lg-5 {
                padding-top: 3rem !important
            }

            .pe-lg-0 {
                padding-right: 0 !important
            }

            .pe-lg-1 {
                padding-right: .25rem !important
            }

            .pe-lg-2 {
                padding-right: .5rem !important
            }

            .pe-lg-3 {
                padding-right: 1rem !important
            }

            .pe-lg-4 {
                padding-right: 1.5rem !important
            }

            .pe-lg-5 {
                padding-right: 3rem !important
            }

            .pb-lg-0 {
                padding-bottom: 0 !important
            }

            .pb-lg-1 {
                padding-bottom: .25rem !important
            }

            .pb-lg-2 {
                padding-bottom: .5rem !important
            }

            .pb-lg-3 {
                padding-bottom: 1rem !important
            }

            .pb-lg-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-lg-5 {
                padding-bottom: 3rem !important
            }

            .ps-lg-0 {
                padding-left: 0 !important
            }

            .ps-lg-1 {
                padding-left: .25rem !important
            }

            .ps-lg-2 {
                padding-left: .5rem !important
            }

            .ps-lg-3 {
                padding-left: 1rem !important
            }

            .ps-lg-4 {
                padding-left: 1.5rem !important
            }

            .ps-lg-5 {
                padding-left: 3rem !important
            }

            .text-lg-start {
                text-align: left !important
            }

            .text-lg-end {
                text-align: right !important
            }

            .text-lg-center {
                text-align: center !important
            }
        }

        @media (min-width: 1200px) {
            .float-xl-start {
                float: left !important
            }

            .float-xl-end {
                float: right !important
            }

            .float-xl-none {
                float: none !important
            }

            .d-xl-inline {
                display: inline !important
            }

            .d-xl-inline-block {
                display: inline-block !important
            }

            .d-xl-block {
                display: block !important
            }

            .d-xl-grid {
                display: grid !important
            }

            .d-xl-table {
                display: table !important
            }

            .d-xl-table-row {
                display: table-row !important
            }

            .d-xl-table-cell {
                display: table-cell !important
            }

            .d-xl-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-xl-inline-flex {
                display: -webkit-inline-box !important;
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }

            .d-xl-none {
                display: none !important
            }

            .flex-xl-fill {
                -webkit-box-flex: 1 !important;
                -ms-flex: 1 1 auto !important;
                flex: 1 1 auto !important
            }

            .flex-xl-row {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-xl-column {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-xl-row-reverse {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-xl-column-reverse {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-xl-grow-0 {
                -webkit-box-flex: 0 !important;
                -ms-flex-positive: 0 !important;
                flex-grow: 0 !important
            }

            .flex-xl-grow-1 {
                -webkit-box-flex: 1 !important;
                -ms-flex-positive: 1 !important;
                flex-grow: 1 !important
            }

            .flex-xl-shrink-0 {
                -ms-flex-negative: 0 !important;
                flex-shrink: 0 !important
            }

            .flex-xl-shrink-1 {
                -ms-flex-negative: 1 !important;
                flex-shrink: 1 !important
            }

            .flex-xl-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-xl-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-xl-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .gap-xl-0 {
                gap: 0 !important
            }

            .gap-xl-1 {
                gap: .25rem !important
            }

            .gap-xl-2 {
                gap: .5rem !important
            }

            .gap-xl-3 {
                gap: 1rem !important
            }

            .gap-xl-4 {
                gap: 1.5rem !important
            }

            .gap-xl-5 {
                gap: 3rem !important
            }

            .justify-content-xl-start {
                -webkit-box-pack: start !important;
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-xl-end {
                -webkit-box-pack: end !important;
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-xl-center {
                -webkit-box-pack: center !important;
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-xl-between {
                -webkit-box-pack: justify !important;
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-xl-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .justify-content-xl-evenly {
                -webkit-box-pack: space-evenly !important;
                -ms-flex-pack: space-evenly !important;
                justify-content: space-evenly !important
            }

            .align-items-xl-start {
                -webkit-box-align: start !important;
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-xl-end {
                -webkit-box-align: end !important;
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-xl-center {
                -webkit-box-align: center !important;
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-xl-baseline {
                -webkit-box-align: baseline !important;
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-xl-stretch {
                -webkit-box-align: stretch !important;
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-xl-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-xl-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-xl-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-xl-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-xl-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-xl-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-xl-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-xl-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-xl-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-xl-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-xl-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-xl-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }

            .order-xl-first {
                -webkit-box-ordinal-group: 0 !important;
                -ms-flex-order: -1 !important;
                order: -1 !important
            }

            .order-xl-0 {
                -webkit-box-ordinal-group: 1 !important;
                -ms-flex-order: 0 !important;
                order: 0 !important
            }

            .order-xl-1 {
                -webkit-box-ordinal-group: 2 !important;
                -ms-flex-order: 1 !important;
                order: 1 !important
            }

            .order-xl-2 {
                -webkit-box-ordinal-group: 3 !important;
                -ms-flex-order: 2 !important;
                order: 2 !important
            }

            .order-xl-3 {
                -webkit-box-ordinal-group: 4 !important;
                -ms-flex-order: 3 !important;
                order: 3 !important
            }

            .order-xl-4 {
                -webkit-box-ordinal-group: 5 !important;
                -ms-flex-order: 4 !important;
                order: 4 !important
            }

            .order-xl-5 {
                -webkit-box-ordinal-group: 6 !important;
                -ms-flex-order: 5 !important;
                order: 5 !important
            }

            .order-xl-last {
                -webkit-box-ordinal-group: 7 !important;
                -ms-flex-order: 6 !important;
                order: 6 !important
            }

            .m-xl-0 {
                margin: 0 !important
            }

            .m-xl-1 {
                margin: .25rem !important
            }

            .m-xl-2 {
                margin: .5rem !important
            }

            .m-xl-3 {
                margin: 1rem !important
            }

            .m-xl-4 {
                margin: 1.5rem !important
            }

            .m-xl-5 {
                margin: 3rem !important
            }

            .m-xl-auto {
                margin: auto !important
            }

            .mx-xl-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-xl-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-xl-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-xl-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-xl-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-xl-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-xl-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-xl-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-xl-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-xl-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-xl-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-xl-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-xl-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-xl-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-xl-0 {
                margin-top: 0 !important
            }

            .mt-xl-1 {
                margin-top: .25rem !important
            }

            .mt-xl-2 {
                margin-top: .5rem !important
            }

            .mt-xl-3 {
                margin-top: 1rem !important
            }

            .mt-xl-4 {
                margin-top: 1.5rem !important
            }

            .mt-xl-5 {
                margin-top: 3rem !important
            }

            .mt-xl-auto {
                margin-top: auto !important
            }

            .me-xl-0 {
                margin-right: 0 !important
            }

            .me-xl-1 {
                margin-right: .25rem !important
            }

            .me-xl-2 {
                margin-right: .5rem !important
            }

            .me-xl-3 {
                margin-right: 1rem !important
            }

            .me-xl-4 {
                margin-right: 1.5rem !important
            }

            .me-xl-5 {
                margin-right: 3rem !important
            }

            .me-xl-auto {
                margin-right: auto !important
            }

            .mb-xl-0 {
                margin-bottom: 0 !important
            }

            .mb-xl-1 {
                margin-bottom: .25rem !important
            }

            .mb-xl-2 {
                margin-bottom: .5rem !important
            }

            .mb-xl-3 {
                margin-bottom: 1rem !important
            }

            .mb-xl-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-xl-5 {
                margin-bottom: 3rem !important
            }

            .mb-xl-auto {
                margin-bottom: auto !important
            }

            .ms-xl-0 {
                margin-left: 0 !important
            }

            .ms-xl-1 {
                margin-left: .25rem !important
            }

            .ms-xl-2 {
                margin-left: .5rem !important
            }

            .ms-xl-3 {
                margin-left: 1rem !important
            }

            .ms-xl-4 {
                margin-left: 1.5rem !important
            }

            .ms-xl-5 {
                margin-left: 3rem !important
            }

            .ms-xl-auto {
                margin-left: auto !important
            }

            .p-xl-0 {
                padding: 0 !important
            }

            .p-xl-1 {
                padding: .25rem !important
            }

            .p-xl-2 {
                padding: .5rem !important
            }

            .p-xl-3 {
                padding: 1rem !important
            }

            .p-xl-4 {
                padding: 1.5rem !important
            }

            .p-xl-5 {
                padding: 3rem !important
            }

            .px-xl-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-xl-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-xl-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-xl-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-xl-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-xl-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-xl-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-xl-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-xl-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-xl-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-xl-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-xl-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-xl-0 {
                padding-top: 0 !important
            }

            .pt-xl-1 {
                padding-top: .25rem !important
            }

            .pt-xl-2 {
                padding-top: .5rem !important
            }

            .pt-xl-3 {
                padding-top: 1rem !important
            }

            .pt-xl-4 {
                padding-top: 1.5rem !important
            }

            .pt-xl-5 {
                padding-top: 3rem !important
            }

            .pe-xl-0 {
                padding-right: 0 !important
            }

            .pe-xl-1 {
                padding-right: .25rem !important
            }

            .pe-xl-2 {
                padding-right: .5rem !important
            }

            .pe-xl-3 {
                padding-right: 1rem !important
            }

            .pe-xl-4 {
                padding-right: 1.5rem !important
            }

            .pe-xl-5 {
                padding-right: 3rem !important
            }

            .pb-xl-0 {
                padding-bottom: 0 !important
            }

            .pb-xl-1 {
                padding-bottom: .25rem !important
            }

            .pb-xl-2 {
                padding-bottom: .5rem !important
            }

            .pb-xl-3 {
                padding-bottom: 1rem !important
            }

            .pb-xl-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-xl-5 {
                padding-bottom: 3rem !important
            }

            .ps-xl-0 {
                padding-left: 0 !important
            }

            .ps-xl-1 {
                padding-left: .25rem !important
            }

            .ps-xl-2 {
                padding-left: .5rem !important
            }

            .ps-xl-3 {
                padding-left: 1rem !important
            }

            .ps-xl-4 {
                padding-left: 1.5rem !important
            }

            .ps-xl-5 {
                padding-left: 3rem !important
            }

            .text-xl-start {
                text-align: left !important
            }

            .text-xl-end {
                text-align: right !important
            }

            .text-xl-center {
                text-align: center !important
            }
        }

        @media (min-width: 1400px) {
            .float-xxl-start {
                float: left !important
            }

            .float-xxl-end {
                float: right !important
            }

            .float-xxl-none {
                float: none !important
            }

            .d-xxl-inline {
                display: inline !important
            }

            .d-xxl-inline-block {
                display: inline-block !important
            }

            .d-xxl-block {
                display: block !important
            }

            .d-xxl-grid {
                display: grid !important
            }

            .d-xxl-table {
                display: table !important
            }

            .d-xxl-table-row {
                display: table-row !important
            }

            .d-xxl-table-cell {
                display: table-cell !important
            }

            .d-xxl-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-xxl-inline-flex {
                display: -webkit-inline-box !important;
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }

            .d-xxl-none {
                display: none !important
            }

            .flex-xxl-fill {
                -webkit-box-flex: 1 !important;
                -ms-flex: 1 1 auto !important;
                flex: 1 1 auto !important
            }

            .flex-xxl-row {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-xxl-column {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: normal !important;
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-xxl-row-reverse {
                -webkit-box-orient: horizontal !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-xxl-column-reverse {
                -webkit-box-orient: vertical !important;
                -webkit-box-direction: reverse !important;
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-xxl-grow-0 {
                -webkit-box-flex: 0 !important;
                -ms-flex-positive: 0 !important;
                flex-grow: 0 !important
            }

            .flex-xxl-grow-1 {
                -webkit-box-flex: 1 !important;
                -ms-flex-positive: 1 !important;
                flex-grow: 1 !important
            }

            .flex-xxl-shrink-0 {
                -ms-flex-negative: 0 !important;
                flex-shrink: 0 !important
            }

            .flex-xxl-shrink-1 {
                -ms-flex-negative: 1 !important;
                flex-shrink: 1 !important
            }

            .flex-xxl-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-xxl-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-xxl-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .gap-xxl-0 {
                gap: 0 !important
            }

            .gap-xxl-1 {
                gap: .25rem !important
            }

            .gap-xxl-2 {
                gap: .5rem !important
            }

            .gap-xxl-3 {
                gap: 1rem !important
            }

            .gap-xxl-4 {
                gap: 1.5rem !important
            }

            .gap-xxl-5 {
                gap: 3rem !important
            }

            .justify-content-xxl-start {
                -webkit-box-pack: start !important;
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-xxl-end {
                -webkit-box-pack: end !important;
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-xxl-center {
                -webkit-box-pack: center !important;
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-xxl-between {
                -webkit-box-pack: justify !important;
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-xxl-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .justify-content-xxl-evenly {
                -webkit-box-pack: space-evenly !important;
                -ms-flex-pack: space-evenly !important;
                justify-content: space-evenly !important
            }

            .align-items-xxl-start {
                -webkit-box-align: start !important;
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-xxl-end {
                -webkit-box-align: end !important;
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-xxl-center {
                -webkit-box-align: center !important;
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-xxl-baseline {
                -webkit-box-align: baseline !important;
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-xxl-stretch {
                -webkit-box-align: stretch !important;
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-xxl-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-xxl-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-xxl-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-xxl-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-xxl-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-xxl-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-xxl-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-xxl-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-xxl-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-xxl-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-xxl-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-xxl-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }

            .order-xxl-first {
                -webkit-box-ordinal-group: 0 !important;
                -ms-flex-order: -1 !important;
                order: -1 !important
            }

            .order-xxl-0 {
                -webkit-box-ordinal-group: 1 !important;
                -ms-flex-order: 0 !important;
                order: 0 !important
            }

            .order-xxl-1 {
                -webkit-box-ordinal-group: 2 !important;
                -ms-flex-order: 1 !important;
                order: 1 !important
            }

            .order-xxl-2 {
                -webkit-box-ordinal-group: 3 !important;
                -ms-flex-order: 2 !important;
                order: 2 !important
            }

            .order-xxl-3 {
                -webkit-box-ordinal-group: 4 !important;
                -ms-flex-order: 3 !important;
                order: 3 !important
            }

            .order-xxl-4 {
                -webkit-box-ordinal-group: 5 !important;
                -ms-flex-order: 4 !important;
                order: 4 !important
            }

            .order-xxl-5 {
                -webkit-box-ordinal-group: 6 !important;
                -ms-flex-order: 5 !important;
                order: 5 !important
            }

            .order-xxl-last {
                -webkit-box-ordinal-group: 7 !important;
                -ms-flex-order: 6 !important;
                order: 6 !important
            }

            .m-xxl-0 {
                margin: 0 !important
            }

            .m-xxl-1 {
                margin: .25rem !important
            }

            .m-xxl-2 {
                margin: .5rem !important
            }

            .m-xxl-3 {
                margin: 1rem !important
            }

            .m-xxl-4 {
                margin: 1.5rem !important
            }

            .m-xxl-5 {
                margin: 3rem !important
            }

            .m-xxl-auto {
                margin: auto !important
            }

            .mx-xxl-0 {
                margin-right: 0 !important;
                margin-left: 0 !important
            }

            .mx-xxl-1 {
                margin-right: .25rem !important;
                margin-left: .25rem !important
            }

            .mx-xxl-2 {
                margin-right: .5rem !important;
                margin-left: .5rem !important
            }

            .mx-xxl-3 {
                margin-right: 1rem !important;
                margin-left: 1rem !important
            }

            .mx-xxl-4 {
                margin-right: 1.5rem !important;
                margin-left: 1.5rem !important
            }

            .mx-xxl-5 {
                margin-right: 3rem !important;
                margin-left: 3rem !important
            }

            .mx-xxl-auto {
                margin-right: auto !important;
                margin-left: auto !important
            }

            .my-xxl-0 {
                margin-top: 0 !important;
                margin-bottom: 0 !important
            }

            .my-xxl-1 {
                margin-top: .25rem !important;
                margin-bottom: .25rem !important
            }

            .my-xxl-2 {
                margin-top: .5rem !important;
                margin-bottom: .5rem !important
            }

            .my-xxl-3 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important
            }

            .my-xxl-4 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important
            }

            .my-xxl-5 {
                margin-top: 3rem !important;
                margin-bottom: 3rem !important
            }

            .my-xxl-auto {
                margin-top: auto !important;
                margin-bottom: auto !important
            }

            .mt-xxl-0 {
                margin-top: 0 !important
            }

            .mt-xxl-1 {
                margin-top: .25rem !important
            }

            .mt-xxl-2 {
                margin-top: .5rem !important
            }

            .mt-xxl-3 {
                margin-top: 1rem !important
            }

            .mt-xxl-4 {
                margin-top: 1.5rem !important
            }

            .mt-xxl-5 {
                margin-top: 3rem !important
            }

            .mt-xxl-auto {
                margin-top: auto !important
            }

            .me-xxl-0 {
                margin-right: 0 !important
            }

            .me-xxl-1 {
                margin-right: .25rem !important
            }

            .me-xxl-2 {
                margin-right: .5rem !important
            }

            .me-xxl-3 {
                margin-right: 1rem !important
            }

            .me-xxl-4 {
                margin-right: 1.5rem !important
            }

            .me-xxl-5 {
                margin-right: 3rem !important
            }

            .me-xxl-auto {
                margin-right: auto !important
            }

            .mb-xxl-0 {
                margin-bottom: 0 !important
            }

            .mb-xxl-1 {
                margin-bottom: .25rem !important
            }

            .mb-xxl-2 {
                margin-bottom: .5rem !important
            }

            .mb-xxl-3 {
                margin-bottom: 1rem !important
            }

            .mb-xxl-4 {
                margin-bottom: 1.5rem !important
            }

            .mb-xxl-5 {
                margin-bottom: 3rem !important
            }

            .mb-xxl-auto {
                margin-bottom: auto !important
            }

            .ms-xxl-0 {
                margin-left: 0 !important
            }

            .ms-xxl-1 {
                margin-left: .25rem !important
            }

            .ms-xxl-2 {
                margin-left: .5rem !important
            }

            .ms-xxl-3 {
                margin-left: 1rem !important
            }

            .ms-xxl-4 {
                margin-left: 1.5rem !important
            }

            .ms-xxl-5 {
                margin-left: 3rem !important
            }

            .ms-xxl-auto {
                margin-left: auto !important
            }

            .p-xxl-0 {
                padding: 0 !important
            }

            .p-xxl-1 {
                padding: .25rem !important
            }

            .p-xxl-2 {
                padding: .5rem !important
            }

            .p-xxl-3 {
                padding: 1rem !important
            }

            .p-xxl-4 {
                padding: 1.5rem !important
            }

            .p-xxl-5 {
                padding: 3rem !important
            }

            .px-xxl-0 {
                padding-right: 0 !important;
                padding-left: 0 !important
            }

            .px-xxl-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important
            }

            .px-xxl-2 {
                padding-right: .5rem !important;
                padding-left: .5rem !important
            }

            .px-xxl-3 {
                padding-right: 1rem !important;
                padding-left: 1rem !important
            }

            .px-xxl-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important
            }

            .px-xxl-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important
            }

            .py-xxl-0 {
                padding-top: 0 !important;
                padding-bottom: 0 !important
            }

            .py-xxl-1 {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important
            }

            .py-xxl-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important
            }

            .py-xxl-3 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important
            }

            .py-xxl-4 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important
            }

            .py-xxl-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important
            }

            .pt-xxl-0 {
                padding-top: 0 !important
            }

            .pt-xxl-1 {
                padding-top: .25rem !important
            }

            .pt-xxl-2 {
                padding-top: .5rem !important
            }

            .pt-xxl-3 {
                padding-top: 1rem !important
            }

            .pt-xxl-4 {
                padding-top: 1.5rem !important
            }

            .pt-xxl-5 {
                padding-top: 3rem !important
            }

            .pe-xxl-0 {
                padding-right: 0 !important
            }

            .pe-xxl-1 {
                padding-right: .25rem !important
            }

            .pe-xxl-2 {
                padding-right: .5rem !important
            }

            .pe-xxl-3 {
                padding-right: 1rem !important
            }

            .pe-xxl-4 {
                padding-right: 1.5rem !important
            }

            .pe-xxl-5 {
                padding-right: 3rem !important
            }

            .pb-xxl-0 {
                padding-bottom: 0 !important
            }

            .pb-xxl-1 {
                padding-bottom: .25rem !important
            }

            .pb-xxl-2 {
                padding-bottom: .5rem !important
            }

            .pb-xxl-3 {
                padding-bottom: 1rem !important
            }

            .pb-xxl-4 {
                padding-bottom: 1.5rem !important
            }

            .pb-xxl-5 {
                padding-bottom: 3rem !important
            }

            .ps-xxl-0 {
                padding-left: 0 !important
            }

            .ps-xxl-1 {
                padding-left: .25rem !important
            }

            .ps-xxl-2 {
                padding-left: .5rem !important
            }

            .ps-xxl-3 {
                padding-left: 1rem !important
            }

            .ps-xxl-4 {
                padding-left: 1.5rem !important
            }

            .ps-xxl-5 {
                padding-left: 3rem !important
            }

            .text-xxl-start {
                text-align: left !important
            }

            .text-xxl-end {
                text-align: right !important
            }

            .text-xxl-center {
                text-align: center !important
            }
        }

        @media (min-width: 1200px) {
            .fs-1 {
                font-size: 2.5rem !important
            }

            .fs-2 {
                font-size: 2rem !important
            }

            .fs-3 {
                font-size: 1.75rem !important
            }

            .fs-4 {
                font-size: 1.5rem !important
            }
        }

        @media print {
            .d-print-inline {
                display: inline !important
            }

            .d-print-inline-block {
                display: inline-block !important
            }

            .d-print-block {
                display: block !important
            }

            .d-print-grid {
                display: grid !important
            }

            .d-print-table {
                display: table !important
            }

            .d-print-table-row {
                display: table-row !important
            }

            .d-print-table-cell {
                display: table-cell !important
            }

            .d-print-flex {
                display: -webkit-box !important;
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-print-inline-flex {
                display: -webkit-inline-box !important;
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }

            .d-print-none {
                display: none !important
            }
        }

        .fa {
            font-family: var(--fa-style-family, "Font Awesome 6 Free");
            font-weight: var(--fa-style, 900)
        }

        .fa,
        .fas,
        .fa-solid,
        .far,
        .fa-regular,
        .fal,
        .fa-light,
        .fat,
        .fa-thin,
        .fad,
        .fa-duotone,
        .fab,
        .fa-brands {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: var(--fa-display, inline-block);
            font-style: normal;
            font-variant: normal;
            line-height: 1;
            text-rendering: auto
        }

        .fa-1x {
            font-size: 1em
        }

        .fa-2x {
            font-size: 2em
        }

        .fa-3x {
            font-size: 3em
        }

        .fa-4x {
            font-size: 4em
        }

        .fa-5x {
            font-size: 5em
        }

        .fa-6x {
            font-size: 6em
        }

        .fa-7x {
            font-size: 7em
        }

        .fa-8x {
            font-size: 8em
        }

        .fa-9x {
            font-size: 9em
        }

        .fa-10x {
            font-size: 10em
        }

        .fa-2xs {
            font-size: .625em;
            line-height: .1em;
            vertical-align: .225em
        }

        .fa-xs {
            font-size: .75em;
            line-height: .08333em;
            vertical-align: .125em
        }

        .fa-sm {
            font-size: .875em;
            line-height: .07143em;
            vertical-align: .05357em
        }

        .fa-lg {
            font-size: 1.25em;
            line-height: .05em;
            vertical-align: -.075em
        }

        .fa-xl {
            font-size: 1.5em;
            line-height: .04167em;
            vertical-align: -.125em
        }

        .fa-2xl {
            font-size: 2em;
            line-height: .03125em;
            vertical-align: -.1875em
        }

        .fa-fw {
            text-align: center;
            width: 1.25em
        }

        .fa-ul {
            list-style-type: none;
            margin-left: var(--fa-li-margin, 2.5em);
            padding-left: 0
        }

        .fa-ul>li {
            position: relative
        }

        .fa-li {
            left: calc(var(--fa-li-width, 2em) * -1);
            position: absolute;
            text-align: center;
            width: var(--fa-li-width, 2em);
            line-height: inherit
        }

        .fa-border {
            border-color: var(--fa-border-color, #eee);
            border-radius: var(--fa-border-radius, .1em);
            border-style: var(--fa-border-style, solid);
            border-width: var(--fa-border-width, .08em);
            padding: var(--fa-border-padding, 0.2em 0.25em 0.15em)
        }

        .fa-pull-left {
            float: left;
            margin-right: var(--fa-pull-margin, .3em)
        }

        .fa-pull-right {
            float: right;
            margin-left: var(--fa-pull-margin, .3em)
        }

        .fa-beat {
            -webkit-animation-name: fa-beat;
            animation-name: fa-beat;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
            animation-timing-function: var(--fa-animation-timing, ease-in-out)
        }

        .fa-bounce {
            -webkit-animation-name: fa-bounce;
            animation-name: fa-bounce;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.28, 0.84, 0.42, 1));
            animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.28, 0.84, 0.42, 1))
        }

        .fa-fade {
            -webkit-animation-name: fa-fade;
            animation-name: fa-fade;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
            animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1))
        }

        .fa-beat-fade {
            -webkit-animation-name: fa-beat-fade;
            animation-name: fa-beat-fade;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
            animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1))
        }

        .fa-flip {
            -webkit-animation-name: fa-flip;
            animation-name: fa-flip;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
            animation-timing-function: var(--fa-animation-timing, ease-in-out)
        }

        .fa-shake {
            -webkit-animation-name: fa-shake;
            animation-name: fa-shake;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, linear);
            animation-timing-function: var(--fa-animation-timing, linear)
        }

        .fa-spin {
            -webkit-animation-name: fa-spin;
            animation-name: fa-spin;
            -webkit-animation-delay: var(--fa-animation-delay, 0);
            animation-delay: var(--fa-animation-delay, 0);
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 2s);
            animation-duration: var(--fa-animation-duration, 2s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, linear);
            animation-timing-function: var(--fa-animation-timing, linear)
        }

        .fa-spin-reverse {
            --fa-animation-direction: reverse
        }

        .fa-pulse,
        .fa-spin-pulse {
            -webkit-animation-name: fa-spin;
            animation-name: fa-spin;
            -webkit-animation-direction: var(--fa-animation-direction, normal);
            animation-direction: var(--fa-animation-direction, normal);
            -webkit-animation-duration: var(--fa-animation-duration, 1s);
            animation-duration: var(--fa-animation-duration, 1s);
            -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            animation-iteration-count: var(--fa-animation-iteration-count, infinite);
            -webkit-animation-timing-function: var(--fa-animation-timing, steps(8));
            animation-timing-function: var(--fa-animation-timing, steps(8))
        }

        @media (prefers-reduced-motion: reduce) {

            .fa-beat,
            .fa-bounce,
            .fa-fade,
            .fa-beat-fade,
            .fa-flip,
            .fa-pulse,
            .fa-shake,
            .fa-spin,
            .fa-spin-pulse {
                -webkit-animation-delay: -1ms;
                animation-delay: -1ms;
                -webkit-animation-duration: 1ms;
                animation-duration: 1ms;
                -webkit-animation-iteration-count: 1;
                animation-iteration-count: 1;
                -webkit-transition-delay: 0s;
                transition-delay: 0s;
                -webkit-transition-duration: 0s;
                transition-duration: 0s
            }
        }

        @-webkit-keyframes fa-beat {

            0%,
            90% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            45% {
                -webkit-transform: scale(var(--fa-beat-scale, 1.25));
                transform: scale(var(--fa-beat-scale, 1.25))
            }
        }

        @keyframes fa-beat {

            0%,
            90% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            45% {
                -webkit-transform: scale(var(--fa-beat-scale, 1.25));
                transform: scale(var(--fa-beat-scale, 1.25))
            }
        }

        @-webkit-keyframes fa-bounce {
            0% {
                -webkit-transform: scale(1, 1) translateY(0);
                transform: scale(1, 1) translateY(0)
            }

            10% {
                -webkit-transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
                transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0)
            }

            30% {
                -webkit-transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
                transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em))
            }

            50% {
                -webkit-transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
                transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0)
            }

            57% {
                -webkit-transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
                transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em))
            }

            64% {
                -webkit-transform: scale(1, 1) translateY(0);
                transform: scale(1, 1) translateY(0)
            }

            100% {
                -webkit-transform: scale(1, 1) translateY(0);
                transform: scale(1, 1) translateY(0)
            }
        }

        @keyframes fa-bounce {
            0% {
                -webkit-transform: scale(1, 1) translateY(0);
                transform: scale(1, 1) translateY(0)
            }

            10% {
                -webkit-transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
                transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0)
            }

            30% {
                -webkit-transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
                transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em))
            }

            50% {
                -webkit-transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
                transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0)
            }

            57% {
                -webkit-transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
                transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em))
            }

            64% {
                -webkit-transform: scale(1, 1) translateY(0);
                transform: scale(1, 1) translateY(0)
            }

            100% {
                -webkit-transform: scale(1, 1) translateY(0);
                transform: scale(1, 1) translateY(0)
            }
        }

        @-webkit-keyframes fa-fade {
            50% {
                opacity: var(--fa-fade-opacity, 0.4)
            }
        }

        @keyframes fa-fade {
            50% {
                opacity: var(--fa-fade-opacity, 0.4)
            }
        }

        @-webkit-keyframes fa-beat-fade {

            0%,
            100% {
                opacity: var(--fa-beat-fade-opacity, 0.4);
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            50% {
                opacity: 1;
                -webkit-transform: scale(var(--fa-beat-fade-scale, 1.125));
                transform: scale(var(--fa-beat-fade-scale, 1.125))
            }
        }

        @keyframes fa-beat-fade {

            0%,
            100% {
                opacity: var(--fa-beat-fade-opacity, 0.4);
                -webkit-transform: scale(1);
                transform: scale(1)
            }

            50% {
                opacity: 1;
                -webkit-transform: scale(var(--fa-beat-fade-scale, 1.125));
                transform: scale(var(--fa-beat-fade-scale, 1.125))
            }
        }

        @-webkit-keyframes fa-flip {
            50% {
                -webkit-transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
                transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg))
            }
        }

        @keyframes fa-flip {
            50% {
                -webkit-transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
                transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg))
            }
        }

        @-webkit-keyframes fa-shake {
            0% {
                -webkit-transform: rotate(-15deg);
                transform: rotate(-15deg)
            }

            4% {
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg)
            }

            8%,
            24% {
                -webkit-transform: rotate(-18deg);
                transform: rotate(-18deg)
            }

            12%,
            28% {
                -webkit-transform: rotate(18deg);
                transform: rotate(18deg)
            }

            16% {
                -webkit-transform: rotate(-22deg);
                transform: rotate(-22deg)
            }

            20% {
                -webkit-transform: rotate(22deg);
                transform: rotate(22deg)
            }

            32% {
                -webkit-transform: rotate(-12deg);
                transform: rotate(-12deg)
            }

            36% {
                -webkit-transform: rotate(12deg);
                transform: rotate(12deg)
            }

            40%,
            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
        }

        @keyframes fa-shake {
            0% {
                -webkit-transform: rotate(-15deg);
                transform: rotate(-15deg)
            }

            4% {
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg)
            }

            8%,
            24% {
                -webkit-transform: rotate(-18deg);
                transform: rotate(-18deg)
            }

            12%,
            28% {
                -webkit-transform: rotate(18deg);
                transform: rotate(18deg)
            }

            16% {
                -webkit-transform: rotate(-22deg);
                transform: rotate(-22deg)
            }

            20% {
                -webkit-transform: rotate(22deg);
                transform: rotate(22deg)
            }

            32% {
                -webkit-transform: rotate(-12deg);
                transform: rotate(-12deg)
            }

            36% {
                -webkit-transform: rotate(12deg);
                transform: rotate(12deg)
            }

            40%,
            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
        }

        @-webkit-keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        .fa-rotate-90 {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .fa-rotate-180 {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .fa-rotate-270 {
            -webkit-transform: rotate(270deg);
            transform: rotate(270deg)
        }

        .fa-flip-horizontal {
            -webkit-transform: scale(-1, 1);
            transform: scale(-1, 1)
        }

        .fa-flip-vertical {
            -webkit-transform: scale(1, -1);
            transform: scale(1, -1)
        }

        .fa-flip-both,
        .fa-flip-horizontal.fa-flip-vertical {
            -webkit-transform: scale(-1, -1);
            transform: scale(-1, -1)
        }

        .fa-rotate-by {
            -webkit-transform: rotate(var(--fa-rotate-angle, none));
            transform: rotate(var(--fa-rotate-angle, none))
        }

        .fa-stack {
            display: inline-block;
            height: 2em;
            line-height: 2em;
            position: relative;
            vertical-align: middle;
            width: 2.5em
        }

        .fa-stack-1x,
        .fa-stack-2x {
            left: 0;
            position: absolute;
            text-align: center;
            width: 100%;
            z-index: var(--fa-stack-z-index, auto)
        }

        .fa-stack-1x {
            line-height: inherit
        }

        .fa-stack-2x {
            font-size: 2em
        }

        .fa-inverse {
            color: var(--fa-inverse, #fff)
        }

        .fa-0::before {
            content: "\30"
        }

        .fa-1::before {
            content: "\31"
        }

        .fa-2::before {
            content: "\32"
        }

        .fa-3::before {
            content: "\33"
        }

        .fa-4::before {
            content: "\34"
        }

        .fa-5::before {
            content: "\35"
        }

        .fa-6::before {
            content: "\36"
        }

        .fa-7::before {
            content: "\37"
        }

        .fa-8::before {
            content: "\38"
        }

        .fa-9::before {
            content: "\39"
        }

        .fa-a::before {
            content: "\41"
        }

        .fa-address-book::before {
            content: "\f2b9"
        }

        .fa-contact-book::before {
            content: "\f2b9"
        }

        .fa-address-card::before {
            content: "\f2bb"
        }

        .fa-contact-card::before {
            content: "\f2bb"
        }

        .fa-vcard::before {
            content: "\f2bb"
        }

        .fa-align-center::before {
            content: "\f037"
        }

        .fa-align-justify::before {
            content: "\f039"
        }

        .fa-align-left::before {
            content: "\f036"
        }

        .fa-align-right::before {
            content: "\f038"
        }

        .fa-anchor::before {
            content: "\f13d"
        }

        .fa-angle-down::before {
            content: "\f107"
        }

        .fa-angle-left::before {
            content: "\f104"
        }

        .fa-angle-right::before {
            content: "\f105"
        }

        .fa-angle-up::before {
            content: "\f106"
        }

        .fa-angles-down::before {
            content: "\f103"
        }

        .fa-angle-double-down::before {
            content: "\f103"
        }

        .fa-angles-left::before {
            content: "\f100"
        }

        .fa-angle-double-left::before {
            content: "\f100"
        }

        .fa-angles-right::before {
            content: "\f101"
        }

        .fa-angle-double-right::before {
            content: "\f101"
        }

        .fa-angles-up::before {
            content: "\f102"
        }

        .fa-angle-double-up::before {
            content: "\f102"
        }

        .fa-ankh::before {
            content: "\f644"
        }

        .fa-apple-whole::before {
            content: "\f5d1"
        }

        .fa-apple-alt::before {
            content: "\f5d1"
        }

        .fa-archway::before {
            content: "\f557"
        }

        .fa-arrow-down::before {
            content: "\f063"
        }

        .fa-arrow-down-1-9::before {
            content: "\f162"
        }

        .fa-sort-numeric-asc::before {
            content: "\f162"
        }

        .fa-sort-numeric-down::before {
            content: "\f162"
        }

        .fa-arrow-down-9-1::before {
            content: "\f886"
        }

        .fa-sort-numeric-desc::before {
            content: "\f886"
        }

        .fa-sort-numeric-down-alt::before {
            content: "\f886"
        }

        .fa-arrow-down-a-z::before {
            content: "\f15d"
        }

        .fa-sort-alpha-asc::before {
            content: "\f15d"
        }

        .fa-sort-alpha-down::before {
            content: "\f15d"
        }

        .fa-arrow-down-long::before {
            content: "\f175"
        }

        .fa-long-arrow-down::before {
            content: "\f175"
        }

        .fa-arrow-down-short-wide::before {
            content: "\f884"
        }

        .fa-sort-amount-desc::before {
            content: "\f884"
        }

        .fa-sort-amount-down-alt::before {
            content: "\f884"
        }

        .fa-arrow-down-wide-short::before {
            content: "\f160"
        }

        .fa-sort-amount-asc::before {
            content: "\f160"
        }

        .fa-sort-amount-down::before {
            content: "\f160"
        }

        .fa-arrow-down-z-a::before {
            content: "\f881"
        }

        .fa-sort-alpha-desc::before {
            content: "\f881"
        }

        .fa-sort-alpha-down-alt::before {
            content: "\f881"
        }

        .fa-arrow-left::before {
            content: "\f060"
        }

        .fa-arrow-left-long::before {
            content: "\f177"
        }

        .fa-long-arrow-left::before {
            content: "\f177"
        }

        .fa-arrow-pointer::before {
            content: "\f245"
        }

        .fa-mouse-pointer::before {
            content: "\f245"
        }

        .fa-arrow-right::before {
            content: "\f061"
        }

        .fa-arrow-right-arrow-left::before {
            content: "\f0ec"
        }

        .fa-exchange::before {
            content: "\f0ec"
        }

        .fa-arrow-right-from-bracket::before {
            content: "\f08b"
        }

        .fa-sign-out::before {
            content: "\f08b"
        }

        .fa-arrow-right-long::before {
            content: "\f178"
        }

        .fa-long-arrow-right::before {
            content: "\f178"
        }

        .fa-arrow-right-to-bracket::before {
            content: "\f090"
        }

        .fa-sign-in::before {
            content: "\f090"
        }

        .fa-arrow-rotate-left::before {
            content: "\f0e2"
        }

        .fa-arrow-left-rotate::before {
            content: "\f0e2"
        }

        .fa-arrow-rotate-back::before {
            content: "\f0e2"
        }

        .fa-arrow-rotate-backward::before {
            content: "\f0e2"
        }

        .fa-undo::before {
            content: "\f0e2"
        }

        .fa-arrow-rotate-right::before {
            content: "\f01e"
        }

        .fa-arrow-right-rotate::before {
            content: "\f01e"
        }

        .fa-arrow-rotate-forward::before {
            content: "\f01e"
        }

        .fa-redo::before {
            content: "\f01e"
        }

        .fa-arrow-trend-down::before {
            content: "\e097"
        }

        .fa-arrow-trend-up::before {
            content: "\e098"
        }

        .fa-arrow-turn-down::before {
            content: "\f149"
        }

        .fa-level-down::before {
            content: "\f149"
        }

        .fa-arrow-turn-up::before {
            content: "\f148"
        }

        .fa-level-up::before {
            content: "\f148"
        }

        .fa-arrow-up::before {
            content: "\f062"
        }

        .fa-arrow-up-1-9::before {
            content: "\f163"
        }

        .fa-sort-numeric-up::before {
            content: "\f163"
        }

        .fa-arrow-up-9-1::before {
            content: "\f887"
        }

        .fa-sort-numeric-up-alt::before {
            content: "\f887"
        }

        .fa-arrow-up-a-z::before {
            content: "\f15e"
        }

        .fa-sort-alpha-up::before {
            content: "\f15e"
        }

        .fa-arrow-up-from-bracket::before {
            content: "\e09a"
        }

        .fa-arrow-up-long::before {
            content: "\f176"
        }

        .fa-long-arrow-up::before {
            content: "\f176"
        }

        .fa-arrow-up-right-from-square::before {
            content: "\f08e"
        }

        .fa-external-link::before {
            content: "\f08e"
        }

        .fa-arrow-up-short-wide::before {
            content: "\f885"
        }

        .fa-sort-amount-up-alt::before {
            content: "\f885"
        }

        .fa-arrow-up-wide-short::before {
            content: "\f161"
        }

        .fa-sort-amount-up::before {
            content: "\f161"
        }

        .fa-arrow-up-z-a::before {
            content: "\f882"
        }

        .fa-sort-alpha-up-alt::before {
            content: "\f882"
        }

        .fa-arrows-left-right::before {
            content: "\f07e"
        }

        .fa-arrows-h::before {
            content: "\f07e"
        }

        .fa-arrows-rotate::before {
            content: "\f021"
        }

        .fa-refresh::before {
            content: "\f021"
        }

        .fa-sync::before {
            content: "\f021"
        }

        .fa-arrows-up-down::before {
            content: "\f07d"
        }

        .fa-arrows-v::before {
            content: "\f07d"
        }

        .fa-arrows-up-down-left-right::before {
            content: "\f047"
        }

        .fa-arrows::before {
            content: "\f047"
        }

        .fa-asterisk::before {
            content: "\2a"
        }

        .fa-at::before {
            content: "\40"
        }

        .fa-atom::before {
            content: "\f5d2"
        }

        .fa-audio-description::before {
            content: "\f29e"
        }

        .fa-austral-sign::before {
            content: "\e0a9"
        }

        .fa-award::before {
            content: "\f559"
        }

        .fa-b::before {
            content: "\42"
        }

        .fa-baby::before {
            content: "\f77c"
        }

        .fa-baby-carriage::before {
            content: "\f77d"
        }

        .fa-carriage-baby::before {
            content: "\f77d"
        }

        .fa-backward::before {
            content: "\f04a"
        }

        .fa-backward-fast::before {
            content: "\f049"
        }

        .fa-fast-backward::before {
            content: "\f049"
        }

        .fa-backward-step::before {
            content: "\f048"
        }

        .fa-step-backward::before {
            content: "\f048"
        }

        .fa-bacon::before {
            content: "\f7e5"
        }

        .fa-bacteria::before {
            content: "\e059"
        }

        .fa-bacterium::before {
            content: "\e05a"
        }

        .fa-bag-shopping::before {
            content: "\f290"
        }

        .fa-shopping-bag::before {
            content: "\f290"
        }

        .fa-bahai::before {
            content: "\f666"
        }

        .fa-baht-sign::before {
            content: "\e0ac"
        }

        .fa-ban::before {
            content: "\f05e"
        }

        .fa-cancel::before {
            content: "\f05e"
        }

        .fa-ban-smoking::before {
            content: "\f54d"
        }

        .fa-smoking-ban::before {
            content: "\f54d"
        }

        .fa-bandage::before {
            content: "\f462"
        }

        .fa-band-aid::before {
            content: "\f462"
        }

        .fa-barcode::before {
            content: "\f02a"
        }

        .fa-bars::before {
            content: "\f0c9"
        }

        .fa-navicon::before {
            content: "\f0c9"
        }

        .fa-bars-progress::before {
            content: "\f828"
        }

        .fa-tasks-alt::before {
            content: "\f828"
        }

        .fa-bars-staggered::before {
            content: "\f550"
        }

        .fa-reorder::before {
            content: "\f550"
        }

        .fa-stream::before {
            content: "\f550"
        }

        .fa-baseball::before {
            content: "\f433"
        }

        .fa-baseball-ball::before {
            content: "\f433"
        }

        .fa-baseball-bat-ball::before {
            content: "\f432"
        }

        .fa-basket-shopping::before {
            content: "\f291"
        }

        .fa-shopping-basket::before {
            content: "\f291"
        }

        .fa-basketball::before {
            content: "\f434"
        }

        .fa-basketball-ball::before {
            content: "\f434"
        }

        .fa-bath::before {
            content: "\f2cd"
        }

        .fa-bathtub::before {
            content: "\f2cd"
        }

        .fa-battery-empty::before {
            content: "\f244"
        }

        .fa-battery-0::before {
            content: "\f244"
        }

        .fa-battery-full::before {
            content: "\f240"
        }

        .fa-battery::before {
            content: "\f240"
        }

        .fa-battery-5::before {
            content: "\f240"
        }

        .fa-battery-half::before {
            content: "\f242"
        }

        .fa-battery-3::before {
            content: "\f242"
        }

        .fa-battery-quarter::before {
            content: "\f243"
        }

        .fa-battery-2::before {
            content: "\f243"
        }

        .fa-battery-three-quarters::before {
            content: "\f241"
        }

        .fa-battery-4::before {
            content: "\f241"
        }

        .fa-bed::before {
            content: "\f236"
        }

        .fa-bed-pulse::before {
            content: "\f487"
        }

        .fa-procedures::before {
            content: "\f487"
        }

        .fa-beer-mug-empty::before {
            content: "\f0fc"
        }

        .fa-beer::before {
            content: "\f0fc"
        }

        .fa-bell::before {
            content: "\f0f3"
        }

        .fa-bell-concierge::before {
            content: "\f562"
        }

        .fa-concierge-bell::before {
            content: "\f562"
        }

        .fa-bell-slash::before {
            content: "\f1f6"
        }

        .fa-bezier-curve::before {
            content: "\f55b"
        }

        .fa-bicycle::before {
            content: "\f206"
        }

        .fa-binoculars::before {
            content: "\f1e5"
        }

        .fa-biohazard::before {
            content: "\f780"
        }

        .fa-bitcoin-sign::before {
            content: "\e0b4"
        }

        .fa-blender::before {
            content: "\f517"
        }

        .fa-blender-phone::before {
            content: "\f6b6"
        }

        .fa-blog::before {
            content: "\f781"
        }

        .fa-bold::before {
            content: "\f032"
        }

        .fa-bolt::before {
            content: "\f0e7"
        }

        .fa-zap::before {
            content: "\f0e7"
        }

        .fa-bolt-lightning::before {
            content: "\e0b7"
        }

        .fa-bomb::before {
            content: "\f1e2"
        }

        .fa-bone::before {
            content: "\f5d7"
        }

        .fa-bong::before {
            content: "\f55c"
        }

        .fa-book::before {
            content: "\f02d"
        }

        .fa-book-atlas::before {
            content: "\f558"
        }

        .fa-atlas::before {
            content: "\f558"
        }

        .fa-book-bible::before {
            content: "\f647"
        }

        .fa-bible::before {
            content: "\f647"
        }

        .fa-book-journal-whills::before {
            content: "\f66a"
        }

        .fa-journal-whills::before {
            content: "\f66a"
        }

        .fa-book-medical::before {
            content: "\f7e6"
        }

        .fa-book-open::before {
            content: "\f518"
        }

        .fa-book-open-reader::before {
            content: "\f5da"
        }

        .fa-book-reader::before {
            content: "\f5da"
        }

        .fa-book-quran::before {
            content: "\f687"
        }

        .fa-quran::before {
            content: "\f687"
        }

        .fa-book-skull::before {
            content: "\f6b7"
        }

        .fa-book-dead::before {
            content: "\f6b7"
        }

        .fa-bookmark::before {
            content: "\f02e"
        }

        .fa-border-all::before {
            content: "\f84c"
        }

        .fa-border-none::before {
            content: "\f850"
        }

        .fa-border-top-left::before {
            content: "\f853"
        }

        .fa-border-style::before {
            content: "\f853"
        }

        .fa-bowling-ball::before {
            content: "\f436"
        }

        .fa-box::before {
            content: "\f466"
        }

        .fa-box-archive::before {
            content: "\f187"
        }

        .fa-archive::before {
            content: "\f187"
        }

        .fa-box-open::before {
            content: "\f49e"
        }

        .fa-box-tissue::before {
            content: "\e05b"
        }

        .fa-boxes-stacked::before {
            content: "\f468"
        }

        .fa-boxes::before {
            content: "\f468"
        }

        .fa-boxes-alt::before {
            content: "\f468"
        }

        .fa-braille::before {
            content: "\f2a1"
        }

        .fa-brain::before {
            content: "\f5dc"
        }

        .fa-brazilian-real-sign::before {
            content: "\e46c"
        }

        .fa-bread-slice::before {
            content: "\f7ec"
        }

        .fa-briefcase::before {
            content: "\f0b1"
        }

        .fa-briefcase-medical::before {
            content: "\f469"
        }

        .fa-broom::before {
            content: "\f51a"
        }

        .fa-broom-ball::before {
            content: "\f458"
        }

        .fa-quidditch::before {
            content: "\f458"
        }

        .fa-quidditch-broom-ball::before {
            content: "\f458"
        }

        .fa-brush::before {
            content: "\f55d"
        }

        .fa-bug::before {
            content: "\f188"
        }

        .fa-bug-slash::before {
            content: "\e490"
        }

        .fa-building::before {
            content: "\f1ad"
        }

        .fa-building-columns::before {
            content: "\f19c"
        }

        .fa-bank::before {
            content: "\f19c"
        }

        .fa-institution::before {
            content: "\f19c"
        }

        .fa-museum::before {
            content: "\f19c"
        }

        .fa-university::before {
            content: "\f19c"
        }

        .fa-bullhorn::before {
            content: "\f0a1"
        }

        .fa-bullseye::before {
            content: "\f140"
        }

        .fa-burger::before {
            content: "\f805"
        }

        .fa-hamburger::before {
            content: "\f805"
        }

        .fa-bus::before {
            content: "\f207"
        }

        .fa-bus-simple::before {
            content: "\f55e"
        }

        .fa-bus-alt::before {
            content: "\f55e"
        }

        .fa-business-time::before {
            content: "\f64a"
        }

        .fa-briefcase-clock::before {
            content: "\f64a"
        }

        .fa-c::before {
            content: "\43"
        }

        .fa-cake-candles::before {
            content: "\f1fd"
        }

        .fa-birthday-cake::before {
            content: "\f1fd"
        }

        .fa-cake::before {
            content: "\f1fd"
        }

        .fa-calculator::before {
            content: "\f1ec"
        }

        .fa-calendar::before {
            content: "\f133"
        }

        .fa-calendar-check::before {
            content: "\f274"
        }

        .fa-calendar-day::before {
            content: "\f783"
        }

        .fa-calendar-days::before {
            content: "\f073"
        }

        .fa-calendar-alt::before {
            content: "\f073"
        }

        .fa-calendar-minus::before {
            content: "\f272"
        }

        .fa-calendar-plus::before {
            content: "\f271"
        }

        .fa-calendar-week::before {
            content: "\f784"
        }

        .fa-calendar-xmark::before {
            content: "\f273"
        }

        .fa-calendar-times::before {
            content: "\f273"
        }

        .fa-camera::before {
            content: "\f030"
        }

        .fa-camera-alt::before {
            content: "\f030"
        }

        .fa-camera-retro::before {
            content: "\f083"
        }

        .fa-camera-rotate::before {
            content: "\e0d8"
        }

        .fa-campground::before {
            content: "\f6bb"
        }

        .fa-candy-cane::before {
            content: "\f786"
        }

        .fa-cannabis::before {
            content: "\f55f"
        }

        .fa-capsules::before {
            content: "\f46b"
        }

        .fa-car::before {
            content: "\f1b9"
        }

        .fa-automobile::before {
            content: "\f1b9"
        }

        .fa-car-battery::before {
            content: "\f5df"
        }

        .fa-battery-car::before {
            content: "\f5df"
        }

        .fa-car-crash::before {
            content: "\f5e1"
        }

        .fa-car-rear::before {
            content: "\f5de"
        }

        .fa-car-alt::before {
            content: "\f5de"
        }

        .fa-car-side::before {
            content: "\f5e4"
        }

        .fa-caravan::before {
            content: "\f8ff"
        }

        .fa-caret-down::before {
            content: "\f0d7"
        }

        .fa-caret-left::before {
            content: "\f0d9"
        }

        .fa-caret-right::before {
            content: "\f0da"
        }

        .fa-caret-up::before {
            content: "\f0d8"
        }

        .fa-carrot::before {
            content: "\f787"
        }

        .fa-cart-arrow-down::before {
            content: "\f218"
        }

        .fa-cart-flatbed::before {
            content: "\f474"
        }

        .fa-dolly-flatbed::before {
            content: "\f474"
        }

        .fa-cart-flatbed-suitcase::before {
            content: "\f59d"
        }

        .fa-luggage-cart::before {
            content: "\f59d"
        }

        .fa-cart-plus::before {
            content: "\f217"
        }

        .fa-cart-shopping::before {
            content: "\f07a"
        }

        .fa-shopping-cart::before {
            content: "\f07a"
        }

        .fa-cash-register::before {
            content: "\f788"
        }

        .fa-cat::before {
            content: "\f6be"
        }

        .fa-cedi-sign::before {
            content: "\e0df"
        }

        .fa-cent-sign::before {
            content: "\e3f5"
        }

        .fa-certificate::before {
            content: "\f0a3"
        }

        .fa-chair::before {
            content: "\f6c0"
        }

        .fa-chalkboard::before {
            content: "\f51b"
        }

        .fa-blackboard::before {
            content: "\f51b"
        }

        .fa-chalkboard-user::before {
            content: "\f51c"
        }

        .fa-chalkboard-teacher::before {
            content: "\f51c"
        }

        .fa-champagne-glasses::before {
            content: "\f79f"
        }

        .fa-glass-cheers::before {
            content: "\f79f"
        }

        .fa-charging-station::before {
            content: "\f5e7"
        }

        .fa-chart-area::before {
            content: "\f1fe"
        }

        .fa-area-chart::before {
            content: "\f1fe"
        }

        .fa-chart-bar::before {
            content: "\f080"
        }

        .fa-bar-chart::before {
            content: "\f080"
        }

        .fa-chart-column::before {
            content: "\e0e3"
        }

        .fa-chart-gantt::before {
            content: "\e0e4"
        }

        .fa-chart-line::before {
            content: "\f201"
        }

        .fa-line-chart::before {
            content: "\f201"
        }

        .fa-chart-pie::before {
            content: "\f200"
        }

        .fa-pie-chart::before {
            content: "\f200"
        }

        .fa-check::before {
            content: "\f00c"
        }

        .fa-check-double::before {
            content: "\f560"
        }

        .fa-check-to-slot::before {
            content: "\f772"
        }

        .fa-vote-yea::before {
            content: "\f772"
        }

        .fa-cheese::before {
            content: "\f7ef"
        }

        .fa-chess::before {
            content: "\f439"
        }

        .fa-chess-bishop::before {
            content: "\f43a"
        }

        .fa-chess-board::before {
            content: "\f43c"
        }

        .fa-chess-king::before {
            content: "\f43f"
        }

        .fa-chess-knight::before {
            content: "\f441"
        }

        .fa-chess-pawn::before {
            content: "\f443"
        }

        .fa-chess-queen::before {
            content: "\f445"
        }

        .fa-chess-rook::before {
            content: "\f447"
        }

        .fa-chevron-down::before {
            content: "\f078"
        }

        .fa-chevron-left::before {
            content: "\f053"
        }

        .fa-chevron-right::before {
            content: "\f054"
        }

        .fa-chevron-up::before {
            content: "\f077"
        }

        .fa-child::before {
            content: "\f1ae"
        }

        .fa-church::before {
            content: "\f51d"
        }

        .fa-circle::before {
            content: "\f111"
        }

        .fa-circle-arrow-down::before {
            content: "\f0ab"
        }

        .fa-arrow-circle-down::before {
            content: "\f0ab"
        }

        .fa-circle-arrow-left::before {
            content: "\f0a8"
        }

        .fa-arrow-circle-left::before {
            content: "\f0a8"
        }

        .fa-circle-arrow-right::before {
            content: "\f0a9"
        }

        .fa-arrow-circle-right::before {
            content: "\f0a9"
        }

        .fa-circle-arrow-up::before {
            content: "\f0aa"
        }

        .fa-arrow-circle-up::before {
            content: "\f0aa"
        }

        .fa-circle-check::before {
            content: "\f058"
        }

        .fa-check-circle::before {
            content: "\f058"
        }

        .fa-circle-chevron-down::before {
            content: "\f13a"
        }

        .fa-chevron-circle-down::before {
            content: "\f13a"
        }

        .fa-circle-chevron-left::before {
            content: "\f137"
        }

        .fa-chevron-circle-left::before {
            content: "\f137"
        }

        .fa-circle-chevron-right::before {
            content: "\f138"
        }

        .fa-chevron-circle-right::before {
            content: "\f138"
        }

        .fa-circle-chevron-up::before {
            content: "\f139"
        }

        .fa-chevron-circle-up::before {
            content: "\f139"
        }

        .fa-circle-dollar-to-slot::before {
            content: "\f4b9"
        }

        .fa-donate::before {
            content: "\f4b9"
        }

        .fa-circle-dot::before {
            content: "\f192"
        }

        .fa-dot-circle::before {
            content: "\f192"
        }

        .fa-circle-down::before {
            content: "\f358"
        }

        .fa-arrow-alt-circle-down::before {
            content: "\f358"
        }

        .fa-circle-exclamation::before {
            content: "\f06a"
        }

        .fa-exclamation-circle::before {
            content: "\f06a"
        }

        .fa-circle-h::before {
            content: "\f47e"
        }

        .fa-hospital-symbol::before {
            content: "\f47e"
        }

        .fa-circle-half-stroke::before {
            content: "\f042"
        }

        .fa-adjust::before {
            content: "\f042"
        }

        .fa-circle-info::before {
            content: "\f05a"
        }

        .fa-info-circle::before {
            content: "\f05a"
        }

        .fa-circle-left::before {
            content: "\f359"
        }

        .fa-arrow-alt-circle-left::before {
            content: "\f359"
        }

        .fa-circle-minus::before {
            content: "\f056"
        }

        .fa-minus-circle::before {
            content: "\f056"
        }

        .fa-circle-notch::before {
            content: "\f1ce"
        }

        .fa-circle-pause::before {
            content: "\f28b"
        }

        .fa-pause-circle::before {
            content: "\f28b"
        }

        .fa-circle-play::before {
            content: "\f144"
        }

        .fa-play-circle::before {
            content: "\f144"
        }

        .fa-circle-plus::before {
            content: "\f055"
        }

        .fa-plus-circle::before {
            content: "\f055"
        }

        .fa-circle-question::before {
            content: "\f059"
        }

        .fa-question-circle::before {
            content: "\f059"
        }

        .fa-circle-radiation::before {
            content: "\f7ba"
        }

        .fa-radiation-alt::before {
            content: "\f7ba"
        }

        .fa-circle-right::before {
            content: "\f35a"
        }

        .fa-arrow-alt-circle-right::before {
            content: "\f35a"
        }

        .fa-circle-stop::before {
            content: "\f28d"
        }

        .fa-stop-circle::before {
            content: "\f28d"
        }

        .fa-circle-up::before {
            content: "\f35b"
        }

        .fa-arrow-alt-circle-up::before {
            content: "\f35b"
        }

        .fa-circle-user::before {
            content: "\f2bd"
        }

        .fa-user-circle::before {
            content: "\f2bd"
        }

        .fa-circle-xmark::before {
            content: "\f057"
        }

        .fa-times-circle::before {
            content: "\f057"
        }

        .fa-xmark-circle::before {
            content: "\f057"
        }

        .fa-city::before {
            content: "\f64f"
        }

        .fa-clapperboard::before {
            content: "\e131"
        }

        .fa-clipboard::before {
            content: "\f328"
        }

        .fa-clipboard-check::before {
            content: "\f46c"
        }

        .fa-clipboard-list::before {
            content: "\f46d"
        }

        .fa-clock::before {
            content: "\f017"
        }

        .fa-clock-four::before {
            content: "\f017"
        }

        .fa-clock-rotate-left::before {
            content: "\f1da"
        }

        .fa-history::before {
            content: "\f1da"
        }

        .fa-clone::before {
            content: "\f24d"
        }

        .fa-closed-captioning::before {
            content: "\f20a"
        }

        .fa-cloud::before {
            content: "\f0c2"
        }

        .fa-cloud-arrow-down::before {
            content: "\f0ed"
        }

        .fa-cloud-download::before {
            content: "\f0ed"
        }

        .fa-cloud-download-alt::before {
            content: "\f0ed"
        }

        .fa-cloud-arrow-up::before {
            content: "\f0ee"
        }

        .fa-cloud-upload::before {
            content: "\f0ee"
        }

        .fa-cloud-upload-alt::before {
            content: "\f0ee"
        }

        .fa-cloud-meatball::before {
            content: "\f73b"
        }

        .fa-cloud-moon::before {
            content: "\f6c3"
        }

        .fa-cloud-moon-rain::before {
            content: "\f73c"
        }

        .fa-cloud-rain::before {
            content: "\f73d"
        }

        .fa-cloud-showers-heavy::before {
            content: "\f740"
        }

        .fa-cloud-sun::before {
            content: "\f6c4"
        }

        .fa-cloud-sun-rain::before {
            content: "\f743"
        }

        .fa-clover::before {
            content: "\e139"
        }

        .fa-code::before {
            content: "\f121"
        }

        .fa-code-branch::before {
            content: "\f126"
        }

        .fa-code-commit::before {
            content: "\f386"
        }

        .fa-code-compare::before {
            content: "\e13a"
        }

        .fa-code-fork::before {
            content: "\e13b"
        }

        .fa-code-merge::before {
            content: "\f387"
        }

        .fa-code-pull-request::before {
            content: "\e13c"
        }

        .fa-coins::before {
            content: "\f51e"
        }

        .fa-colon-sign::before {
            content: "\e140"
        }

        .fa-comment::before {
            content: "\f075"
        }

        .fa-comment-dollar::before {
            content: "\f651"
        }

        .fa-comment-dots::before {
            content: "\f4ad"
        }

        .fa-commenting::before {
            content: "\f4ad"
        }

        .fa-comment-medical::before {
            content: "\f7f5"
        }

        .fa-comment-slash::before {
            content: "\f4b3"
        }

        .fa-comment-sms::before {
            content: "\f7cd"
        }

        .fa-sms::before {
            content: "\f7cd"
        }

        .fa-comments::before {
            content: "\f086"
        }

        .fa-comments-dollar::before {
            content: "\f653"
        }

        .fa-compact-disc::before {
            content: "\f51f"
        }

        .fa-compass::before {
            content: "\f14e"
        }

        .fa-compass-drafting::before {
            content: "\f568"
        }

        .fa-drafting-compass::before {
            content: "\f568"
        }

        .fa-compress::before {
            content: "\f066"
        }

        .fa-computer-mouse::before {
            content: "\f8cc"
        }

        .fa-mouse::before {
            content: "\f8cc"
        }

        .fa-cookie::before {
            content: "\f563"
        }

        .fa-cookie-bite::before {
            content: "\f564"
        }

        .fa-copy::before {
            content: "\f0c5"
        }

        .fa-copyright::before {
            content: "\f1f9"
        }

        .fa-couch::before {
            content: "\f4b8"
        }

        .fa-credit-card::before {
            content: "\f09d"
        }

        .fa-credit-card-alt::before {
            content: "\f09d"
        }

        .fa-crop::before {
            content: "\f125"
        }

        .fa-crop-simple::before {
            content: "\f565"
        }

        .fa-crop-alt::before {
            content: "\f565"
        }

        .fa-cross::before {
            content: "\f654"
        }

        .fa-crosshairs::before {
            content: "\f05b"
        }

        .fa-crow::before {
            content: "\f520"
        }

        .fa-crown::before {
            content: "\f521"
        }

        .fa-crutch::before {
            content: "\f7f7"
        }

        .fa-cruzeiro-sign::before {
            content: "\e152"
        }

        .fa-cube::before {
            content: "\f1b2"
        }

        .fa-cubes::before {
            content: "\f1b3"
        }

        .fa-d::before {
            content: "\44"
        }

        .fa-database::before {
            content: "\f1c0"
        }

        .fa-delete-left::before {
            content: "\f55a"
        }

        .fa-backspace::before {
            content: "\f55a"
        }

        .fa-democrat::before {
            content: "\f747"
        }

        .fa-desktop::before {
            content: "\f390"
        }

        .fa-desktop-alt::before {
            content: "\f390"
        }

        .fa-dharmachakra::before {
            content: "\f655"
        }

        .fa-diagram-next::before {
            content: "\e476"
        }

        .fa-diagram-predecessor::before {
            content: "\e477"
        }

        .fa-diagram-project::before {
            content: "\f542"
        }

        .fa-project-diagram::before {
            content: "\f542"
        }

        .fa-diagram-successor::before {
            content: "\e47a"
        }

        .fa-diamond::before {
            content: "\f219"
        }

        .fa-diamond-turn-right::before {
            content: "\f5eb"
        }

        .fa-directions::before {
            content: "\f5eb"
        }

        .fa-dice::before {
            content: "\f522"
        }

        .fa-dice-d20::before {
            content: "\f6cf"
        }

        .fa-dice-d6::before {
            content: "\f6d1"
        }

        .fa-dice-five::before {
            content: "\f523"
        }

        .fa-dice-four::before {
            content: "\f524"
        }

        .fa-dice-one::before {
            content: "\f525"
        }

        .fa-dice-six::before {
            content: "\f526"
        }

        .fa-dice-three::before {
            content: "\f527"
        }

        .fa-dice-two::before {
            content: "\f528"
        }

        .fa-disease::before {
            content: "\f7fa"
        }

        .fa-divide::before {
            content: "\f529"
        }

        .fa-dna::before {
            content: "\f471"
        }

        .fa-dog::before {
            content: "\f6d3"
        }

        .fa-dollar-sign::before {
            content: "\24"
        }

        .fa-dollar::before {
            content: "\24"
        }

        .fa-usd::before {
            content: "\24"
        }

        .fa-dolly::before {
            content: "\f472"
        }

        .fa-dolly-box::before {
            content: "\f472"
        }

        .fa-dong-sign::before {
            content: "\e169"
        }

        .fa-door-closed::before {
            content: "\f52a"
        }

        .fa-door-open::before {
            content: "\f52b"
        }

        .fa-dove::before {
            content: "\f4ba"
        }

        .fa-down-left-and-up-right-to-center::before {
            content: "\f422"
        }

        .fa-compress-alt::before {
            content: "\f422"
        }

        .fa-down-long::before {
            content: "\f309"
        }

        .fa-long-arrow-alt-down::before {
            content: "\f309"
        }

        .fa-download::before {
            content: "\f019"
        }

        .fa-dragon::before {
            content: "\f6d5"
        }

        .fa-draw-polygon::before {
            content: "\f5ee"
        }

        .fa-droplet::before {
            content: "\f043"
        }

        .fa-tint::before {
            content: "\f043"
        }

        .fa-droplet-slash::before {
            content: "\f5c7"
        }

        .fa-tint-slash::before {
            content: "\f5c7"
        }

        .fa-drum::before {
            content: "\f569"
        }

        .fa-drum-steelpan::before {
            content: "\f56a"
        }

        .fa-drumstick-bite::before {
            content: "\f6d7"
        }

        .fa-dumbbell::before {
            content: "\f44b"
        }

        .fa-dumpster::before {
            content: "\f793"
        }

        .fa-dumpster-fire::before {
            content: "\f794"
        }

        .fa-dungeon::before {
            content: "\f6d9"
        }

        .fa-e::before {
            content: "\45"
        }

        .fa-ear-deaf::before {
            content: "\f2a4"
        }

        .fa-deaf::before {
            content: "\f2a4"
        }

        .fa-deafness::before {
            content: "\f2a4"
        }

        .fa-hard-of-hearing::before {
            content: "\f2a4"
        }

        .fa-ear-listen::before {
            content: "\f2a2"
        }

        .fa-assistive-listening-systems::before {
            content: "\f2a2"
        }

        .fa-earth-africa::before {
            content: "\f57c"
        }

        .fa-globe-africa::before {
            content: "\f57c"
        }

        .fa-earth-americas::before {
            content: "\f57d"
        }

        .fa-earth::before {
            content: "\f57d"
        }

        .fa-earth-america::before {
            content: "\f57d"
        }

        .fa-globe-americas::before {
            content: "\f57d"
        }

        .fa-earth-asia::before {
            content: "\f57e"
        }

        .fa-globe-asia::before {
            content: "\f57e"
        }

        .fa-earth-europe::before {
            content: "\f7a2"
        }

        .fa-globe-europe::before {
            content: "\f7a2"
        }

        .fa-earth-oceania::before {
            content: "\e47b"
        }

        .fa-globe-oceania::before {
            content: "\e47b"
        }

        .fa-egg::before {
            content: "\f7fb"
        }

        .fa-eject::before {
            content: "\f052"
        }

        .fa-elevator::before {
            content: "\e16d"
        }

        .fa-ellipsis::before {
            content: "\f141"
        }

        .fa-ellipsis-h::before {
            content: "\f141"
        }

        .fa-ellipsis-vertical::before {
            content: "\f142"
        }

        .fa-ellipsis-v::before {
            content: "\f142"
        }

        .fa-envelope::before {
            content: "\f0e0"
        }

        .fa-envelope-open::before {
            content: "\f2b6"
        }

        .fa-envelope-open-text::before {
            content: "\f658"
        }

        .fa-envelopes-bulk::before {
            content: "\f674"
        }

        .fa-mail-bulk::before {
            content: "\f674"
        }

        .fa-equals::before {
            content: "\3d"
        }

        .fa-eraser::before {
            content: "\f12d"
        }

        .fa-ethernet::before {
            content: "\f796"
        }

        .fa-euro-sign::before {
            content: "\f153"
        }

        .fa-eur::before {
            content: "\f153"
        }

        .fa-euro::before {
            content: "\f153"
        }

        .fa-exclamation::before {
            content: "\21"
        }

        .fa-expand::before {
            content: "\f065"
        }

        .fa-eye::before {
            content: "\f06e"
        }

        .fa-eye-dropper::before {
            content: "\f1fb"
        }

        .fa-eye-dropper-empty::before {
            content: "\f1fb"
        }

        .fa-eyedropper::before {
            content: "\f1fb"
        }

        .fa-eye-low-vision::before {
            content: "\f2a8"
        }

        .fa-low-vision::before {
            content: "\f2a8"
        }

        .fa-eye-slash::before {
            content: "\f070"
        }

        .fa-f::before {
            content: "\46"
        }

        .fa-face-angry::before {
            content: "\f556"
        }

        .fa-angry::before {
            content: "\f556"
        }

        .fa-face-dizzy::before {
            content: "\f567"
        }

        .fa-dizzy::before {
            content: "\f567"
        }

        .fa-face-flushed::before {
            content: "\f579"
        }

        .fa-flushed::before {
            content: "\f579"
        }

        .fa-face-frown::before {
            content: "\f119"
        }

        .fa-frown::before {
            content: "\f119"
        }

        .fa-face-frown-open::before {
            content: "\f57a"
        }

        .fa-frown-open::before {
            content: "\f57a"
        }

        .fa-face-grimace::before {
            content: "\f57f"
        }

        .fa-grimace::before {
            content: "\f57f"
        }

        .fa-face-grin::before {
            content: "\f580"
        }

        .fa-grin::before {
            content: "\f580"
        }

        .fa-face-grin-beam::before {
            content: "\f582"
        }

        .fa-grin-beam::before {
            content: "\f582"
        }

        .fa-face-grin-beam-sweat::before {
            content: "\f583"
        }

        .fa-grin-beam-sweat::before {
            content: "\f583"
        }

        .fa-face-grin-hearts::before {
            content: "\f584"
        }

        .fa-grin-hearts::before {
            content: "\f584"
        }

        .fa-face-grin-squint::before {
            content: "\f585"
        }

        .fa-grin-squint::before {
            content: "\f585"
        }

        .fa-face-grin-squint-tears::before {
            content: "\f586"
        }

        .fa-grin-squint-tears::before {
            content: "\f586"
        }

        .fa-face-grin-stars::before {
            content: "\f587"
        }

        .fa-grin-stars::before {
            content: "\f587"
        }

        .fa-face-grin-tears::before {
            content: "\f588"
        }

        .fa-grin-tears::before {
            content: "\f588"
        }

        .fa-face-grin-tongue::before {
            content: "\f589"
        }

        .fa-grin-tongue::before {
            content: "\f589"
        }

        .fa-face-grin-tongue-squint::before {
            content: "\f58a"
        }

        .fa-grin-tongue-squint::before {
            content: "\f58a"
        }

        .fa-face-grin-tongue-wink::before {
            content: "\f58b"
        }

        .fa-grin-tongue-wink::before {
            content: "\f58b"
        }

        .fa-face-grin-wide::before {
            content: "\f581"
        }

        .fa-grin-alt::before {
            content: "\f581"
        }

        .fa-face-grin-wink::before {
            content: "\f58c"
        }

        .fa-grin-wink::before {
            content: "\f58c"
        }

        .fa-face-kiss::before {
            content: "\f596"
        }

        .fa-kiss::before {
            content: "\f596"
        }

        .fa-face-kiss-beam::before {
            content: "\f597"
        }

        .fa-kiss-beam::before {
            content: "\f597"
        }

        .fa-face-kiss-wink-heart::before {
            content: "\f598"
        }

        .fa-kiss-wink-heart::before {
            content: "\f598"
        }

        .fa-face-laugh::before {
            content: "\f599"
        }

        .fa-laugh::before {
            content: "\f599"
        }

        .fa-face-laugh-beam::before {
            content: "\f59a"
        }

        .fa-laugh-beam::before {
            content: "\f59a"
        }

        .fa-face-laugh-squint::before {
            content: "\f59b"
        }

        .fa-laugh-squint::before {
            content: "\f59b"
        }

        .fa-face-laugh-wink::before {
            content: "\f59c"
        }

        .fa-laugh-wink::before {
            content: "\f59c"
        }

        .fa-face-meh::before {
            content: "\f11a"
        }

        .fa-meh::before {
            content: "\f11a"
        }

        .fa-face-meh-blank::before {
            content: "\f5a4"
        }

        .fa-meh-blank::before {
            content: "\f5a4"
        }

        .fa-face-rolling-eyes::before {
            content: "\f5a5"
        }

        .fa-meh-rolling-eyes::before {
            content: "\f5a5"
        }

        .fa-face-sad-cry::before {
            content: "\f5b3"
        }

        .fa-sad-cry::before {
            content: "\f5b3"
        }

        .fa-face-sad-tear::before {
            content: "\f5b4"
        }

        .fa-sad-tear::before {
            content: "\f5b4"
        }

        .fa-face-smile::before {
            content: "\f118"
        }

        .fa-smile::before {
            content: "\f118"
        }

        .fa-face-smile-beam::before {
            content: "\f5b8"
        }

        .fa-smile-beam::before {
            content: "\f5b8"
        }

        .fa-face-smile-wink::before {
            content: "\f4da"
        }

        .fa-smile-wink::before {
            content: "\f4da"
        }

        .fa-face-surprise::before {
            content: "\f5c2"
        }

        .fa-surprise::before {
            content: "\f5c2"
        }

        .fa-face-tired::before {
            content: "\f5c8"
        }

        .fa-tired::before {
            content: "\f5c8"
        }

        .fa-fan::before {
            content: "\f863"
        }

        .fa-faucet::before {
            content: "\e005"
        }

        .fa-fax::before {
            content: "\f1ac"
        }

        .fa-feather::before {
            content: "\f52d"
        }

        .fa-feather-pointed::before {
            content: "\f56b"
        }

        .fa-feather-alt::before {
            content: "\f56b"
        }

        .fa-file::before {
            content: "\f15b"
        }

        .fa-file-arrow-down::before {
            content: "\f56d"
        }

        .fa-file-download::before {
            content: "\f56d"
        }

        .fa-file-arrow-up::before {
            content: "\f574"
        }

        .fa-file-upload::before {
            content: "\f574"
        }

        .fa-file-audio::before {
            content: "\f1c7"
        }

        .fa-file-code::before {
            content: "\f1c9"
        }

        .fa-file-contract::before {
            content: "\f56c"
        }

        .fa-file-csv::before {
            content: "\f6dd"
        }

        .fa-file-excel::before {
            content: "\f1c3"
        }

        .fa-file-export::before {
            content: "\f56e"
        }

        .fa-arrow-right-from-file::before {
            content: "\f56e"
        }

        .fa-file-image::before {
            content: "\f1c5"
        }

        .fa-file-import::before {
            content: "\f56f"
        }

        .fa-arrow-right-to-file::before {
            content: "\f56f"
        }

        .fa-file-invoice::before {
            content: "\f570"
        }

        .fa-file-invoice-dollar::before {
            content: "\f571"
        }

        .fa-file-lines::before {
            content: "\f15c"
        }

        .fa-file-alt::before {
            content: "\f15c"
        }

        .fa-file-text::before {
            content: "\f15c"
        }

        .fa-file-medical::before {
            content: "\f477"
        }

        .fa-file-pdf::before {
            content: "\f1c1"
        }

        .fa-file-powerpoint::before {
            content: "\f1c4"
        }

        .fa-file-prescription::before {
            content: "\f572"
        }

        .fa-file-signature::before {
            content: "\f573"
        }

        .fa-file-video::before {
            content: "\f1c8"
        }

        .fa-file-waveform::before {
            content: "\f478"
        }

        .fa-file-medical-alt::before {
            content: "\f478"
        }

        .fa-file-word::before {
            content: "\f1c2"
        }

        .fa-file-zipper::before {
            content: "\f1c6"
        }

        .fa-file-archive::before {
            content: "\f1c6"
        }

        .fa-fill::before {
            content: "\f575"
        }

        .fa-fill-drip::before {
            content: "\f576"
        }

        .fa-film::before {
            content: "\f008"
        }

        .fa-filter::before {
            content: "\f0b0"
        }

        .fa-filter-circle-dollar::before {
            content: "\f662"
        }

        .fa-funnel-dollar::before {
            content: "\f662"
        }

        .fa-filter-circle-xmark::before {
            content: "\e17b"
        }

        .fa-fingerprint::before {
            content: "\f577"
        }

        .fa-fire::before {
            content: "\f06d"
        }

        .fa-fire-extinguisher::before {
            content: "\f134"
        }

        .fa-fire-flame-curved::before {
            content: "\f7e4"
        }

        .fa-fire-alt::before {
            content: "\f7e4"
        }

        .fa-fire-flame-simple::before {
            content: "\f46a"
        }

        .fa-burn::before {
            content: "\f46a"
        }

        .fa-fish::before {
            content: "\f578"
        }

        .fa-flag::before {
            content: "\f024"
        }

        .fa-flag-checkered::before {
            content: "\f11e"
        }

        .fa-flag-usa::before {
            content: "\f74d"
        }

        .fa-flask::before {
            content: "\f0c3"
        }

        .fa-floppy-disk::before {
            content: "\f0c7"
        }

        .fa-save::before {
            content: "\f0c7"
        }

        .fa-florin-sign::before {
            content: "\e184"
        }

        .fa-folder::before {
            content: "\f07b"
        }

        .fa-folder-minus::before {
            content: "\f65d"
        }

        .fa-folder-open::before {
            content: "\f07c"
        }

        .fa-folder-plus::before {
            content: "\f65e"
        }

        .fa-folder-tree::before {
            content: "\f802"
        }

        .fa-font::before {
            content: "\f031"
        }

        .fa-football::before {
            content: "\f44e"
        }

        .fa-football-ball::before {
            content: "\f44e"
        }

        .fa-forward::before {
            content: "\f04e"
        }

        .fa-forward-fast::before {
            content: "\f050"
        }

        .fa-fast-forward::before {
            content: "\f050"
        }

        .fa-forward-step::before {
            content: "\f051"
        }

        .fa-step-forward::before {
            content: "\f051"
        }

        .fa-franc-sign::before {
            content: "\e18f"
        }

        .fa-frog::before {
            content: "\f52e"
        }

        .fa-futbol::before {
            content: "\f1e3"
        }

        .fa-futbol-ball::before {
            content: "\f1e3"
        }

        .fa-soccer-ball::before {
            content: "\f1e3"
        }

        .fa-g::before {
            content: "\47"
        }

        .fa-gamepad::before {
            content: "\f11b"
        }

        .fa-gas-pump::before {
            content: "\f52f"
        }

        .fa-gauge::before {
            content: "\f624"
        }

        .fa-dashboard::before {
            content: "\f624"
        }

        .fa-gauge-med::before {
            content: "\f624"
        }

        .fa-tachometer-alt-average::before {
            content: "\f624"
        }

        .fa-gauge-high::before {
            content: "\f625"
        }

        .fa-tachometer-alt::before {
            content: "\f625"
        }

        .fa-tachometer-alt-fast::before {
            content: "\f625"
        }

        .fa-gauge-simple::before {
            content: "\f629"
        }

        .fa-gauge-simple-med::before {
            content: "\f629"
        }

        .fa-tachometer-average::before {
            content: "\f629"
        }

        .fa-gauge-simple-high::before {
            content: "\f62a"
        }

        .fa-tachometer::before {
            content: "\f62a"
        }

        .fa-tachometer-fast::before {
            content: "\f62a"
        }

        .fa-gavel::before {
            content: "\f0e3"
        }

        .fa-legal::before {
            content: "\f0e3"
        }

        .fa-gear::before {
            content: "\f013"
        }

        .fa-cog::before {
            content: "\f013"
        }

        .fa-gears::before {
            content: "\f085"
        }

        .fa-cogs::before {
            content: "\f085"
        }

        .fa-gem::before {
            content: "\f3a5"
        }

        .fa-genderless::before {
            content: "\f22d"
        }

        .fa-ghost::before {
            content: "\f6e2"
        }

        .fa-gift::before {
            content: "\f06b"
        }

        .fa-gifts::before {
            content: "\f79c"
        }

        .fa-glasses::before {
            content: "\f530"
        }

        .fa-globe::before {
            content: "\f0ac"
        }

        .fa-golf-ball-tee::before {
            content: "\f450"
        }

        .fa-golf-ball::before {
            content: "\f450"
        }

        .fa-gopuram::before {
            content: "\f664"
        }

        .fa-graduation-cap::before {
            content: "\f19d"
        }

        .fa-mortar-board::before {
            content: "\f19d"
        }

        .fa-greater-than::before {
            content: "\3e"
        }

        .fa-greater-than-equal::before {
            content: "\f532"
        }

        .fa-grip::before {
            content: "\f58d"
        }

        .fa-grip-horizontal::before {
            content: "\f58d"
        }

        .fa-grip-lines::before {
            content: "\f7a4"
        }

        .fa-grip-lines-vertical::before {
            content: "\f7a5"
        }

        .fa-grip-vertical::before {
            content: "\f58e"
        }

        .fa-guarani-sign::before {
            content: "\e19a"
        }

        .fa-guitar::before {
            content: "\f7a6"
        }

        .fa-gun::before {
            content: "\e19b"
        }

        .fa-h::before {
            content: "\48"
        }

        .fa-hammer::before {
            content: "\f6e3"
        }

        .fa-hamsa::before {
            content: "\f665"
        }

        .fa-hand::before {
            content: "\f256"
        }

        .fa-hand-paper::before {
            content: "\f256"
        }

        .fa-hand-back-fist::before {
            content: "\f255"
        }

        .fa-hand-rock::before {
            content: "\f255"
        }

        .fa-hand-dots::before {
            content: "\f461"
        }

        .fa-allergies::before {
            content: "\f461"
        }

        .fa-hand-fist::before {
            content: "\f6de"
        }

        .fa-fist-raised::before {
            content: "\f6de"
        }

        .fa-hand-holding::before {
            content: "\f4bd"
        }

        .fa-hand-holding-dollar::before {
            content: "\f4c0"
        }

        .fa-hand-holding-usd::before {
            content: "\f4c0"
        }

        .fa-hand-holding-droplet::before {
            content: "\f4c1"
        }

        .fa-hand-holding-water::before {
            content: "\f4c1"
        }

        .fa-hand-holding-heart::before {
            content: "\f4be"
        }

        .fa-hand-holding-medical::before {
            content: "\e05c"
        }

        .fa-hand-lizard::before {
            content: "\f258"
        }

        .fa-hand-middle-finger::before {
            content: "\f806"
        }

        .fa-hand-peace::before {
            content: "\f25b"
        }

        .fa-hand-point-down::before {
            content: "\f0a7"
        }

        .fa-hand-point-left::before {
            content: "\f0a5"
        }

        .fa-hand-point-right::before {
            content: "\f0a4"
        }

        .fa-hand-point-up::before {
            content: "\f0a6"
        }

        .fa-hand-pointer::before {
            content: "\f25a"
        }

        .fa-hand-scissors::before {
            content: "\f257"
        }

        .fa-hand-sparkles::before {
            content: "\e05d"
        }

        .fa-hand-spock::before {
            content: "\f259"
        }

        .fa-hands::before {
            content: "\f2a7"
        }

        .fa-sign-language::before {
            content: "\f2a7"
        }

        .fa-signing::before {
            content: "\f2a7"
        }

        .fa-hands-asl-interpreting::before {
            content: "\f2a3"
        }

        .fa-american-sign-language-interpreting::before {
            content: "\f2a3"
        }

        .fa-asl-interpreting::before {
            content: "\f2a3"
        }

        .fa-hands-american-sign-language-interpreting::before {
            content: "\f2a3"
        }

        .fa-hands-bubbles::before {
            content: "\e05e"
        }

        .fa-hands-wash::before {
            content: "\e05e"
        }

        .fa-hands-clapping::before {
            content: "\e1a8"
        }

        .fa-hands-holding::before {
            content: "\f4c2"
        }

        .fa-hands-praying::before {
            content: "\f684"
        }

        .fa-praying-hands::before {
            content: "\f684"
        }

        .fa-handshake::before {
            content: "\f2b5"
        }

        .fa-handshake-angle::before {
            content: "\f4c4"
        }

        .fa-hands-helping::before {
            content: "\f4c4"
        }

        .fa-handshake-simple-slash::before {
            content: "\e05f"
        }

        .fa-handshake-alt-slash::before {
            content: "\e05f"
        }

        .fa-handshake-slash::before {
            content: "\e060"
        }

        .fa-hanukiah::before {
            content: "\f6e6"
        }

        .fa-hard-drive::before {
            content: "\f0a0"
        }

        .fa-hdd::before {
            content: "\f0a0"
        }

        .fa-hashtag::before {
            content: "\23"
        }

        .fa-hat-cowboy::before {
            content: "\f8c0"
        }

        .fa-hat-cowboy-side::before {
            content: "\f8c1"
        }

        .fa-hat-wizard::before {
            content: "\f6e8"
        }

        .fa-head-side-cough::before {
            content: "\e061"
        }

        .fa-head-side-cough-slash::before {
            content: "\e062"
        }

        .fa-head-side-mask::before {
            content: "\e063"
        }

        .fa-head-side-virus::before {
            content: "\e064"
        }

        .fa-heading::before {
            content: "\f1dc"
        }

        .fa-header::before {
            content: "\f1dc"
        }

        .fa-headphones::before {
            content: "\f025"
        }

        .fa-headphones-simple::before {
            content: "\f58f"
        }

        .fa-headphones-alt::before {
            content: "\f58f"
        }

        .fa-headset::before {
            content: "\f590"
        }

        .fa-heart::before {
            content: "\f004"
        }

        .fa-heart-crack::before {
            content: "\f7a9"
        }

        .fa-heart-broken::before {
            content: "\f7a9"
        }

        .fa-heart-pulse::before {
            content: "\f21e"
        }

        .fa-heartbeat::before {
            content: "\f21e"
        }

        .fa-helicopter::before {
            content: "\f533"
        }

        .fa-helmet-safety::before {
            content: "\f807"
        }

        .fa-hard-hat::before {
            content: "\f807"
        }

        .fa-hat-hard::before {
            content: "\f807"
        }

        .fa-highlighter::before {
            content: "\f591"
        }

        .fa-hippo::before {
            content: "\f6ed"
        }

        .fa-hockey-puck::before {
            content: "\f453"
        }

        .fa-holly-berry::before {
            content: "\f7aa"
        }

        .fa-horse::before {
            content: "\f6f0"
        }

        .fa-horse-head::before {
            content: "\f7ab"
        }

        .fa-hospital::before {
            content: "\f0f8"
        }

        .fa-hospital-alt::before {
            content: "\f0f8"
        }

        .fa-hospital-wide::before {
            content: "\f0f8"
        }

        .fa-hospital-user::before {
            content: "\f80d"
        }

        .fa-hot-tub-person::before {
            content: "\f593"
        }

        .fa-hot-tub::before {
            content: "\f593"
        }

        .fa-hotdog::before {
            content: "\f80f"
        }

        .fa-hotel::before {
            content: "\f594"
        }

        .fa-hourglass::before {
            content: "\f254"
        }

        .fa-hourglass-2::before {
            content: "\f254"
        }

        .fa-hourglass-half::before {
            content: "\f254"
        }

        .fa-hourglass-empty::before {
            content: "\f252"
        }

        .fa-hourglass-end::before {
            content: "\f253"
        }

        .fa-hourglass-3::before {
            content: "\f253"
        }

        .fa-hourglass-start::before {
            content: "\f251"
        }

        .fa-hourglass-1::before {
            content: "\f251"
        }

        .fa-house::before {
            content: "\f015"
        }

        .fa-home::before {
            content: "\f015"
        }

        .fa-home-alt::before {
            content: "\f015"
        }

        .fa-home-lg-alt::before {
            content: "\f015"
        }

        .fa-house-chimney::before {
            content: "\e3af"
        }

        .fa-home-lg::before {
            content: "\e3af"
        }

        .fa-house-chimney-crack::before {
            content: "\f6f1"
        }

        .fa-house-damage::before {
            content: "\f6f1"
        }

        .fa-house-chimney-medical::before {
            content: "\f7f2"
        }

        .fa-clinic-medical::before {
            content: "\f7f2"
        }

        .fa-house-chimney-user::before {
            content: "\e065"
        }

        .fa-house-chimney-window::before {
            content: "\e00d"
        }

        .fa-house-crack::before {
            content: "\e3b1"
        }

        .fa-house-laptop::before {
            content: "\e066"
        }

        .fa-laptop-house::before {
            content: "\e066"
        }

        .fa-house-medical::before {
            content: "\e3b2"
        }

        .fa-house-user::before {
            content: "\e1b0"
        }

        .fa-home-user::before {
            content: "\e1b0"
        }

        .fa-hryvnia-sign::before {
            content: "\f6f2"
        }

        .fa-hryvnia::before {
            content: "\f6f2"
        }

        .fa-i::before {
            content: "\49"
        }

        .fa-i-cursor::before {
            content: "\f246"
        }

        .fa-ice-cream::before {
            content: "\f810"
        }

        .fa-icicles::before {
            content: "\f7ad"
        }

        .fa-icons::before {
            content: "\f86d"
        }

        .fa-heart-music-camera-bolt::before {
            content: "\f86d"
        }

        .fa-id-badge::before {
            content: "\f2c1"
        }

        .fa-id-card::before {
            content: "\f2c2"
        }

        .fa-drivers-license::before {
            content: "\f2c2"
        }

        .fa-id-card-clip::before {
            content: "\f47f"
        }

        .fa-id-card-alt::before {
            content: "\f47f"
        }

        .fa-igloo::before {
            content: "\f7ae"
        }

        .fa-image::before {
            content: "\f03e"
        }

        .fa-image-portrait::before {
            content: "\f3e0"
        }

        .fa-portrait::before {
            content: "\f3e0"
        }

        .fa-images::before {
            content: "\f302"
        }

        .fa-inbox::before {
            content: "\f01c"
        }

        .fa-indent::before {
            content: "\f03c"
        }

        .fa-indian-rupee-sign::before {
            content: "\e1bc"
        }

        .fa-indian-rupee::before {
            content: "\e1bc"
        }

        .fa-inr::before {
            content: "\e1bc"
        }

        .fa-industry::before {
            content: "\f275"
        }

        .fa-infinity::before {
            content: "\f534"
        }

        .fa-info::before {
            content: "\f129"
        }

        .fa-italic::before {
            content: "\f033"
        }

        .fa-j::before {
            content: "\4a"
        }

        .fa-jedi::before {
            content: "\f669"
        }

        .fa-jet-fighter::before {
            content: "\f0fb"
        }

        .fa-fighter-jet::before {
            content: "\f0fb"
        }

        .fa-joint::before {
            content: "\f595"
        }

        .fa-k::before {
            content: "\4b"
        }

        .fa-kaaba::before {
            content: "\f66b"
        }

        .fa-key::before {
            content: "\f084"
        }

        .fa-keyboard::before {
            content: "\f11c"
        }

        .fa-khanda::before {
            content: "\f66d"
        }

        .fa-kip-sign::before {
            content: "\e1c4"
        }

        .fa-kit-medical::before {
            content: "\f479"
        }

        .fa-first-aid::before {
            content: "\f479"
        }

        .fa-kiwi-bird::before {
            content: "\f535"
        }

        .fa-l::before {
            content: "\4c"
        }

        .fa-landmark::before {
            content: "\f66f"
        }

        .fa-language::before {
            content: "\f1ab"
        }

        .fa-laptop::before {
            content: "\f109"
        }

        .fa-laptop-code::before {
            content: "\f5fc"
        }

        .fa-laptop-medical::before {
            content: "\f812"
        }

        .fa-lari-sign::before {
            content: "\e1c8"
        }

        .fa-layer-group::before {
            content: "\f5fd"
        }

        .fa-leaf::before {
            content: "\f06c"
        }

        .fa-left-long::before {
            content: "\f30a"
        }

        .fa-long-arrow-alt-left::before {
            content: "\f30a"
        }

        .fa-left-right::before {
            content: "\f337"
        }

        .fa-arrows-alt-h::before {
            content: "\f337"
        }

        .fa-lemon::before {
            content: "\f094"
        }

        .fa-less-than::before {
            content: "\3c"
        }

        .fa-less-than-equal::before {
            content: "\f537"
        }

        .fa-life-ring::before {
            content: "\f1cd"
        }

        .fa-lightbulb::before {
            content: "\f0eb"
        }

        .fa-link::before {
            content: "\f0c1"
        }

        .fa-chain::before {
            content: "\f0c1"
        }

        .fa-link-slash::before {
            content: "\f127"
        }

        .fa-chain-broken::before {
            content: "\f127"
        }

        .fa-chain-slash::before {
            content: "\f127"
        }

        .fa-unlink::before {
            content: "\f127"
        }

        .fa-lira-sign::before {
            content: "\f195"
        }

        .fa-list::before {
            content: "\f03a"
        }

        .fa-list-squares::before {
            content: "\f03a"
        }

        .fa-list-check::before {
            content: "\f0ae"
        }

        .fa-tasks::before {
            content: "\f0ae"
        }

        .fa-list-ol::before {
            content: "\f0cb"
        }

        .fa-list-1-2::before {
            content: "\f0cb"
        }

        .fa-list-numeric::before {
            content: "\f0cb"
        }

        .fa-list-ul::before {
            content: "\f0ca"
        }

        .fa-list-dots::before {
            content: "\f0ca"
        }

        .fa-litecoin-sign::before {
            content: "\e1d3"
        }

        .fa-location-arrow::before {
            content: "\f124"
        }

        .fa-location-crosshairs::before {
            content: "\f601"
        }

        .fa-location::before {
            content: "\f601"
        }

        .fa-location-dot::before {
            content: "\f3c5"
        }

        .fa-map-marker-alt::before {
            content: "\f3c5"
        }

        .fa-location-pin::before {
            content: "\f041"
        }

        .fa-map-marker::before {
            content: "\f041"
        }

        .fa-lock::before {
            content: "\f023"
        }

        .fa-lock-open::before {
            content: "\f3c1"
        }

        .fa-lungs::before {
            content: "\f604"
        }

        .fa-lungs-virus::before {
            content: "\e067"
        }

        .fa-m::before {
            content: "\4d"
        }

        .fa-magnet::before {
            content: "\f076"
        }

        .fa-magnifying-glass::before {
            content: "\f002"
        }

        .fa-search::before {
            content: "\f002"
        }

        .fa-magnifying-glass-dollar::before {
            content: "\f688"
        }

        .fa-search-dollar::before {
            content: "\f688"
        }

        .fa-magnifying-glass-location::before {
            content: "\f689"
        }

        .fa-search-location::before {
            content: "\f689"
        }

        .fa-magnifying-glass-minus::before {
            content: "\f010"
        }

        .fa-search-minus::before {
            content: "\f010"
        }

        .fa-magnifying-glass-plus::before {
            content: "\f00e"
        }

        .fa-search-plus::before {
            content: "\f00e"
        }

        .fa-manat-sign::before {
            content: "\e1d5"
        }

        .fa-map::before {
            content: "\f279"
        }

        .fa-map-location::before {
            content: "\f59f"
        }

        .fa-map-marked::before {
            content: "\f59f"
        }

        .fa-map-location-dot::before {
            content: "\f5a0"
        }

        .fa-map-marked-alt::before {
            content: "\f5a0"
        }

        .fa-map-pin::before {
            content: "\f276"
        }

        .fa-marker::before {
            content: "\f5a1"
        }

        .fa-mars::before {
            content: "\f222"
        }

        .fa-mars-and-venus::before {
            content: "\f224"
        }

        .fa-mars-double::before {
            content: "\f227"
        }

        .fa-mars-stroke::before {
            content: "\f229"
        }

        .fa-mars-stroke-right::before {
            content: "\f22b"
        }

        .fa-mars-stroke-h::before {
            content: "\f22b"
        }

        .fa-mars-stroke-up::before {
            content: "\f22a"
        }

        .fa-mars-stroke-v::before {
            content: "\f22a"
        }

        .fa-martini-glass::before {
            content: "\f57b"
        }

        .fa-glass-martini-alt::before {
            content: "\f57b"
        }

        .fa-martini-glass-citrus::before {
            content: "\f561"
        }

        .fa-cocktail::before {
            content: "\f561"
        }

        .fa-martini-glass-empty::before {
            content: "\f000"
        }

        .fa-glass-martini::before {
            content: "\f000"
        }

        .fa-mask::before {
            content: "\f6fa"
        }

        .fa-mask-face::before {
            content: "\e1d7"
        }

        .fa-masks-theater::before {
            content: "\f630"
        }

        .fa-theater-masks::before {
            content: "\f630"
        }

        .fa-maximize::before {
            content: "\f31e"
        }

        .fa-expand-arrows-alt::before {
            content: "\f31e"
        }

        .fa-medal::before {
            content: "\f5a2"
        }

        .fa-memory::before {
            content: "\f538"
        }

        .fa-menorah::before {
            content: "\f676"
        }

        .fa-mercury::before {
            content: "\f223"
        }

        .fa-message::before {
            content: "\f27a"
        }

        .fa-comment-alt::before {
            content: "\f27a"
        }

        .fa-meteor::before {
            content: "\f753"
        }

        .fa-microchip::before {
            content: "\f2db"
        }

        .fa-microphone::before {
            content: "\f130"
        }

        .fa-microphone-lines::before {
            content: "\f3c9"
        }

        .fa-microphone-alt::before {
            content: "\f3c9"
        }

        .fa-microphone-lines-slash::before {
            content: "\f539"
        }

        .fa-microphone-alt-slash::before {
            content: "\f539"
        }

        .fa-microphone-slash::before {
            content: "\f131"
        }

        .fa-microscope::before {
            content: "\f610"
        }

        .fa-mill-sign::before {
            content: "\e1ed"
        }

        .fa-minimize::before {
            content: "\f78c"
        }

        .fa-compress-arrows-alt::before {
            content: "\f78c"
        }

        .fa-minus::before {
            content: "\f068"
        }

        .fa-subtract::before {
            content: "\f068"
        }

        .fa-mitten::before {
            content: "\f7b5"
        }

        .fa-mobile::before {
            content: "\f3ce"
        }

        .fa-mobile-android::before {
            content: "\f3ce"
        }

        .fa-mobile-phone::before {
            content: "\f3ce"
        }

        .fa-mobile-button::before {
            content: "\f10b"
        }

        .fa-mobile-screen-button::before {
            content: "\f3cd"
        }

        .fa-mobile-alt::before {
            content: "\f3cd"
        }

        .fa-money-bill::before {
            content: "\f0d6"
        }

        .fa-money-bill-1::before {
            content: "\f3d1"
        }

        .fa-money-bill-alt::before {
            content: "\f3d1"
        }

        .fa-money-bill-1-wave::before {
            content: "\f53b"
        }

        .fa-money-bill-wave-alt::before {
            content: "\f53b"
        }

        .fa-money-bill-wave::before {
            content: "\f53a"
        }

        .fa-money-check::before {
            content: "\f53c"
        }

        .fa-money-check-dollar::before {
            content: "\f53d"
        }

        .fa-money-check-alt::before {
            content: "\f53d"
        }

        .fa-monument::before {
            content: "\f5a6"
        }

        .fa-moon::before {
            content: "\f186"
        }

        .fa-mortar-pestle::before {
            content: "\f5a7"
        }

        .fa-mosque::before {
            content: "\f678"
        }

        .fa-motorcycle::before {
            content: "\f21c"
        }

        .fa-mountain::before {
            content: "\f6fc"
        }

        .fa-mug-hot::before {
            content: "\f7b6"
        }

        .fa-mug-saucer::before {
            content: "\f0f4"
        }

        .fa-coffee::before {
            content: "\f0f4"
        }

        .fa-music::before {
            content: "\f001"
        }

        .fa-n::before {
            content: "\4e"
        }

        .fa-naira-sign::before {
            content: "\e1f6"
        }

        .fa-network-wired::before {
            content: "\f6ff"
        }

        .fa-neuter::before {
            content: "\f22c"
        }

        .fa-newspaper::before {
            content: "\f1ea"
        }

        .fa-not-equal::before {
            content: "\f53e"
        }

        .fa-note-sticky::before {
            content: "\f249"
        }

        .fa-sticky-note::before {
            content: "\f249"
        }

        .fa-notes-medical::before {
            content: "\f481"
        }

        .fa-o::before {
            content: "\4f"
        }

        .fa-object-group::before {
            content: "\f247"
        }

        .fa-object-ungroup::before {
            content: "\f248"
        }

        .fa-oil-can::before {
            content: "\f613"
        }

        .fa-om::before {
            content: "\f679"
        }

        .fa-otter::before {
            content: "\f700"
        }

        .fa-outdent::before {
            content: "\f03b"
        }

        .fa-dedent::before {
            content: "\f03b"
        }

        .fa-p::before {
            content: "\50"
        }

        .fa-pager::before {
            content: "\f815"
        }

        .fa-paint-roller::before {
            content: "\f5aa"
        }

        .fa-paintbrush::before {
            content: "\f1fc"
        }

        .fa-paint-brush::before {
            content: "\f1fc"
        }

        .fa-palette::before {
            content: "\f53f"
        }

        .fa-pallet::before {
            content: "\f482"
        }

        .fa-panorama::before {
            content: "\e209"
        }

        .fa-paper-plane::before {
            content: "\f1d8"
        }

        .fa-paperclip::before {
            content: "\f0c6"
        }

        .fa-parachute-box::before {
            content: "\f4cd"
        }

        .fa-paragraph::before {
            content: "\f1dd"
        }

        .fa-passport::before {
            content: "\f5ab"
        }

        .fa-paste::before {
            content: "\f0ea"
        }

        .fa-file-clipboard::before {
            content: "\f0ea"
        }

        .fa-pause::before {
            content: "\f04c"
        }

        .fa-paw::before {
            content: "\f1b0"
        }

        .fa-peace::before {
            content: "\f67c"
        }

        .fa-pen::before {
            content: "\f304"
        }

        .fa-pen-clip::before {
            content: "\f305"
        }

        .fa-pen-alt::before {
            content: "\f305"
        }

        .fa-pen-fancy::before {
            content: "\f5ac"
        }

        .fa-pen-nib::before {
            content: "\f5ad"
        }

        .fa-pen-ruler::before {
            content: "\f5ae"
        }

        .fa-pencil-ruler::before {
            content: "\f5ae"
        }

        .fa-pen-to-square::before {
            content: "\f044"
        }

        .fa-edit::before {
            content: "\f044"
        }

        .fa-pencil::before {
            content: "\f303"
        }

        .fa-pencil-alt::before {
            content: "\f303"
        }

        .fa-people-arrows-left-right::before {
            content: "\e068"
        }

        .fa-people-arrows::before {
            content: "\e068"
        }

        .fa-people-carry-box::before {
            content: "\f4ce"
        }

        .fa-people-carry::before {
            content: "\f4ce"
        }

        .fa-pepper-hot::before {
            content: "\f816"
        }

        .fa-percent::before {
            content: "\25"
        }

        .fa-percentage::before {
            content: "\25"
        }

        .fa-person::before {
            content: "\f183"
        }

        .fa-male::before {
            content: "\f183"
        }

        .fa-person-biking::before {
            content: "\f84a"
        }

        .fa-biking::before {
            content: "\f84a"
        }

        .fa-person-booth::before {
            content: "\f756"
        }

        .fa-person-dots-from-line::before {
            content: "\f470"
        }

        .fa-diagnoses::before {
            content: "\f470"
        }

        .fa-person-dress::before {
            content: "\f182"
        }

        .fa-female::before {
            content: "\f182"
        }

        .fa-person-hiking::before {
            content: "\f6ec"
        }

        .fa-hiking::before {
            content: "\f6ec"
        }

        .fa-person-praying::before {
            content: "\f683"
        }

        .fa-pray::before {
            content: "\f683"
        }

        .fa-person-running::before {
            content: "\f70c"
        }

        .fa-running::before {
            content: "\f70c"
        }

        .fa-person-skating::before {
            content: "\f7c5"
        }

        .fa-skating::before {
            content: "\f7c5"
        }

        .fa-person-skiing::before {
            content: "\f7c9"
        }

        .fa-skiing::before {
            content: "\f7c9"
        }

        .fa-person-skiing-nordic::before {
            content: "\f7ca"
        }

        .fa-skiing-nordic::before {
            content: "\f7ca"
        }

        .fa-person-snowboarding::before {
            content: "\f7ce"
        }

        .fa-snowboarding::before {
            content: "\f7ce"
        }

        .fa-person-swimming::before {
            content: "\f5c4"
        }

        .fa-swimmer::before {
            content: "\f5c4"
        }

        .fa-person-walking::before {
            content: "\f554"
        }

        .fa-walking::before {
            content: "\f554"
        }

        .fa-person-walking-with-cane::before {
            content: "\f29d"
        }

        .fa-blind::before {
            content: "\f29d"
        }

        .fa-peseta-sign::before {
            content: "\e221"
        }

        .fa-peso-sign::before {
            content: "\e222"
        }

        .fa-phone::before {
            content: "\f095"
        }

        .fa-phone-flip::before {
            content: "\f879"
        }

        .fa-phone-alt::before {
            content: "\f879"
        }

        .fa-phone-slash::before {
            content: "\f3dd"
        }

        .fa-phone-volume::before {
            content: "\f2a0"
        }

        .fa-volume-control-phone::before {
            content: "\f2a0"
        }

        .fa-photo-film::before {
            content: "\f87c"
        }

        .fa-photo-video::before {
            content: "\f87c"
        }

        .fa-piggy-bank::before {
            content: "\f4d3"
        }

        .fa-pills::before {
            content: "\f484"
        }

        .fa-pizza-slice::before {
            content: "\f818"
        }

        .fa-place-of-worship::before {
            content: "\f67f"
        }

        .fa-plane::before {
            content: "\f072"
        }

        .fa-plane-arrival::before {
            content: "\f5af"
        }

        .fa-plane-departure::before {
            content: "\f5b0"
        }

        .fa-plane-slash::before {
            content: "\e069"
        }

        .fa-play::before {
            content: "\f04b"
        }

        .fa-plug::before {
            content: "\f1e6"
        }

        .fa-plus::before {
            content: "\2b"
        }

        .fa-add::before {
            content: "\2b"
        }

        .fa-plus-minus::before {
            content: "\e43c"
        }

        .fa-podcast::before {
            content: "\f2ce"
        }

        .fa-poo::before {
            content: "\f2fe"
        }

        .fa-poo-storm::before {
            content: "\f75a"
        }

        .fa-poo-bolt::before {
            content: "\f75a"
        }

        .fa-poop::before {
            content: "\f619"
        }

        .fa-power-off::before {
            content: "\f011"
        }

        .fa-prescription::before {
            content: "\f5b1"
        }

        .fa-prescription-bottle::before {
            content: "\f485"
        }

        .fa-prescription-bottle-medical::before {
            content: "\f486"
        }

        .fa-prescription-bottle-alt::before {
            content: "\f486"
        }

        .fa-print::before {
            content: "\f02f"
        }

        .fa-pump-medical::before {
            content: "\e06a"
        }

        .fa-pump-soap::before {
            content: "\e06b"
        }

        .fa-puzzle-piece::before {
            content: "\f12e"
        }

        .fa-q::before {
            content: "\51"
        }

        .fa-qrcode::before {
            content: "\f029"
        }

        .fa-question::before {
            content: "\3f"
        }

        .fa-quote-left::before {
            content: "\f10d"
        }

        .fa-quote-left-alt::before {
            content: "\f10d"
        }

        .fa-quote-right::before {
            content: "\f10e"
        }

        .fa-quote-right-alt::before {
            content: "\f10e"
        }

        .fa-r::before {
            content: "\52"
        }

        .fa-radiation::before {
            content: "\f7b9"
        }

        .fa-rainbow::before {
            content: "\f75b"
        }

        .fa-receipt::before {
            content: "\f543"
        }

        .fa-record-vinyl::before {
            content: "\f8d9"
        }

        .fa-rectangle-ad::before {
            content: "\f641"
        }

        .fa-ad::before {
            content: "\f641"
        }

        .fa-rectangle-list::before {
            content: "\f022"
        }

        .fa-list-alt::before {
            content: "\f022"
        }

        .fa-rectangle-xmark::before {
            content: "\f410"
        }

        .fa-rectangle-times::before {
            content: "\f410"
        }

        .fa-times-rectangle::before {
            content: "\f410"
        }

        .fa-window-close::before {
            content: "\f410"
        }

        .fa-recycle::before {
            content: "\f1b8"
        }

        .fa-registered::before {
            content: "\f25d"
        }

        .fa-repeat::before {
            content: "\f363"
        }

        .fa-reply::before {
            content: "\f3e5"
        }

        .fa-mail-reply::before {
            content: "\f3e5"
        }

        .fa-reply-all::before {
            content: "\f122"
        }

        .fa-mail-reply-all::before {
            content: "\f122"
        }

        .fa-republican::before {
            content: "\f75e"
        }

        .fa-restroom::before {
            content: "\f7bd"
        }

        .fa-retweet::before {
            content: "\f079"
        }

        .fa-ribbon::before {
            content: "\f4d6"
        }

        .fa-right-from-bracket::before {
            content: "\f2f5"
        }

        .fa-sign-out-alt::before {
            content: "\f2f5"
        }

        .fa-right-left::before {
            content: "\f362"
        }

        .fa-exchange-alt::before {
            content: "\f362"
        }

        .fa-right-long::before {
            content: "\f30b"
        }

        .fa-long-arrow-alt-right::before {
            content: "\f30b"
        }

        .fa-right-to-bracket::before {
            content: "\f2f6"
        }

        .fa-sign-in-alt::before {
            content: "\f2f6"
        }

        .fa-ring::before {
            content: "\f70b"
        }

        .fa-road::before {
            content: "\f018"
        }

        .fa-robot::before {
            content: "\f544"
        }

        .fa-rocket::before {
            content: "\f135"
        }

        .fa-rotate::before {
            content: "\f2f1"
        }

        .fa-sync-alt::before {
            content: "\f2f1"
        }

        .fa-rotate-left::before {
            content: "\f2ea"
        }

        .fa-rotate-back::before {
            content: "\f2ea"
        }

        .fa-rotate-backward::before {
            content: "\f2ea"
        }

        .fa-undo-alt::before {
            content: "\f2ea"
        }

        .fa-rotate-right::before {
            content: "\f2f9"
        }

        .fa-redo-alt::before {
            content: "\f2f9"
        }

        .fa-rotate-forward::before {
            content: "\f2f9"
        }

        .fa-route::before {
            content: "\f4d7"
        }

        .fa-rss::before {
            content: "\f09e"
        }

        .fa-feed::before {
            content: "\f09e"
        }

        .fa-ruble-sign::before {
            content: "\f158"
        }

        .fa-rouble::before {
            content: "\f158"
        }

        .fa-rub::before {
            content: "\f158"
        }

        .fa-ruble::before {
            content: "\f158"
        }

        .fa-ruler::before {
            content: "\f545"
        }

        .fa-ruler-combined::before {
            content: "\f546"
        }

        .fa-ruler-horizontal::before {
            content: "\f547"
        }

        .fa-ruler-vertical::before {
            content: "\f548"
        }

        .fa-rupee-sign::before {
            content: "\f156"
        }

        .fa-rupee::before {
            content: "\f156"
        }

        .fa-rupiah-sign::before {
            content: "\e23d"
        }

        .fa-s::before {
            content: "\53"
        }

        .fa-sailboat::before {
            content: "\e445"
        }

        .fa-satellite::before {
            content: "\f7bf"
        }

        .fa-satellite-dish::before {
            content: "\f7c0"
        }

        .fa-scale-balanced::before {
            content: "\f24e"
        }

        .fa-balance-scale::before {
            content: "\f24e"
        }

        .fa-scale-unbalanced::before {
            content: "\f515"
        }

        .fa-balance-scale-left::before {
            content: "\f515"
        }

        .fa-scale-unbalanced-flip::before {
            content: "\f516"
        }

        .fa-balance-scale-right::before {
            content: "\f516"
        }

        .fa-school::before {
            content: "\f549"
        }

        .fa-scissors::before {
            content: "\f0c4"
        }

        .fa-cut::before {
            content: "\f0c4"
        }

        .fa-screwdriver::before {
            content: "\f54a"
        }

        .fa-screwdriver-wrench::before {
            content: "\f7d9"
        }

        .fa-tools::before {
            content: "\f7d9"
        }

        .fa-scroll::before {
            content: "\f70e"
        }

        .fa-scroll-torah::before {
            content: "\f6a0"
        }

        .fa-torah::before {
            content: "\f6a0"
        }

        .fa-sd-card::before {
            content: "\f7c2"
        }

        .fa-section::before {
            content: "\e447"
        }

        .fa-seedling::before {
            content: "\f4d8"
        }

        .fa-sprout::before {
            content: "\f4d8"
        }

        .fa-server::before {
            content: "\f233"
        }

        .fa-shapes::before {
            content: "\f61f"
        }

        .fa-triangle-circle-square::before {
            content: "\f61f"
        }

        .fa-share::before {
            content: "\f064"
        }

        .fa-arrow-turn-right::before {
            content: "\f064"
        }

        .fa-mail-forward::before {
            content: "\f064"
        }

        .fa-share-from-square::before {
            content: "\f14d"
        }

        .fa-share-square::before {
            content: "\f14d"
        }

        .fa-share-nodes::before {
            content: "\f1e0"
        }

        .fa-share-alt::before {
            content: "\f1e0"
        }

        .fa-shekel-sign::before {
            content: "\f20b"
        }

        .fa-ils::before {
            content: "\f20b"
        }

        .fa-shekel::before {
            content: "\f20b"
        }

        .fa-sheqel::before {
            content: "\f20b"
        }

        .fa-sheqel-sign::before {
            content: "\f20b"
        }

        .fa-shield::before {
            content: "\f132"
        }

        .fa-shield-blank::before {
            content: "\f3ed"
        }

        .fa-shield-alt::before {
            content: "\f3ed"
        }

        .fa-shield-virus::before {
            content: "\e06c"
        }

        .fa-ship::before {
            content: "\f21a"
        }

        .fa-shirt::before {
            content: "\f553"
        }

        .fa-t-shirt::before {
            content: "\f553"
        }

        .fa-tshirt::before {
            content: "\f553"
        }

        .fa-shoe-prints::before {
            content: "\f54b"
        }

        .fa-shop::before {
            content: "\f54f"
        }

        .fa-store-alt::before {
            content: "\f54f"
        }

        .fa-shop-slash::before {
            content: "\e070"
        }

        .fa-store-alt-slash::before {
            content: "\e070"
        }

        .fa-shower::before {
            content: "\f2cc"
        }

        .fa-shrimp::before {
            content: "\e448"
        }

        .fa-shuffle::before {
            content: "\f074"
        }

        .fa-random::before {
            content: "\f074"
        }

        .fa-shuttle-space::before {
            content: "\f197"
        }

        .fa-space-shuttle::before {
            content: "\f197"
        }

        .fa-sign-hanging::before {
            content: "\f4d9"
        }

        .fa-sign::before {
            content: "\f4d9"
        }

        .fa-signal::before {
            content: "\f012"
        }

        .fa-signal-5::before {
            content: "\f012"
        }

        .fa-signal-perfect::before {
            content: "\f012"
        }

        .fa-signature::before {
            content: "\f5b7"
        }

        .fa-signs-post::before {
            content: "\f277"
        }

        .fa-map-signs::before {
            content: "\f277"
        }

        .fa-sim-card::before {
            content: "\f7c4"
        }

        .fa-sink::before {
            content: "\e06d"
        }

        .fa-sitemap::before {
            content: "\f0e8"
        }

        .fa-skull::before {
            content: "\f54c"
        }

        .fa-skull-crossbones::before {
            content: "\f714"
        }

        .fa-slash::before {
            content: "\f715"
        }

        .fa-sleigh::before {
            content: "\f7cc"
        }

        .fa-sliders::before {
            content: "\f1de"
        }

        .fa-sliders-h::before {
            content: "\f1de"
        }

        .fa-smog::before {
            content: "\f75f"
        }

        .fa-smoking::before {
            content: "\f48d"
        }

        .fa-snowflake::before {
            content: "\f2dc"
        }

        .fa-snowman::before {
            content: "\f7d0"
        }

        .fa-snowplow::before {
            content: "\f7d2"
        }

        .fa-soap::before {
            content: "\e06e"
        }

        .fa-socks::before {
            content: "\f696"
        }

        .fa-solar-panel::before {
            content: "\f5ba"
        }

        .fa-sort::before {
            content: "\f0dc"
        }

        .fa-unsorted::before {
            content: "\f0dc"
        }

        .fa-sort-down::before {
            content: "\f0dd"
        }

        .fa-sort-desc::before {
            content: "\f0dd"
        }

        .fa-sort-up::before {
            content: "\f0de"
        }

        .fa-sort-asc::before {
            content: "\f0de"
        }

        .fa-spa::before {
            content: "\f5bb"
        }

        .fa-spaghetti-monster-flying::before {
            content: "\f67b"
        }

        .fa-pastafarianism::before {
            content: "\f67b"
        }

        .fa-spell-check::before {
            content: "\f891"
        }

        .fa-spider::before {
            content: "\f717"
        }

        .fa-spinner::before {
            content: "\f110"
        }

        .fa-splotch::before {
            content: "\f5bc"
        }

        .fa-spoon::before {
            content: "\f2e5"
        }

        .fa-utensil-spoon::before {
            content: "\f2e5"
        }

        .fa-spray-can::before {
            content: "\f5bd"
        }

        .fa-spray-can-sparkles::before {
            content: "\f5d0"
        }

        .fa-air-freshener::before {
            content: "\f5d0"
        }

        .fa-square::before {
            content: "\f0c8"
        }

        .fa-square-arrow-up-right::before {
            content: "\f14c"
        }

        .fa-external-link-square::before {
            content: "\f14c"
        }

        .fa-square-caret-down::before {
            content: "\f150"
        }

        .fa-caret-square-down::before {
            content: "\f150"
        }

        .fa-square-caret-left::before {
            content: "\f191"
        }

        .fa-caret-square-left::before {
            content: "\f191"
        }

        .fa-square-caret-right::before {
            content: "\f152"
        }

        .fa-caret-square-right::before {
            content: "\f152"
        }

        .fa-square-caret-up::before {
            content: "\f151"
        }

        .fa-caret-square-up::before {
            content: "\f151"
        }

        .fa-square-check::before {
            content: "\f14a"
        }

        .fa-check-square::before {
            content: "\f14a"
        }

        .fa-square-envelope::before {
            content: "\f199"
        }

        .fa-envelope-square::before {
            content: "\f199"
        }

        .fa-square-full::before {
            content: "\f45c"
        }

        .fa-square-h::before {
            content: "\f0fd"
        }

        .fa-h-square::before {
            content: "\f0fd"
        }

        .fa-square-minus::before {
            content: "\f146"
        }

        .fa-minus-square::before {
            content: "\f146"
        }

        .fa-square-parking::before {
            content: "\f540"
        }

        .fa-parking::before {
            content: "\f540"
        }

        .fa-square-pen::before {
            content: "\f14b"
        }

        .fa-pen-square::before {
            content: "\f14b"
        }

        .fa-pencil-square::before {
            content: "\f14b"
        }

        .fa-square-phone::before {
            content: "\f098"
        }

        .fa-phone-square::before {
            content: "\f098"
        }

        .fa-square-phone-flip::before {
            content: "\f87b"
        }

        .fa-phone-square-alt::before {
            content: "\f87b"
        }

        .fa-square-plus::before {
            content: "\f0fe"
        }

        .fa-plus-square::before {
            content: "\f0fe"
        }

        .fa-square-poll-horizontal::before {
            content: "\f682"
        }

        .fa-poll-h::before {
            content: "\f682"
        }

        .fa-square-poll-vertical::before {
            content: "\f681"
        }

        .fa-poll::before {
            content: "\f681"
        }

        .fa-square-root-variable::before {
            content: "\f698"
        }

        .fa-square-root-alt::before {
            content: "\f698"
        }

        .fa-square-rss::before {
            content: "\f143"
        }

        .fa-rss-square::before {
            content: "\f143"
        }

        .fa-square-share-nodes::before {
            content: "\f1e1"
        }

        .fa-share-alt-square::before {
            content: "\f1e1"
        }

        .fa-square-up-right::before {
            content: "\f360"
        }

        .fa-external-link-square-alt::before {
            content: "\f360"
        }

        .fa-square-xmark::before {
            content: "\f2d3"
        }

        .fa-times-square::before {
            content: "\f2d3"
        }

        .fa-xmark-square::before {
            content: "\f2d3"
        }

        .fa-stairs::before {
            content: "\e289"
        }

        .fa-stamp::before {
            content: "\f5bf"
        }

        .fa-star::before {
            content: "\f005"
        }

        .fa-star-and-crescent::before {
            content: "\f699"
        }

        .fa-star-half::before {
            content: "\f089"
        }

        .fa-star-half-stroke::before {
            content: "\f5c0"
        }

        .fa-star-half-alt::before {
            content: "\f5c0"
        }

        .fa-star-of-david::before {
            content: "\f69a"
        }

        .fa-star-of-life::before {
            content: "\f621"
        }

        .fa-sterling-sign::before {
            content: "\f154"
        }

        .fa-gbp::before {
            content: "\f154"
        }

        .fa-pound-sign::before {
            content: "\f154"
        }

        .fa-stethoscope::before {
            content: "\f0f1"
        }

        .fa-stop::before {
            content: "\f04d"
        }

        .fa-stopwatch::before {
            content: "\f2f2"
        }

        .fa-stopwatch-20::before {
            content: "\e06f"
        }

        .fa-store::before {
            content: "\f54e"
        }

        .fa-store-slash::before {
            content: "\e071"
        }

        .fa-street-view::before {
            content: "\f21d"
        }

        .fa-strikethrough::before {
            content: "\f0cc"
        }

        .fa-stroopwafel::before {
            content: "\f551"
        }

        .fa-subscript::before {
            content: "\f12c"
        }

        .fa-suitcase::before {
            content: "\f0f2"
        }

        .fa-suitcase-medical::before {
            content: "\f0fa"
        }

        .fa-medkit::before {
            content: "\f0fa"
        }

        .fa-suitcase-rolling::before {
            content: "\f5c1"
        }

        .fa-sun::before {
            content: "\f185"
        }

        .fa-superscript::before {
            content: "\f12b"
        }

        .fa-swatchbook::before {
            content: "\f5c3"
        }

        .fa-synagogue::before {
            content: "\f69b"
        }

        .fa-syringe::before {
            content: "\f48e"
        }

        .fa-t::before {
            content: "\54"
        }

        .fa-table::before {
            content: "\f0ce"
        }

        .fa-table-cells::before {
            content: "\f00a"
        }

        .fa-th::before {
            content: "\f00a"
        }

        .fa-table-cells-large::before {
            content: "\f009"
        }

        .fa-th-large::before {
            content: "\f009"
        }

        .fa-table-columns::before {
            content: "\f0db"
        }

        .fa-columns::before {
            content: "\f0db"
        }

        .fa-table-list::before {
            content: "\f00b"
        }

        .fa-th-list::before {
            content: "\f00b"
        }

        .fa-table-tennis-paddle-ball::before {
            content: "\f45d"
        }

        .fa-ping-pong-paddle-ball::before {
            content: "\f45d"
        }

        .fa-table-tennis::before {
            content: "\f45d"
        }

        .fa-tablet::before {
            content: "\f3fb"
        }

        .fa-tablet-android::before {
            content: "\f3fb"
        }

        .fa-tablet-button::before {
            content: "\f10a"
        }

        .fa-tablet-screen-button::before {
            content: "\f3fa"
        }

        .fa-tablet-alt::before {
            content: "\f3fa"
        }

        .fa-tablets::before {
            content: "\f490"
        }

        .fa-tachograph-digital::before {
            content: "\f566"
        }

        .fa-digital-tachograph::before {
            content: "\f566"
        }

        .fa-tag::before {
            content: "\f02b"
        }

        .fa-tags::before {
            content: "\f02c"
        }

        .fa-tape::before {
            content: "\f4db"
        }

        .fa-taxi::before {
            content: "\f1ba"
        }

        .fa-cab::before {
            content: "\f1ba"
        }

        .fa-teeth::before {
            content: "\f62e"
        }

        .fa-teeth-open::before {
            content: "\f62f"
        }

        .fa-temperature-empty::before {
            content: "\f2cb"
        }

        .fa-temperature-0::before {
            content: "\f2cb"
        }

        .fa-thermometer-0::before {
            content: "\f2cb"
        }

        .fa-thermometer-empty::before {
            content: "\f2cb"
        }

        .fa-temperature-full::before {
            content: "\f2c7"
        }

        .fa-temperature-4::before {
            content: "\f2c7"
        }

        .fa-thermometer-4::before {
            content: "\f2c7"
        }

        .fa-thermometer-full::before {
            content: "\f2c7"
        }

        .fa-temperature-half::before {
            content: "\f2c9"
        }

        .fa-temperature-2::before {
            content: "\f2c9"
        }

        .fa-thermometer-2::before {
            content: "\f2c9"
        }

        .fa-thermometer-half::before {
            content: "\f2c9"
        }

        .fa-temperature-high::before {
            content: "\f769"
        }

        .fa-temperature-low::before {
            content: "\f76b"
        }

        .fa-temperature-quarter::before {
            content: "\f2ca"
        }

        .fa-temperature-1::before {
            content: "\f2ca"
        }

        .fa-thermometer-1::before {
            content: "\f2ca"
        }

        .fa-thermometer-quarter::before {
            content: "\f2ca"
        }

        .fa-temperature-three-quarters::before {
            content: "\f2c8"
        }

        .fa-temperature-3::before {
            content: "\f2c8"
        }

        .fa-thermometer-3::before {
            content: "\f2c8"
        }

        .fa-thermometer-three-quarters::before {
            content: "\f2c8"
        }

        .fa-tenge-sign::before {
            content: "\f7d7"
        }

        .fa-tenge::before {
            content: "\f7d7"
        }

        .fa-terminal::before {
            content: "\f120"
        }

        .fa-text-height::before {
            content: "\f034"
        }

        .fa-text-slash::before {
            content: "\f87d"
        }

        .fa-remove-format::before {
            content: "\f87d"
        }

        .fa-text-width::before {
            content: "\f035"
        }

        .fa-thermometer::before {
            content: "\f491"
        }

        .fa-thumbs-down::before {
            content: "\f165"
        }

        .fa-thumbs-up::before {
            content: "\f164"
        }

        .fa-thumbtack::before {
            content: "\f08d"
        }

        .fa-thumb-tack::before {
            content: "\f08d"
        }

        .fa-ticket::before {
            content: "\f145"
        }

        .fa-ticket-simple::before {
            content: "\f3ff"
        }

        .fa-ticket-alt::before {
            content: "\f3ff"
        }

        .fa-timeline::before {
            content: "\e29c"
        }

        .fa-toggle-off::before {
            content: "\f204"
        }

        .fa-toggle-on::before {
            content: "\f205"
        }

        .fa-toilet::before {
            content: "\f7d8"
        }

        .fa-toilet-paper::before {
            content: "\f71e"
        }

        .fa-toilet-paper-slash::before {
            content: "\e072"
        }

        .fa-toolbox::before {
            content: "\f552"
        }

        .fa-tooth::before {
            content: "\f5c9"
        }

        .fa-torii-gate::before {
            content: "\f6a1"
        }

        .fa-tower-broadcast::before {
            content: "\f519"
        }

        .fa-broadcast-tower::before {
            content: "\f519"
        }

        .fa-tractor::before {
            content: "\f722"
        }

        .fa-trademark::before {
            content: "\f25c"
        }

        .fa-traffic-light::before {
            content: "\f637"
        }

        .fa-trailer::before {
            content: "\e041"
        }

        .fa-train::before {
            content: "\f238"
        }

        .fa-train-subway::before {
            content: "\f239"
        }

        .fa-subway::before {
            content: "\f239"
        }

        .fa-train-tram::before {
            content: "\f7da"
        }

        .fa-tram::before {
            content: "\f7da"
        }

        .fa-transgender::before {
            content: "\f225"
        }

        .fa-transgender-alt::before {
            content: "\f225"
        }

        .fa-trash::before {
            content: "\f1f8"
        }

        .fa-trash-arrow-up::before {
            content: "\f829"
        }

        .fa-trash-restore::before {
            content: "\f829"
        }

        .fa-trash-can::before {
            content: "\f2ed"
        }

        .fa-trash-alt::before {
            content: "\f2ed"
        }

        .fa-trash-can-arrow-up::before {
            content: "\f82a"
        }

        .fa-trash-restore-alt::before {
            content: "\f82a"
        }

        .fa-tree::before {
            content: "\f1bb"
        }

        .fa-triangle-exclamation::before {
            content: "\f071"
        }

        .fa-exclamation-triangle::before {
            content: "\f071"
        }

        .fa-warning::before {
            content: "\f071"
        }

        .fa-trophy::before {
            content: "\f091"
        }

        .fa-truck::before {
            content: "\f0d1"
        }

        .fa-truck-fast::before {
            content: "\f48b"
        }

        .fa-shipping-fast::before {
            content: "\f48b"
        }

        .fa-truck-medical::before {
            content: "\f0f9"
        }

        .fa-ambulance::before {
            content: "\f0f9"
        }

        .fa-truck-monster::before {
            content: "\f63b"
        }

        .fa-truck-moving::before {
            content: "\f4df"
        }

        .fa-truck-pickup::before {
            content: "\f63c"
        }

        .fa-truck-ramp-box::before {
            content: "\f4de"
        }

        .fa-truck-loading::before {
            content: "\f4de"
        }

        .fa-tty::before {
            content: "\f1e4"
        }

        .fa-teletype::before {
            content: "\f1e4"
        }

        .fa-turkish-lira-sign::before {
            content: "\e2bb"
        }

        .fa-try::before {
            content: "\e2bb"
        }

        .fa-turkish-lira::before {
            content: "\e2bb"
        }

        .fa-turn-down::before {
            content: "\f3be"
        }

        .fa-level-down-alt::before {
            content: "\f3be"
        }

        .fa-turn-up::before {
            content: "\f3bf"
        }

        .fa-level-up-alt::before {
            content: "\f3bf"
        }

        .fa-tv::before {
            content: "\f26c"
        }

        .fa-television::before {
            content: "\f26c"
        }

        .fa-tv-alt::before {
            content: "\f26c"
        }

        .fa-u::before {
            content: "\55"
        }

        .fa-umbrella::before {
            content: "\f0e9"
        }

        .fa-umbrella-beach::before {
            content: "\f5ca"
        }

        .fa-underline::before {
            content: "\f0cd"
        }

        .fa-universal-access::before {
            content: "\f29a"
        }

        .fa-unlock::before {
            content: "\f09c"
        }

        .fa-unlock-keyhole::before {
            content: "\f13e"
        }

        .fa-unlock-alt::before {
            content: "\f13e"
        }

        .fa-up-down::before {
            content: "\f338"
        }

        .fa-arrows-alt-v::before {
            content: "\f338"
        }

        .fa-up-down-left-right::before {
            content: "\f0b2"
        }

        .fa-arrows-alt::before {
            content: "\f0b2"
        }

        .fa-up-long::before {
            content: "\f30c"
        }

        .fa-long-arrow-alt-up::before {
            content: "\f30c"
        }

        .fa-up-right-and-down-left-from-center::before {
            content: "\f424"
        }

        .fa-expand-alt::before {
            content: "\f424"
        }

        .fa-up-right-from-square::before {
            content: "\f35d"
        }

        .fa-external-link-alt::before {
            content: "\f35d"
        }

        .fa-upload::before {
            content: "\f093"
        }

        .fa-user::before {
            content: "\f007"
        }

        .fa-user-astronaut::before {
            content: "\f4fb"
        }

        .fa-user-check::before {
            content: "\f4fc"
        }

        .fa-user-clock::before {
            content: "\f4fd"
        }

        .fa-user-doctor::before {
            content: "\f0f0"
        }

        .fa-user-md::before {
            content: "\f0f0"
        }

        .fa-user-gear::before {
            content: "\f4fe"
        }

        .fa-user-cog::before {
            content: "\f4fe"
        }

        .fa-user-graduate::before {
            content: "\f501"
        }

        .fa-user-group::before {
            content: "\f500"
        }

        .fa-user-friends::before {
            content: "\f500"
        }

        .fa-user-injured::before {
            content: "\f728"
        }

        .fa-user-large::before {
            content: "\f406"
        }

        .fa-user-alt::before {
            content: "\f406"
        }

        .fa-user-large-slash::before {
            content: "\f4fa"
        }

        .fa-user-alt-slash::before {
            content: "\f4fa"
        }

        .fa-user-lock::before {
            content: "\f502"
        }

        .fa-user-minus::before {
            content: "\f503"
        }

        .fa-user-ninja::before {
            content: "\f504"
        }

        .fa-user-nurse::before {
            content: "\f82f"
        }

        .fa-user-pen::before {
            content: "\f4ff"
        }

        .fa-user-edit::before {
            content: "\f4ff"
        }

        .fa-user-plus::before {
            content: "\f234"
        }

        .fa-user-secret::before {
            content: "\f21b"
        }

        .fa-user-shield::before {
            content: "\f505"
        }

        .fa-user-slash::before {
            content: "\f506"
        }

        .fa-user-tag::before {
            content: "\f507"
        }

        .fa-user-tie::before {
            content: "\f508"
        }

        .fa-user-xmark::before {
            content: "\f235"
        }

        .fa-user-times::before {
            content: "\f235"
        }

        .fa-users::before {
            content: "\f0c0"
        }

        .fa-users-gear::before {
            content: "\f509"
        }

        .fa-users-cog::before {
            content: "\f509"
        }

        .fa-users-slash::before {
            content: "\e073"
        }

        .fa-utensils::before {
            content: "\f2e7"
        }

        .fa-cutlery::before {
            content: "\f2e7"
        }

        .fa-v::before {
            content: "\56"
        }

        .fa-van-shuttle::before {
            content: "\f5b6"
        }

        .fa-shuttle-van::before {
            content: "\f5b6"
        }

        .fa-vault::before {
            content: "\e2c5"
        }

        .fa-vector-square::before {
            content: "\f5cb"
        }

        .fa-venus::before {
            content: "\f221"
        }

        .fa-venus-double::before {
            content: "\f226"
        }

        .fa-venus-mars::before {
            content: "\f228"
        }

        .fa-vest::before {
            content: "\e085"
        }

        .fa-vest-patches::before {
            content: "\e086"
        }

        .fa-vial::before {
            content: "\f492"
        }

        .fa-vials::before {
            content: "\f493"
        }

        .fa-video::before {
            content: "\f03d"
        }

        .fa-video-camera::before {
            content: "\f03d"
        }

        .fa-video-slash::before {
            content: "\f4e2"
        }

        .fa-vihara::before {
            content: "\f6a7"
        }

        .fa-virus::before {
            content: "\e074"
        }

        .fa-virus-covid::before {
            content: "\e4a8"
        }

        .fa-virus-covid-slash::before {
            content: "\e4a9"
        }

        .fa-virus-slash::before {
            content: "\e075"
        }

        .fa-viruses::before {
            content: "\e076"
        }

        .fa-voicemail::before {
            content: "\f897"
        }

        .fa-volleyball::before {
            content: "\f45f"
        }

        .fa-volleyball-ball::before {
            content: "\f45f"
        }

        .fa-volume-high::before {
            content: "\f028"
        }

        .fa-volume-up::before {
            content: "\f028"
        }

        .fa-volume-low::before {
            content: "\f027"
        }

        .fa-volume-down::before {
            content: "\f027"
        }

        .fa-volume-off::before {
            content: "\f026"
        }

        .fa-volume-xmark::before {
            content: "\f6a9"
        }

        .fa-volume-mute::before {
            content: "\f6a9"
        }

        .fa-volume-times::before {
            content: "\f6a9"
        }

        .fa-vr-cardboard::before {
            content: "\f729"
        }

        .fa-w::before {
            content: "\57"
        }

        .fa-wallet::before {
            content: "\f555"
        }

        .fa-wand-magic::before {
            content: "\f0d0"
        }

        .fa-magic::before {
            content: "\f0d0"
        }

        .fa-wand-magic-sparkles::before {
            content: "\e2ca"
        }

        .fa-magic-wand-sparkles::before {
            content: "\e2ca"
        }

        .fa-wand-sparkles::before {
            content: "\f72b"
        }

        .fa-warehouse::before {
            content: "\f494"
        }

        .fa-water::before {
            content: "\f773"
        }

        .fa-water-ladder::before {
            content: "\f5c5"
        }

        .fa-ladder-water::before {
            content: "\f5c5"
        }

        .fa-swimming-pool::before {
            content: "\f5c5"
        }

        .fa-wave-square::before {
            content: "\f83e"
        }

        .fa-weight-hanging::before {
            content: "\f5cd"
        }

        .fa-weight-scale::before {
            content: "\f496"
        }

        .fa-weight::before {
            content: "\f496"
        }

        .fa-wheelchair::before {
            content: "\f193"
        }

        .fa-whiskey-glass::before {
            content: "\f7a0"
        }

        .fa-glass-whiskey::before {
            content: "\f7a0"
        }

        .fa-wifi::before {
            content: "\f1eb"
        }

        .fa-wifi-3::before {
            content: "\f1eb"
        }

        .fa-wifi-strong::before {
            content: "\f1eb"
        }

        .fa-wind::before {
            content: "\f72e"
        }

        .fa-window-maximize::before {
            content: "\f2d0"
        }

        .fa-window-minimize::before {
            content: "\f2d1"
        }

        .fa-window-restore::before {
            content: "\f2d2"
        }

        .fa-wine-bottle::before {
            content: "\f72f"
        }

        .fa-wine-glass::before {
            content: "\f4e3"
        }

        .fa-wine-glass-empty::before {
            content: "\f5ce"
        }

        .fa-wine-glass-alt::before {
            content: "\f5ce"
        }

        .fa-won-sign::before {
            content: "\f159"
        }

        .fa-krw::before {
            content: "\f159"
        }

        .fa-won::before {
            content: "\f159"
        }

        .fa-wrench::before {
            content: "\f0ad"
        }

        .fa-x::before {
            content: "\58"
        }

        .fa-x-ray::before {
            content: "\f497"
        }

        .fa-xmark::before {
            content: "\f00d"
        }

        .fa-close::before {
            content: "\f00d"
        }

        .fa-multiply::before {
            content: "\f00d"
        }

        .fa-remove::before {
            content: "\f00d"
        }

        .fa-times::before {
            content: "\f00d"
        }

        .fa-y::before {
            content: "\59"
        }

        .fa-yen-sign::before {
            content: "\f157"
        }

        .fa-cny::before {
            content: "\f157"
        }

        .fa-jpy::before {
            content: "\f157"
        }

        .fa-rmb::before {
            content: "\f157"
        }

        .fa-yen::before {
            content: "\f157"
        }

        .fa-yin-yang::before {
            content: "\f6ad"
        }

        .fa-z::before {
            content: "\5a"
        }

        .sr-only,
        .fa-sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0
        }

        .sr-only-focusable:not(:focus),
        .fa-sr-only-focusable:not(:focus) {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0
        }

        :root,
        :host {
            --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Free"
        }

        @font-face {
            font-family: 'Font Awesome 6 Free';
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url("../../fonts/fa-regular-400.woff2") format("woff2"), url("../../fonts/fa-regular-400.ttf") format("truetype")
        }

        .far,
        .fa-regular {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        :root,
        :host {
            --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands"
        }

        @font-face {
            font-family: 'Font Awesome 6 Brands';
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url("../../fonts/fa-brands-400.woff2") format("woff2"), url("../../fonts/fa-brands-400.ttf") format("truetype")
        }

        .fab,
        .fa-brands {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa-42-group:before {
            content: "\e080"
        }

        .fa-innosoft:before {
            content: "\e080"
        }

        .fa-500px:before {
            content: "\f26e"
        }

        .fa-accessible-icon:before {
            content: "\f368"
        }

        .fa-accusoft:before {
            content: "\f369"
        }

        .fa-adn:before {
            content: "\f170"
        }

        .fa-adversal:before {
            content: "\f36a"
        }

        .fa-affiliatetheme:before {
            content: "\f36b"
        }

        .fa-airbnb:before {
            content: "\f834"
        }

        .fa-algolia:before {
            content: "\f36c"
        }

        .fa-alipay:before {
            content: "\f642"
        }

        .fa-amazon:before {
            content: "\f270"
        }

        .fa-amazon-pay:before {
            content: "\f42c"
        }

        .fa-amilia:before {
            content: "\f36d"
        }

        .fa-android:before {
            content: "\f17b"
        }

        .fa-angellist:before {
            content: "\f209"
        }

        .fa-angrycreative:before {
            content: "\f36e"
        }

        .fa-angular:before {
            content: "\f420"
        }

        .fa-app-store:before {
            content: "\f36f"
        }

        .fa-app-store-ios:before {
            content: "\f370"
        }

        .fa-apper:before {
            content: "\f371"
        }

        .fa-apple:before {
            content: "\f179"
        }

        .fa-apple-pay:before {
            content: "\f415"
        }

        .fa-artstation:before {
            content: "\f77a"
        }

        .fa-asymmetrik:before {
            content: "\f372"
        }

        .fa-atlassian:before {
            content: "\f77b"
        }

        .fa-audible:before {
            content: "\f373"
        }

        .fa-autoprefixer:before {
            content: "\f41c"
        }

        .fa-avianex:before {
            content: "\f374"
        }

        .fa-aviato:before {
            content: "\f421"
        }

        .fa-aws:before {
            content: "\f375"
        }

        .fa-bandcamp:before {
            content: "\f2d5"
        }

        .fa-battle-net:before {
            content: "\f835"
        }

        .fa-behance:before {
            content: "\f1b4"
        }

        .fa-behance-square:before {
            content: "\f1b5"
        }

        .fa-bilibili:before {
            content: "\e3d9"
        }

        .fa-bimobject:before {
            content: "\f378"
        }

        .fa-bitbucket:before {
            content: "\f171"
        }

        .fa-bitcoin:before {
            content: "\f379"
        }

        .fa-bity:before {
            content: "\f37a"
        }

        .fa-black-tie:before {
            content: "\f27e"
        }

        .fa-blackberry:before {
            content: "\f37b"
        }

        .fa-blogger:before {
            content: "\f37c"
        }

        .fa-blogger-b:before {
            content: "\f37d"
        }

        .fa-bluetooth:before {
            content: "\f293"
        }

        .fa-bluetooth-b:before {
            content: "\f294"
        }

        .fa-bootstrap:before {
            content: "\f836"
        }

        .fa-bots:before {
            content: "\e340"
        }

        .fa-btc:before {
            content: "\f15a"
        }

        .fa-buffer:before {
            content: "\f837"
        }

        .fa-buromobelexperte:before {
            content: "\f37f"
        }

        .fa-buy-n-large:before {
            content: "\f8a6"
        }

        .fa-buysellads:before {
            content: "\f20d"
        }

        .fa-canadian-maple-leaf:before {
            content: "\f785"
        }

        .fa-cc-amazon-pay:before {
            content: "\f42d"
        }

        .fa-cc-amex:before {
            content: "\f1f3"
        }

        .fa-cc-apple-pay:before {
            content: "\f416"
        }

        .fa-cc-diners-club:before {
            content: "\f24c"
        }

        .fa-cc-discover:before {
            content: "\f1f2"
        }

        .fa-cc-jcb:before {
            content: "\f24b"
        }

        .fa-cc-mastercard:before {
            content: "\f1f1"
        }

        .fa-cc-paypal:before {
            content: "\f1f4"
        }

        .fa-cc-stripe:before {
            content: "\f1f5"
        }

        .fa-cc-visa:before {
            content: "\f1f0"
        }

        .fa-centercode:before {
            content: "\f380"
        }

        .fa-centos:before {
            content: "\f789"
        }

        .fa-chrome:before {
            content: "\f268"
        }

        .fa-chromecast:before {
            content: "\f838"
        }

        .fa-cloudflare:before {
            content: "\e07d"
        }

        .fa-cloudscale:before {
            content: "\f383"
        }

        .fa-cloudsmith:before {
            content: "\f384"
        }

        .fa-cloudversify:before {
            content: "\f385"
        }

        .fa-cmplid:before {
            content: "\e360"
        }

        .fa-codepen:before {
            content: "\f1cb"
        }

        .fa-codiepie:before {
            content: "\f284"
        }

        .fa-confluence:before {
            content: "\f78d"
        }

        .fa-connectdevelop:before {
            content: "\f20e"
        }

        .fa-contao:before {
            content: "\f26d"
        }

        .fa-cotton-bureau:before {
            content: "\f89e"
        }

        .fa-cpanel:before {
            content: "\f388"
        }

        .fa-creative-commons:before {
            content: "\f25e"
        }

        .fa-creative-commons-by:before {
            content: "\f4e7"
        }

        .fa-creative-commons-nc:before {
            content: "\f4e8"
        }

        .fa-creative-commons-nc-eu:before {
            content: "\f4e9"
        }

        .fa-creative-commons-nc-jp:before {
            content: "\f4ea"
        }

        .fa-creative-commons-nd:before {
            content: "\f4eb"
        }

        .fa-creative-commons-pd:before {
            content: "\f4ec"
        }

        .fa-creative-commons-pd-alt:before {
            content: "\f4ed"
        }

        .fa-creative-commons-remix:before {
            content: "\f4ee"
        }

        .fa-creative-commons-sa:before {
            content: "\f4ef"
        }

        .fa-creative-commons-sampling:before {
            content: "\f4f0"
        }

        .fa-creative-commons-sampling-plus:before {
            content: "\f4f1"
        }

        .fa-creative-commons-share:before {
            content: "\f4f2"
        }

        .fa-creative-commons-zero:before {
            content: "\f4f3"
        }

        .fa-critical-role:before {
            content: "\f6c9"
        }

        .fa-css3:before {
            content: "\f13c"
        }

        .fa-css3-alt:before {
            content: "\f38b"
        }

        .fa-cuttlefish:before {
            content: "\f38c"
        }

        .fa-d-and-d:before {
            content: "\f38d"
        }

        .fa-d-and-d-beyond:before {
            content: "\f6ca"
        }

        .fa-dailymotion:before {
            content: "\e052"
        }

        .fa-dashcube:before {
            content: "\f210"
        }

        .fa-deezer:before {
            content: "\e077"
        }

        .fa-delicious:before {
            content: "\f1a5"
        }

        .fa-deploydog:before {
            content: "\f38e"
        }

        .fa-deskpro:before {
            content: "\f38f"
        }

        .fa-dev:before {
            content: "\f6cc"
        }

        .fa-deviantart:before {
            content: "\f1bd"
        }

        .fa-dhl:before {
            content: "\f790"
        }

        .fa-diaspora:before {
            content: "\f791"
        }

        .fa-digg:before {
            content: "\f1a6"
        }

        .fa-digital-ocean:before {
            content: "\f391"
        }

        .fa-discord:before {
            content: "\f392"
        }

        .fa-discourse:before {
            content: "\f393"
        }

        .fa-dochub:before {
            content: "\f394"
        }

        .fa-docker:before {
            content: "\f395"
        }

        .fa-draft2digital:before {
            content: "\f396"
        }

        .fa-dribbble:before {
            content: "\f17d"
        }

        .fa-dribbble-square:before {
            content: "\f397"
        }

        .fa-dropbox:before {
            content: "\f16b"
        }

        .fa-drupal:before {
            content: "\f1a9"
        }

        .fa-dyalog:before {
            content: "\f399"
        }

        .fa-earlybirds:before {
            content: "\f39a"
        }

        .fa-ebay:before {
            content: "\f4f4"
        }

        .fa-edge:before {
            content: "\f282"
        }

        .fa-edge-legacy:before {
            content: "\e078"
        }

        .fa-elementor:before {
            content: "\f430"
        }

        .fa-ello:before {
            content: "\f5f1"
        }

        .fa-ember:before {
            content: "\f423"
        }

        .fa-empire:before {
            content: "\f1d1"
        }

        .fa-envira:before {
            content: "\f299"
        }

        .fa-erlang:before {
            content: "\f39d"
        }

        .fa-ethereum:before {
            content: "\f42e"
        }

        .fa-etsy:before {
            content: "\f2d7"
        }

        .fa-evernote:before {
            content: "\f839"
        }

        .fa-expeditedssl:before {
            content: "\f23e"
        }

        .fa-facebook:before {
            content: "\f09a"
        }

        .fa-facebook-f:before {
            content: "\f39e"
        }

        .fa-facebook-messenger:before {
            content: "\f39f"
        }

        .fa-facebook-square:before {
            content: "\f082"
        }

        .fa-fantasy-flight-games:before {
            content: "\f6dc"
        }

        .fa-fedex:before {
            content: "\f797"
        }

        .fa-fedora:before {
            content: "\f798"
        }

        .fa-figma:before {
            content: "\f799"
        }

        .fa-firefox:before {
            content: "\f269"
        }

        .fa-firefox-browser:before {
            content: "\e007"
        }

        .fa-first-order:before {
            content: "\f2b0"
        }

        .fa-first-order-alt:before {
            content: "\f50a"
        }

        .fa-firstdraft:before {
            content: "\f3a1"
        }

        .fa-flickr:before {
            content: "\f16e"
        }

        .fa-flipboard:before {
            content: "\f44d"
        }

        .fa-fly:before {
            content: "\f417"
        }

        .fa-font-awesome:before {
            content: "\f2b4"
        }

        .fa-font-awesome-flag:before {
            content: "\f2b4"
        }

        .fa-font-awesome-logo-full:before {
            content: "\f2b4"
        }

        .fa-fonticons:before {
            content: "\f280"
        }

        .fa-fonticons-fi:before {
            content: "\f3a2"
        }

        .fa-fort-awesome:before {
            content: "\f286"
        }

        .fa-fort-awesome-alt:before {
            content: "\f3a3"
        }

        .fa-forumbee:before {
            content: "\f211"
        }

        .fa-foursquare:before {
            content: "\f180"
        }

        .fa-free-code-camp:before {
            content: "\f2c5"
        }

        .fa-freebsd:before {
            content: "\f3a4"
        }

        .fa-fulcrum:before {
            content: "\f50b"
        }

        .fa-galactic-republic:before {
            content: "\f50c"
        }

        .fa-galactic-senate:before {
            content: "\f50d"
        }

        .fa-get-pocket:before {
            content: "\f265"
        }

        .fa-gg:before {
            content: "\f260"
        }

        .fa-gg-circle:before {
            content: "\f261"
        }

        .fa-git:before {
            content: "\f1d3"
        }

        .fa-git-alt:before {
            content: "\f841"
        }

        .fa-git-square:before {
            content: "\f1d2"
        }

        .fa-github:before {
            content: "\f09b"
        }

        .fa-github-alt:before {
            content: "\f113"
        }

        .fa-github-square:before {
            content: "\f092"
        }

        .fa-gitkraken:before {
            content: "\f3a6"
        }

        .fa-gitlab:before {
            content: "\f296"
        }

        .fa-gitter:before {
            content: "\f426"
        }

        .fa-glide:before {
            content: "\f2a5"
        }

        .fa-glide-g:before {
            content: "\f2a6"
        }

        .fa-gofore:before {
            content: "\f3a7"
        }

        .fa-golang:before {
            content: "\e40f"
        }

        .fa-goodreads:before {
            content: "\f3a8"
        }

        .fa-goodreads-g:before {
            content: "\f3a9"
        }

        .fa-google:before {
            content: "\f1a0"
        }

        .fa-google-drive:before {
            content: "\f3aa"
        }

        .fa-google-pay:before {
            content: "\e079"
        }

        .fa-google-play:before {
            content: "\f3ab"
        }

        .fa-google-plus:before {
            content: "\f2b3"
        }

        .fa-google-plus-g:before {
            content: "\f0d5"
        }

        .fa-google-plus-square:before {
            content: "\f0d4"
        }

        .fa-google-wallet:before {
            content: "\f1ee"
        }

        .fa-gratipay:before {
            content: "\f184"
        }

        .fa-grav:before {
            content: "\f2d6"
        }

        .fa-gripfire:before {
            content: "\f3ac"
        }

        .fa-grunt:before {
            content: "\f3ad"
        }

        .fa-guilded:before {
            content: "\e07e"
        }

        .fa-gulp:before {
            content: "\f3ae"
        }

        .fa-hacker-news:before {
            content: "\f1d4"
        }

        .fa-hacker-news-square:before {
            content: "\f3af"
        }

        .fa-hackerrank:before {
            content: "\f5f7"
        }

        .fa-hashnode:before {
            content: "\e499"
        }

        .fa-hips:before {
            content: "\f452"
        }

        .fa-hire-a-helper:before {
            content: "\f3b0"
        }

        .fa-hive:before {
            content: "\e07f"
        }

        .fa-hooli:before {
            content: "\f427"
        }

        .fa-hornbill:before {
            content: "\f592"
        }

        .fa-hotjar:before {
            content: "\f3b1"
        }

        .fa-houzz:before {
            content: "\f27c"
        }

        .fa-html5:before {
            content: "\f13b"
        }

        .fa-hubspot:before {
            content: "\f3b2"
        }

        .fa-ideal:before {
            content: "\e013"
        }

        .fa-imdb:before {
            content: "\f2d8"
        }

        .fa-instagram:before {
            content: "\f16d"
        }

        .fa-instagram-square:before {
            content: "\e055"
        }

        .fa-instalod:before {
            content: "\e081"
        }

        .fa-intercom:before {
            content: "\f7af"
        }

        .fa-internet-explorer:before {
            content: "\f26b"
        }

        .fa-invision:before {
            content: "\f7b0"
        }

        .fa-ioxhost:before {
            content: "\f208"
        }

        .fa-itch-io:before {
            content: "\f83a"
        }

        .fa-itunes:before {
            content: "\f3b4"
        }

        .fa-itunes-note:before {
            content: "\f3b5"
        }

        .fa-java:before {
            content: "\f4e4"
        }

        .fa-jedi-order:before {
            content: "\f50e"
        }

        .fa-jenkins:before {
            content: "\f3b6"
        }

        .fa-jira:before {
            content: "\f7b1"
        }

        .fa-joget:before {
            content: "\f3b7"
        }

        .fa-joomla:before {
            content: "\f1aa"
        }

        .fa-js:before {
            content: "\f3b8"
        }

        .fa-js-square:before {
            content: "\f3b9"
        }

        .fa-jsfiddle:before {
            content: "\f1cc"
        }

        .fa-kaggle:before {
            content: "\f5fa"
        }

        .fa-keybase:before {
            content: "\f4f5"
        }

        .fa-keycdn:before {
            content: "\f3ba"
        }

        .fa-kickstarter:before {
            content: "\f3bb"
        }

        .fa-kickstarter-k:before {
            content: "\f3bc"
        }

        .fa-korvue:before {
            content: "\f42f"
        }

        .fa-laravel:before {
            content: "\f3bd"
        }

        .fa-lastfm:before {
            content: "\f202"
        }

        .fa-lastfm-square:before {
            content: "\f203"
        }

        .fa-leanpub:before {
            content: "\f212"
        }

        .fa-less:before {
            content: "\f41d"
        }

        .fa-line:before {
            content: "\f3c0"
        }

        .fa-linkedin:before {
            content: "\f08c"
        }

        .fa-linkedin-in:before {
            content: "\f0e1"
        }

        .fa-linode:before {
            content: "\f2b8"
        }

        .fa-linux:before {
            content: "\f17c"
        }

        .fa-lyft:before {
            content: "\f3c3"
        }

        .fa-magento:before {
            content: "\f3c4"
        }

        .fa-mailchimp:before {
            content: "\f59e"
        }

        .fa-mandalorian:before {
            content: "\f50f"
        }

        .fa-markdown:before {
            content: "\f60f"
        }

        .fa-mastodon:before {
            content: "\f4f6"
        }

        .fa-maxcdn:before {
            content: "\f136"
        }

        .fa-mdb:before {
            content: "\f8ca"
        }

        .fa-medapps:before {
            content: "\f3c6"
        }

        .fa-medium:before {
            content: "\f23a"
        }

        .fa-medium-m:before {
            content: "\f23a"
        }

        .fa-medrt:before {
            content: "\f3c8"
        }

        .fa-meetup:before {
            content: "\f2e0"
        }

        .fa-megaport:before {
            content: "\f5a3"
        }

        .fa-mendeley:before {
            content: "\f7b3"
        }

        .fa-microblog:before {
            content: "\e01a"
        }

        .fa-microsoft:before {
            content: "\f3ca"
        }

        .fa-mix:before {
            content: "\f3cb"
        }

        .fa-mixcloud:before {
            content: "\f289"
        }

        .fa-mixer:before {
            content: "\e056"
        }

        .fa-mizuni:before {
            content: "\f3cc"
        }

        .fa-modx:before {
            content: "\f285"
        }

        .fa-monero:before {
            content: "\f3d0"
        }

        .fa-napster:before {
            content: "\f3d2"
        }

        .fa-neos:before {
            content: "\f612"
        }

        .fa-nimblr:before {
            content: "\f5a8"
        }

        .fa-node:before {
            content: "\f419"
        }

        .fa-node-js:before {
            content: "\f3d3"
        }

        .fa-npm:before {
            content: "\f3d4"
        }

        .fa-ns8:before {
            content: "\f3d5"
        }

        .fa-nutritionix:before {
            content: "\f3d6"
        }

        .fa-octopus-deploy:before {
            content: "\e082"
        }

        .fa-odnoklassniki:before {
            content: "\f263"
        }

        .fa-odnoklassniki-square:before {
            content: "\f264"
        }

        .fa-old-republic:before {
            content: "\f510"
        }

        .fa-opencart:before {
            content: "\f23d"
        }

        .fa-openid:before {
            content: "\f19b"
        }

        .fa-opera:before {
            content: "\f26a"
        }

        .fa-optin-monster:before {
            content: "\f23c"
        }

        .fa-orcid:before {
            content: "\f8d2"
        }

        .fa-osi:before {
            content: "\f41a"
        }

        .fa-padlet:before {
            content: "\e4a0"
        }

        .fa-page4:before {
            content: "\f3d7"
        }

        .fa-pagelines:before {
            content: "\f18c"
        }

        .fa-palfed:before {
            content: "\f3d8"
        }

        .fa-patreon:before {
            content: "\f3d9"
        }

        .fa-paypal:before {
            content: "\f1ed"
        }

        .fa-perbyte:before {
            content: "\e083"
        }

        .fa-periscope:before {
            content: "\f3da"
        }

        .fa-phabricator:before {
            content: "\f3db"
        }

        .fa-phoenix-framework:before {
            content: "\f3dc"
        }

        .fa-phoenix-squadron:before {
            content: "\f511"
        }

        .fa-php:before {
            content: "\f457"
        }

        .fa-pied-piper:before {
            content: "\f2ae"
        }

        .fa-pied-piper-alt:before {
            content: "\f1a8"
        }

        .fa-pied-piper-hat:before {
            content: "\f4e5"
        }

        .fa-pied-piper-pp:before {
            content: "\f1a7"
        }

        .fa-pied-piper-square:before {
            content: "\e01e"
        }

        .fa-pinterest:before {
            content: "\f0d2"
        }

        .fa-pinterest-p:before {
            content: "\f231"
        }

        .fa-pinterest-square:before {
            content: "\f0d3"
        }

        .fa-pix:before {
            content: "\e43a"
        }

        .fa-playstation:before {
            content: "\f3df"
        }

        .fa-product-hunt:before {
            content: "\f288"
        }

        .fa-pushed:before {
            content: "\f3e1"
        }

        .fa-python:before {
            content: "\f3e2"
        }

        .fa-qq:before {
            content: "\f1d6"
        }

        .fa-quinscape:before {
            content: "\f459"
        }

        .fa-quora:before {
            content: "\f2c4"
        }

        .fa-r-project:before {
            content: "\f4f7"
        }

        .fa-raspberry-pi:before {
            content: "\f7bb"
        }

        .fa-ravelry:before {
            content: "\f2d9"
        }

        .fa-react:before {
            content: "\f41b"
        }

        .fa-reacteurope:before {
            content: "\f75d"
        }

        .fa-readme:before {
            content: "\f4d5"
        }

        .fa-rebel:before {
            content: "\f1d0"
        }

        .fa-red-river:before {
            content: "\f3e3"
        }

        .fa-reddit:before {
            content: "\f1a1"
        }

        .fa-reddit-alien:before {
            content: "\f281"
        }

        .fa-reddit-square:before {
            content: "\f1a2"
        }

        .fa-redhat:before {
            content: "\f7bc"
        }

        .fa-renren:before {
            content: "\f18b"
        }

        .fa-replyd:before {
            content: "\f3e6"
        }

        .fa-researchgate:before {
            content: "\f4f8"
        }

        .fa-resolving:before {
            content: "\f3e7"
        }

        .fa-rev:before {
            content: "\f5b2"
        }

        .fa-rocketchat:before {
            content: "\f3e8"
        }

        .fa-rockrms:before {
            content: "\f3e9"
        }

        .fa-rust:before {
            content: "\e07a"
        }

        .fa-safari:before {
            content: "\f267"
        }

        .fa-salesforce:before {
            content: "\f83b"
        }

        .fa-sass:before {
            content: "\f41e"
        }

        .fa-schlix:before {
            content: "\f3ea"
        }

        .fa-scribd:before {
            content: "\f28a"
        }

        .fa-searchengin:before {
            content: "\f3eb"
        }

        .fa-sellcast:before {
            content: "\f2da"
        }

        .fa-sellsy:before {
            content: "\f213"
        }

        .fa-servicestack:before {
            content: "\f3ec"
        }

        .fa-shirtsinbulk:before {
            content: "\f214"
        }

        .fa-shopify:before {
            content: "\e057"
        }

        .fa-shopware:before {
            content: "\f5b5"
        }

        .fa-simplybuilt:before {
            content: "\f215"
        }

        .fa-sistrix:before {
            content: "\f3ee"
        }

        .fa-sith:before {
            content: "\f512"
        }

        .fa-sitrox:before {
            content: "\e44a"
        }

        .fa-sketch:before {
            content: "\f7c6"
        }

        .fa-skyatlas:before {
            content: "\f216"
        }

        .fa-skype:before {
            content: "\f17e"
        }

        .fa-slack:before {
            content: "\f198"
        }

        .fa-slack-hash:before {
            content: "\f198"
        }

        .fa-slideshare:before {
            content: "\f1e7"
        }

        .fa-snapchat:before {
            content: "\f2ab"
        }

        .fa-snapchat-ghost:before {
            content: "\f2ab"
        }

        .fa-snapchat-square:before {
            content: "\f2ad"
        }

        .fa-soundcloud:before {
            content: "\f1be"
        }

        .fa-sourcetree:before {
            content: "\f7d3"
        }

        .fa-speakap:before {
            content: "\f3f3"
        }

        .fa-speaker-deck:before {
            content: "\f83c"
        }

        .fa-spotify:before {
            content: "\f1bc"
        }

        .fa-square-font-awesome:before {
            content: "\f425"
        }

        .fa-square-font-awesome-stroke:before {
            content: "\f35c"
        }

        .fa-font-awesome-alt:before {
            content: "\f35c"
        }

        .fa-squarespace:before {
            content: "\f5be"
        }

        .fa-stack-exchange:before {
            content: "\f18d"
        }

        .fa-stack-overflow:before {
            content: "\f16c"
        }

        .fa-stackpath:before {
            content: "\f842"
        }

        .fa-staylinked:before {
            content: "\f3f5"
        }

        .fa-steam:before {
            content: "\f1b6"
        }

        .fa-steam-square:before {
            content: "\f1b7"
        }

        .fa-steam-symbol:before {
            content: "\f3f6"
        }

        .fa-sticker-mule:before {
            content: "\f3f7"
        }

        .fa-strava:before {
            content: "\f428"
        }

        .fa-stripe:before {
            content: "\f429"
        }

        .fa-stripe-s:before {
            content: "\f42a"
        }

        .fa-studiovinari:before {
            content: "\f3f8"
        }

        .fa-stumbleupon:before {
            content: "\f1a4"
        }

        .fa-stumbleupon-circle:before {
            content: "\f1a3"
        }

        .fa-superpowers:before {
            content: "\f2dd"
        }

        .fa-supple:before {
            content: "\f3f9"
        }

        .fa-suse:before {
            content: "\f7d6"
        }

        .fa-swift:before {
            content: "\f8e1"
        }

        .fa-symfony:before {
            content: "\f83d"
        }

        .fa-teamspeak:before {
            content: "\f4f9"
        }

        .fa-telegram:before {
            content: "\f2c6"
        }

        .fa-telegram-plane:before {
            content: "\f2c6"
        }

        .fa-tencent-weibo:before {
            content: "\f1d5"
        }

        .fa-the-red-yeti:before {
            content: "\f69d"
        }

        .fa-themeco:before {
            content: "\f5c6"
        }

        .fa-themeisle:before {
            content: "\f2b2"
        }

        .fa-think-peaks:before {
            content: "\f731"
        }

        .fa-tiktok:before {
            content: "\e07b"
        }

        .fa-trade-federation:before {
            content: "\f513"
        }

        .fa-trello:before {
            content: "\f181"
        }

        .fa-tumblr:before {
            content: "\f173"
        }

        .fa-tumblr-square:before {
            content: "\f174"
        }

        .fa-twitch:before {
            content: "\f1e8"
        }

        .fa-twitter:before {
            content: "\f099"
        }

        .fa-twitter-square:before {
            content: "\f081"
        }

        .fa-typo3:before {
            content: "\f42b"
        }

        .fa-uber:before {
            content: "\f402"
        }

        .fa-ubuntu:before {
            content: "\f7df"
        }

        .fa-uikit:before {
            content: "\f403"
        }

        .fa-umbraco:before {
            content: "\f8e8"
        }

        .fa-uncharted:before {
            content: "\e084"
        }

        .fa-uniregistry:before {
            content: "\f404"
        }

        .fa-unity:before {
            content: "\e049"
        }

        .fa-unsplash:before {
            content: "\e07c"
        }

        .fa-untappd:before {
            content: "\f405"
        }

        .fa-ups:before {
            content: "\f7e0"
        }

        .fa-usb:before {
            content: "\f287"
        }

        .fa-usps:before {
            content: "\f7e1"
        }

        .fa-ussunnah:before {
            content: "\f407"
        }

        .fa-vaadin:before {
            content: "\f408"
        }

        .fa-viacoin:before {
            content: "\f237"
        }

        .fa-viadeo:before {
            content: "\f2a9"
        }

        .fa-viadeo-square:before {
            content: "\f2aa"
        }

        .fa-viber:before {
            content: "\f409"
        }

        .fa-vimeo:before {
            content: "\f40a"
        }

        .fa-vimeo-square:before {
            content: "\f194"
        }

        .fa-vimeo-v:before {
            content: "\f27d"
        }

        .fa-vine:before {
            content: "\f1ca"
        }

        .fa-vk:before {
            content: "\f189"
        }

        .fa-vnv:before {
            content: "\f40b"
        }

        .fa-vuejs:before {
            content: "\f41f"
        }

        .fa-watchman-monitoring:before {
            content: "\e087"
        }

        .fa-waze:before {
            content: "\f83f"
        }

        .fa-weebly:before {
            content: "\f5cc"
        }

        .fa-weibo:before {
            content: "\f18a"
        }

        .fa-weixin:before {
            content: "\f1d7"
        }

        .fa-whatsapp:before {
            content: "\f232"
        }

        .fa-whatsapp-square:before {
            content: "\f40c"
        }

        .fa-whmcs:before {
            content: "\f40d"
        }

        .fa-wikipedia-w:before {
            content: "\f266"
        }

        .fa-windows:before {
            content: "\f17a"
        }

        .fa-wirsindhandwerk:before {
            content: "\e2d0"
        }

        .fa-wsh:before {
            content: "\e2d0"
        }

        .fa-wix:before {
            content: "\f5cf"
        }

        .fa-wizards-of-the-coast:before {
            content: "\f730"
        }

        .fa-wodu:before {
            content: "\e088"
        }

        .fa-wolf-pack-battalion:before {
            content: "\f514"
        }

        .fa-wordpress:before {
            content: "\f19a"
        }

        .fa-wordpress-simple:before {
            content: "\f411"
        }

        .fa-wpbeginner:before {
            content: "\f297"
        }

        .fa-wpexplorer:before {
            content: "\f2de"
        }

        .fa-wpforms:before {
            content: "\f298"
        }

        .fa-wpressr:before {
            content: "\f3e4"
        }

        .fa-xbox:before {
            content: "\f412"
        }

        .fa-xing:before {
            content: "\f168"
        }

        .fa-xing-square:before {
            content: "\f169"
        }

        .fa-y-combinator:before {
            content: "\f23b"
        }

        .fa-yahoo:before {
            content: "\f19e"
        }

        .fa-yammer:before {
            content: "\f840"
        }

        .fa-yandex:before {
            content: "\f413"
        }

        .fa-yandex-international:before {
            content: "\f414"
        }

        .fa-yarn:before {
            content: "\f7e3"
        }

        .fa-yelp:before {
            content: "\f1e9"
        }

        .fa-yoast:before {
            content: "\f2b1"
        }

        .fa-youtube:before {
            content: "\f167"
        }

        .fa-youtube-square:before {
            content: "\f431"
        }

        .fa-zhihu:before {
            content: "\f63f"
        }

        :root,
        :host {
            --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Free"
        }

        @font-face {
            font-family: 'Font Awesome 6 Free';
            font-style: normal;
            font-weight: 900;
            font-display: block;
            src: url("../../fonts/fa-solid-900.woff2") format("woff2"), url("../../fonts/fa-solid-900.ttf") format("truetype")
        }

        .fas,
        .fa-solid {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900
        }

        .fa.fa-glass:before {
            content: "\f000"
        }

        .fa.fa-envelope-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-envelope-o:before {
            content: "\f0e0"
        }

        .fa.fa-star-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-star-o:before {
            content: "\f005"
        }

        .fa.fa-remove:before {
            content: "\f00d"
        }

        .fa.fa-close:before {
            content: "\f00d"
        }

        .fa.fa-gear:before {
            content: "\f013"
        }

        .fa.fa-trash-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-trash-o:before {
            content: "\f2ed"
        }

        .fa.fa-home:before {
            content: "\f015"
        }

        .fa.fa-file-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-o:before {
            content: "\f15b"
        }

        .fa.fa-clock-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-clock-o:before {
            content: "\f017"
        }

        .fa.fa-arrow-circle-o-down {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-arrow-circle-o-down:before {
            content: "\f358"
        }

        .fa.fa-arrow-circle-o-up {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-arrow-circle-o-up:before {
            content: "\f35b"
        }

        .fa.fa-play-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-play-circle-o:before {
            content: "\f144"
        }

        .fa.fa-repeat:before {
            content: "\f01e"
        }

        .fa.fa-rotate-right:before {
            content: "\f01e"
        }

        .fa.fa-refresh:before {
            content: "\f021"
        }

        .fa.fa-list-alt {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-list-alt:before {
            content: "\f022"
        }

        .fa.fa-dedent:before {
            content: "\f03b"
        }

        .fa.fa-video-camera:before {
            content: "\f03d"
        }

        .fa.fa-picture-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-picture-o:before {
            content: "\f03e"
        }

        .fa.fa-photo {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-photo:before {
            content: "\f03e"
        }

        .fa.fa-image {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-image:before {
            content: "\f03e"
        }

        .fa.fa-map-marker:before {
            content: "\f3c5"
        }

        .fa.fa-pencil-square-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-pencil-square-o:before {
            content: "\f044"
        }

        .fa.fa-edit {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-edit:before {
            content: "\f044"
        }

        .fa.fa-share-square-o:before {
            content: "\f14d"
        }

        .fa.fa-check-square-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-check-square-o:before {
            content: "\f14a"
        }

        .fa.fa-arrows:before {
            content: "\f0b2"
        }

        .fa.fa-times-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-times-circle-o:before {
            content: "\f057"
        }

        .fa.fa-check-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-check-circle-o:before {
            content: "\f058"
        }

        .fa.fa-mail-forward:before {
            content: "\f064"
        }

        .fa.fa-expand:before {
            content: "\f424"
        }

        .fa.fa-compress:before {
            content: "\f422"
        }

        .fa.fa-eye {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-eye-slash {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-warning:before {
            content: "\f071"
        }

        .fa.fa-calendar:before {
            content: "\f073"
        }

        .fa.fa-arrows-v:before {
            content: "\f338"
        }

        .fa.fa-arrows-h:before {
            content: "\f337"
        }

        .fa.fa-bar-chart:before {
            content: "\e0e3"
        }

        .fa.fa-bar-chart-o:before {
            content: "\e0e3"
        }

        .fa.fa-twitter-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-facebook-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gears:before {
            content: "\f085"
        }

        .fa.fa-thumbs-o-up {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-thumbs-o-up:before {
            content: "\f164"
        }

        .fa.fa-thumbs-o-down {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-thumbs-o-down:before {
            content: "\f165"
        }

        .fa.fa-heart-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-heart-o:before {
            content: "\f004"
        }

        .fa.fa-sign-out:before {
            content: "\f2f5"
        }

        .fa.fa-linkedin-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-linkedin-square:before {
            content: "\f08c"
        }

        .fa.fa-thumb-tack:before {
            content: "\f08d"
        }

        .fa.fa-external-link:before {
            content: "\f35d"
        }

        .fa.fa-sign-in:before {
            content: "\f2f6"
        }

        .fa.fa-github-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-lemon-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-lemon-o:before {
            content: "\f094"
        }

        .fa.fa-square-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-square-o:before {
            content: "\f0c8"
        }

        .fa.fa-bookmark-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-bookmark-o:before {
            content: "\f02e"
        }

        .fa.fa-twitter {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-facebook {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-facebook:before {
            content: "\f39e"
        }

        .fa.fa-facebook-f {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-facebook-f:before {
            content: "\f39e"
        }

        .fa.fa-github {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-credit-card {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-feed:before {
            content: "\f09e"
        }

        .fa.fa-hdd-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hdd-o:before {
            content: "\f0a0"
        }

        .fa.fa-hand-o-right {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-o-right:before {
            content: "\f0a4"
        }

        .fa.fa-hand-o-left {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-o-left:before {
            content: "\f0a5"
        }

        .fa.fa-hand-o-up {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-o-up:before {
            content: "\f0a6"
        }

        .fa.fa-hand-o-down {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-o-down:before {
            content: "\f0a7"
        }

        .fa.fa-globe:before {
            content: "\f57d"
        }

        .fa.fa-tasks:before {
            content: "\f828"
        }

        .fa.fa-arrows-alt:before {
            content: "\f31e"
        }

        .fa.fa-group:before {
            content: "\f0c0"
        }

        .fa.fa-chain:before {
            content: "\f0c1"
        }

        .fa.fa-cut:before {
            content: "\f0c4"
        }

        .fa.fa-files-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-files-o:before {
            content: "\f0c5"
        }

        .fa.fa-floppy-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-floppy-o:before {
            content: "\f0c7"
        }

        .fa.fa-save {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-save:before {
            content: "\f0c7"
        }

        .fa.fa-navicon:before {
            content: "\f0c9"
        }

        .fa.fa-reorder:before {
            content: "\f0c9"
        }

        .fa.fa-magic:before {
            content: "\e2ca"
        }

        .fa.fa-pinterest {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-pinterest-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-plus-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-plus {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-plus:before {
            content: "\f0d5"
        }

        .fa.fa-money:before {
            content: "\f3d1"
        }

        .fa.fa-unsorted:before {
            content: "\f0dc"
        }

        .fa.fa-sort-desc:before {
            content: "\f0dd"
        }

        .fa.fa-sort-asc:before {
            content: "\f0de"
        }

        .fa.fa-linkedin {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-linkedin:before {
            content: "\f0e1"
        }

        .fa.fa-rotate-left:before {
            content: "\f0e2"
        }

        .fa.fa-legal:before {
            content: "\f0e3"
        }

        .fa.fa-tachometer:before {
            content: "\f625"
        }

        .fa.fa-dashboard:before {
            content: "\f625"
        }

        .fa.fa-comment-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-comment-o:before {
            content: "\f075"
        }

        .fa.fa-comments-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-comments-o:before {
            content: "\f086"
        }

        .fa.fa-flash:before {
            content: "\f0e7"
        }

        .fa.fa-clipboard:before {
            content: "\f0ea"
        }

        .fa.fa-lightbulb-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-lightbulb-o:before {
            content: "\f0eb"
        }

        .fa.fa-exchange:before {
            content: "\f362"
        }

        .fa.fa-cloud-download:before {
            content: "\f0ed"
        }

        .fa.fa-cloud-upload:before {
            content: "\f0ee"
        }

        .fa.fa-bell-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-bell-o:before {
            content: "\f0f3"
        }

        .fa.fa-cutlery:before {
            content: "\f2e7"
        }

        .fa.fa-file-text-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-text-o:before {
            content: "\f15c"
        }

        .fa.fa-building-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-building-o:before {
            content: "\f1ad"
        }

        .fa.fa-hospital-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hospital-o:before {
            content: "\f0f8"
        }

        .fa.fa-tablet:before {
            content: "\f3fa"
        }

        .fa.fa-mobile:before {
            content: "\f3cd"
        }

        .fa.fa-mobile-phone:before {
            content: "\f3cd"
        }

        .fa.fa-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-circle-o:before {
            content: "\f111"
        }

        .fa.fa-mail-reply:before {
            content: "\f3e5"
        }

        .fa.fa-github-alt {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-folder-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-folder-o:before {
            content: "\f07b"
        }

        .fa.fa-folder-open-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-folder-open-o:before {
            content: "\f07c"
        }

        .fa.fa-smile-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-smile-o:before {
            content: "\f118"
        }

        .fa.fa-frown-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-frown-o:before {
            content: "\f119"
        }

        .fa.fa-meh-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-meh-o:before {
            content: "\f11a"
        }

        .fa.fa-keyboard-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-keyboard-o:before {
            content: "\f11c"
        }

        .fa.fa-flag-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-flag-o:before {
            content: "\f024"
        }

        .fa.fa-mail-reply-all:before {
            content: "\f122"
        }

        .fa.fa-star-half-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-star-half-o:before {
            content: "\f5c0"
        }

        .fa.fa-star-half-empty {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-star-half-empty:before {
            content: "\f5c0"
        }

        .fa.fa-star-half-full {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-star-half-full:before {
            content: "\f5c0"
        }

        .fa.fa-code-fork:before {
            content: "\f126"
        }

        .fa.fa-chain-broken:before {
            content: "\f127"
        }

        .fa.fa-unlink:before {
            content: "\f127"
        }

        .fa.fa-calendar-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-calendar-o:before {
            content: "\f133"
        }

        .fa.fa-maxcdn {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-html5 {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-css3 {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-unlock-alt:before {
            content: "\f09c"
        }

        .fa.fa-minus-square-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-minus-square-o:before {
            content: "\f146"
        }

        .fa.fa-level-up:before {
            content: "\f3bf"
        }

        .fa.fa-level-down:before {
            content: "\f3be"
        }

        .fa.fa-pencil-square:before {
            content: "\f14b"
        }

        .fa.fa-external-link-square:before {
            content: "\f360"
        }

        .fa.fa-compass {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-caret-square-o-down {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-caret-square-o-down:before {
            content: "\f150"
        }

        .fa.fa-toggle-down {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-toggle-down:before {
            content: "\f150"
        }

        .fa.fa-caret-square-o-up {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-caret-square-o-up:before {
            content: "\f151"
        }

        .fa.fa-toggle-up {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-toggle-up:before {
            content: "\f151"
        }

        .fa.fa-caret-square-o-right {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-caret-square-o-right:before {
            content: "\f152"
        }

        .fa.fa-toggle-right {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-toggle-right:before {
            content: "\f152"
        }

        .fa.fa-eur:before {
            content: "\f153"
        }

        .fa.fa-euro:before {
            content: "\f153"
        }

        .fa.fa-gbp:before {
            content: "\f154"
        }

        .fa.fa-usd:before {
            content: "\24"
        }

        .fa.fa-dollar:before {
            content: "\24"
        }

        .fa.fa-inr:before {
            content: "\e1bc"
        }

        .fa.fa-rupee:before {
            content: "\e1bc"
        }

        .fa.fa-jpy:before {
            content: "\f157"
        }

        .fa.fa-cny:before {
            content: "\f157"
        }

        .fa.fa-rmb:before {
            content: "\f157"
        }

        .fa.fa-yen:before {
            content: "\f157"
        }

        .fa.fa-rub:before {
            content: "\f158"
        }

        .fa.fa-ruble:before {
            content: "\f158"
        }

        .fa.fa-rouble:before {
            content: "\f158"
        }

        .fa.fa-krw:before {
            content: "\f159"
        }

        .fa.fa-won:before {
            content: "\f159"
        }

        .fa.fa-btc {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bitcoin {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bitcoin:before {
            content: "\f15a"
        }

        .fa.fa-file-text:before {
            content: "\f15c"
        }

        .fa.fa-sort-alpha-asc:before {
            content: "\f15d"
        }

        .fa.fa-sort-alpha-desc:before {
            content: "\f881"
        }

        .fa.fa-sort-amount-asc:before {
            content: "\f884"
        }

        .fa.fa-sort-amount-desc:before {
            content: "\f160"
        }

        .fa.fa-sort-numeric-asc:before {
            content: "\f162"
        }

        .fa.fa-sort-numeric-desc:before {
            content: "\f886"
        }

        .fa.fa-youtube-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-youtube {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-xing {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-xing-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-youtube-play {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-youtube-play:before {
            content: "\f167"
        }

        .fa.fa-dropbox {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-stack-overflow {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-instagram {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-flickr {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-adn {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bitbucket {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bitbucket-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bitbucket-square:before {
            content: "\f171"
        }

        .fa.fa-tumblr {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-tumblr-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-long-arrow-down:before {
            content: "\f309"
        }

        .fa.fa-long-arrow-up:before {
            content: "\f30c"
        }

        .fa.fa-long-arrow-left:before {
            content: "\f30a"
        }

        .fa.fa-long-arrow-right:before {
            content: "\f30b"
        }

        .fa.fa-apple {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-windows {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-android {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-linux {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-dribbble {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-skype {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-foursquare {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-trello {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gratipay {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gittip {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gittip:before {
            content: "\f184"
        }

        .fa.fa-sun-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-sun-o:before {
            content: "\f185"
        }

        .fa.fa-moon-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-moon-o:before {
            content: "\f186"
        }

        .fa.fa-vk {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-weibo {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-renren {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-pagelines {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-stack-exchange {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-arrow-circle-o-right {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-arrow-circle-o-right:before {
            content: "\f35a"
        }

        .fa.fa-arrow-circle-o-left {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-arrow-circle-o-left:before {
            content: "\f359"
        }

        .fa.fa-caret-square-o-left {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-caret-square-o-left:before {
            content: "\f191"
        }

        .fa.fa-toggle-left {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-toggle-left:before {
            content: "\f191"
        }

        .fa.fa-dot-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-dot-circle-o:before {
            content: "\f192"
        }

        .fa.fa-vimeo-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-try:before {
            content: "\e2bb"
        }

        .fa.fa-turkish-lira:before {
            content: "\e2bb"
        }

        .fa.fa-plus-square-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-plus-square-o:before {
            content: "\f0fe"
        }

        .fa.fa-slack {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wordpress {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-openid {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-institution:before {
            content: "\f19c"
        }

        .fa.fa-bank:before {
            content: "\f19c"
        }

        .fa.fa-mortar-board:before {
            content: "\f19d"
        }

        .fa.fa-yahoo {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-reddit {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-reddit-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-stumbleupon-circle {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-stumbleupon {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-delicious {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-digg {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-pied-piper-pp {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-pied-piper-alt {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-drupal {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-joomla {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-behance {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-behance-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-steam {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-steam-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-automobile:before {
            content: "\f1b9"
        }

        .fa.fa-cab:before {
            content: "\f1ba"
        }

        .fa.fa-spotify {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-deviantart {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-soundcloud {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-file-pdf-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-pdf-o:before {
            content: "\f1c1"
        }

        .fa.fa-file-word-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-word-o:before {
            content: "\f1c2"
        }

        .fa.fa-file-excel-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-excel-o:before {
            content: "\f1c3"
        }

        .fa.fa-file-powerpoint-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-powerpoint-o:before {
            content: "\f1c4"
        }

        .fa.fa-file-image-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-image-o:before {
            content: "\f1c5"
        }

        .fa.fa-file-photo-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-photo-o:before {
            content: "\f1c5"
        }

        .fa.fa-file-picture-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-picture-o:before {
            content: "\f1c5"
        }

        .fa.fa-file-archive-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-archive-o:before {
            content: "\f1c6"
        }

        .fa.fa-file-zip-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-zip-o:before {
            content: "\f1c6"
        }

        .fa.fa-file-audio-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-audio-o:before {
            content: "\f1c7"
        }

        .fa.fa-file-sound-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-sound-o:before {
            content: "\f1c7"
        }

        .fa.fa-file-video-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-video-o:before {
            content: "\f1c8"
        }

        .fa.fa-file-movie-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-movie-o:before {
            content: "\f1c8"
        }

        .fa.fa-file-code-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-file-code-o:before {
            content: "\f1c9"
        }

        .fa.fa-vine {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-codepen {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-jsfiddle {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-life-bouy:before {
            content: "\f1cd"
        }

        .fa.fa-life-buoy:before {
            content: "\f1cd"
        }

        .fa.fa-life-saver:before {
            content: "\f1cd"
        }

        .fa.fa-support:before {
            content: "\f1cd"
        }

        .fa.fa-circle-o-notch:before {
            content: "\f1ce"
        }

        .fa.fa-rebel {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-ra {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-ra:before {
            content: "\f1d0"
        }

        .fa.fa-resistance {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-resistance:before {
            content: "\f1d0"
        }

        .fa.fa-empire {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-ge {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-ge:before {
            content: "\f1d1"
        }

        .fa.fa-git-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-git {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-hacker-news {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-y-combinator-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-y-combinator-square:before {
            content: "\f1d4"
        }

        .fa.fa-yc-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-yc-square:before {
            content: "\f1d4"
        }

        .fa.fa-tencent-weibo {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-qq {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-weixin {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wechat {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wechat:before {
            content: "\f1d7"
        }

        .fa.fa-send:before {
            content: "\f1d8"
        }

        .fa.fa-paper-plane-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-paper-plane-o:before {
            content: "\f1d8"
        }

        .fa.fa-send-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-send-o:before {
            content: "\f1d8"
        }

        .fa.fa-circle-thin {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-circle-thin:before {
            content: "\f111"
        }

        .fa.fa-header:before {
            content: "\f1dc"
        }

        .fa.fa-futbol-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-futbol-o:before {
            content: "\f1e3"
        }

        .fa.fa-soccer-ball-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-soccer-ball-o:before {
            content: "\f1e3"
        }

        .fa.fa-slideshare {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-twitch {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-yelp {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-newspaper-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-newspaper-o:before {
            content: "\f1ea"
        }

        .fa.fa-paypal {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-wallet {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-visa {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-mastercard {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-discover {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-amex {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-paypal {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-stripe {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bell-slash-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-bell-slash-o:before {
            content: "\f1f6"
        }

        .fa.fa-trash:before {
            content: "\f2ed"
        }

        .fa.fa-copyright {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-eyedropper:before {
            content: "\f1fb"
        }

        .fa.fa-area-chart:before {
            content: "\f1fe"
        }

        .fa.fa-pie-chart:before {
            content: "\f200"
        }

        .fa.fa-line-chart:before {
            content: "\f201"
        }

        .fa.fa-lastfm {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-lastfm-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-ioxhost {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-angellist {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-cc:before {
            content: "\f20a"
        }

        .fa.fa-ils:before {
            content: "\f20b"
        }

        .fa.fa-shekel:before {
            content: "\f20b"
        }

        .fa.fa-sheqel:before {
            content: "\f20b"
        }

        .fa.fa-buysellads {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-connectdevelop {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-dashcube {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-forumbee {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-leanpub {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-sellsy {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-shirtsinbulk {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-simplybuilt {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-skyatlas {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-diamond {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-diamond:before {
            content: "\f3a5"
        }

        .fa.fa-transgender:before {
            content: "\f224"
        }

        .fa.fa-intersex:before {
            content: "\f224"
        }

        .fa.fa-transgender-alt:before {
            content: "\f225"
        }

        .fa.fa-facebook-official {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-facebook-official:before {
            content: "\f09a"
        }

        .fa.fa-pinterest-p {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-whatsapp {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-hotel:before {
            content: "\f236"
        }

        .fa.fa-viacoin {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-medium {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-y-combinator {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-yc {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-yc:before {
            content: "\f23b"
        }

        .fa.fa-optin-monster {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-opencart {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-expeditedssl {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-battery-4:before {
            content: "\f240"
        }

        .fa.fa-battery:before {
            content: "\f240"
        }

        .fa.fa-battery-3:before {
            content: "\f241"
        }

        .fa.fa-battery-2:before {
            content: "\f242"
        }

        .fa.fa-battery-1:before {
            content: "\f243"
        }

        .fa.fa-battery-0:before {
            content: "\f244"
        }

        .fa.fa-object-group {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-object-ungroup {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-sticky-note-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-sticky-note-o:before {
            content: "\f249"
        }

        .fa.fa-cc-jcb {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-cc-diners-club {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-clone {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hourglass-o:before {
            content: "\f252"
        }

        .fa.fa-hourglass-1:before {
            content: "\f251"
        }

        .fa.fa-hourglass-half:before {
            content: "\f254"
        }

        .fa.fa-hourglass-2:before {
            content: "\f254"
        }

        .fa.fa-hourglass-3:before {
            content: "\f253"
        }

        .fa.fa-hand-rock-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-rock-o:before {
            content: "\f255"
        }

        .fa.fa-hand-grab-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-grab-o:before {
            content: "\f255"
        }

        .fa.fa-hand-paper-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-paper-o:before {
            content: "\f256"
        }

        .fa.fa-hand-stop-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-stop-o:before {
            content: "\f256"
        }

        .fa.fa-hand-scissors-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-scissors-o:before {
            content: "\f257"
        }

        .fa.fa-hand-lizard-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-lizard-o:before {
            content: "\f258"
        }

        .fa.fa-hand-spock-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-spock-o:before {
            content: "\f259"
        }

        .fa.fa-hand-pointer-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-pointer-o:before {
            content: "\f25a"
        }

        .fa.fa-hand-peace-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-hand-peace-o:before {
            content: "\f25b"
        }

        .fa.fa-registered {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-creative-commons {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gg {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gg-circle {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-odnoklassniki {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-odnoklassniki-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-get-pocket {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wikipedia-w {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-safari {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-chrome {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-firefox {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-opera {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-internet-explorer {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-television:before {
            content: "\f26c"
        }

        .fa.fa-contao {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-500px {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-amazon {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-calendar-plus-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-calendar-plus-o:before {
            content: "\f271"
        }

        .fa.fa-calendar-minus-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-calendar-minus-o:before {
            content: "\f272"
        }

        .fa.fa-calendar-times-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-calendar-times-o:before {
            content: "\f273"
        }

        .fa.fa-calendar-check-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-calendar-check-o:before {
            content: "\f274"
        }

        .fa.fa-map-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-map-o:before {
            content: "\f279"
        }

        .fa.fa-commenting:before {
            content: "\f4ad"
        }

        .fa.fa-commenting-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-commenting-o:before {
            content: "\f4ad"
        }

        .fa.fa-houzz {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-vimeo {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-vimeo:before {
            content: "\f27d"
        }

        .fa.fa-black-tie {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-fonticons {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-reddit-alien {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-edge {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-credit-card-alt:before {
            content: "\f09d"
        }

        .fa.fa-codiepie {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-modx {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-fort-awesome {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-usb {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-product-hunt {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-mixcloud {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-scribd {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-pause-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-pause-circle-o:before {
            content: "\f28b"
        }

        .fa.fa-stop-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-stop-circle-o:before {
            content: "\f28d"
        }

        .fa.fa-bluetooth {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-bluetooth-b {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-gitlab {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wpbeginner {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wpforms {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-envira {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wheelchair-alt {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wheelchair-alt:before {
            content: "\f368"
        }

        .fa.fa-question-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-question-circle-o:before {
            content: "\f059"
        }

        .fa.fa-volume-control-phone:before {
            content: "\f2a0"
        }

        .fa.fa-asl-interpreting:before {
            content: "\f2a3"
        }

        .fa.fa-deafness:before {
            content: "\f2a4"
        }

        .fa.fa-hard-of-hearing:before {
            content: "\f2a4"
        }

        .fa.fa-glide {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-glide-g {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-signing:before {
            content: "\f2a7"
        }

        .fa.fa-viadeo {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-viadeo-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-snapchat {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-snapchat-ghost {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-snapchat-ghost:before {
            content: "\f2ab"
        }

        .fa.fa-snapchat-square {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-pied-piper {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-first-order {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-yoast {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-themeisle {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-plus-official {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-plus-official:before {
            content: "\f2b3"
        }

        .fa.fa-google-plus-circle {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-google-plus-circle:before {
            content: "\f2b3"
        }

        .fa.fa-font-awesome {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-fa {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-fa:before {
            content: "\f2b4"
        }

        .fa.fa-handshake-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-handshake-o:before {
            content: "\f2b5"
        }

        .fa.fa-envelope-open-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-envelope-open-o:before {
            content: "\f2b6"
        }

        .fa.fa-linode {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-address-book-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-address-book-o:before {
            content: "\f2b9"
        }

        .fa.fa-vcard:before {
            content: "\f2bb"
        }

        .fa.fa-address-card-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-address-card-o:before {
            content: "\f2bb"
        }

        .fa.fa-vcard-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-vcard-o:before {
            content: "\f2bb"
        }

        .fa.fa-user-circle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-user-circle-o:before {
            content: "\f2bd"
        }

        .fa.fa-user-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-user-o:before {
            content: "\f007"
        }

        .fa.fa-id-badge {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-drivers-license:before {
            content: "\f2c2"
        }

        .fa.fa-id-card-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-id-card-o:before {
            content: "\f2c2"
        }

        .fa.fa-drivers-license-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-drivers-license-o:before {
            content: "\f2c2"
        }

        .fa.fa-quora {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-free-code-camp {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-telegram {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-thermometer-4:before {
            content: "\f2c7"
        }

        .fa.fa-thermometer:before {
            content: "\f2c7"
        }

        .fa.fa-thermometer-3:before {
            content: "\f2c8"
        }

        .fa.fa-thermometer-2:before {
            content: "\f2c9"
        }

        .fa.fa-thermometer-1:before {
            content: "\f2ca"
        }

        .fa.fa-thermometer-0:before {
            content: "\f2cb"
        }

        .fa.fa-bathtub:before {
            content: "\f2cd"
        }

        .fa.fa-s15:before {
            content: "\f2cd"
        }

        .fa.fa-window-maximize {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-window-restore {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-times-rectangle:before {
            content: "\f410"
        }

        .fa.fa-window-close-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-window-close-o:before {
            content: "\f410"
        }

        .fa.fa-times-rectangle-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-times-rectangle-o:before {
            content: "\f410"
        }

        .fa.fa-bandcamp {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-grav {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-etsy {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-imdb {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-ravelry {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-eercast {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-eercast:before {
            content: "\f2da"
        }

        .fa.fa-snowflake-o {
            font-family: 'Font Awesome 6 Free';
            font-weight: 400
        }

        .fa.fa-snowflake-o:before {
            content: "\f2dc"
        }

        .fa.fa-superpowers {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-wpexplorer {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        .fa.fa-meetup {
            font-family: 'Font Awesome 6 Brands';
            font-weight: 400
        }

        body {
            font-family: "Nunito Sans", sans-serif;
            position: relative;
            font-size: 14px;
            color: #222;
            margin: 0;
            background-color: #fff;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            padding-right: 0 !important
        }

        body ::-moz-selection {
            color: #fff;
            background-color: var(--theme-color)
        }

        body ::selection {
            color: #fff;
            background-color: var(--theme-color)
        }

        ul {
            padding-left: 0;
            margin-bottom: 0
        }

        li {
            display: inline-block;
            font-size: 14px
        }

        p {
            font-size: 14px;
            line-height: 18px
        }

        a {
            color: var(--theme-color);
            -webkit-transition: 0.5s ease;
            transition: 0.5s ease;
            text-decoration: none
        }

        a:hover {
            text-decoration: none;
            -webkit-transition: 0.5s ease;
            transition: 0.5s ease
        }

        a:focus {
            outline: none
        }

        button:focus {
            outline: none
        }

        .btn-close:focus {
            -webkit-box-shadow: none;
            box-shadow: none
        }

        :focus {
            outline: none
        }

        .form-control {
            background-color: #fff
        }

        .form-control:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: var(--theme-color)
        }

        h1,
        .h1 {
            font-size: calc(40px + (70 - 40) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 600;
            line-height: 1.1;
            text-transform: capitalize;
            margin: 0
        }

        h2,
        .h2 {
            font-size: calc(22px + (28 - 22) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 600;
            line-height: 1;
            text-transform: capitalize;
            margin: 0
        }

        h3,
        .h3 {
            font-size: calc(16px + (20 - 16) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 500;
            line-height: 1.2;
            margin: 0
        }

        h4,
        .h4 {
            font-size: calc(17px + (18 - 17) * ((100vw - 320px) / (1920 - 320)));
            line-height: 1.2;
            margin: 0;
            font-weight: 400
        }

        h5,
        .h5 {
            font-size: calc(15px + (16 - 15) * ((100vw - 320px) / (1920 - 320)));
            line-height: 1.2;
            margin: 0;
            font-weight: 400
        }

        h6,
        .h6 {
            font-size: calc(13px + (14 - 13) * ((100vw - 320px) / (1920 - 320)));
            line-height: 1.2;
            margin: 0;
            font-weight: 400
        }

        span {
            display: inline-block
        }

        .theme-color {
            color: var(--theme-color) !important
        }

        .theme-bg-color {
            background: var(--theme-color) !important
        }

        .text-title {
            color: #222 !important
        }

        .text-content {
            color: #939393 !important
        }

        .btn {
            position: relative;
            padding: 8px 10px;
            z-index: 1;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
            border-radius: 0;
            font-weight: bold;
            font-size: 14px;
            text-transform: capitalize
        }

        .btn-submit {
            font-size: calc(14px + (16 - 14) * ((100vw - 320px) / (1920 - 320)));
            color: var(--theme-color)
        }

        .btn-submit:hover {
            background-color: var(--theme-color)
        }

        .btn-filter {
            font-size: calc(14px + (16 - 14) * ((100vw - 320px) / (1920 - 320)));
            background-color: var(--theme-color);
            color: #fff;
            border-radius: 5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex
        }

        .btn-filter .feather {
            display: block;
            margin-top: -3px
        }

        .btn-filter:hover {
            background-color: #cecece
        }

        .btn-size {
            font-size: 12px
        }

        .btn:focus {
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .btn-spacing {
            padding: calc(5px + (14 - 5) * ((100vw - 320px) / (1920 - 320))) calc(8px + (30 - 8) * ((100vw - 320px) / (1920 - 320)))
        }

        .default-white {
            background-color: #fff;
            border-radius: 0
        }

        .default-light {
            position: relative;
            background-color: #eee1e6;
            border: 1px solid transparent;
            padding: calc(6px + (14 - 6) * ((100vw - 320px) / (1920 - 320))) calc(15px + (30 - 15) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 800
        }

        .default-light1 {
            color: var(--theme-color);
            position: relative;
            background-color: unset;
            border: 1px solid transparent
        }

        .default-light1::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
            background-color: var(--theme-color);
            opacity: 0.11;
            -webkit-transition: all 0.5s;
            transition: all 0.5s
        }

        .default-light1::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: -1;
            border: 1px solid var(--theme-color);
            opacity: 0;
            -webkit-transition: all 0.5s;
            transition: all 0.5s
        }

        .default-light1:hover {
            color: var(--theme-color)
        }

        .default-light1:hover::before {
            opacity: 0;
            -webkit-transform: scale(0.5, 0.5);
            transform: scale(0.5, 0.5)
        }

        .default-light1:hover::after {
            opacity: 0.11
        }

        .default-light-theme {
            color: var(--theme-color);
            padding: calc(6px + (14 - 6) * ((100vw - 320px) / (1920 - 320))) calc(15px + (30 - 15) * ((100vw - 320px) / (1920 - 320)))
        }

        .default-light-theme:hover {
            color: var(--theme-color)
        }

        .default-theme {
            background-color: var(--theme-color);
            color: #fff
        }

        .default-theme:hover {
            color: #fff
        }

        .default-theme-2 {
            padding: 12px 25px;
            font-size: 15px;
            text-transform: capitalize;
            font-weight: 400
        }

        .default-theme-1 {
            -webkit-transform: scale(100%);
            transform: scale(100%);
            border: 1px solid var(--theme-color)
        }

        .default-theme-1:hover {
            background-color: var(--theme-color);
            color: #fff;
            -webkit-transform: scale(100%);
            transform: scale(100%)
        }

        .default::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
            background-color: var(--theme-color);
            opacity: 0.11;
            -webkit-transition: all 0.5s;
            transition: all 0.5s
        }

        .default::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: -1;
            border: 1px solid var(--theme-color);
            opacity: 0;
            -webkit-transition: all 0.5s;
            transition: all 0.5s
        }

        .default:hover {
            color: var(--theme-color)
        }

        .default:hover::before {
            opacity: 0;
            -webkit-transform: scale(0.5, 0.5);
            transform: scale(0.5, 0.5)
        }

        .default:hover::after {
            opacity: 0.11
        }

        .btn-light-white {
            padding: 6px 20px;
            color: #fff;
            background-color: unset;
            border: 1px solid rgba(255, 255, 255, 0.1)
        }

        .btn-light-white i {
            font-size: 12px
        }

        .btn-light-white::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-color: rgba(255, 255, 255, 0.1);
            -webkit-transition: all 0.5s;
            transition: all 0.5s
        }

        .btn-light-white:hover {
            color: #fff
        }

        .btn-light-white:hover::before {
            opacity: 0;
            -webkit-transform: scale(0.5, 0.5);
            transform: scale(0.5, 0.5)
        }

        .btn-white {
            padding: 6px 20px;
            background-color: unset;
            border: 1px solid #fff
        }

        .btn-white i {
            font-size: 12px
        }

        .btn-white::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-color: #fff;
            -webkit-transition: all 0.5s;
            transition: all 0.5s
        }

        .btn-white:hover {
            color: #fff
        }

        .btn-white:hover::before {
            opacity: 0;
            -webkit-transform: scale(0.5, 0.5);
            transform: scale(0.5, 0.5)
        }

        .tag-button {
            padding: calc(8px + (14 - 8) * ((100vw - 320px) / (1920 - 320))) calc(15px + (30 - 15) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 600;
            z-index: 1;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
            border-radius: 0;
            font-weight: bold;
            font-size: calc(12px + (13 - 12) * ((100vw - 320px) / (1920 - 320)));
            border-radius: 5px;
            border: none
        }

        .tag-button:hover {
            color: #fff !important;
            background-color: var(--theme-color)
        }

        .btn-full {
            width: 100%;
            border-radius: 5px
        }

        .theme-color {
            color: var(--theme-color)
        }

        .text-contact {
            color: #646464
        }

        .invoice-wrapper {
            background-color: white;
            -webkit-box-shadow: #e6e6e6 0px 0px 14px 3px;
            box-shadow: #e6e6e6 0px 0px 14px 3px
        }

        .invoice-wrapper h2,
        .invoice-wrapper .h2 {
            font-size: 30px
        }

        .invoice-wrapper h4,
        .invoice-wrapper .h4 {
            color: #646464
        }

        .invoice-wrapper .invoice-detail h5,
        .invoice-wrapper .invoice-detail .h5 {
            text-transform: uppercase;
            margin-bottom: 0;
            font-weight: 600
        }

        .invoice-wrapper .invoice-detail h6,
        .invoice-wrapper .invoice-detail .h6 {
            margin-bottom: 0;
            font-size: 16px;
            color: #6d6d6d
        }

        .invoice-wrapper .invoice-footer {
            padding: calc(15px + (45 - 15) * ((100vw - 320px) / (1920 - 320)))
        }

        .invoice-wrapper .font-bold {
            font-weight: bold
        }

        .invoice-wrapper .authorise-sign {
            position: absolute;
            bottom: calc(13px + (40 - 13) * ((100vw - 320px) / (1920 - 320)));
            text-align: center
        }

        .invoice-wrapper .authorise-sign h6,
        .invoice-wrapper .authorise-sign .h6 {
            margin-bottom: 0;
            font-size: 18px;
            color: black;
            font-weight: bold;
            padding-top: 20px;
            margin-top: 20px;
            line-height: 1
        }

        .theme-invoice-2 .invoice-wrapper .invoice-header {
            background-color: var(--theme-color);
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 86px;
            background-position: center;
            padding: 12px 42px 0;
            margin-bottom: 80px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }

        @media (max-width: 767px) {
            .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain {
                display: block
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-left {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding: 5px;
            display: block;
            width: 284px
        }

        @media (max-width: 767px) {
            .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-left {
                padding: 34px 25px;
                width: 235px
            }
        }

        @media (max-width: 480px) {
            .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-left {
                background-color: #f7f7f7
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-left img {
            width: 115px;
            background-color: #ffffff;
            border: solid 6px var(--theme-color);
            padding: 2px;
        }

        @media (max-width: 767px) {
            .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-left img {
                width: 135px
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-right h3,
        .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-right .h3 {
            font-size: calc(24px + (35 - 24) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 800;
            letter-spacing: calc(1.5px + (5 - 1.5) * ((100vw - 320px) / (1920 - 320)));
            padding: 30px 33px;
            background: white;
            margin-right: -17%;
        }

        @media (max-width: 767px) {

            .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-right h3,
            .theme-invoice-2 .invoice-wrapper .invoice-header .header-contain .header-right .h3 {
                margin-top: 8px
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .top-sec .details-box {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            gap: 215px;
            padding-left: calc(17px + (24 - 17) * ((100vw - 320px) / (1920 - 320)));
            padding-right: calc(17px + (24 - 17) * ((100vw - 320px) / (1920 - 320)));
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }

        @media (max-width: 767px) {
            .theme-invoice-2 .invoice-wrapper .invoice-body .top-sec .details-box {
                gap: 85px
            }
        }

        @media (max-width: 480px) {
            .theme-invoice-2 .invoice-wrapper .invoice-body .top-sec .details-box {
                display: block
            }
        }

        @media (max-width: 480px) {
            .theme-invoice-2 .invoice-wrapper .invoice-body .top-sec .details-box .address-box:last-child {
                margin-top: 15px
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .top-sec .details-box .address-box ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            gap: 4px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .top-sec .details-box .address-box ul li {
            font-size: calc(14px + (15 - 14) * ((100vw - 320px) / (1920 - 320)));
            font-weight: 700;
            color: #222;
            width: 100%;
            display: block;
            /* white-space: nowrap */
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .body-date ul {
            padding: calc(10px + (18 - 10) * ((100vw - 320px) / (1920 - 320))) calc(17px + (25 - 17) * ((100vw - 320px) / (1920 - 320)));
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            background-color: #F7F7F7;
            margin-top: 17px
        }

        @media (max-width: 530px) {
            .theme-invoice-2 .invoice-wrapper .invoice-body .body-date ul {
                display: block
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .body-date ul li {
            font-size: 13px;
            font-weight: 700
        }

        @media (max-width: 530px) {
            .theme-invoice-2 .invoice-wrapper .invoice-body .body-date ul li {
                width: 100%
            }
        }

        @media (max-width: 530px) {
            .theme-invoice-2 .invoice-wrapper .invoice-body .body-date ul li+li {
                margin-top: 5px
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless {
            padding: 16px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table {
            border-collapse: collapse;
            width: 100%
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table>:not(:first-child) {
            border: none
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table thead tr th {
            background-color: var(--theme-color);
            color: #fff;
            border-right: 3px solid #fff;
            text-align: center;
            padding: 10px 17px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tbody tr:nth-child(even) td {
            background-color: #F7F7F7
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tbody tr td {
            font-size: 14px;
            font-weight: 700;
            vertical-align: middle;
            /* text-align: center; */
            border: none;
            border-right: 3px solid #fff
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tbody tr td .table-details {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tbody tr td .table-details li {
            font-weight: 700;
            white-space: nowrap;
            font-size: 13px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tbody tr td .table-details li:last-child {
            font-size: 12px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tfoot tr td {
            background-color: #F7F7F7;
            padding: 15px 10px;
            border: none
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tfoot tr td .table-price {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            gap: 60px
        }

        .theme-invoice-2 .invoice-wrapper .invoice-body .table-borderless table tfoot tr td .table-price li {
            font-weight: 15px;
            font-weight: 800
        }

        .theme-invoice-2 .invoice-wrapper .invoice-footer {
            padding-left: 16px;
            padding-right: 16px
        }

        @media (max-width: 390px) {
            .theme-invoice-2 .invoice-wrapper .invoice-footer .button-group {
                margin-top: 15px
            }
        }

        .theme-invoice-2 .invoice-wrapper .invoice-footer .button-group ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            width: 100%
        }

        .theme-invoice-2 .invoice-wrapper .invoice-footer .button-group .print-button {
            background-color: #222
        }
    </style>
</head>

<body class="bg-light">
    <section class="theme-invoice-2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto my-3">
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <div class="header-contain">
                                <div class="header-left">
                                    <a href="{{ url('/') }}"><img
                                            src="{{ settings('logo') ? asset(settings('logo')) : Vite::asset(\App\Library\Enum::LOGO_PATH) }}"
                                            alt=""></a>
                                </div>
                                <div class="header-right">
                                    <h3>INVOICE</h3>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-body">
                            <div class="top-sec">
                                <div class="address-detail">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="details-box">
                                                <div class="address-box">
                                                    <ul>
                                                        <li class="theme-color">Address :</li>
                                                        <li>{{ $order?->address?->getFullAddressAttribute() ?? $order?->shipping_address }}</li>

                                                    </ul>
                                                </div>

                                                <div class="address-box">
                                                    <ul>
                                                        <li class="theme-color">Name : <span
                                                                class="text-content">{{ $order?->customer->full_name }}</span>
                                                        </li>
                                                        <li class="theme-color">Phone : <span
                                                                class="text-content">{{ $order?->customer->phone }}</span>
                                                        </li>
                                                        <li class="theme-color">Date : <span
                                                                class="text-content">{{ date('jS M Y', strtotime(now())) }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="body-date">
                                <ul>
                                    <li class="text-content"><span class="theme-color">Invoice No : </span>
                                        #{{ $order->invoice_id }} </li>
                                    <li class="text-content"><span class="theme-color">Payment Status : </span>
                                        {!! getOrderPaymentStatus($order->payment_status) !!}
                                        {{-- {{ \App\Library\Enum::getPaymentStatusType($order?->payment_status) }} --}}
                                    </li>
                                </ul>
                            </div>

                            <div class="table-responsive table-borderless">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width:5%">#</th>
                                            <th style="width:5%">Image</th>
                                            <th style="width:30%">Item</th>
                                            <th class="text-center" style="width:15%">Quantity</th>
                                            <th class="text-center" style="width:15%">Unit Price</th>
                                            <th class="text-center" style="width:15%">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $qty =0; $subtotal = 0; @endphp
                                        @foreach ($order->orderDetails->load('product') as $key => $orderDetail)
                                        @php
                                            $qty = $qty + $orderDetail->quantity;
                                            $subtotal = $orderDetail->quantity*$orderDetail->sale_price;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{++$key}}</td>
                                            <td class="text-center"><img width="50" src="{{ $orderDetail?->product?->getThumbnailImage() }}"></td>
                                            <td class="text-left">
                                                <h6 class="m-0">{{$orderDetail->product->getTranslation("title")}}</h6>
                                                @if ($orderDetail?->load('productStock')?->productStock?->variant_ids)
                                                     <small> {{ getProductVariantValue($orderDetail?->load('productStock')?->productStock?->variant_ids) }} </small>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $orderDetail->quantity }}</td>
                                            <td class="text-center">{{ formatPrice($orderDetail->sale_price) }}</td>
                                            <td class="text-center">{{ formatPrice($subtotal) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" class="text-right">Sub Total</th>
                                            <td class="text-center">{{ formatPrice($order->sub_total_amount) }}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="text-right">VAT/Tax</td>
                                            <td class="text-center">{{ getFormattedAmount($order->vat_amount) }}</td>
                                        </tr>

                                        {{-- <tr>
                                            <td colspan="4" class="text-right">Packaging Charge</td>
                                            <td class="text-center">{{ getFormattedAmount($order->packaging_cost) }}
                                            </td>
                                        </tr> --}}

                                        <tr>
                                            <td colspan="4" class="text-right">Delivery Charge</td>
                                            <td class="text-center">{{ getFormattedAmount($order->shipping_cost) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Discount</td>
                                            <td class="text-center">{{ getFormattedAmount($order->discount_amount) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" class="text-right">Total
                                                <small>({{ $order->total_amount }})</small></th>
                                            <td class="text-center">{{formatPrice($order->total_amount)}}</td>
                                        </tr>
                                        <hr>
                                        <tr>
                                            <td colspan="4" class="text-right">GST</td>
                                            <td class="text-center">{{ getFormattedAmount($order->gst_amount) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="invoice-footer pt-0">
                            <div class="button-group">
                                <ul>
                                    <li>
                                        <a class="btn theme-bg-color text-white rounded"
                                            href="{{ route('member.dashboard.order.invoice.download', $order->id) }}">Export As
                                            PDF</a>
                                    </li>
                                    <!-- <li>
                                        <button class="btn text-white print-button rounded ms-2"
                                            onclick="window.print();">Print</button>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
