import json
from votesmart import VoteSmartAPI

def find_politician_by_name(first_name, last_name):
    try:
        # Initialize the VoteSmartAPI object with your API key
        api_key = '88bda3b6fa27737fd5b2e4655d4a4444'  # Your API key
        vsmart = VoteSmartAPI(api_key=api_key)

        # Fetch all politicians (national scope)
        # You could filter by state or office if needed, but we'll search all
        politicians = vsmart.Candidates.getByLastname(lastName=last_name)

        # Filter results by the first name
        matching_politicians = [p for p in politicians if p.firstName.lower() == first_name.lower()]

        # Check if we found any matching politicians
        if not matching_politicians:
            #print(f"No politician found with the name {first_name} {last_name}.")
            return json.dumps({"error": "No politician found."})
            #return

        # Display matching politicians
        #print(f"Politicians found with the name {first_name} {last_name}:")
        results = []
        for politician in matching_politicians:
            results.append({
                "first_name": politician.firstName,
                "last_name": politician.lastName,
                "title": politician.title,  # Position
                "party": politician.officeParties,  # Party affiliation
            })
        
        return json.dumps(results)
    
    except Exception as e:
        return json.dumps({"error": str(e)})

# Example usage:
first_name = input("Enter the politician's first name: ")
last_name = input("Enter the politician's last name: ")
find_politician_by_name(first_name, last_name)
