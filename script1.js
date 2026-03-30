document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const userType = document.getElementById('userType').value;

    // Example credentials validation (you should replace this with backend validation)
    if (email && password && userType) {
        // Assuming successful login, redirect to the respective page
        if (userType === 'farmer') {
            window.location.href = 'farmer.html';
        } else if (userType === 'customer') {
            window.location.href = 'customer.html';
        } else if (userType === 'landlord') {
            window.location.href = 'landlord.html';
        }
    } else {
        alert('Please enter all fields and select a user type.');
    }
});
