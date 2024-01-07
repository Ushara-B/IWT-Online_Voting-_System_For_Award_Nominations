const form = document.getElementById('registrationForm');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');

form.addEventListener('submit', function(event) {
  if (!validateEmail(emailInput.value)) {
    event.preventDefault();
    alert('Please enter a valid email address.');
    return;
  }

  if (!validatePhoneNumber(phoneInput.value)) {
    event.preventDefault();
    alert('Please enter a valid phone number with 10 digits.');
    return;
  }

  if (passwordInput.value !== confirmPasswordInput.value) {
    event.preventDefault();
    alert('Passwords do not match.');
    return;
  }
});

function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function validatePhoneNumber(phone) {
  const regex = /^\d{10}$/;
  return regex.test(phone);
}

    