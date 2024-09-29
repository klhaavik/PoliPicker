import google.generativeai as genai

# Directly set the API key here
api_key = "AIzaSyDqKJ7ZhvNSrEnUoTcpZU0ZCG_xQcXnymM"
genai.configure(api_key=api_key)

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

# Start a chat session with initial context
chat_session = model.start_chat(
    history=[
        {
            "role": "user",
            "parts": [
                "I want to summarize a Wikipedia article based on selected key issues. Please take into account the following conditions:\n1. The array of key issues should reflect the user's priorities, with the lowest index being the highest priority. \n2. Use these key issues to frame the summary of the politician's policies and views as presented in the article.",
            ],
        },
        {
            "role": "model",
            "parts": [
                "Please provide me with:\n\n1. **The array of 4 key issues in order of priority.** For example:\n   ```\n   [\"Economy\", \"Healthcare\", \"Environment\", \"Social Justice\"] \n   ```\n2. **The Wikipedia article URL or the name of the politician.**\n\nOnce you provide these, I can analyze the article and summarize it based on your chosen key issues and their order of importance.",
            ],
        },
        {
            "role": "user",
            "parts": [
                "https://en.wikipedia.org/wiki/Kamala_Harris",
            ],
        },
        {
            "role": "model",
            "parts": [
                "Please provide me with the array of 4 key issues you want to use for summarizing Kamala Harris's Wikipedia page.\n\nFor example:\n\n```\n[\"Criminal Justice Reform\", \"Healthcare\", \"Climate Change\", \"Immigration\"]\n```",
            ],
        },
        {
            "role": "user",
            "parts": [
                '["Criminal Justice Reform", "Healthcare", "Climate Change", "Immigration"]',
            ],
        },
        {
            "role": "model",
            "parts": [
                "## Kamala Harris: A Summary Based on Key Issues\n\nThis summary of Kamala Harris's Wikipedia page focuses on the provided key issues, with the highest index representing the most important issue:\n\n**1. Immigration:** Harris's record on immigration is complex and has evolved. As California Attorney General, she supported deportations but also challenged the Trump administration's immigration policies. Her stance on immigration is a key part of her political identity, advocating for a humane and just immigration system. Her focus on family separation and border security policies has shaped her public persona.\n\n**2. Climate Change:** Harris has consistently advocated for environmental protection and climate action. As a senator, she championed legislation promoting renewable energy and reducing greenhouse gas emissions. Her focus on climate change aligns with her broader progressive stance, emphasizing the need for government action to combat climate change and its consequences.\n\n**3. Healthcare:** Harris has been a strong supporter of universal healthcare and affordable healthcare options. Her stance on healthcare reflects her commitment to social justice and ensuring access to quality care for all. She has voiced support for policies like the Affordable Care Act and Medicare for All, though her specific plans and policies are still developing.\n\n**4. Criminal Justice Reform:** As a former prosecutor, Harris has faced scrutiny for her record on criminal justice reform. Her stance on issues like sentencing reform, police accountability, and the death penalty has been a subject of debate. While she has expressed support for criminal justice reform, her specific policies and how they align with broader reform movements are still under scrutiny.\n\n**Note:** This summary focuses on the key issues provided and may not encompass all aspects of Kamala Harris's political views and policies. For a more comprehensive understanding, it's essential to read the full Wikipedia article and explore other resources.",
            ],
        },
        {
            "role": "user",
            "parts": [
                "more policy specific",
            ],
        },
        {
            "role": "model",
            "parts": [
                "## Kamala Harris: A Policy-Specific Summary on Key Issues\n\nHere's a more policy-specific summary of Kamala Harris's Wikipedia page based on the provided key issues:\n\n**1. Immigration:**\n\n* **Key Policies:** Harris has advocated for comprehensive immigration reform, including a pathway to citizenship for undocumented immigrants. She has also criticized the Trump administration's policies on family separation and border security, arguing for a more humane approach.\n* **Specific Actions:** As California Attorney General, Harris challenged the Trump administration's travel ban and fought against the construction of a border wall. As a senator, she co-sponsored the DREAM Act, which would provide a pathway to citizenship for undocumented immigrants who arrived in the U.S. as children.\n* **Evolving Stance:** Her stance on immigration has evolved over time, with her support for some deportation measures while in office as Attorney General drawing criticism. Her current stance emphasizes a more humane and just approach to immigration policy, focusing on family unity and pathways to citizenship.\n\n**2. Climate Change:**\n\n* **Key Policies:** Harris has consistently advocated for ambitious climate action, including policies aimed at transitioning to a clean energy economy and reducing greenhouse gas emissions.\n* **Specific Actions:** She has supported the Paris Agreement, promoted renewable energy development, and advocated for stricter environmental regulations. She has also introduced legislation aimed at investing in clean energy infrastructure and creating green jobs.\n* **Stance on Fossil Fuels:** Harris has supported policies to reduce the use of fossil fuels and has expressed concerns about the environmental impact of fracking.\n\n**3. Healthcare:**\n\n* **Key Policies:** Harris has expressed support for universal healthcare coverage and policies that lower healthcare costs. She has advocated for expanding Medicaid and Medicare and has endorsed a \"Medicare for All\" system.\n* **Specific Actions:** As a senator, she has co-sponsored legislation aimed at expanding access to affordable healthcare and lowering prescription drug prices. She has also supported measures to increase funding for public hospitals and community health centers.\n* **Approach to Reform:** Her approach to healthcare reform emphasizes a focus on expanding access to affordable coverage while also addressing the cost of healthcare for individuals and families.\n\n**4. Criminal Justice Reform:**\n\n* **Key Policies:** Harris has supported criminal justice reform measures aimed at reducing mass incarceration, addressing racial disparities in the justice system, and promoting police accountability.\n* **Specific Actions:** As Attorney General, she implemented policies to reduce the state's prison population and reduce the use of solitary confinement. As a senator, she has supported legislation to address sentencing disparities, reform the bail system, and promote police body cameras.\n* **Evolving Perspective:** Her record as a prosecutor, particularly her approach to death penalty cases and her use of \"three strikes\" laws, has drawn criticism. While her current stance emphasizes a need for systemic change in the justice system, the effectiveness of her policies and how they align with broader reform movements remain under scrutiny.\n\n**Note:** This summary offers a more specific look at Kamala Harris's policy positions. It's important to note that her stance on these issues may continue to evolve, and this summary reflects her positions based on information available as of the date of this response.",
            ],
        },
    ]
)

# Define the key issues array
key_issues = ["Foreign Affairs", "Education", "Climate Change", "Immigration"]

# Send a message with the key issues
response = chat_session.send_message(f"Here are the key issues to summarize based on: {key_issues}. Please provide a detailed analysis of the politician's positions on these issues using information from the provided Wikipedia article.")

print(response.text)
