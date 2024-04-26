// Get elements
const openModalBtn = document.getElementById('openModalBtn');
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('closeModalBtn');

// Function to open the modal
function openModal() {
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    modal.style.display = 'none';
}

// Event listener for opening the modal
openModalBtn.addEventListener('click', openModal);

// Event listener for closing the modal
closeModalBtn.addEventListener('click', closeModal);

// Close modal when clicking outside the modal content
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        closeModal();
    }
});
