// Efek scroll ke kanan dan kiri pada section
let container = document.querySelector('.container');
let isMoving = false;

container.addEventListener('mousemove', function (event) {
    if (isMoving) {
        container.scrollBy({
            top: 0,
            left: event.movementX,
            behavior: 'smooth'
        });
    }
});

container.addEventListener('mousedown', function () {
    isMoving = true;
    container.style.cursor = 'grabbing';
});

container.addEventListener('mouseup', function () {
    isMoving = false;
    container.style.cursor = 'grab';
});

container.addEventListener('mouseleave', function () {
    isMoving = false;
    container.style.cursor = 'grab';
});
