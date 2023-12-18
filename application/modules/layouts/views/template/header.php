<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $setting['title_url'] ?></title>
    
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app1.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url() ?>asset/img/favicon/politala.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>asset/img/favicon/politala.ico" type="image/png">
    
<link rel="stylesheet" href="<?= base_url() ?>assets/css/shared/iconly.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/datatables.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/fontawesome.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/toastify-js/src/toastify.css">
<link rel="stylesheet" href="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/@icon/dripicons/dripicons.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/dripicons.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/filepond/filepond.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/toastify-js/src/toastify.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/filepond.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/toastify-js/src/toastify.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/filepond.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/FA5PRO/css/all.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/wizard/assets/css/form-elements1.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/wizard/assets/css/style.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/extensions/choices.js/public/assets/styles/choices.css">
<link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>asset/vendor/Login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
<style type="text/css">
    .loadding-page {
        width: 100%;
        height: 100%;
        background: #5F9EA0;
        overflow: hidden;
        position: fixed;
        top: 0;
        z-index: 9999;
    }

    .cssload-box-loading {
        width: 49px;
        height: 49px;
        margin: auto;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    .cssload-box-loading:before {
        content: '';
        width: 49px;
        height: 5px;
        background: #000000;
        opacity: 0.1;
        position: absolute;
        top: 58px;
        left: 0;
        border-radius: 50%;
        animation: shadow 0.58s linear infinite;
        -o-animation: shadow 0.58s linear infinite;
        -ms-animation: shadow 0.58s linear infinite;
        -webkit-animation: shadow 0.58s linear infinite;
        -moz-animation: shadow 0.58s linear infinite;
    }

    .cssload-box-loading:after {
        content: '';
        width: 49px;
        height: 49px;
        background: #fff;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 3px;
        animation: cssload-animate 0.58s linear infinite;
        -o-animation: cssload-animate 0.58s linear infinite;
        -ms-animation: cssload-animate 0.58s linear infinite;
        -webkit-animation: cssload-animate 0.58s linear infinite;
        -moz-animation: cssload-animate 0.58s linear infinite;
    }

    @keyframes cssload-animate {
        17% {
            border-bottom-right-radius: 3px;
        }

        25% {
            transform: translateY(9px) rotate(22.5deg);
        }

        50% {
            transform: translateY(18px) scale(1, 0.9) rotate(45deg);
            border-bottom-right-radius: 39px;
        }

        75% {
            transform: translateY(9px) rotate(67.5deg);
        }

        100% {
            transform: translateY(0) rotate(90deg);
        }
    }

    @-o-keyframes cssload-animate {
        17% {
            border-bottom-right-radius: 3px;
        }

        25% {
            -o-transform: translateY(9px) rotate(22.5deg);
        }

        50% {
            -o-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
            border-bottom-right-radius: 39px;
        }

        75% {
            -o-transform: translateY(9px) rotate(67.5deg);
        }

        100% {
            -o-transform: translateY(0) rotate(90deg);
        }
    }

    @-ms-keyframes cssload-animate {
        17% {
            border-bottom-right-radius: 3px;
        }

        25% {
            -ms-transform: translateY(9px) rotate(22.5deg);
        }

        50% {
            -ms-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
            border-bottom-right-radius: 39px;
        }

        75% {
            -ms-transform: translateY(9px) rotate(67.5deg);
        }

        100% {
            -ms-transform: translateY(0) rotate(90deg);
        }
    }

    @-webkit-keyframes cssload-animate {
        17% {
            border-bottom-right-radius: 3px;
        }

        25% {
            -webkit-transform: translateY(9px) rotate(22.5deg);
        }

        50% {
            -webkit-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
            border-bottom-right-radius: 39px;
        }

        75% {
            -webkit-transform: translateY(9px) rotate(67.5deg);
        }

        100% {
            -webkit-transform: translateY(0) rotate(90deg);
        }
    }

    @-moz-keyframes cssload-animate {
        17% {
            border-bottom-right-radius: 3px;
        }

        25% {
            -moz-transform: translateY(9px) rotate(22.5deg);
        }

        50% {
            -moz-transform: translateY(18px) scale(1, 0.9) rotate(45deg);
            border-bottom-right-radius: 39px;
        }

        75% {
            -moz-transform: translateY(9px) rotate(67.5deg);
        }

        100% {
            -moz-transform: translateY(0) rotate(90deg);
        }
    }

    @keyframes shadow {

        0%,
        100% {
            transform: scale(1, 1);
        }

        50% {
            transform: scale(1.2, 1);
        }
    }

    @-o-keyframes shadow {

        0%,
        100% {
            -o-transform: scale(1, 1);
        }

        50% {
            -o-transform: scale(1.2, 1);
        }
    }

    @-ms-keyframes shadow {

        0%,
        100% {
            -ms-transform: scale(1, 1);
        }

        50% {
            -ms-transform: scale(1.2, 1);
        }
    }

    @-webkit-keyframes shadow {

        0%,
        100% {
            -webkit-transform: scale(1, 1);
        }

        50% {
            -webkit-transform: scale(1.2, 1);
        }
    }

    @-moz-keyframes shadow {

        0%,
        100% {
            -moz-transform: scale(1, 1);
        }

        50% {
            -moz-transform: scale(1.2, 1);
        }
    }
    </style>



<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->

</head>

<body>