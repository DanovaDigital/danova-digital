import "./bootstrap";

const menuToggle = document.querySelector("[data-menu-toggle]");
const menu = document.querySelector("[data-menu]");

function setMenuOpen(isOpen) {
    if (!menu || !menuToggle) return;

    menuToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    menuToggle.dataset.state = isOpen ? "open" : "closed";

    if (isOpen) {
        menu.classList.remove("hidden");
    } else {
        menu.classList.add("hidden");
    }
}

if (menuToggle && menu) {
    setMenuOpen(false);

    menuToggle.addEventListener("click", () => {
        const isOpen = menuToggle.getAttribute("aria-expanded") === "true";
        setMenuOpen(!isOpen);
    });

    document.addEventListener("keydown", (event) => {
        if (event.key !== "Escape") return;
        setMenuOpen(false);
    });
}
