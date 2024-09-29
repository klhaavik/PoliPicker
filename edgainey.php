<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            width: 100%;
        }
        /* Main Content Styles */
        .content-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 20px auto;
            width: 80%;
        }
        /* Profile Image Container */
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 300px;
            width: 90%;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: white;
            margin-right: 20px;
            overflow: hidden;
        }
        .profile-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
        .id-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 300px;
            height: 300px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        /* Summary Section */
        .summary-container {
            width: 80%;
            margin: 20px auto;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        /* Show More and Show Less Buttons */
        .show-more-button, .show-less-button {
            display: flex;
            justify-content: center;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        .show-more-button button, .show-less-button button {
            padding: 10px 20px;
            background-color: #fda92c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .show-more-button button:hover, .show-less-button button:hover {
            background-color: #e8b471;
        }
    </style>
    <link rel="stylesheet" href="/navbar.css">
    <link rel="stylesheet" href="/main.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <a href="index.html">
                <img class="navbar-img" src="logo.png" alt="Polipicker">
            </a>
        </div>
        <div class="navbar-center">
            <form class="search-bar">
                <input id="searchInput" type="text" placeholder="Search politicians...">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="navbar-right">
            <a href="profile.html">
                <img id="pfp" class="navbar-img" src="profilePicDefault.png" alt="Account">
            </a>
        </div>
    </nav>

    <!-- Main content (Image and ID Card) -->
    <div class="content-container">
        <div class="profile-container">
            <h1 id="politicianName">Ed Gainey</h1>
            <img id="profile" src="https://en.wikipedia.org/wiki/File:Ed_Gainey_(51832725053).jpg" alt="Picture of Ed Gainey">
            <p id="description">Ed Gainey is the current Mayor of Philadelphia, having taken office in January 2024. As a member of the Democratic Party, he previously served in the Pennsylvania House of Representatives, representing the 24th District. Gainey has focused on issues such as affordable housing, public safety, and economic development throughout his political career. His leadership style emphasizes community engagement and collaboration, aiming to address the needs of all Philadelphia residents.</p>
            <button class="compare-button" onclick="window.location.href='compare.html'">Compare with another politician</button>
        </div>

        <div class="id-card">
            <h2>Politician Information</h2>
            <p><strong>Name:</strong> <span id="infoName">Ed Gainey</span></p>
            <p><strong>Age:</strong> <span id="infoAge">54</span></p>
            <p><strong>Political Affiliation:</strong> <span id="infoParty">Democrat</span></p>
            <p><strong>Position Held:</strong> <span id="infoPosition">Mayor of Pittsburgh</span></p>
        </div>
    </div>

    <!-- Dropdowns for policies -->
    <div class="dropdown-container">
        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Climate Policy</button>
            <div class="dropdown-content">
                <p>Ed Gainey is committed to addressing climate change and promoting environmental sustainability in Philadelphia. He supports initiatives to reduce greenhouse gas emissions and enhance the city’s resilience to climate impacts. Gainey advocates for increased investment in renewable energy, energy efficiency, and green infrastructure. He also emphasizes the importance of environmental justice, ensuring that marginalized communities are prioritized in climate initiatives and have access to green spaces and clean resources.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Gun Policy</button>
            <div class="dropdown-content">
                <p>Ed Gainey supports comprehensive gun control measures aimed at reducing gun violence in Philadelphia. He advocates for universal background checks, restrictions on assault weapons, and measures to prevent illegal firearms from entering communities. Gainey emphasizes the need for community-based violence prevention programs and improved mental health services to address the root causes of gun violence. His approach reflects a commitment to enhancing public safety and protecting residents.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Healthcare</button>
            <div class="dropdown-content">
                <p>Ed Gainey believes in the importance of accessible and affordable healthcare for all Philadelphians. He supports expanding access to health services, particularly for underserved communities, and advocates for policies that address health disparities. Gainey emphasizes mental health resources and preventative care as key components of a comprehensive healthcare system. His approach aims to ensure that all residents have the opportunity to achieve their best health outcomes.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Education</button>
                <p>Ed Gainey is a strong advocate for public education and believes in investing in Philadelphia’s schools to provide quality education for all students. He supports increased funding for K-12 education and initiatives to improve educational resources in underserved neighborhoods. Gainey emphasizes the need for equitable access to early childhood education and vocational training programs. His focus is on empowering students and ensuring that every child has the tools they need to succeed.</p>
            </div>
        </div>

        <!-- Hidden dropdowns initially -->
        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Foreign Policy</button>
            <div class="dropdown-content">
                <p>As a governor, Tim Walz's foreign policy perspectives are primarily shaped by his focus on economic development and fostering international relationships that benefit Minnesota. He emphasizes the importance of trade partnerships, particularly for Minnesota's agricultural and manufacturing sectors. Walz supports policies that strengthen diplomatic ties and promote collaboration on global challenges such as climate change and public health. He advocates for human rights and democratic values in international relations, reflecting a commitment to building a more equitable world.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Immigration</button>
            <div class="dropdown-content">
                <p>Ed Gainey supports comprehensive immigration reform that protects the rights of immigrants and ensures they are treated with dignity. He advocates for policies that provide pathways to citizenship and access to essential services for immigrant communities. Gainey emphasizes the contributions of immigrants to Philadelphia’s economy and culture, working to create an inclusive environment that celebrates diversity. His approach focuses on fostering community cohesion and support for all residents.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Economy</button>
            <div class="dropdown-content">
                <p>Ed Gainey aims to build a strong and equitable economy in Philadelphia by promoting job creation and supporting small businesses. He advocates for policies that increase access to capital for entrepreneurs and enhance workforce development programs. Gainey emphasizes the importance of investing in infrastructure and public transit to boost economic opportunities. His focus is on addressing income inequality and ensuring that all Philadelphians can benefit from economic growth.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Social Issues</button>
            <div class="dropdown-content">
                <p>Ed Gainey is a strong advocate for social justice and equity, focusing on issues such as racial equity, LGBTQ+ rights, and affordable housing. He supports policies that aim to eliminate systemic racism and promote inclusion in all aspects of city life. Gainey emphasizes the need for criminal justice reform and community-led safety initiatives to address violence and inequality. He also champions affordable housing initiatives and works to ensure that all residents have access to safe and stable living conditions.</p>
            </div>
        </div>
    </div>
    <script>
        const apiKey = "AIzaSyDqKJ7ZhvNSrEnUoTcpZU0ZCG_xQcXnymM"; // Use your own API key
    
        async function summarizePoliticianPreferences(bio, keyIssues, politicianUrl) {
            const response = await fetch('/summarize', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    bio: bio,
                    key_issues: keyIssues,
                    politician_url: politicianUrl
                })
            });
    
            if (!response.ok) {
                throw new Error('Failed to get the summary');
            }
    
            const data = await response.json();
            return data.summary; // Return the summary
        }
    
        const userPreferences = "User preferences: This summary focuses on the politician's impact and policy effectiveness.";
        const keyIssues = ["Climate Policy", "Gun Policy", "Healthcare", "Education"];
        const politicianUrl = "https://en.wikipedia.org/wiki/Kamala_Harris";
    
                summarizePoliticianPreferences(userPreferences, keyIssues, politicianUrl)
            .then(summary => {
                 // Set the text content once
                document.getElementById('policySummary').innerText = summary;  // Set the text content once
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('policySummary').innerText = "Failed to load policy summary.";
            });
    </script>
    
</body>
</html>
