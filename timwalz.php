<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /*body {
            font-family: Arial, sans-serif;
            /*text-align: center;
            background-color: rgba(160, 80, 190, 0.5);
            margin: 20px;
        }*/
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            width: 100%;
        }

        /*.navbar a {
            color: white;
            text-decoration: none;
        }

        .navbar img {
            height: 40px;
            width: 40px;
        }

        .navbar-center {
            display: flex;
            align-items: center;
        }

        .navbar-center input {
            padding: 5px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }*/

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
            justify-content: center;
            /*width: 300px;*/
            height: 300px;
            width: 90%;
            top: 15vw;
            display: inline-block;
            text-align: center;
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

        .id-card h2 {
            margin-top: 0;
            text-align: center;
        }

        .id-card p {
            margin: 5px 0;
            font-size: 18px;
        }

        /* Dropdown Section */
        .dropdown-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 80%;
            margin: 20px auto;
        }

        .dropdown {
            width: 48%;
            margin-bottom: 10px;
        }

        .dropdown-header {
            background-color: #f4f4f4;
            padding: 10px;
            font-size: 24px;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
            border-radius: 5px;
        }

        .dropdown-content {
            display: none;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .dropdown-content p {
            margin: 0;
        }

        .active + .dropdown-content {
            display: block;
        }

        .compare-button {
            padding: 10px 20px;
            margin-top: 20px;
        }

        .compare-button:hover {
            background-color: #e8b471;
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

        /* Initially hidden dropdowns */
        .show-more {
            display: none;
        }

        .show-less-button {
            display: none; /* Initially hide the "Show Less Topics" button */
        }
    </style>
    <link rel="stylesheet" href="navbar.css">
    <link href="main.css" rel="stylesheet">
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
            <div id="dropdown"></div>
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
            <h1>Tim Walz</h1>
            <img id="profile" src="https://media2.citybeat.com/citybeat/imager/tim-walz-to-visit-cincinnati-during-harris-campaign-push/u/slideshow/18240830/tim_walz_official_portrait.jpg?cb=1727468502" alt="Picture of Tim Walz">
            <p>Tim Walz is the 41st Governor of Minnesota, having taken office in January 2019. A member of the Democratic-Farmer-Labor Party, he previously served as a U.S. Representative for Minnesota's 1st congressional district from 2007 to 2019. Walz, a retired Army National Guard veteran and former public school teacher, has focused on issues such as education, healthcare, and economic development throughout his career. His leadership style emphasizes collaboration and bipartisanship, seeking to address the needs of all Minnesotans.</p>
            <button class="compare-button" href="window.location.href='compare.html'">Compare with another politician</button>
        </div>

        <div class="id-card">
            <h2>Politician Information</h2>
            <p><strong>Name:</strong>Tim Walz</p>
            <p><strong>Age:</strong>60</p>
            <p><strong>Political Affiliation:</strong>Democrat</p>
            <p><strong>Position Held:</strong>Governor of Minnesota</p>
        </div>
    </div>

    <!-- Dropdowns for policies -->
    <div class="dropdown-container">
        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Climate Policy</button>
            <div class="dropdown-content">
                <p>Tim Walz is committed to addressing climate change and transitioning Minnesota to clean energy. He supports ambitious goals to reduce greenhouse gas emissions and has outlined plans for a carbon-free power sector by 2050. Walz advocates for investing in renewable energy sources, such as wind and solar, and promoting energy efficiency. He also emphasizes the importance of environmental justice, seeking to ensure that low-income and marginalized communities are included in climate solutions. Under his leadership, Minnesota has engaged in regional initiatives to combat climate change and protect natural resources.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Gun Policy</button>
            <div class="dropdown-content">
                <p>Tim Walz supports common-sense gun safety measures to reduce gun violence while respecting Second Amendment rights. He advocates for universal background checks, red flag laws, and closing loopholes that allow firearms to be purchased without thorough screening. Walz emphasizes the need for community-based violence prevention programs and has called for a more comprehensive approach to mental health services to address the root causes of gun violence. His stance reflects a commitment to public safety and the well-being of Minnesota families.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Healthcare</button>
            <div class="dropdown-content">
                <p>Tim Walz advocates for accessible and affordable healthcare for all Minnesotans. He supports strengthening the Affordable Care Act and expanding Medicaid to provide coverage for low-income individuals and families. Walz emphasizes the importance of reducing prescription drug costs and improving mental health services. He has also promoted policies aimed at addressing health disparities in underserved communities. His approach includes a focus on preventative care and public health initiatives to enhance overall community health.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Education</button>
            <div class="dropdown-content">
                <p>Tim Walz is a strong proponent of public education and believes in investing in Minnesota's schools to ensure every child has access to quality education. He supports increased funding for K-12 education, affordable higher education, and vocational training. Walz emphasizes the need to address disparities in educational resources, particularly for low-income and minority students. He advocates for teacher support, mental health resources in schools, and initiatives to improve student outcomes, aiming to prepare Minnesota students for the challenges of the future.</p>
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
                <p>Tim Walz supports comprehensive immigration reform that includes a pathway to citizenship for undocumented immigrants and protections for DACA recipients. He believes in treating immigrants with dignity and respect, advocating for policies that promote family reunification and ensure access to education and healthcare for all residents. Walz has spoken out against harsh immigration enforcement practices and emphasizes the contributions of immigrants to Minnesota's economy and communities. His approach reflects a commitment to inclusion and equity.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Economy</button>
            <div class="dropdown-content">
                <p>Tim Walz aims to build a strong and equitable economy in Minnesota by supporting small businesses, creating jobs, and investing in infrastructure. He advocates for raising the minimum wage, expanding paid family leave, and ensuring workers' rights are protected. Walz emphasizes the importance of job training and workforce development programs to prepare Minnesotans for the evolving job market. He also supports efforts to close the wealth gap and address income inequality, prioritizing policies that uplift low- and middle-income families.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Social Issues</button>
            <div class="dropdown-content">
                <p>Tim Walz is a strong advocate for social justice and equality, focusing on issues such as racial equity, LGBTQ+ rights, and women's rights. He supports policies that aim to eliminate systemic racism and promote inclusion in all areas of society. Walz has emphasized the need for criminal justice reform, including addressing police accountability and investing in community-led safety initiatives. He also champions reproductive rights and works to ensure that all Minnesotans have access to healthcare and support services, reflecting a commitment to dignity and respect for all individuals.</p>
            </div>
        </div>
    </div>

    <!-- Button to reveal more dropdowns -->
    <div class="show-more-button">
        <button onclick="showMore()">Show More Topics</button>
    </div>

    <!-- Button to hide dropdowns -->
    <div class="show-less-button">
        <button onclick="showLess()">Show Less Topics</button>
    </div>

    <script>
        function toggleDropdown(button) {
            button.classList.toggle("active");
        }

        function showMore() {
            const moreDropdowns = document.querySelectorAll('.show-more');
            moreDropdowns.forEach(dropdown => {
                dropdown.style.display = 'block';
            });
            // Hide the "Show More Topics" button and show "Show Less Topics" button
            document.querySelector('.show-more-button').style.display = 'none';
            document.querySelector('.show-less-button').style.display = 'flex';
        }

        function showLess() {
            const moreDropdowns = document.querySelectorAll('.show-more');
            moreDropdowns.forEach(dropdown => {
                dropdown.style.display = 'none';
            });
            // Hide the "Show Less Topics" button and show the "Show More Topics" button
            document.querySelector('.show-less-button').style.display = 'none';
            document.querySelector('.show-more-button').style.display = 'flex';
        }

        /*const apiKey = 'AIzaSyCEPDDQcYA0CQne4DY7tiH6snKOz-pTWtc';
        const cxId = 'a0f1d23ff7fbd4989';
        const query = 'Ed Gainey'; // Replace with variable name of politician

        fetch(`https://www.googleapis.com/customsearch/v1?key=${apiKey}&cx=${cxId}&q=${query}&searchType=image`)
        .then(response => response.json())
        .then(data => {
            const imageUrl = data.items[0].link; // Get the URL of the first image result
            document.getElementById('profile').src = imageUrl; // Set the image source
        })
        .catch(error => console.error('Error fetching image:', error));*/
    </script>
</body>
</html>