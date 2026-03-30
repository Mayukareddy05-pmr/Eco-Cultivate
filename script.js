// Login for Farmer
document.getElementById('farmerLoginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    disableAllForms('farmerLoginForm');
    const farmerName = event.target[0].value; // Get the farmer's name

    // Example AJAX request to verify farmer credentials
    fetch('/verifyFarmer', {  // Assuming this endpoint checks the farmer's existence
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: farmerName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `farmer.html?name=${encodeURIComponent(farmerName)}`;
        } else {
            alert('Farmer not found! Please sign up.');
        }
    })
    .catch(error => console.error('Error:', error));
});

// Login for Customer
document.getElementById('customerLoginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    disableAllForms('customerLoginForm');
    const customerName = event.target[0].value; // Get the customer's name

    // Example AJAX request to verify customer credentials
    fetch('/verifyCustomer', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: customerName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `customer.html?name=${encodeURIComponent(customerName)}`;
        } else {
            alert('Customer not found! Please sign up.');
        }
    })
    .catch(error => console.error('Error:', error));
});

// Login for Landlord
document.getElementById('landlordLoginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    disableAllForms('landlordLoginForm');
    const landlordName = event.target[0].value; // Get the landlord's name

    // Example AJAX request to verify landlord credentials
    fetch('/verifyLandlord', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: landlordName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `landlord.html?name=${encodeURIComponent(landlordName)}`;
        } else {
            alert('Landlord not found! Please sign up.');
        }
    })
    .catch(error => console.error('Error:', error));
});

// Disable other forms while one is active
function disableAllForms(exceptFormId) {
    const forms = ['farmerLoginForm', 'customerLoginForm', 'landlordLoginForm'];
    forms.forEach(formId => {
        if (formId !== exceptFormId) {
            document.getElementById(formId).querySelector('button').disabled = true;
            document.getElementById(formId).querySelector('input').disabled = true;
        }
    });
}

// Show the signup form for a specific user type
function showSignup(userType) {
    const signupContainer = document.getElementById('signupContainer');
    const signupFormContainer = document.getElementById('signupFormContainer');
    
    // Clear previous signup form content
    signupFormContainer.innerHTML = '';

    // Create a signup form
    const signupForm = document.createElement('form');
    signupForm.id = `${userType}SignupForm`;

    const inputLabel = document.createElement('label');
    inputLabel.textContent = `${userType.charAt(0).toUpperCase() + userType.slice(1)} Name:`;
    const inputField = document.createElement('input');
    inputField.type = 'text';
    inputField.placeholder = `${userType.charAt(0).toUpperCase() + userType.slice(1)} Name`;
    inputField.required = true;

    const submitButton = document.createElement('button');
    submitButton.type = 'submit';
    submitButton.textContent = 'Sign Up';

    signupForm.appendChild(inputLabel);
    signupForm.appendChild(inputField);
    signupForm.appendChild(submitButton);
    
    signupFormContainer.appendChild(signupForm);
    signupContainer.style.display = 'block';

    signupForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const name = inputField.value; // Get the name from the input field
        
        // Send a POST request to create a new user
        fetch('/createUser', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ userType, name })  // Send user type and name to backend
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = `${userType}.html?name=${encodeURIComponent(name)}`;
            } else {
                alert('Error creating account.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
}

// Send a notification (e.g., when an order is placed)
function sendNotification(userType, orderDetails) {
    fetch('/sendNotification', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ userType, orderDetails })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Notification sent!');
        } else {
            alert('Failed to send notification.');
        }
    })
    .catch(error => console.error('Error:', error));
}
