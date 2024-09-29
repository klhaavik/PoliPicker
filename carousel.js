const carouselSlide = document.getElementById('carousel-slide');
const carouselItems = document.querySelectorAll('.carousel-item');

let counter = 0;

document.getElementById('next').addEventListener('click', () => {
    moveSlide(1);
});

document.getElementById('prev').addEventListener('click', () => {
    moveSlide(-1);
});

function moveSlide(direction) {
    const totalItems = carouselItems.length;
    counter += direction;

    if (counter >= totalItems) {
        counter = 0;
    } else if (counter < 0) {
        counter = totalItems - 1;
    }

    const size = carouselItems[0].clientWidth;
    carouselSlide.style.transform = `translateX(${-size * counter}px)`;
}