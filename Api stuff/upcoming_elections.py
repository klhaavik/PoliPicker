from votesmart import VoteSmartAPI
from datetime import datetime, timedelta

def get_upcoming_elections(state_id):
    
    try:
        # Initialize the VoteSmartAPI object with your API key
        api_key = '88bda3b6fa27737fd5b2e4655d4a4444'  # Your API key
        vsmart = VoteSmartAPI(api_key=api_key)

        # Get the current year
        current_year = datetime.now().year

        # Fetch elections for the current year and state
        elections = vsmart.Election.getElectionByYearState(year=current_year, stateId=state_id)

        # Set the time range: current date + 3 months
        current_date = datetime.now()
        three_months_later = current_date + timedelta(days=90)

        # Filter elections happening in the next 3 months
        upcoming_elections = []
        for election in elections:
            # Iterate through the stages of the election to check for upcoming stages
            for stage in election.stages:
                election_date = datetime.strptime(stage.electionDate, "%Y-%m-%d")
                if current_date <= election_date <= three_months_later:
                    upcoming_elections.append({
                        "name": election.name,
                        "electionDate": stage.electionDate,
                        "stage": stage.name
                    })

        # Print the upcoming elections
        if upcoming_elections:
            print(f"Upcoming elections in the next 3 months for state {state_id}:")
            for election in upcoming_elections:
                print(f"Election Name: {election['name']}")
                print(f"Stage: {election['stage']}")
                print(f"Election Date: {election['electionDate']}")
                print("--------------------------")
        else:
            print(f"No upcoming elections in the next 3 months for state {state_id}.")

    except Exception as e:
        print(f"An error occurred: {e.__class__.__name__}: {str(e)}")

# Example usage
get_upcoming_elections(state_id='TX')  # Replace with any state ID

from votesmart import VoteSmartAPI
from datetime import datetime, timedelta

def get_state_id_from_zip(zipcode):
    # Placeholder function: implement logic to fetch state_id based on zipcode
    # This could be a dictionary mapping or a call to another API
    # Example: return 'TX' for Texas
    return 'TX'  # Replace with actual logic

def get_upcoming_elections(zipcode):
    try:
        # Initialize the VoteSmartAPI object with your API key
        api_key = 'YOUR_API_KEY'  # Your API key
        vsmart = VoteSmartAPI(api_key=api_key)

        # Get the state ID from the zipcode
        state_id = get_state_id_from_zip(zipcode)

        # Get the current year
        current_year = datetime.now().year

        # Fetch elections for the current year and state
        elections = vsmart.Election.getElectionByYearState(year=current_year, stateId=state_id)

        # Set the time range: current date + 3 months
        current_date = datetime.now()
        three_months_later = current_date + timedelta(days=90)

        # Filter elections happening in the next 3 months
        upcoming_elections = []
        for election in elections:
            # Iterate through the stages of the election to check for upcoming stages
            for stage in election.stages:
                election_date = datetime.strptime(stage.electionDate, "%Y-%m-%d")
                if current_date <= election_date <= three_months_later:
                    # Check if the election is presidential, state, or local
                    if "presidential" in stage.name.lower() or "state" in stage.name.lower() or "local" in stage.name.lower():
                        upcoming_elections.append({
                            "name": election.name,
                            "electionDate": stage.electionDate,
                            "stage": stage.name
                        })

        # Print the upcoming elections
        if upcoming_elections:
            print(f"Upcoming elections in the next 3 months for zipcode {zipcode}:")
            for election in upcoming_elections:
                print(f"Election Name: {election['name']}")
                print(f"Stage: {election['stage']}")
                print(f"Election Date: {election['electionDate']}")
                print("--------------------------")
        else:
            print(f"No upcoming elections in the next 3 months for zipcode {zipcode}.")

    except Exception as e:
        print(f"An error occurred: {e.__class__.__name__}: {str(e)}")

# Example usage
get_upcoming_elections(zipcode='15213')  # Replace with any zipcode
