document.addEventListener('DOMContentLoaded', async function () {
    const quoteText = document.getElementById('quote-text');
    const sendButton = document.getElementById('send-button');
    const addQuoteButton = document.getElementById('add-button');
    const emailForm = document.getElementById('email-form');

    // Function to fetch a random quote from an API
    async function fetchRandomQuote() {
        try {
            const response = await fetch('https://api.example.com/quotes/random');
            if (!response.ok) {
                throw new Error('Failed to fetch quote');
            }
            const data = await response.json();
            return data.quote;
        } catch (error) {
            console.error(error.message);
            return 'Failed to fetch a quote';
        }
    }

    // Function to send quote to an email via a hypothetical backend endpoint
    async function sendQuoteToEmail(email, quote) {
        try {
            const response = await fetch('https://api.example.com/send-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, quote })
            });
            if (!response.ok) {
                throw new Error('Failed to send email');
            }
            return 'Quote sent successfully';
        } catch (error) {
            console.error(error.message);
            return 'Failed to send quote';
        }
    }

    // Display a random quote on page load
    const randomQuote = await fetchRandomQuote();
    quoteText.textContent = randomQuote;

    // Event listener for sending quote to email
    sendButton.addEventListener('click', async function () {
        emailForm.style.display = 'block';
    });

    // Event listener for submitting email form
    emailForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        const email = document.getElementById('email').value.trim();
        if (email) {
            const response = await sendQuoteToEmail(email, quoteText.textContent);
            alert(response);
            emailForm.reset();
            emailForm.style.display = 'none';
        }
    });

    // Event listener for adding a custom quote
    addQuoteButton.addEventListener('click', async function () {
        const motivationalTextarea = document.getElementById('motivational-text');
        const customQuote = motivationalTextarea.value.trim();
        if (customQuote) {
            // Here you might want to send the custom quote to your backend for storage
            // For simplicity, I'm just updating the UI with the custom quote
            quoteText.textContent = customQuote;
            motivationalTextarea.value = '';
        } else {
            alert('Please enter a motivational quote.');
        }
    });
});
