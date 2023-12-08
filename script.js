let currentImageIndex = 0;
const images = document.querySelectorAll('.image-slider img');

function showImage(index) {
    images.forEach((image, i) => {
        image.style.display = i === index ? 'block' : 'none';
    });
}

function changeImage(direction) {
    currentImageIndex += direction;

    if (currentImageIndex < 0) {
        currentImageIndex = images.length - 1;
    } else if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
    }

    showImage(currentImageIndex);
}

// Inicializa a exibição da primeira imagem
showImage(currentImageIndex);



function addBook() {
    // Obter dados do formulário
    const imageURL = document.getElementById('imageURL').value;
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;

    // Criar elemento HTML para exibir o livro
    const bookContainer = document.getElementById('bookList');
    const bookElement = document.createElement('div');
    bookElement.className = 'book';

    const imgElement = document.createElement('img');
    imgElement.src = imageURL;

    const titleElement = document.createElement('h2');
    titleElement.textContent = title;

    const descriptionElement = document.createElement('p');
    descriptionElement.textContent = description;

    // Adicionar elementos ao contêiner do livro
    bookElement.appendChild(imgElement);
    bookElement.appendChild(titleElement);
    bookElement.appendChild(descriptionElement);

    // Adicionar livro à lista
    bookContainer.appendChild(bookElement);

    // Limpar o formulário
    document.getElementById('imageURL').value = '';
    document.getElementById('title').value = '';
    document.getElementById('description').value = '';
}










