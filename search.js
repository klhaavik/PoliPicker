// Sample database
const database = [
    "Joe Biden",
    "Kamala Harris",
    "Donald Trump",
    "Joe Manchin",
    "Marjorie Greene",
    "Chuck Schumer",
    "Mitch McConnell"
];

// Levenshtein distance function
function levenshtein(a, b) {
    const matrix = [];

    for (let i = 0; i <= b.length; i++) {
        matrix[i] = [i];
    }

    for (let j = 0; j <= a.length; j++) {
        matrix[0][j] = j;
    }

    for (let i = 1; i <= b.length; i++) {
        for (let j = 1; j <= a.length; j++) {
            if (b.charAt(i - 1) === a.charAt(j - 1)) {
                matrix[i][j] = matrix[i - 1][j - 1];
            } else {
                matrix[i][j] = Math.min(
                    matrix[i - 1][j - 1] + 1, // substitution
                    Math.min(
                        matrix[i][j - 1] + 1, // insertion
                        matrix[i - 1][j] + 1 // deletion
                    )
                );
            }
        }
    }

    return matrix[b.length][a.length];
}

// Close-results algorithm
function closeResults(input, topX) {
    const results = database.map(entry => ({
        entry,
        distance: levenshtein(input, entry),
    }));

    results.sort((a, b) => a.distance - b.distance);
    
    return results.slice(0, topX);
}

// Event listener for input
const searchInput = document.getElementById('searchInput');
const dropdown = document.getElementById('dropdown');

function loadPoliticianDescription(selectedPolitician){
    // Create a FormData object to send data
    const formData = new FormData();
    formData.append('politician', selectedPolitician);

    // Send the POST request using Fetch API
    fetch('https://localhost:5500/description.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text()) // Process the response
    .then(data => {
        console.log(data); // Handle the response data
    })
    .catch(error => {
        console.error('Error:', error); // Handle any errors
    });
}



searchInput.addEventListener('input', () => {
    const inputValue = searchInput.value;
    dropdown.innerHTML = ''; // Clear previous results

    if (inputValue.length > 0) {
        const results = closeResults(inputValue, 5); // Get top 5 results
        results.forEach(result => {
            const entryDiv = document.createElement('div');
            entryDiv.className = 'entry';
            entryDiv.innerText = result.entry;
            entryDiv.onclick = () => {
                searchInput.value = result.entry; // Set input value to selected entry
                dropdown.style.display = 'none'; // Hide dropdown
                localStorage.setItem('PoliticianName', result.entry);
                /*loadPoliticianDescription(result.entry);
                /*window.location.href="bioPage.html";*/
            };
            dropdown.appendChild(entryDiv);
        });

        if (results.length > 0) {
            dropdown.style.display = 'block'; // Show dropdown if there are results
        } else {
            dropdown.style.display = 'none'; // Hide dropdown if no results
        }
    } else {
        dropdown.style.display = 'none'; // Hide dropdown if input is empty
    }
});

/*document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    loadPoliticianDescription(searchInput.value);
});*/