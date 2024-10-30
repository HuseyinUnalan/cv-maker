@extends('main_master')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            font-family: 'DejaVu Sans', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 0;
        }

        .content {
            padding: 10px;
        }

        .profile-img {
            max-width: 180px;
            margin-bottom: 40px;
            border-radius: 15px;
        }

        .hobby-tag {
            background-color: #55BE96;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            margin: 3px;
            font-size: 0.9rem;
            border-radius: 15px 50px;
        }

        .language-tag {
            background-color: #34465D;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            margin: 3px;
            font-size: 0.9rem;
            border-radius: 15px 50px;

        }

        .skills-tag {
            background-color: #0077B5;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            margin: 3px;
            font-size: 0.9rem;
            border-radius: 15px 50px;

        }

        .name-container {
            display: flex;
            /* Flexbox kullanarak öğeleri yan yana hizala */
            align-items: flex-start;
            /* Üst kısımda hizala */
        }

        .profile-img {
            margin-right: 20px;
            /* Fotoğraf ile isim arasında boşluk bırak */
        }

        .info {
            margin-top: 10px;
            /* Bilgilerin üst kısmındaki boşluğu ayarla */
        }

        .name {
            margin: 0;
        }

        .contact-info {
            margin: 0;
            /* İletişim bilgileri için varsayılan margin'i kaldır */
        }

        .sticky-button-container {
            position: -webkit-sticky;
            /* Safari için */
            position: sticky;
            bottom: 20px;
            /* Alt kısma olan mesafe */
            left: 0;
            /* Sol tarafa hizalama */
            right: 0;
            /* Sağ tarafa hizalama */
            z-index: 1000;
            /* Diğer içeriklerin üstünde görünmesi için */
            text-align: left;
            /* Butonu ortalamak için */
            padding: 10px;
            /* İçerik alanı için boşluk */
        }

        .education-list,
        .experience-list,
        .certification-list {
            list-style-type: none;
            /* Madde işaretlerini kaldır */
            padding-left: 0;
            /* Soldan boşluk kaldır */
        }

        .education-group,
        .experience-group,
        .certification-group {
            background-color: #f9f9f9;
            /* Arka plan rengi */
            border-radius: 5px;
            /* Köşeleri yuvarlaştır */
            padding: 15px;
            /* İçerik alanı için boşluk */
            margin-bottom: 10px;
            /* Gruplar arası mesafe */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Gölgelendirme efekti */
        }

        .input-group {
            display: flex;
            /* Flexbox kullanarak yan yana hizala */
            align-items: center;
            /* Dikey olarak ortala */
        }

        .input-group-text {
            background-color: #e9ecef;
            /* Giriş alanı arka plan rengi */
            border: 1px solid #ced4da;
            /* Kenar rengi */
        }

        input.form-control {
            border-radius: 0;
            /* Kenar yuvarlama kaldır */
            box-shadow: none;
            /* Gölgelendirme kaldır */
            border: 1px solid #ced4da;
            /* Kenar rengi */
        }

        input.form-control:focus {
            border-color: #80bdff;
            /* Fokus kenar rengi */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            /* Fokus gölgesi */
        }


        .education-item {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #007bff;
            background-color: #fff;
            border-radius: 4px;
        }

        .experience-item {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #3cff00;
            background-color: #fff;
            border-radius: 4px;
        }

        .certification-item {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #ff003c;
            background-color: #fff;
            border-radius: 4px;
        }

        #previewEducation {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Eğitimler başlığı stili */
        .education-title {
            font-size: 1.5em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }

        .education-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        #previewExperience {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Deneyim başlığı stili */
        .experience-title {
            font-size: 1.5em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
            border-bottom: 2px solid #3cff00;
            padding-bottom: 5px;
        }

        .experience-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }


        #previewCertification {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Sertifika başlığı stili */
        .certification-title {
            font-size: 1.5em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
            border-bottom: 2px solid #ff003c;
            padding-bottom: 5px;
        }

        .certification-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .school-name {
            font-weight: bold;
            font-size: 1.1em;
            color: #333;
        }

        .department {
            font-size: 1em;
            color: #666;
            margin: 4px 0;
        }

        .graduation-year {
            font-size: 0.9em;
            color: #999;
        }

        #previewImage {
            display: block;
        }

        .mt-1 {
            margin-top: 0.25rem;
            /* 4px */
        }

        .mb-1 {
            margin-bottom: 0.25rem;
            /* 4px */
        }

        .ml-4 {
            margin-left: 1.5rem;
            /* 24px */
        }

        .mr-4 {
            margin-right: 1.5rem;
            /* 24px */
        }

        .mt-5 {
            margin-top: 3rem;
            /* 48px */
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* Maksimum genişlikleri medya sorgularıyla ayarlanır */
        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-md-8 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 768px) {
            .col-md-8 {
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
        }
        .d-flex {
            display: flex;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .mt-2 {
            margin-top: 0.5rem;
            /* 8px */
        }
    </style>
    <div class="container mt-5">
        <div class="row">
            <!-- CV Önizleme Alanı -->
            <div class="col-md-8">

                <div class="cv-template" id="cvPreview">

                    <div class="name-container" style="border-radius: 15px 50px">
                        <img id="previewImage" class="profile-img m-4" src="{{ $photo }}"
                            alt="Profile Photo" style="display: block;">
                        <div class="info">
                            <h1 id="previewName" class="name mt-1 mb-1 ml-4 mr-4">{{ $name }}</h1>
                            <h2 id="previewAboutTitle" class="contact-info mt-1 mb-1 ml-4 mr-4"></h2>
                            <p id="previewEmail" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                            <p id="previewPhone" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                            <p id="previewAdress" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">



                            <div class="name-container">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p id="previewBirthDay" style="display: inline; margin-left: 5px;">Doğum Tarihi </p>
                            </div>

                            <div class="name-container">
                                <i class="fa-brands fa-linkedin"></i>
                                <p id="previewLinkedin" style="display: inline; margin-left: 5px;">LinkedIn</p>
                            </div>

                            <div class="name-container">
                                <i class="fa-solid fa-globe"></i>
                                <p id="previewWebsite" style="display: inline; margin-left: 5px;">Web Sitesi</p>
                            </div>

                            <div class="name-container">
                                <i class="fa-solid fa-helmet-un"></i>
                                <p id="previewMilitary" style="display: inline; margin-left: 5px;">Askerlik Durumu </p>
                            </div>

                            <div class="name-container">
                                <i class="fa-solid fa-car"></i>
                                <p id="previewLicense" style="display: inline; margin-left: 5px;">Ehliyet </p>
                            </div>


                            <div class="name-container">
                                <i class="fa-solid fa-cake-candles"></i>
                                <p id="previewMarital" style="display: inline; margin-left: 5px;">Medeni Durum </p>
                            </div>

                            <div id="skillsPreview" class="d-flex flex-wrap mt-2"></div>

                            <div id="languagePreview" class="d-flex flex-wrap mt-2"></div>

                            <div id="hobbyPreview" class="d-flex flex-wrap mt-2"></div>




                        </div>

                        <div class="col-md-8">
                            <p id="previewAboutMe"> </p>

                            <h4></h4>

                            <div id="previewEducation"></div>

                            <h4></h4>

                            <div id="previewExperience"></div>

                            <h4></h4>

                            <p id="previewCertification"></p>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
