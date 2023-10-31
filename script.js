// Function to display bot message in the chatbox
function displayBotMessage(message) {
    const chatbox = document.getElementById('chatbox');
    const botMessageElement = document.createElement('p');
    botMessageElement.innerText =  message;
    chatbox.appendChild(botMessageElement);
}

// Function to send user message to Rasa backend and get the bot response
function sendMessageToRasa(userMessage) {
    fetch('http://localhost:5002/webhooks/rest/webhook', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: userMessage })
    })
    .then(response => response.json())
    .then(data => {
        // Extract the bot responses from the data
        const botResponses = data.map(item => item.text);

        // Display the bot responses in the chatbox
        botResponses.forEach(botMessage => {
            displayBotMessage(botMessage);
        });

        // Check if the conversation is completed (bot says 'bye' or 'thanks')
        if (botResponses.some(msg => msg.toLowerCase() === 'bye' || msg.toLowerCase() === 'thanks')) {
            recognition.stop();
        }
    })
    .catch(error => console.error('Error:', error));
}
// Create an instance of the SpeechRecognition object
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();

// Start the recognition when the 'Start Listening' button is clicked
document.getElementById('microphone-btn').addEventListener('click', () => {
    recognition.start();
});

// Event listener for when speech is recognized
recognition.addEventListener('result', event => {
    const userMessage = event.results[0][0].transcript;
    console.log('You said:', userMessage);

    // Display the user message in the chatbox
    const chatbox = document.getElementById('chatbox');
    const userMessageElement = document.createElement('p');
    userMessageElement.innerText = 'You: ' + userMessage;
    chatbox.appendChild(userMessageElement);

    // Send the user message to the Rasa chatbot backend
    sendMessageToRasa(userMessage);
});

// Event listener for errors in recognition
recognition.addEventListener('error', event => {
    console.error('Error occurred in recognition:', event.error);
});

// Event listener for recognition end (you can start listening again if you want)
recognition.addEventListener('end', () => {
    console.log('Recognition ended.');
});
