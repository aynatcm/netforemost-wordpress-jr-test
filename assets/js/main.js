document.addEventListener("DOMContentLoaded", function () {

    // JS FOR OPEN SUBMENU IN DESKTOP (768px and above)
    const subMenuItems = document.querySelectorAll(".menu-item-has-children");
    let timeout;

    function setupSubMenu() {
        subMenuItems.forEach((subMenuItem) => {
            const subMenu = subMenuItem.querySelector(".sub-menu");

            subMenuItem.addEventListener("mouseover", function () {
                if (subMenu) {
                    clearTimeout(timeout);
                    subMenu.style.display = "block";
                }
            });

            if (subMenu) {
                subMenu.addEventListener("mouseover", function () {
                    clearTimeout(timeout);
                    subMenu.style.display = "block";
                });

                subMenuItem.addEventListener("mouseout", function (event) {
                    timeout = setTimeout(function () {
                        if (!isMouseOver(event, subMenu)) {
                            subMenu.style.display = "none";
                        }
                    }, 300);
                });

                subMenu.addEventListener("mouseout", function (event) {
                    timeout = setTimeout(function () {
                        if (!isMouseOver(event, subMenuItem)) {
                            subMenu.style.display = "none";
                            subMenuItem.querySelector("::after").style.transform =
                                "translateY(-50%)";
                        }
                    }, 300);
                });
            }
        });
    }

    function isMouseOver(event, element) {
        return (
            element.contains(event.relatedTarget) || element === event.relatedTarget
        );
    }

    // Initial setup for submenus on desktop
    if (window.innerWidth >= 768) {
        setupSubMenu();
    }

    // Resize event listener to toggle submenu behavior
    window.addEventListener("resize", function () {
        if (window.innerWidth >= 768) {
            setupSubMenu();
        } else {
            // Reset submenu styles and behavior for smaller screens
            subMenuItems.forEach((subMenuItem) => {
                const subMenu = subMenuItem.querySelector(".sub-menu");
                if (subMenu) {
                    subMenu.style.display = "none";
                }
            });
        }
    });

    // JS FOR OPEN MENU IN MOBILE
    const openBtn = document.getElementById("menu-toggle");
    const mobileMenu = document.querySelector(".menu");

    openBtn.addEventListener("click", function () {
        mobileMenu.classList.toggle("mobile-menu-open");
        const isOpen = mobileMenu.classList.contains("mobile-menu-open");

        if (isOpen) {
            mobileMenu.style.display = "block";
            openBtn.setAttribute("aria-expanded", "true");
            document.body.style.overflowY = "hidden";
        } else {
            mobileMenu.style.display = "none";
            openBtn.setAttribute("aria-expanded", "false");
            document.body.style.overflowY = "auto";
        }
    });

    // Close mobile menu on window resize
    window.addEventListener("resize", function () {
        if (!openBtn.classList.contains("mobile-menu-open")) {
            mobileMenu.style.display = "none";
            document.body.style.overflowY = "auto";
        }
    });

});
