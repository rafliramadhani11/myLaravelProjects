const judul = document.querySelector("#judul");
const slug = document.querySelector("#slug");

judul.addEventListener("change", function () {
    fetch("/dashboard/bukus/checkSlug?judul=" + judul.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});


function previewImage() {
    const image = document.querySelector("#coverBuku");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = 'block';

    const reader = new FileReader();
    reader.readAsDataURL(image.files[0]);

    reader.addEventListener("load", (e) => {
        imgPreview.src = e.target.result;
    });
}
