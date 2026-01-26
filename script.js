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
});
