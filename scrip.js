// script.js
const passwordInput = document.querySelector('input[name="password"]');
const showPasswordToggle = document.createElement('button');
showPasswordToggle.textContent = 'Mostrar';
showPasswordToggle.type = 'button';
passwordInput.after(showPasswordToggle);

showPasswordToggle.addEventListener('click', () => {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showPasswordToggle.textContent = 'Ocultar';
    } else {
        passwordInput.type = 'password';
        showPasswordToggle.textContent = 'Mostrar';
    }
});
