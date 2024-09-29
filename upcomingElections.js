const API_KEY = 'AIzaSyAgNrmfbMobAQfBOmKxhU2rosEwuYZwLdQ'; // Replace with your API key
const SEARCH_ENGINE_ID = '968f3968bfa4746f4'; // Replace with your Search Engine ID
const MAX_RESULTS = 3; // Limit the number of results

async function searchGoogle() {
    const query = 'Upcoming Elections'; // Define the search query here
    /*const searchResultsDiv = document.getElementById('searchResults');
    searchResultsDiv.innerHTML = '<div class="results-title">Elections Near You</div>'; // Reset with title*/

    try {
        const response = await fetch(`https://www.googleapis.com/customsearch/v1?key=${API_KEY}&cx=${SEARCH_ENGINE_ID}&q=${encodeURIComponent(query)}&num=${MAX_RESULTS}`);
        const data = await response.json();

        if (data.items) {
            data.items.forEach(item => {
                const resultItem = document.createElement('div');
                resultItem.className = 'result-item';
                resultItem.innerHTML = `
                            <a href="${item.link}" target="_blank">${item.title}</a>
                            <p>${item.snippet}</p>
                        `;
                searchResultsDiv.appendChild(resultItem);
            });
        } else {
            searchResultsDiv.innerHTML += '<p>No results found.</p>';
        }
    } catch (error) {
        console.error('Error fetching search results:', error);
        searchResultsDiv.innerHTML += '<p>Error fetching search results. Please try again.</p>';
    }
}

// Call the search function when the page loads
window.onload = searchGoogle;