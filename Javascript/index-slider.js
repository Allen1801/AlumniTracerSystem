const slider = document.querySelector(".slider");
const slidesContainer = document.querySelector(".slides");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
const dotsContainer = document.querySelector(".dots");

let currentSlide = 0;
let imageCount = 0;

//Function to get the image url
function getImageUrl(index) {

    const image = `sliders/index-slider-${index}.png`;
    const xhr = new XMLHttpRequest();
    xhr.open("HEAD", image, false);
    xhr.send();

    if (xhr.status === 200) {
        return image;
    } else {
        return null;
    }

}

//Putting the images into the array 
const images = [];
for (let i = 1; ; i++) {
    const imageUrl = getImageUrl(i);
    if (imageUrl === null) {
        break;
    }
    images.push(imageUrl);
}
imageCount = images.length;

// Load images and generate HTML for slides and dots
let slidesHTML = "";
let dotsHTML = "";

for (let i = 0; i < imageCount; i++) {
    slidesHTML += `<img src="${images[i]}" alt="Slide ${i + 1}">`;
    dotsHTML += `<div class="dot"></div>`;
}
slidesContainer.innerHTML = slidesHTML;
dotsContainer.innerHTML = dotsHTML;

const slides = document.querySelectorAll(".slides img");
const dots = document.querySelectorAll(".dot");

// Show the first slide and set the first dot as active
slides[0].style.display = "block";
dots[0].classList.add("active");


function showSlide(n) {
    // Wrap around to the first or last slide if we've reached the end
    currentSlide = (n + slides.length) % slides.length;

    // Hide all slides and remove active class from all dots
    slides.forEach(slide => (slide.style.display = "none"));
    dots.forEach(dot => dot.classList.remove("active"));

    // Show the current slide and set the corresponding dot as active
    slides[currentSlide].style.display = "block";
    dots[currentSlide].classList.add("active");
}


// Handle click on the previous button
prevBtn.addEventListener("click", () => {
    showSlide(currentSlide - 1);
});


// Handle click on the next button
nextBtn.addEventListener("click", () => {
    showSlide(currentSlide + 1);
});

// Handle click on a dot
dotsContainer.addEventListener("click", e => {
    if (e.target.classList.contains("dot")) {
        const dotIndex = Array.from(dots).indexOf(e.target);
        showSlide(dotIndex);
    }
});