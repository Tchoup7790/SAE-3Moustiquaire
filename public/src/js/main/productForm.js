const fileInputThumb = document.getElementById('thumbnail');
const fileInputLabelThumb = document.querySelector('.form__inputFile__thumb__lab');
const thumbnailPreview = document.querySelector('.form__inputFile__thumb');

fileInputThumb.addEventListener('change', (event) => {
    const selectedFile = event.target.files[0];
    fileInputLabelThumb.textContent = selectedFile?.name || 'Choose a file...';
    if (selectedFile) {
        const reader = new FileReader();
        reader.onload = (e) => {
            thumbnailPreview.src = e.target.result;
        };
        reader.readAsDataURL(selectedFile);
    } else {
        thumbnailPreview.src = '';
    }
});

const fileInput = document.getElementById('image');
const fileInputLabel = document.querySelector('.form__inputFile__image__lab');
const imagePreview = document.querySelector('.form__inputFile__img');

fileInput.addEventListener('change', (event) => {
    const selectedFile = event.target.files[0];
    fileInputLabel.textContent = selectedFile?.name || 'Choose a file...';
    if (selectedFile) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(selectedFile);
    } else {
        imagePreview.src = '';
    }
});
