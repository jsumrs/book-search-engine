function fireFetch(q) {
    const url = `https://openlibrary.org/search.json?q=${q}&fields=key,title,author_name,cover_i&limit=20`;
    const options = {
        method: 'GET',
    };
    fetch(url, options)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displaySearchResults(data);
        })
        .catch(error => console.error('Error: ', error));
}

function displaySearchResults(data) {
    let output = document.getElementById("search-output");
    output.innerHTML = '';
    if (data && data.docs) {
        const results = data.docs.map(book => {
            return `<tr>
                        <td><img src='https://covers.openlibrary.org/b/id/${book.cover_i}-S.jpg'></td>
                        <td><h3><a href='book.php?key=${book.key}'>${book.title}</a></h3><p>${book.author_name}</p></td>
                    </tr>`;
        });
        output.innerHTML = results.join('');
    } else {
        output.innerHTML = 'no results.';
    }
}


let debounceTimeout;
document.getElementById("navbar-search-box").addEventListener("input", (event) => {
    const q = event.target.value;

    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(() => {  // Wait 300ms before fetching search results.
        if (q && q.length >= 3) {
            fireFetch(q);
        } else {
            document.getElementById('search-output').innerHTML = '';
        }
        document.getElementById('welcome-banner').remove();
    }, 300);
});


