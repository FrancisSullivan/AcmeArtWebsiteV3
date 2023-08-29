document.addEventListener("DOMContentLoaded", function() {
  // If on mobile
  if (window.innerWidth < 992) {
      // Listen for click on dropdown toggles
      document.querySelectorAll('.dropdown-item.dropdown-toggle').forEach(function(toggle) {
          toggle.addEventListener('click', function(e) {
              e.preventDefault();  // Prevent default action (e.g. navigation)

              let submenu = e.target.nextElementSibling;
              if (submenu && submenu.style.display === 'block') {
                  // If the clicked submenu is already open, close it and exit the function
                  submenu.style.display = 'none';
                  return;
              }

              // Close all submenus
              document.querySelectorAll('.dropdown-submenu').forEach(function(otherSubmenu) {
                  otherSubmenu.style.display = 'none';
              });

              // Open the clicked submenu
              if (submenu) {
                  submenu.style.display = 'block';
              }
          });
      });
  }
});

document.addEventListener("DOMContentLoaded", function() {
    dselect(document.querySelector('#select_box_1'), {
        search: true
    });

    dselect(document.querySelector('#select_box_2'), {
        search: true
    });
});
