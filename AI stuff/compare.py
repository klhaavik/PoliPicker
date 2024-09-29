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
def compare_summaries(summary1, summary2, array):
    # Start a chat session with the generative AI model
    chat_session = model.start_chat(
  history=[
    {
      "role": "user",
      "parts": [
        "I will give you two articles and a String array. Compare these two politicians based off their political views, policy, and ideologies, focusing on using the keywords in the array. Return two bulleted lists: one for similarities and one for differences. Avoid repetition.",
      ],
    },
    {
      "role": "model",
      "parts": [
        "Please provide me with the two articles and the string array so I can compare the politicians for you. I'm ready to analyze the text and generate the bulleted lists! \n",
      ],
    },
    {
      "role": "user",
      "parts": [
        "https://en.wikipedia.org/wiki/Kamala_Harris \nhttps://en.wikipedia.org/wiki/Donald_Trump\n[\"gun violence\", \"education\", \"foreign policy\"]",
      ],
    },
    {
      "role": "model",
      "parts": [
        "## Kamala Harris vs. Donald Trump: A Comparison\n\nHere's a comparison of Kamala Harris and Donald Trump based on the provided keywords:\n\n**Similarities:**\n\n* **Foreign Policy:** Both Harris and Trump have expressed concerns about the rise of China and its economic and military influence. \n* **Education:** Both politicians have stressed the importance of school choice and have voiced support for charter schools, albeit with different motivations and approaches. \n\n**Differences:**\n\n* **Gun Violence:** Harris supports stricter gun control measures, advocating for universal background checks, bans on assault weapons and high-capacity magazines. Trump has generally opposed stricter gun control, arguing that the Second Amendment guarantees the right to bear arms.\n* **Education:** Harris prioritizes increased funding for public schools, while Trump has advocated for diverting funds from public schools to private and charter schools. \n* **Foreign Policy:** Harris supports a more multilateral approach to foreign policy, advocating for international cooperation and alliances. Trump has taken a more unilateral approach, often prioritizing American interests over international cooperation. He has also withdrawn from key international agreements like the Paris Climate Accord and the Iran nuclear deal.\n\n**Please note:** This comparison is based on publicly available information and may not fully encompass the nuanced views of both politicians. It's crucial to consult diverse sources and consider the context of their statements for a comprehensive understanding. \n",
      ],
    },
  ]
)

    response = chat_session.send_message("INSERT_INPUT_HERE")
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
array = input("Add String array of keywords: ")

compare_summaries(name1, name2, array)
