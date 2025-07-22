// Confirm before deleting an item (like appointment or user)
function confirmDelete() {
    return confirm("Are you sure you want to delete this item?");
}

// Toggle password visibility
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

// Auto-hide flash messages after 5 seconds
document.addEventListener("DOMContentLoaded", () => {
    const flash = document.getElementById("flash-message");
    if (flash) {
        setTimeout(() => {
            flash.style.display = "none";
        }, 5000);
    }
});
