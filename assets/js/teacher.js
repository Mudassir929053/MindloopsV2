function toggleStyle(button) {
    // Remove active styles from all buttons
    const buttons = document.querySelectorAll(".nav-item button");
    buttons.forEach((btn) => {
        btn.classList.remove("active");
        buttons.forEach(btn => btn.classList.remove("btn-primary"));
        btn.style.backgroundColor = "";
        btn.style.color = "";

    });

    // Apply active styles to the clicked button
    button.classList.add("active");
    button.style.backgroundColor = "#114AB1";
    button.style.color = "white";
    button.style.border = "none";

}