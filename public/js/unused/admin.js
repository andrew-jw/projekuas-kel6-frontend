$(document).ready(function() {
    // Entrance Transition Start (using jQuery for simpler syntax)
    // Trigger the active class to do the transition for fade-in
    $('.fade-in').each(function(index) {
        $(this).delay(150 * index).queue(function(next) { // 150ms delay between transitions of each element 
            $(this).addClass('active');
            next();
        });
    });
    // Entrance Transition End

    const burgerMenu = document.getElementById('burger-menu');
    const navbarMenu = document.querySelector('.navbar-menu');
    const closeButton = document.getElementById('close-button');

    burgerMenu.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        burgerMenu.classList.toggle('active');
    });

    closeButton.addEventListener('click', () => {
        navbarMenu.classList.remove('active');
        burgerMenu.classList.remove('active');
    });

    // Admin Sidebar Navigation
    $('.menu-item').on('click', function () {
        // Highlight selected menu item
        $('.menu-item').removeClass('active');
        $(this).addClass('active');

        // Hide all content containers
        $('.content-container').addClass('hidden');

        // Show the selected content
        const contentId = `#content-${this.id}`;
        $(contentId).removeClass('hidden');
    });

    // Show the Home section by default
    $('#content-home').removeClass('hidden');
    
});


