// auto set active state
document.addEventListener("DOMContentLoaded", () => {
    const currentPath = window.location.pathname;

    document.querySelectorAll("nav a").forEach(link => {
        const linkPath = link.getAttribute("href");

        if (
            linkPath === currentPath ||
            (linkPath !== "/" && currentPath.startsWith(linkPath))
        ) {
            link.parentElement.classList.add("active");
        }
    });

    // Theme toggle handling
    const themeToggleBtn = document.getElementById("theme-toggle");
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener("click", () => {
            const isDarkMode = document.documentElement.classList.toggle("dark-mode");
            if (isDarkMode) {
                document.documentElement.setAttribute("data-bs-theme", "dark");
                localStorage.setItem("theme", "dark");
            } else {
                document.documentElement.removeAttribute("data-bs-theme");
                localStorage.setItem("theme", "light");
            }
        });
    }
});
