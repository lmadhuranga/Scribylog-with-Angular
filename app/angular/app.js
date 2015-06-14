
UserApp = angular.module('UserApp', [
								  'UserApp.services',
								  'UserApp.controllers',
								  'ngRoute'
								]);
 
 
UserApp.config(['$routeProvider',
				  	function($routeProvider)
				  	{ 
				  		
				  		console.log('anonymouse funciton');
				    	$routeProvider.when('/user/', 
										{
											templateUrl: 'views/user/_list.html',
											controller: 'UserListController'
										}).when('/user/add', 
										{
											templateUrl: 'views/user/_add.html',
											controller: 'UserAddController'
										}).when('/user/view/:id', 
										{
											templateUrl: 'views/user/_view.html',
											controller: 'UserViewController'
										}).when('/user/edit/:id', 
										{
											templateUrl: 'views/user/_edit.html',
											controller: 'UserUpdateController'
										}) 
				  	}
				]);

MeetingApp = angular.module('MeetingApp', [
								  'MeetingApp.services',
								  'MeetingApp.controllers',
								  'ngRoute'
								]);
 
 MeetingApp.config(['$routeProvider',
				  	function($routeProvider)
				  	{ 
				  		
				  		console.log('anonymouse funciton');
				    	$routeProvider.when('/meeting/', 
										{
											templateUrl: 'views/meeting/_list.html',
											controller: 'MeetingListController'
										}).
				    					when('/meeting/add', 
										{
											templateUrl: 'views/meeting/_add.html',
											controller: 'MeetingAddController'
										}).
										when('/meeting/view/:id', 
										{
											templateUrl: 'views/meeting/_view.html',
											controller: 'MeetingViewController'
										}).
										when('/meeting/edit/:id', 
										{
											templateUrl: 'views/meeting/_edit.html',
											controller: 'MeetingUpdateController'
										}).
										otherwise({redirectTo: '/meeting/'});
				  	}
				]);