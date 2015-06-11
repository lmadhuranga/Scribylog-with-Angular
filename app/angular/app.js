angular.module('UserApp',['UserApp.controllers','UserApp.services','ngRoute']);

 
// angular.module('UserApp').config(['$routeProvider', function ($routeProvider) {
// 	$routeProvider.
// 			when('/', {
// 				templateUrl: 'views/user_list.html',
// 				controller: 'UserListController'
// 			}).
// 			when('user_view', {
// 				templateUrl: 'views/user_list.html',
// 				controller: 'UserListController'
// 			}).
// 			otherwise({
// 		        redirectTo: '/'
// 		     });
// }])


angular.module('UserApp').config(function ($stateProvider) {
	$stateProvider.state('user-list',{
		url:'/',
		controller:'UserListController'
	})
})