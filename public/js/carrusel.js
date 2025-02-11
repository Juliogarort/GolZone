//JavaScript (Cambio de imágenes automático)
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".carrusel-slide");
    let currentIndex = 0;

    function changeSlide() {
        slides[currentIndex].classList.remove("active"); // Oculta la imagen actual
        currentIndex = (currentIndex + 1) % slides.length; // Cambia al siguiente slide
        slides[currentIndex].classList.add("active"); // Muestra la nueva imagen
    }

    setInterval(changeSlide, 4000); // Cambia cada 4 segundos
});
