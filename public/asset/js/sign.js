const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("password_confirmation");
const togglePassword = document.getElementById("toggle-password");
const toggleConfirmPassword = document.getElementById("toggle-confirm-password");

togglePassword.addEventListener("click", function () {
    togglePasswordVisibility(passwordInput, this);
});

toggleConfirmPassword.addEventListener("click", function () {
    togglePasswordVisibility(confirmPasswordInput, this);
});

function togglePasswordVisibility(input, icon) {
    const type = input.getAttribute("type") === "password" ? "text" : "password";
    input.setAttribute("type", type);

    // Toggle eye icon
    icon.classList.toggle("fa-eye");
    icon.classList.toggle("fa-eye-slash");
}
