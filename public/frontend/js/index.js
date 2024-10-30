// Form alanlarını önizlemede güncelleme
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const linkedinInput = document.getElementById('linkedin');
const phoneInput = document.getElementById('phone');
const adressInput = document.getElementById('adress');
const birthdayInput = document.getElementById('birthday');
const licenseInput = document.getElementById('license');
const hobbyInput = document.getElementById('hobby');
const websiteInput = document.getElementById('website');
const skillsInput = document.getElementById('skills');
const languageInput = document.getElementById('language');
const maritalInput = document.getElementById('marital');
const militaryInput = document.getElementById('military');
const abouttitleInput = document.getElementById('about_title');
const aboutmeInput = document.getElementById('about_me');





const previewName = document.getElementById('previewName');
const previewEmail = document.getElementById('previewEmail');
const previewLinkedin = document.getElementById('previewLinkedin');
const previewPhone = document.getElementById('previewPhone');
const previewAdress = document.getElementById('previewAdress');
const previewBirthDay = document.getElementById('previewBirthDay');
const previewLicense = document.getElementById('previewLicense');
const previewHobby = document.getElementById('previewHobby');
const previewWebsite = document.getElementById('previewWebsite');
const previewSkills = document.getElementById('previewSkills');
const previewLanguage = document.getElementById('previewLanguage');
const previewMarital = document.getElementById('previewMarital');
const previewMilitary = document.getElementById('previewMilitary');

const previewAboutTitle = document.getElementById('previewAboutTitle');
const previewAboutMe = document.getElementById('previewAboutMe');



// Eğitim önizleme kısmı
const previewEducation = document.getElementById('previewEducation');

const previewExperience = document.getElementById('previewExperience');


// Form alanlarının anlık önizlemesi
nameInput.addEventListener('input', function() {
    previewName.textContent = nameInput.value || '';
});

emailInput.addEventListener('input', function() {
    previewEmail.textContent = emailInput.value || '';
});

phoneInput.addEventListener('input', function() {
    previewPhone.textContent = phoneInput.value || '';
});

adressInput.addEventListener('input', function() {
    previewAdress.textContent = adressInput.value || '';
});

birthdayInput.addEventListener('input', function() {
    previewBirthDay.textContent = birthdayInput.value || '';
});

licenseInput.addEventListener('input', function() {
    previewLicense.textContent = licenseInput.value || '';
});

hobbyInput.addEventListener('input', function() {
    previewHobby.textContent = hobbyInput.value || '';
});

websiteInput.addEventListener('input', function() {
    previewWebsite.textContent = websiteInput.value || '';
});


maritalInput.addEventListener('input', function() {
    previewMarital.textContent = maritalInput.value || '';
});

skillsInput.addEventListener('input', function() {
    previewSkills.textContent = skillsInput.value || '';
});

militaryInput.addEventListener('input', function() {
    previewMilitary.textContent = militaryInput.value || '';
});

abouttitleInput.addEventListener('input', function() {
    previewAboutTitle.textContent = abouttitleInput.value || '';
});

aboutmeInput.addEventListener('input', function() {
    previewAboutMe.textContent = aboutmeInput.value || '';
});


languageInput.addEventListener('input', function() {
    previewLanguage.textContent = languageInput.value || '';
});

linkedinInput.addEventListener('input', function() {
    previewLinkedin.textContent = linkedinInput.value || '';
});

document.getElementById('hobby').addEventListener('input', function() {
    const hobbyInput = this.value;
    const hobbyPreview = document.getElementById('hobbyPreview');
    
    // Önizleme alanını temizle
    hobbyPreview.innerHTML = '';
    
    // İlgi alanlarını virgüle göre ayır ve her birini etiket olarak ekle
    const hobbies = hobbyInput.split(',').map(hobby => hobby.trim()).filter(hobby => hobby !== '');
    hobbies.forEach(hobby => {
        const tag = document.createElement('span');
        tag.classList.add('hobby-tag');
        tag.textContent = hobby;
        hobbyPreview.appendChild(tag);
    });
});

document.getElementById('language').addEventListener('input', function() {
    const languageInput = this.value;
    const languagePreview = document.getElementById('languagePreview');
    
    // Önizleme alanını temizle
    languagePreview.innerHTML = '';
    
    // İlgi alanlarını virgüle göre ayır ve her birini etiket olarak ekle
    const languages = languageInput.split(',').map(language => language.trim()).filter(language => language !== '');
    languages.forEach(language => {
        const tag = document.createElement('span');
        tag.classList.add('language-tag');
        tag.textContent = language;
        languagePreview.appendChild(tag);
    });
});

