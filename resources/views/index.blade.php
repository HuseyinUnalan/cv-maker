@extends('main_master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Form Alanı -->
            <div class="col-md-4">
                <form id="cvForm" method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="color" class="form-label">Şablon Rengi</label>
                        <input type="color" class="form-control" id="color" name="color">
                    </div>

                    <div class="mb-3">
                        <label for="textColor" class="form-label">Yazı Rengi</label>
                        <input type="color" class="form-control" id="textColor" name="textColor">
                    </div>

                    <!-- Fotoğraf -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Fotoğraf</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                            onchange="loadFile(event)">
                    </div>

                    <!-- Kişisel Bilgiler -->
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Ad Soyad Gir">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="about_title" class="form-label">Hakkımda Başlık</label>
                            <input type="text" class="form-control" id="about_title" name="about_title"
                                placeholder="Hakkımda Başlık">
                        </div>
                    </div>


                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Adresini Gir">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="phone" class="form-control" id="phone" name="phone"
                                placeholder="+90 5XX XXX XX XX ">
                        </div>
                    </div>



                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="adress" class="form-label">Adres</label>
                            <input type="adress" class="form-control" id="adress" name="adress"
                                placeholder="Adresini Gir">
                        </div>


                        <div class="mb-3 col-6">
                            <label for="birthday" class="form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                placeholder="Doğum Tarihi Gir" oninput="toggleBirthdayStatus()">
                        </div>
                    </div>


                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin"
                                placeholder="LinkedIn URL">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="website" class="form-label">Web Site</label>
                            <input type="url" class="form-control" id="website" name="website"
                                placeholder="Website URL">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="military" class="form-label">Askerlik Durumu</label>
                            <input type="text" class="form-control" id="military" name="military"
                                placeholder="Yapıldı, Yapılmadı, Tecilli" oninput="toggleMilitaryStatus()">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="license" class="form-label">Ehliyet</label>
                            <input type="license" class="form-control" id="license" name="license"
                                placeholder="Ehliyet Gir" oninput="toggleLicenseStatus()">
                        </div>
                    </div>



                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="marital" class="form-label">Medeni Durum</label>
                            <input type="marital" class="form-control" id="marital" name="marital"
                                placeholder="Evli, Bekar, Boşanmış" oninput="toggleMaritalStatus()">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="skills" class="form-label">Beceriler</label>
                            <input type="skills" class="form-control" id="skills" name="skills"
                                placeholder="İletişim, Analiz, Programlama Vs.">
                        </div>
                    </div>



                    <div class="row">

                        <div class="mb-3 col-6">
                            <label for="language" class="form-label">Dil</label>
                            <input type="text" class="form-control" id="language" name="language"
                                placeholder="Türkçe, İngilizce, Almanca">
                            <!-- İlgi alanları önizleme alanı -->
                        </div>


                        <div class="mb-3 col-6">
                            <label for="hobby" class="form-label">İlgi Alanları</label>
                            <input type="text" class="form-control" id="hobby" name="hobby"
                                placeholder="Spor, Müzik, Oyun">
                            <!-- İlgi alanları önizleme alanı -->
                        </div>

                    </div>


                    <div class="mb-3">
                        <label for="experience" class="form-label">Hakkımda</label>
                        <div id="about_me" style="height: 200px;"></div>
                        <input type="hidden" name="about_me" id="experience">
                    </div>

                    <!-- Eğitim Bilgileri -->
                    <div id="education_fields">
                        <h5>Eğitim Bilgileri</h5>
                        <div class="education-group mb-3 education-item">
                            <input type="text" class="form-control mb-2" name="schools[0][school]"
                                placeholder="Okul Adı">
                            <input type="text" class="form-control mb-2" name="schools[0][department]"
                                placeholder="Bölüm">
                            <input type="text" class="form-control mb-2" name="schools[0][graduation_year]"
                                placeholder="Yıl">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mb-3" id="addEducation">+ Ekle</button>

                    <!-- Deneyim ve Sertifikalar -->


                    <div id="experience_fields">
                        <h5>İş Deneyimi</h5>
                        <div class="experience-group mb-3 experience-item">
                            <input type="text" class="form-control mb-2" name="experiences[0][company]"
                                placeholder="Şirket Adı">
                            <input type="text" class="form-control mb-2" name="experiences[0][position]"
                                placeholder="Pozisyon">
                            <input type="text" class="form-control mb-2" name="experiences[0][year]"
                                placeholder="Yıl">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mb-3" id="addExperience">+ Ekle</button>



                    <div id="certification_fields">
                        <h5>Sertifika</h5>
                        <div class="certification-group mb-3 certification-item">
                            <input type="text" class="form-control mb-2" name="certifications[0][company]"
                                placeholder="Sertifikayı Veren Kurum Adı">
                            <input type="text" class="form-control mb-2" name="certifications[0][title]"
                                placeholder="Sertifikanın Adı">
                            <input type="text" class="form-control mb-2" name="certifications[0][year]"
                                placeholder="Sertifika Yılı">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mb-3" id="addCertification">+ Ekle</button>

                </form>
            </div>

            <!-- CV Önizleme Alanı -->
            <div class="col-md-8">
                <div class="cv-template m-5" id="cvPreview">
                    <div class="name-container " style="border-radius: 15px 50px">
                        <img id="previewImage" class="profile-img m-4" src="{{ asset('frontend/images/no_image.jpg') }}"
                            alt="Profile Photo" style="display: block;">
                        <div class="info">
                            <h1 id="previewName" class="name mt-1 mb-1 ml-4 mr-4"></h1>
                            <h4 id="previewAboutTitle" class="contact-info mt-1 mb-1 ml-4 mr-4"></h4>
                            <p id="previewEmail" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                            <p id="previewPhone" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                            <p id="previewAdress" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                            <p id="previewLinkedin" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                            <p id="previewWebsite" class="contact-info mt-1 mb-1 ml-4 mr-4"></p>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-md-4">


                            <div class="name-container" id="birthdayStatus" style="display: none;">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p id="previewBirthDay" style="display: inline; margin-left: 5px;">ADoğum Tarihi: <span
                                        id="birthdayText"></span></p>
                            </div>



                            <div class="name-container" id="militaryStatus" style="display: none;">
                                <i class="fa-solid fa-helmet-un"></i>
                                <p id="previewMilitary" style="display: inline; margin-left: 5px;">Askerlik Durumu: <span
                                        id="militaryText"></span></p>
                            </div>


                            <div class="name-container" id="licenseStatus" style="display: none;">
                                <i class="fa-solid fa-car"></i>
                                <p id="previewLicense" style="display: inline; margin-left: 5px;">Ehliyet: <span
                                        id="licenseText"></span></p>
                            </div>



                            <div class="name-container" id="maritalStatus" style="display: none;">
                                <i class="fa-solid fa-cake-candles"></i>
                                <p id="previewMarital" style="display: inline; margin-left: 5px;">Medeni Durum: <span
                                        id="maritalText"></span></p>
                            </div>
                            {{-- 
                            <div class="name-container">
                                <i class="fa-solid fa-cake-candles"></i>
                                <p id="previewMarital" style="display: inline; margin-left: 5px;">Medeni Durum </p>
                            </div> --}}

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
    <div class="container">
        <button onclick="downloadPartialPDF()" class="btn btn-primary">CV İndir</button>
    </div>
@endsection
