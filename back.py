from flask import Flask, send_file, request, jsonify
import google.generativeai as genai

# Initialize the Flask app
back = Flask(__name__)

# Set the Google API key
api_key = "AIzaSyDqKJ7ZhvNSrEnUoTcpZU0ZCG_xQcXnymM"
genai.configure(api_key=api_key)

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

# Route for the homepage that renders the HTML file
@back.route('/')
def index():
    return send_file('bioPage.html')  # Load the file directly from the same directory
# Route to serve the navbar.css file
@back.route('/navbar.css')
def navbar_css():
    return send_file('navbar.css')

# Route to serve the main.css file
@back.route('/main.css')
def main_css():
    return send_file('main.css')
# Route to summarize politician's policies
@back.route('/summarize', methods=['POST'])
def summarize_policies():
    # Get key issues and bio from the frontend request
    key_issues = request.json.get('key_issues', [])
    politician_url = request.json.get('politician_url', '')
    bio = request.json.get('bio', '')

    # Start a chat session with the key issues and politician URL
    chat_session = model.start_chat(
        history=[
            {
                "role": "user",
                "parts": [
                    "I want to summarize a Wikipedia article based on selected key issues. Please take into account the following conditions:\n"
                    f"1. The array of key issues should reflect the user's priorities: {key_issues}.\n"
                    "2. Use these key issues to frame the summary of the politician's policies and views as presented in the article."
                ]
            },
            {"role": "user", "parts": [politician_url]},
            {"role": "user", "parts": [str(key_issues)]}
        ]
    )

    # Send a message with the key issues
    response = chat_session.send_message(f"Here are the key issues to summarize based on: {key_issues}. Please provide a detailed analysis of the politician's positions.")

    # Return the generated summary
    return jsonify({
        "summary": f"{bio}\n\n{response.text}"  # Combine bio and summary
    })


# Start the Flask server
if __name__ == '__main__':
    back.run(debug=True, port=5001)