document.getElementById('skills').addEventListener('input', function() {
    const skillsInput = this.value;
    const skillsPreview = document.getElementById('skillsPreview');
    
    // Önizleme alanını temizle
    skillsPreview.innerHTML = '';
    
    // İlgi alanlarını virgüle göre ayır ve her birini etiket olarak ekle
    const skillss = skillsInput.split(',').map(skills => skills.trim()).filter(skill => skills !== '');
    skillss.forEach(skills => {
        const tag = document.createElement('span');
        tag.classList.add('skills-tag');
        tag.textContent = skills;
        skillsPreview.appendChild(tag);
    });
});

// Tarih formatı 
birthdayInput.addEventListener('input', function() {
    if (birthdayInput.value) {
        const birthDate = new Date(birthdayInput.value);
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        previewBirthDay.textContent = birthDate.toLocaleDateString('tr-TR', options);
    } else {
        previewBirthDay.textContent = '';
    }
});

let educationIndex = 1;

// Dinamik eğitim alanları eklemek için fonksiyon
document.getElementById('addEducation').addEventListener('click', function() {
    const educationFields = document.getElementById('education_fields');
    const newField = document.createElement('div');
    newField.classList.add('education-group', 'mb-3');
    newField.innerHTML = `
<input type="text" class="form-control mb-2" name="schools[${educationIndex}][school]" placeholder="Okul Adı">
<input type="text" class="form-control mb-2" name="schools[${educationIndex}][department]" placeholder="Bölüm">
<input type="text" class="form-control mb-2" name="schools[${educationIndex}][graduation_year]" placeholder="Mezuniyet Yılı">
`;
    educationFields.appendChild(newField);

    // Yeni alanlara event listener ekleme
    newField.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', updateEducationPreview);
    });

    educationIndex++;
    updateEducationPreview(); // Yeni alan eklendikten sonra önizlemeyi güncelle
});

function updateEducationPreview() {
    const educationItems = document.querySelectorAll('.education-group');
    const previewEducation = document.getElementById('previewEducation');
    previewEducation.innerHTML = ''; // Önizleme alanını temizle

    let hasEducation = false; // Eğitim bilgisi var mı kontrolü

    educationItems.forEach((item, index) => {
        const school = item.querySelector(`input[name="schools[${index}][school]"]`).value;
        const department = item.querySelector(`input[name="schools[${index}][department]"]`).value;
        const graduationYear = item.querySelector(`input[name="schools[${index}][graduation_year]"]`).value;

        if (school || department || graduationYear) {
            if (!hasEducation) {
                const title = document.createElement('h3');
                title.classList.add('education-title');
                title.textContent = 'Eğitimler';
                previewEducation.appendChild(title);
                hasEducation = true;
            }

            const div = document.createElement('div');
            div.classList.add('education-card');
            div.innerHTML = `
                <strong class="school-name">${school || 'Okul'}</strong>
                <p class="department">${department || 'Bölüm'}</p>
                <span class="graduation-year">${graduationYear || 'Yıl'}</span>
            `;
            previewEducation.appendChild(div);
        }
    });
}

// Mevcut eğitim alanları için event listener ekleme
document.querySelectorAll('.education-group input').forEach(input => {
    input.addEventListener('input', updateEducationPreview);
});




// Dinamik referans alanları eklemek için fonksiyon
let experienceIndex = 1;

document.getElementById('addExperience').addEventListener('click', function() {
    const experienceFields = document.getElementById('experience_fields');
    const newField = document.createElement('div');
    newField.classList.add('experience-group', 'mb-3');
    newField.innerHTML = `
<input type="text" class="form-control mb-2" name="experiences[${experienceIndex}][company]" placeholder="Şirket Adı">
<input type="text" class="form-control mb-2" name="experiences[${experienceIndex}][position]" placeholder="Pozisyon">
<input type="text" class="form-control mb-2" name="experiences[${experienceIndex}][year]" placeholder="Yıl">
`;
    experienceFields.appendChild(newField);

    // Yeni alanlara event listener ekleme
    newField.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', updateExperiencePreview);
    });

    experienceIndex++;
    updateExperiencePreview(); // Yeni alan eklendikten sonra önizlemeyi güncelle
});


