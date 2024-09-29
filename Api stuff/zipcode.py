from votesmart import VoteSmartAPI

def display_officials_hierarchically(zipcode):
    try:
        # Initialize the VoteSmartAPI object with your API key
        api_key = '88bda3b6fa27737fd5b2e4655d4a4444'  # Your API key
        vsmart = VoteSmartAPI(api_key=api_key)

        # Fetch officials based on the ZIP code
        officials_data = vsmart.Officials.getByZip(zip5=zipcode)

        # Define ranking of offices in order of hierarchy
        office_rankings = {
            "President": 1,
            "Vice President": 2,
            "U.S. Senate": 3,
            "U.S. House": 4,
            "Governor": 5,
            "Lieutenant Governor": 6,
            "Attorney General": 7,
            "Secretary of State": 8,
            "Treasurer": 9,
            "State Senate": 10,
            "State Assembly": 11,
            "State Superintendent of Public Instruction": 12,
            "State Board of Education": 13,
            "State Board of Equalization": 14
        }

        # Sort officials based on office rankings
        sorted_officials = sorted(
            officials_data,
            key=lambda official: office_rankings.get(official.officeName, 100)  # Default rank for unknown offices
        )

        # Display the sorted officials
        if sorted_officials:
            print(f"Officials for ZIP code {zipcode} (ranked from highest to lowest):")
            for official in sorted_officials:
                print(f"Name: {official.firstName} {official.lastName}")
                print(f"Title: {official.title}")
                print(f"Party: {official.officeParties}")
                print(f"Office: {official.officeName}")
                print("--------------------------")
        else:
            print(f"No officials data found for ZIP code: {zipcode}.")
    
    except Exception as e:
        print(f"An error occurred: {e.__class__.__name__}: {str(e)}")

# Example usage:
display_officials_hierarchically(zipcode='90210')  # Replace with any ZIP code
