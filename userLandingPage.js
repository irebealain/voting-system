// Image and text arrays
const photos = ["Assets/cover.png", "Assets/9V1A7817.jpg", "Assets/P1370380.JPG"];
// const dictionary = ["Vote for Students Representatives", "Student government are known as enrolled scholars", "They represent the point of view of their peers"];
let index = 0;

// Change slides
function changeSlide(direction) {
    const image = document.getElementById("images");
    // Update the index
    if (direction === "next") {
        index = (index + 1) % photos.length;
    } else if (direction === "prev") {
        index = (index - 1 + photos.length) % photos.length;
    }
    // Update the image and text
    image.src = photos[index];
    // document.getElementById("headings").textContent = dictionary[index];
}

// Show pop-up
function showPopup() {
    document.getElementById("popBackground").style.display = "flex";
}

// Hide pop-up
function hidePopup() {
    document.getElementById("popBackground").style.display = "none";
}

// Add event listeners
document.getElementById("mySvg").addEventListener("click", showPopup);
document.getElementById("closeButton").addEventListener("click", hidePopup);
document.getElementById("popBackground").addEventListener("click", (event) => {
    if (event.target.id === "popBackground") {
        hidePopup();
    }
});
