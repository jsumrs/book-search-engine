function displayAuthors(authors) {
    const authorContainer = document.getElementById('book-authors');
    authorContainer.innerHTML = authors
        .map(author => `<span>${author.name}</span>`)
        .join(', ');
}

function fetchAuthors(authorKeys) {
    const authorPromises = authorKeys.map(key => {
        const url = `https://openlibrary.org${key}.json`;
        return fetch(url).then(response => response.json());
    });

    Promise.all(authorPromises) // Wait to resolve all authors at once.
        .then(authors => {
            console.log('Authors:', authors);
            displayAuthors(authors);
        })
        .catch(error => console.error('Error fetching authors:', error));
}

function displayBook(data) {
    document.getElementById('book-cover').src = `https://covers.openlibrary.org/b/id/${data.covers[0]}-L.jpg`;
    document.getElementById('title').innerHTML = data.title;
    document.getElementById('book-title').innerHTML = data.title;
    let desc = data.description.value || data.description || "Description unavailable.";
    document.getElementById('book-description').innerHTML = desc;

    // Display author data.
    const authorKeys = data.authors.map(author => author.author.key); // silly syntax due to naming schemes :P
    fetchAuthors(authorKeys);
}

function fetchBook(key) {
    const url = `https://openlibrary.org${key}.json`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (key.includes("works"))
                displayBook(data);
        })
        .catch(error => console.error('Error fetching book info: ', error));
}



const params = new URLSearchParams(location.search);
const key = params.get('key')
fetchBook(key);