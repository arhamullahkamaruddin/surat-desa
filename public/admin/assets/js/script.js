const sidebarToggle = document.querySelector("#sidebar-toggle");

if (sidebarToggle) {
    sidebarToggle.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("collapsed");
    });
}
