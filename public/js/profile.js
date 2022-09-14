const ubahProfile = document.getElementById("ubah-profile");
const ubahProfileCard = document.getElementById("ubah-profile-card");
const ubahProfileClose = document.getElementById("ubah-profile-close");

const ubahPhotoPreview = document.getElementById("ubah-photo-preview");
const ubahPhotoForm = document.getElementById("ubah-photo-form");
const ubahPhotoClose = document.getElementById("ubah-photo-close");
const ubahPhotoInput = document.querySelector("input[name=photo]");

ubahProfile.addEventListener("click", function () {
    ubahProfileCard.classList.toggle("d-none");
});

ubahProfileClose.addEventListener("click", function () {
    ubahProfileCard.classList.add("d-none");
});

ubahPhotoInput.addEventListener("input", function () {
    const [file] = ubahPhotoInput.files;
    if (file) {
        ubahPhotoPreview.src = URL.createObjectURL(file);
        URL.revokeObjectURL();
    }
});

ubahPhotoClose.addEventListener("click", function () {
    ubahPhotoForm.reset();
});
