from votesmart import VoteSmartAPI

def get_politician_bio_by_full_name(first_name, last_name):
    try:
        # Initialize the VoteSmartAPI object with your API key
        api_key = '88bda3b6fa27737fd5b2e4655d4a4444'  # Your API key
        vsmart = VoteSmartAPI(api_key=api_key)

        # Step 1: Search for the politician by first and last name
        candidates = vsmart.Candidates.getByLastname(lastName=last_name)

        if not candidates:
            print(f"No candidates found with the last name: {last_name}")
            return

        # Filter by first name and select the correct candidate
        candidate = None
        for c in candidates:
            if c.firstName.lower() == first_name.lower():
                candidate = c
                break

        if not candidate:
            print(f"No candidate found with the name {first_name} {last_name}")
            return

        # Step 2: Fetch the bio using the candidate ID
        bio = vsmart.CandidateBio.getBio(candidateId=candidate.candidateId)

        # Print out the candidate's bio
        if bio:
            print(f"Bio for {candidate.firstName} {candidate.lastName}:")
            print(f"Born: {bio.birthDate}")
            print(f"Birthplace: {bio.birthPlace}")
            print(f"Education: {bio.education}")
            print(f"Profession: {bio.profession}")
            print(f"Political Experience: {bio.political}")
            print(f"Religious Affiliation: {bio.religion}")
            print(f"Family: {bio.family}")
            print(f"Special Interests: {bio.special}")
        else:
            print(f"No bio found for {candidate.firstName} {candidate.lastName}.")
    
    except Exception as e:
        print(f"An error occurred: {e.__class__.__name__}: {str(e)}")

# Example usage:
get_politician_bio_by_full_name(first_name='Kamala', last_name='Harris')  # Replace with any first and last name
