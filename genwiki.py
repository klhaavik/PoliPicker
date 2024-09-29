import os
import google.generativeai as genai
import wikipediaapi

# Configure API Key
genai.configure(api_key="AIzaSyAB5TJt9oaOCxYHHHB_ElnTTOZeTeVQi2E")

# Create Wikipedia API object
wiki_wiki = wikipediaapi.Wikipedia(
    language='en',
    user_agent="YourAppName/1.0 (your.email@example.com)"
)

# Get the name of the politician from the environment variable
name = os.getenv('POLITICIAN_NAME')

def get_wikipedia_link(official_name):
    page = wiki_wiki.page(official_name)
    if page.exists():
        return page.fullurl  # Return the full URL of the Wikipedia page
    else:
        return f"No Wikipedia page found for {official_name}"

# Create the model configuration
generation_config = {
    "temperature": 1,
    "top_p": 0.95,
    "top_k": 64,
    "max_output_tokens": 8192,
    "response_mime_type": "text/plain",
}

model = genai.GenerativeModel(
    model_name="gemini-1.5-flash",
    generation_config=generation_config,
)

# Start the chat session
chat_session = model.start_chat(
    history=[
        {
            "role": "user",
            "parts": [
                "Summarize this website",
            ],
        },
        {
            "role": "model",
            "parts": [
                "Please provide me with the website address so I can summarize it for you. \n",
            ],
        },
        {
            "role": "user",
            "parts": [
                get_wikipedia_link(name),
            ],
        },
        {
            "role": "model",
            "parts": [
                "",
            ],
        },
    ]
)

# Send the summary request
response = chat_session.send_message("Summarize the Wikipedia article into bullet points")

# Print the response
print(response.text)
