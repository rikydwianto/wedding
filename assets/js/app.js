// Example JavaScript for additional interactivity (if needed)
const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((item) => {
  item.addEventListener("mouseover", () => {
    item.classList.add("show-tooltip");
  });

  item.addEventListener("mouseout", () => {
    item.classList.remove("show-tooltip");
  });
});
