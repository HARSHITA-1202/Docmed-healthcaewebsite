window.onload = () => {
    const savedEmail = localStorage.getItem('email');
    const savedPassword = localStorage.getItem('password');
    if (savedEmail && savedPassword) {
        document.getElementById('username').value = savedEmail;
        document.getElementById('password').value = savedPassword;
        document.getElementById('remember-me').checked = true;
    }
};

// Show or hide password functionality
function togglePasswordVisibility() {
const passwordInput = document.getElementById('password');
const toggleIcon = document.querySelector('.password-toggle');

if (passwordInput.type === 'password') {
passwordInput.type = 'text';
toggleIcon.classList.remove('fa-eye');
toggleIcon.classList.add('fa-eye-slash');
} else {
passwordInput.type = 'password';
toggleIcon.classList.remove('fa-eye-slash');
toggleIcon.classList.add('fa-eye');
}
}


function signIn() {
    const email = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const remember = document.getElementById('remember-me').checked;

    // Show SweetAlert to simulate "sign-in" processing with a smaller notification and spinner
    Swal.fire({
        title: 'Signing In...',
        text: 'Please wait while we process your login.',
        imageUrl: 'loadin gif.gif', // Spinning loading GIF
        imageWidth: 40,  // Adjust size of the spinner
        imageHeight: 40, // Adjust size of the spinner
        width: '250px',  // Decreased width for the notification
        padding: '20px', // Adjust padding
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            // Simulate a delay for the "sign-in" process
            setTimeout(() => {
                // Save credentials if "Remember Me" is checked
                if (remember) {
                    localStorage.setItem('email', email);
                    localStorage.setItem('password', password);
                } else {
                    localStorage.removeItem('email');
                    localStorage.removeItem('password');
                }

                // Redirect after the delay
                window.location.href = "index2.html"; // Replace with your target URL
            }, 700); // 2 seconds delay
        }
    });
}

function validateForm(event) {
    event.preventDefault(); // Prevent the default form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Regular expression for password validation
    const passwordPattern = /^(?=.*[0-9])(?=.*[@]).{6,}$/;

    // Regular expression for Gmail validation
    const usernamePattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    if (username === '' || password === '') {
        Swal.fire({
            html: '<p style="font-size:12px; margin: 0;">Please enter both username and password.</p>',
            width: '200px', // Small width
            padding: '10px', // Adjust padding
            customClass: {
                popup: 'custom-swal-popup'
            }
        });
    } else if (!usernamePattern.test(username)) {
        Swal.fire({
            html: '<p style="font-size:12px; margin: 0;">Username must be a valid Gmail address (ending with @gmail.com).</p>',
            width: '300px', // Small width
            padding: '10px', // Adjust padding
            customClass: {
                popup: 'custom-swal-popup'
            }
        });
    } else if (!passwordPattern.test(password)) {
        Swal.fire({
            html: '<p style="font-size:12px; margin: 0;">Password must be at least 6 characters long and include at least one number and the "@" symbol.</p>',
            width: '300px', // Small width
            padding: '10px', // Adjust padding
            customClass: {
                popup: 'custom-swal-popup'
            }
        });
    } else {
        // If both fields are filled and both validations pass, proceed with sign-in
        signIn();
    }
}