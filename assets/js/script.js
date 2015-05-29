	// create the module and name it scotchApp
	var scotchApp = angular.module('scotchApp', ['ngRoute']);

	// configure our routes
	scotchApp.config(function($routeProvider) {
		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/index-partials/home.html',
				controller  : 'mainController'
			})

			// route for the universidades page
			.when('/universidades', {
				templateUrl : 'pages/index-partials/universidades.php',
				controller  : 'universidadesController'
			})

			// route for the maestros page
			.when('/maestros', {
				templateUrl : 'pages/maestros.php',
				controller  : 'maestrosController'
			})			

			// route for the contact page
			.when('/contacto', {
				templateUrl : 'pages/index-partials/contacto.html',
				controller  : 'contactController'
			})
			
			.when('/quien',{
				templateUrl : 'pages/index-partials/quien.html',
				controller  : 'quienController'
			})
			
			.when('/aviso',{
				templateUrl : 'pages/index-partials/aviso.html',
				controller  : 'avisoController'
			})
			.otherwise({
			        redirectTo: '/'
			});
			
	});


	// create the controller and inject Angular's $scope
	scotchApp.controller('mainController', function($scope) {
		// create a message to display in our view
		$scope.message = 'Welcome!';
	});

	scotchApp.controller('aboutController', function($scope) {
		$scope.message = 'Look! I am an about page.';
	});

	scotchApp.controller('contactController', function($scope) {
		$scope.message = 'Para nosotros es muy importante escucharte.';
	});

	scotchApp.controller('maestrosController', function($scope) {
		$scope.message = 'maestros';
	});

	scotchApp.controller('universidadesController',function($scope){
		$scope.message = 'universidades'
	});
	scotchApp.controller('quienController',function($scope){
		$scope.message = '¿Quienes somos?';
	});
	scotchApp.controller('avisoController',function($scope){
		$scope.message = 'Aviso legal';
	});