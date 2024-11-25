var app = angular.module('settingsApp', []);

app.controller('SettingsController', function ($scope, $http) {
    $scope.user = {
        firstName: '',
        lastName: '',
        email: '',
        password: ''
    };

    // Update user settings
    $scope.updateSettings = function () {
        $http.post('/update-settings', $scope.user)
            .then(function (response) {
                alert(response.data.message);
            })
            .catch(function (error) {
                alert('Error updating settings: ' + error.data.message);
            });
    };

    // Delete user account
    $scope.deleteAccount = function () {
        if (confirm('Are you sure you want to delete your account?')) {
            $http.post('/delete-account')
                .then(function (response) {
                    alert(response.data.message);
                    // Redirect to home or login page if needed
                })
                .catch(function (error) {
                    alert('Error deleting account: ' + error.data.message);
                });
        }
    };
});
