$(document).ready(function() {
    const sidebar = $('#sidebar');
    const content = $('#content');
    const sidebarToggle = $('#sidebar-toggle');
    const overlay = $('#overlay');

    // Check screen size on load
    if ($(window).width() < 992) {
        sidebar.addClass('collapsed');
    }

    // Toggle sidebar on button click
    sidebarToggle.on('click', function() {
        if ($(window).width() < 992) {
            // Mobile behavior
            sidebar.toggleClass('mobile-expanded');
            overlay.toggleClass('active');
        } else {
            // Desktop behavior
            sidebar.toggleClass('collapsed');
            content.toggleClass('expanded');
        }
    });

    // Close sidebar when clicking on overlay (mobile view)
    overlay.on('click', function() {
        sidebar.removeClass('mobile-expanded');
        overlay.removeClass('active');
    });

    // Handle window resize
    $(window).on('resize', function() {
        if ($(window).width() < 992) {
            // Mobile view
            sidebar.addClass('collapsed');
            content.removeClass('expanded');
        } else {
            // Desktop view
            sidebar.removeClass('mobile-expanded');
            overlay.removeClass('active');
            sidebar.removeClass('collapsed');
            content.removeClass('expanded');
        }
    });
});