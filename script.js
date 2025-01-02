document.getElementById('appointmentForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch('backend.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('responseMessage').textContent = data.message;
        if (data.success) {
            event.target.reset();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('responseMessage').textContent = "An error occurred. Please try again.";
    });
});
