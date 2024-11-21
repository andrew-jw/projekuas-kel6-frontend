app.config(function($routeProvider, $locationProvider) {
    $routeProvider
        .when('/contact', {
            templateUrl: '/views/contact.html',
            // controller: '/js/angularjs/controllers.js',
        })
        .when('/', {
            templateUrl: '/views/home.html',
            controller: 'HomeController',
            title: 'Home Page - My Website'
        })
        .when('/register', {
            templateUrl: '/views/register.html',
            // controller: '/js/angularjs/homeControllers.js',
        })
        .when('/adminLogin', {
            templateUrl: '/views/adminLogin.html',
            // controller: '/js/angularjs/controllers.js',
        })
        .otherwise({
            redirectTo: '/'
        });

    // Enable HTML5 mode for clean URLs (no hash)
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
      });
});
