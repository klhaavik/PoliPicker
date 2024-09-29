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
            <div id="dropdownMenu"></div>
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
            <h1>Kamala Harris</h1>
            <img id="profile" src="https://th.bing.com/th/id/OIP.DVjMOm2250TL9evkWs7kiwAAAA?rs=1&pid=ImgDetMain" alt="Picture of Kamala Harris">
            <p>Kamala Harris is the 49th Vice President of the United States, serving under President Joe Biden. She made history as the first woman, the first Black woman, and the first South Asian American to hold the office. Before becoming Vice President, Harris served as a U.S. Senator from California from 2017 to 2021, where she was known for her advocacy on criminal justice reform, healthcare, and immigration. Prior to her Senate career, she was California’s Attorney General from 2011 to 2017, and the District Attorney of San Francisco from 2004 to 2011. Throughout her career, Harris has been a prominent voice on issues of racial and social justice.</p>
            <button class="compare-button" href="window.location.href='compare.html'">Compare with another politician</button>
        </div>

        <div class="id-card">
            <h2>Politician Information</h2>
            <p><strong>Name:</strong>Kamala Harris</p>
            <p><strong>Age:</strong>59</p>
            <p><strong>Political Affiliation:</strong>Democrat</p>
            <p><strong>Position Held:</strong>Vice President</p>
        </div>
    </div>

    <!-- Dropdowns for policies -->
    <div class="dropdown-container">
        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Climate Policy</button>
            <div class="dropdown-content">
                <p>Kamala Harris is a strong advocate for climate action and supports comprehensive policies to address climate change. She has emphasized the importance of transitioning to clean energy, reducing carbon emissions, and investing in green jobs. As Vice President, Harris has backed the Biden administration's goals to achieve net-zero emissions by 2050 and rejoin the Paris Climate Agreement. She also champions environmental justice, advocating for protections for low-income and minority communities that are disproportionately affected by pollution and climate change impacts. Harris views climate change as both a public health crisis and an economic opportunity to create sustainable infrastructure and jobs.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Gun Policy</button>
            <div class="dropdown-content">
                <p>Kamala Harris is a strong proponent of stricter gun control measures. She supports universal background checks, banning assault weapons, and closing loopholes that allow firearms to be obtained without proper oversight, such as the "boyfriend loophole." Harris has called for mandatory background checks for gun shows and private sales and advocates for red flag laws that would allow courts to temporarily remove guns from individuals deemed a danger to themselves or others. She also supports holding gun manufacturers accountable for their role in gun violence. Throughout her career, Harris has emphasized the need for common-sense gun laws to reduce mass shootings and gun-related deaths in the U.S.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Healthcare</button>
            <div class="dropdown-content">
                <p>Kamala Harris advocates for expanding access to affordable healthcare for all Americans. She supports strengthening the Affordable Care Act (ACA) and has called for lowering prescription drug costs and reducing healthcare disparities, particularly for marginalized communities. Harris has expressed support for a public option, which would allow Americans to choose between private insurance and a government-run plan, though earlier in her career she endorsed "Medicare for All." She emphasizes the importance of healthcare as a fundamental right and prioritizes mental health services, reproductive health access, and addressing maternal mortality, especially among women of color.</p>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Education</button>
            <div class="dropdown-content">
                <p>Kamala Harris is a strong advocate for improving education access and equity. She supports increasing funding for public schools, raising teacher salaries, and expanding early childhood education through universal pre-K. Harris has emphasized the need to address disparities in education for low-income and minority students, advocating for measures to close the achievement gap. She also supports tuition-free community college and has called for reforms to student loan debt, including forgiveness for low-income borrowers. Harris believes in investing in STEM education and vocational training to prepare students for the modern workforce, and she is a vocal proponent of making higher education more affordable and accessible.</p>
            </div>
        </div>

        <!-- Hidden dropdowns initially -->
        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Foreign Policy</button>
            <div class="dropdown-content">
                <p>Kamala Harris supports a foreign policy centered on diplomacy, multilateralism, and the strengthening of global alliances. She emphasizes the importance of rebuilding partnerships with traditional allies and working through international organizations like the United Nations and NATO. Harris advocates for addressing global challenges such as climate change, cyber threats, and human rights abuses. She has called for a firm stance against authoritarian regimes while promoting democratic values and human rights globally. Harris also stresses the need to strengthen national security through intelligence cooperation and addressing the root causes of migration and global instability, including poverty and conflict.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Immigration</button>
            <div class="dropdown-content">
                <p>Kamala Harris advocates for comprehensive immigration reform that includes a pathway to citizenship for undocumented immigrants, particularly DREAMers brought to the U.S. as children. She opposes harsh immigration enforcement policies and supports ending family separation at the border. Harris has called for the protection of asylum seekers and the humane treatment of immigrants, while also emphasizing the need to address the root causes of migration, such as violence and poverty in Central America. She supports expanding legal immigration avenues and modernizing the immigration system to reflect the country’s economic needs and humanitarian values. Harris views immigration as a key element of America's strength and diversity.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Economy</button>
            <div class="dropdown-content">
                <p>Kamala Harris advocates for an inclusive economy that benefits all Americans, with a focus on reducing income inequality and expanding opportunities for the middle class. She supports raising the federal minimum wage to $15 per hour, promoting paid family leave, and closing the gender pay gap. Harris is a proponent of tax reforms that ensure corporations and the wealthiest individuals pay their fair share, while providing tax relief for working families. She also emphasizes the importance of investing in infrastructure, clean energy, and education to create jobs and strengthen long-term economic growth. Harris supports initiatives to boost small businesses and ensure equitable access to economic opportunities, particularly for underserved communities.</p>
            </div>
        </div>

        <div class="dropdown show-more">
            <button class="dropdown-header" onclick="toggleDropdown(this)">Social Issues</button>
            <div class="dropdown-content">
                <p>Kamala Harris is a strong advocate for social justice and equality, with a focus on addressing systemic racism, gender inequality, and LGBTQ+ rights. She supports reforms in the criminal justice system, including ending mass incarceration, eliminating cash bail, and decriminalizing marijuana. Harris is also a vocal proponent of reproductive rights, advocating for women's access to abortion and contraception. She has pushed for stronger protections against workplace discrimination based on race, gender, or sexual orientation, and she supports legislation like the Equality Act to safeguard LGBTQ+ rights. Harris emphasizes the need for policies that ensure fairness, dignity, and equal opportunity for all individuals, particularly those from marginalized communities.</p>
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