function updateExperiencePreview() {
    const experienceItems = document.querySelectorAll('.experience-group');
    const previewExperience = document.getElementById('previewExperience');
    previewExperience.innerHTML = ''; // Önizleme alanını temizle

    let hasExperience = false; // Eğitim bilgisi var mı kontrolü

    experienceItems.forEach((item, index) => {
        const company = item.querySelector(`input[name="experiences[${index}][company]"]`).value;
        const position = item.querySelector(`input[name="experiences[${index}][position]"]`).value;
        const year = item.querySelector(`input[name="experiences[${index}][year]"]`).value;


        if (company || position || year) {
            if (!hasExperience) {
                const title = document.createElement('h3');
                title.classList.add('experience-title');
                title.textContent = 'Deneyim';
                previewExperience.appendChild(title);
                hasExperience = true;
            }

            const div = document.createElement('div');
            div.classList.add('experience-card');
            div.innerHTML = `
                <strong class="school-name">${company || 'Şirket Adı'}</strong>
                <p class="department">${position || 'Pozisyon'}</p>
                <span class="graduation-year">${year || 'Yıl'}</span>
            `;
            previewExperience.appendChild(div);
        }
    });
}


// Mevcut referans alanları için event listener ekleme
document.querySelectorAll('.experience-group input').forEach(input => {
    input.addEventListener('input', updateExperiencePreview);
});




// Dinamik sertifika alanları eklemek için fonksiyon
let certificationIndex = 1;

document.getElementById('addCertification').addEventListener('click', function() {
    const certificationFields = document.getElementById('certification_fields');
    const newField = document.createElement('div');
    newField.classList.add('certification-group', 'mb-3');
    newField.innerHTML = `
<input type="text" class="form-control mb-2" name="certifications[${certificationIndex}][company]" placeholder="Sertifikayı Veren Kurum Adı">
<input type="text" class="form-control mb-2" name="certifications[${certificationIndex}][title]" placeholder="Sertifikanın Adı">
<input type="text" class="form-control mb-2" name="certifications[${certificationIndex}][year]" placeholder="Sertifika Yılı">
`;
certificationFields.appendChild(newField);

    // Yeni alanlara event listener ekleme
    newField.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', updateCertificationPreview);
    });

    certificationIndex++;
    updateCertificationPreview(); // Yeni alan eklendikten sonra önizlemeyi güncelle
});

// Sertifika önizleme fonksiyonu
function updateCertificationPreview() {
    const certificationItems = document.querySelectorAll('.certification-group');
    const previewCertification = document.getElementById('previewCertification');
    previewCertification.innerHTML = ''; // Önizleme alanını temizle

    let hasCertification = false; // Eğitim bilgisi var mı kontrolü

    certificationItems.forEach((item, index) => {
        const company = item.querySelector(`input[name="certifications[${index}][company]"]`).value;
        const title = item.querySelector(`input[name="certifications[${index}][title]"]`).value;
        const year = item.querySelector(`input[name="certifications[${index}][year]"]`).value;

        if (company || title || year) {
            if (!hasCertification) {
                const title = document.createElement('h3');
                title.classList.add('certification-title');
                title.textContent = 'Sertifikalar';
                previewCertification.appendChild(title);
                hasCertification = true;
            }

            const div = document.createElement('div');
            div.classList.add('certification-card');
            div.innerHTML = `
                <strong class="school-name">${company || 'Sertifikayı Veren Kurum Adı'}</strong>
                <p class="department">${title || 'Sertifikanın Adı'}</p>
                <span class="graduation-year">${year || 'Yıl'}</span>
            `;
            previewCertification.appendChild(div);
        }
    });
}

// Mevcut sertifika alanları için event listener ekleme
document.querySelectorAll('.certification-group input').forEach(input => {
    input.addEventListener('input', updateCertificationPreview);
});




// Fotoğraf yükleme ve önizleme
function loadFile(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('previewImage').src = reader.result;
        document.getElementById('previewImage').style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}

 // Quill editörü başlatma
 const quill = new Quill('#about_me', {
    theme: 'snow',
    placeholder: 'Enter your experience...',
    modules: {
        toolbar: [
            [{
                header: [1, 2, false]
            }],
            ['bold', 'italic', 'underline'],
            ['link', 'blockquote', 'code-block'],
            [{
                list: 'ordered'
            }, {
                list: 'bullet'
            }]
        ]
    }
});

// Text değişikliklerini anlık olarak önizlemeye yansıtma
quill.on('text-change', function() {
    document.querySelector('#previewAboutMe').innerHTML = quill.root.innerHTML;
});

