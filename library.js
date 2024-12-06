function displayAuthors(authors, author_cell) {
    author_cell.textContent = authors
        .map(author => `${author.name}`)
        .join(', ');
}

function fetchAuthors(authorKeys, author_cell) {
    const authorPromises = authorKeys.map(key => {
        const url = `https://openlibrary.org${key}.json`;
        return fetch(url).then(response => response.json());
    });

    Promise.all(authorPromises) // Wait to resolve all authors at once.
        .then(authors => {
            console.log('Authors:', authors);
            displayAuthors(authors, author_cell);
        })
        .catch(error => console.error('Error fetching authors:', error));
}



document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-book-key]");

    rows.forEach(row => {
        const bookKey = row.dataset.bookKey;
        const url = `https://openlibrary.org${bookKey}.json`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);

                row.querySelector(".cover").innerHTML = `<img src="https://covers.openlibrary.org/b/id/${data.covers ? data.covers[0] : ''}-M.jpg" alt="Cover unavailable" /> `;
                row.querySelector(".title").innerHTML = `<h3><a href='book.php?key=${data.key}'>${data.title}</a></h3>`;
                let author_cell = row.querySelector(".author");
                const authorKeys = data.authors.map(author => author.author.key);
                fetchAuthors(authorKeys, author_cell);
            })
            .catch(error => {
                console.error("Error fetching book data:", error);
                row.querySelector(".title").textContent = "Error loading book";
            });
    });
});
