<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - JD Vance</title>
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
            <form class="search-bar" action="results.php">
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
            <h1 id="politicianName">JD Vance</h1>
            <img id="profile" src="Senator_Vance_official_portrait._118th_Congress.jpg" alt="Picture of JD Vance">
            <p>JD Vance is a U.S. Senator from Ohio, first elected in 2022. He rose to prominence as the author of the memoir *Hillbilly Elegy*, which explored the struggles of white working-class Americans. Vance ran as a Republican, focusing on issues like economic revitalization, border security, and curbing U.S. involvement in foreign conflicts. As a senator, he has continued to advocate for policies that benefit middle-class Americans and supports a restrained foreign policy.</p>
            <button class="compare-button" onclick="window.location.href='compare.html'">Compare with another politician</button>
        </div>

        <div class="id-card">
            <h2>Politician Information</h2>
            <p><strong>Name:</strong> JD Vance</p>
            <p><strong>Age:</strong> 39</p>
            <p><strong>Political Affiliation:</strong> Republican</p>
            <p><strong>Position Held:</strong> U.S. Senator from Ohio</p>
        </div>
    </div>

    <!-- Summary Section -->
    <div class="summary-container">
        <h2>Summary of Policies</h2>
        <p id="policySummary">
            <h3>Economy and Taxes</h3>
            JD Vance advocates for tax policies that support working-class families, and he has supported measures to incentivize job creation and economic growth in Ohio.
            
            <h3>Trade</h3>
            Vance has expressed support for fair trade practices, advocating for trade policies that benefit American workers and oppose offshoring jobs.
            
            <h3>Immigration</h3>
            JD Vance supports strong border security, advocating for the completion of the border wall and stricter immigration enforcement to curb illegal immigration.
            
            <h3>Healthcare</h3>
            Vance supports reforms to the healthcare system that aim to reduce costs while improving access, including alternatives to the Affordable Care Act.
            
            <h3>Foreign Policy</h3>
            JD Vance advocates for a more restrained foreign policy, emphasizing national security and limiting U.S. involvement in foreign conflicts unless it directly serves American interests.
            
            <h3>Defense and National Security</h3>
            He supports strengthening the U.S. military while ensuring that military actions abroad are in the direct interest of national security.
            
            <h3>Judiciary</h3>
            Vance has praised the appointment of conservative judges to federal courts and supports maintaining a judiciary that interprets the Constitution as originally intended.
            
            <h3>Climate and Energy</h3>
            Vance has voiced support for energy independence through the continued use of fossil fuels while promoting innovation in alternative energy sources.
            
            <h3>Criminal Justice Reform</h3>
            He has shown interest in criminal justice reform, focusing on solutions that address both public safety and the rehabilitation of non-violent offenders.
        </p>
    </div>

</body>
</html>
