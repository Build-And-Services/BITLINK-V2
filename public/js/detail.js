const images = document.querySelectorAll('.image img');

for (const image of images) {
  image.addEventListener('load', () => {
    // Hitung rasio aspek gambar
    const aspectRatio = image.naturalWidth / image.naturalHeight;

    // Batasi lebar gambar berdasarkan rasio aspek
    const maxWidth = 467 * aspectRatio;
    image.style.maxWidth = `${maxWidth}px`;
  });
}


// document.getElementById('delete-button').addEventListener('click', function(event) {
//   event.preventDefault();
//   var result = confirm("Apakah Anda yakin akan menghapus data?");
//   if (result) {
//       document.getElementById('delete-form').submit();
//   }
// });
