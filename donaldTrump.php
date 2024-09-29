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
            <form class="search-bar" action="results.php">
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
            <h1 id="politicianName">NAME</h1>
            <img id="profile" src="" alt="Picture of [Name]">
            <p id="description">Loading description...</p>
            <button class="compare-button" onclick="window.location.href='compare.html'">Compare with another politician</button>
        </div>

        <div class="id-card">
            <h2>Politician Information</h2>
            <p><strong>Name:</strong> <span id="infoName">Donald Trump</span></p>
            <p><strong>Age:</strong> <span id="infoAge">78</span></p>
            <p><strong>Political Affiliation:</strong> <span id="infoParty">Republican</span></p>
            <p><strong>Position Held:</strong> <span id="infoPosition">Former Preisdent</span></p>
        </div>
    </div>

    <!-- Summary Section -->
    <div class="summary-container">
    <h2>Summary of Policies</h2>
    <p id="policySummary">
        <h3>Economy and Taxes</h3>
        Trump's key economic policy was the <i>Tax Cuts and Jobs Act of 2017</i>, which lowered corporate taxes and provided tax cuts for individuals. He also pushed for widespread deregulation, particularly in energy and financial sectors, to spur business growth.
        
        <h3>Trade</h3>
        Trump pursued an <i>“America First”</i> trade policy, focusing on renegotiating trade deals and imposing tariffs. The U.S.-China trade war and the replacement of NAFTA with the <i>United States-Mexico-Canada Agreement (USMCA)</i> were major trade initiatives aimed at protecting American industries and jobs.
        
        <h3>Immigration</h3>
        Trump's immigration policy emphasized stricter border enforcement. His administration built sections of a wall on the U.S.-Mexico border, implemented travel bans for several Muslim-majority countries, and reduced legal immigration. He also moved to end the DACA program, impacting undocumented individuals brought to the U.S. as children.
        
        <h3>Healthcare</h3>
        Trump's efforts to repeal the <i>Affordable Care Act (Obamacare)</i> were unsuccessful, but he scaled back its provisions, including the individual mandate. His administration promoted short-term, less comprehensive health plans as alternatives.
        
        <h3>Foreign Policy</h3>
        Trump took a more isolationist approach, withdrawing the U.S. from international agreements like the <i>Paris Climate Accord</i> and the <i>Iran Nuclear Deal</i>. He reduced U.S. military involvement in places like Syria and Afghanistan, while also engaging in direct diplomacy with North Korea.
        
        <h3>Defense and National Security</h3>
        Trump increased military spending and established the <i>Space Force</i> as a new military branch. His administration prioritized counterterrorism, leading to the killing of ISIS leader Abu Bakr al-Baghdadi.
        
        <h3>Judiciary</h3>
        Trump appointed three conservative Supreme Court Justices—Neil Gorsuch, Brett Kavanaugh, and Amy Coney Barrett—reshaping the judiciary. He also appointed over 200 federal judges, cementing a conservative influence on the courts.
        
        <h3>Climate and Energy</h3>
        Trump promoted energy independence through increased oil, gas, and coal production, rolling back environmental regulations. His administration withdrew from the <i>Paris Climate Accord</i> and downplayed the urgency of climate change, focusing instead on fossil fuel development.
        
        <h3>Criminal Justice Reform</h3>
        Trump signed the <i>First Step Act</i>, which reformed federal prison sentencing, reduced mandatory minimum sentences for nonviolent offenders, and expanded rehabilitation programs.
        
        <h3>COVID-19 Response</h3>
        Trump's response to the COVID-19 pandemic involved launching <i>Operation Warp Speed</i> to accelerate vaccine development. However, his administration faced criticism for downplaying the virus’s severity and providing inconsistent public messaging.
    </p>
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
