/**
 * Created by Sandeep on 01/06/14.
 */ 
var UserAppServices = angular.module('UserApp.UserAppServices', ['ngResource']);

var site_url = 'http://localhost/Scribylog-with-Angular/index.php';



UserAppServices.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
});

// User
UserAppServices.factory('Users', function ($resource) {
    
    return $resource(site_url+'/api/user/', {}, {
        query: { method: 'GET', isArray: true },
        create: { method: 'POST' }
    })
});


UserAppServices.factory('User', function ($resource) { 
    return $resource(site_url+'/api/user/index/', {}, {
        get: { method: 'GET',params: {id: '@id'}},
        update: { method: 'PUT', params: {id: '@id'} },
        delete: { method: 'DELETE', params: {id: '@id'} }
    })
})


var MeetingAppServices = angular.module('MeetingApp.services', ['ngResource']);

// meeting
MeetingAppServices.factory('Meetings', function ($resource) {
    
    return $resource(site_url+'/api/meeting/', {}, {
        query: { method: 'GET', isArray: true },
        create: { method: 'POST' }
    })
});


MeetingAppServices.factory('Meeting', function ($resource) { 
    return $resource(site_url+'/api/meeting/index/', {}, {
        get: { method: 'GET',params: {id: '@id'}},
        update: { method: 'PUT', params: {id: '@id'} },
        delete: { method: 'DELETE', params: {id: '@id'} }
    })
})