// Form gönderilmeden önce Quill içeriğini gizli input'a aktar
document.querySelector('form').onsubmit = function() {
    document.querySelector('#experience').value = quill.root.innerHTML;
};

const colorInput = document.getElementById('color');
const textColorInput = document.getElementById('textColor');
const nameContainer = document.querySelector('.name-container');
const allTextElements = document.querySelectorAll('.cv-template'); // Tüm elemanları seçiyoruz

colorInput.addEventListener('input', function() {
    nameContainer.style.backgroundColor = colorInput.value;
});

textColorInput.addEventListener('input', function() {
    allTextElements.forEach(element => {
        element.style.color = textColorInput.value;
        if (element.tagName.toLowerCase() === 'i') { // Eğer ikon ise
            element.style.color = textColorInput.value;
        }
    });
});

function downloadPartialPDF() {
    // İçeriği almak için gerekli olan alanları seçiyoruz
    const cvPreview = document.getElementById("cvPreview");
    const certification = document.getElementById("previewCertification");
    
    // Dosya adı için name input değerini alıyoruz
    const nameInput = document.getElementById("name"); // Name input ID'sini doğru girdiğinizden emin olun
    const fileName = nameInput.value ? `${nameInput.value}.pdf` : 'cv_preview_partial.pdf';

    // Yeni bir div oluşturup içerik ekleyelim
    const tempDiv = document.createElement("div");
    tempDiv.appendChild(cvPreview.cloneNode(true));

    // Sadece previewCertification alanına kadar olan içeriği seçiyoruz
    const certificationElement = document.getElementById("previewCertification");
    const certificationHeight = certificationElement.offsetTop + certificationElement.offsetHeight;

    // Yüksekliği sınırlıyoruz
    tempDiv.style.height = certificationHeight + "px";
    document.body.appendChild(tempDiv); // Geçici div'i body'e ekle

    // PDF ayarları
    const opt = {
        margin: 0.5,
        filename: fileName,
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 2,
            scrollY: 0
        },
        jsPDF: {
            unit: 'pt',
            format: 'a4',
            orientation: 'portrait'
        }
    };

    // PDF oluşturma
    html2pdf()
        .from(tempDiv)
        .set(opt)
        .save()
        .then(() => {
            document.body.removeChild(tempDiv); // PDF oluşturulduktan sonra geçici div'i kaldır
        });
}


function toggleMilitaryStatus() {
    const militaryInput = document.getElementById('military');
    const militaryStatus = document.getElementById('militaryStatus');
    const militaryText = document.getElementById('militaryText');

    // Eğer inputta bir değer varsa
    if (militaryInput.value.trim() !== '') {
        militaryStatus.style.display = 'flex'; // Görünür yap
        militaryText.textContent = militaryInput.value; // Girilen değeri göster
    } else {
        militaryStatus.style.display = 'none'; // Gizle
    }
}

function toggleMaritalStatus() {
    const maritalInput = document.getElementById('marital');
    const maritalStatus = document.getElementById('maritalStatus');
    const maritalText = document.getElementById('maritalText');

    // Eğer inputta bir değer varsa
    if (maritalInput.value.trim() !== '') {
        maritalStatus.style.display = 'flex'; // Görünür yap
        maritalText.textContent = maritalInput.value; // Girilen değeri göster
    } else {
        maritalStatus.style.display = 'none'; // Gizle
    }
}

function toggleLicenseStatus() {
    const licenseInput = document.getElementById('license');
    const license = document.getElementById('licenseStatus');
    const licenseText = document.getElementById('licenseText');

    // Eğer inputta bir değer varsa
    if (licenseInput.value.trim() !== '') {
        licenseStatus.style.display = 'flex'; // Görünür yap
        licenseText.textContent = licenseInput.value; // Girilen değeri göster
    } else {
        licenseStatus.style.display = 'none'; // Gizle
    }
}

function toggleBirthdayStatus() {
    const birthdayInput = document.getElementById('birthday');
    const birthdayStatus = document.getElementById('birthdayStatus');
    const birthdayText = document.getElementById('birthdayText');

    // Eğer inputta bir değer varsa
    if (birthdayInput.value.trim() !== '') {
        birthdayStatus.style.display = 'flex'; // Görünür yap
        birthdayText.textContent = birthdayInput.value; // Girilen değeri göster
    } else {
        birthdayStatus.style.display = 'none'; // Gizle
    }
}
