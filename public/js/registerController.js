app.controller('RegisterController', function($scope, $http, $timeout) {
    // VIEWS START
    // Using jQuery to change an element's style after the page is loaded
    $scope.$on('$viewContentLoaded', function() {
        // This ensures the DOM is fully loaded before running jQuery
        $('#homeMessage').css('color', 'red');
    });

    // Using jQuery with AngularJS $timeout to trigger after Angular rendering
    $timeout(function() {
        $('#homeMessage').fadeIn();
    }, 500); // Delay to let Angular render first

      // Entrance Transition Start (using jQuery for simpler syntax)
    // Trigger the active class to do the transition for fade-in
    $('.fade-in').each(function(index) {
        $(this).delay(150 * index).queue(function(next) { // 150ms delay between transitions of each element 
            $(this).addClass('active');
            next();
        });
    });
    // Entrance Transition End

    // VIEWS END


    // HTTP Methods Start
    // Data untuk formulir pendaftaran
    $scope.user = {
        first_name: '',
        last_name: '',
        email: '',
        password: ''
    };

    // Pesan error dan sukses
    $scope.errorMessage = '';
    $scope.successMessage = '';

    // Fungsi untuk mendaftarkan pengguna
    $scope.register = function() {
        // Kirim data ke API dengan POST request
        $http.post('/api/register', $scope.user)
            .then(function(response) {
                // Jika berhasil
                $scope.successMessage = 'Account created successfully!';
                $scope.errorMessage = '';
                $scope.user = {}; // Reset form
            })
            .catch(function(error) {
                // Jika ada error
                if (error.data && error.data.message) {
                    $scope.errorMessage = error.data.message;
                } else {
                    $scope.errorMessage = 'An error occurred. Please try again.';
                }
                $scope.successMessage = '';
            });
    };

});
