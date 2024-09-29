from flask import Flask, render_template, request
import google.generativeai as genai
import wikipediaapi

app = Flask(__name__)

# Configure Google Generative AI API
genai.configure(api_key="AIzaSyAB5TJt9oaOCxYHHHB_ElnTTOZeTeVQi2E")

# Initialize Wikipedia API
wiki_wiki = wikipediaapi.Wikipedia(
    language='en',
    user_agent="YourAppName/1.0 (your.email@example.com)"
)

# Function to get Wikipedia page content
def get_wikipedia_content(official_name):
    page = wiki_wiki.page(official_name)
    if page.exists():
        return page.summary  # Return the summary of the Wikipedia page
    else:
        return None  # Return None if the page does not exist

@app.route("/", methods=["GET", "POST"])
def index():
    if request.method == "POST":
        politician_name = request.form["name"]  # Get the input from the form
        wiki_summary = get_wikipedia_content(politician_name)

        if wiki_summary:
            # Create the model for summarization
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

            # Start a chat session and summarize the Wikipedia article content
            chat_session = model.start_chat(
                history=[
                    {"role": "user", "parts": [f"Summarize the following content:\n\n{wiki_summary}"]},
                ]
            )

            # Send a message to summarize the Wikipedia article content
            response = chat_session.send_message("Summarize the Wikipedia article into bullet points")
            
            # Use an image search API (for simplicity, we will skip this part in Flask)
            image_url = f"https://via.placeholder.com/250?text={politician_name.replace(' ', '+')}"  # Placeholder image URL
            
            return render_template(
                "index.html", 
                name=politician_name, 
                summary=response.text, 
                image_url=image_url
            )
        else:
            return render_template("index.html", error="No Wikipedia page found for the given name.")
    return render_template("index.html")


if __name__ == "__main__":
    app.run(debug=True)
