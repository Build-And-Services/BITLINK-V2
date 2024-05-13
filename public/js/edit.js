// Function to show success message
function showSuccessMessage() {
    // Create a div element for the message
    const messageDiv = document.createElement('div');
    messageDiv.textContent = 'Sukses, data berhasil ditambahkan!';
    messageDiv.classList.add('success-message');
    
    // Append the message div to the body
    document.body.appendChild(messageDiv);
  
    // Remove the message after 3 seconds
    setTimeout(() => {
        document.body.removeChild(messageDiv);
    }, 3000);
  }
  
  // Function to validate form and show success message
  function handleSubmit(event) {
    // Perform form validation here
    // For simplicity, we assume the form is valid
    showSuccessMessage();
  }
  
  // Add event listener to form submission
  document.querySelector('form').addEventListener('submit', handleSubmit);
  