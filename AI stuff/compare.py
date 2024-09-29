import os
import google.generativeai as genai
import wikipediaapi

# Configure the API key for Google Generative AI
genai.configure(api_key="AIzaSyAB5TJt9oaOCxYHHHB_ElnTTOZeTeVQi2E")

# Initialize Wikipedia API
wiki_wiki = wikipediaapi.Wikipedia(
    language='en',
    user_agent="YourAppName/1.0 (your.email@example.com)"
)

# Function to get the Wikipedia link for a given politician's name
def get_wikipedia_link(official_name):
    page = wiki_wiki.page(official_name)
    if page.exists():
        return page.fullurl  # Return the full URL of the Wikipedia page
    else:
        return f"No Wikipedia page found for {official_name}"

# Create the model
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

# Function to summarize a Wikipedia page
def summarize_page(page_link):
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
                    "Please provide me with the website address so I can summarize it for you.\n",
                ],
            },
            {
                "role": "user",
                "parts": [
                    page_link,
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

    response = chat_session.send_message("Summarize the Wikipedia article into bullet points")
    return response.text

# Function to ask AI to compare the two summaries based on the content of their policies, beliefs, ideologies, and priorities
def compare_summaries(summary1, summary2):
    # Start a chat session with the generative AI model
    chat_session = model.start_chat(
        history=[
            {
                "role": "user",
                "parts": [
                    "Here are two summaries of different Wikipedia articles each on an American politician. Can you compare each politician based on this content, ignoring syntax, formatting, and organization, listing the similarities and differences of their policies, beliefs, ideologies, and priorities?",
                ],
            },
            {
                "role": "model",
                "parts": [
                    "Sure! Please provide me with both summaries and I'll compare their policies, beliefs, ideologies, and priorities.",
                ],
            },
            {
                "role": "user",
                "parts": [
                    f"Summary 1: {summary1}\n\nSummary 2: {summary2}",
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

    response = chat_session.send_message("Compare these two politicians based on their policies, beliefs, ideologies, and priorities, and highlight similarities and differences.")
    return response.text

# Function to summarize two Wikipedia pages and compare them
def compare_pages(page1_name, page2_name):
    # Get Wikipedia links for both pages
    page1_link = get_wikipedia_link(page1_name)
    page2_link = get_wikipedia_link(page2_name)

    # Summarize both pages
    print(f"Summarizing {page1_name}...")
    summary1 = summarize_page(page1_link)
    print(f"Summary of {page1_name}:\n{summary1}")

    print(f"\nSummarizing {page2_name}...")
    summary2 = summarize_page(page2_link)
    print(f"Summary of {page2_name}:\n{summary2}")

    # Use the AI model to compare both summaries and analyze similarities and differences in policies, beliefs, ideologies, and priorities
    comparison_result = compare_summaries(summary1, summary2)

    # Print the comparison result
    print("\nComparison Result (Policies, Beliefs, Ideologies, and Priorities):")
    print(comparison_result)

# Example Usage
name1 = input("Enter the name of the first politician: ")
name2 = input("Enter the name of the second politician: ")

compare_pages(name1, name2)
