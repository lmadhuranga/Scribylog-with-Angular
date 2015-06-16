/**
 * Created by Madhuranga 
 */
UserApp =  angular.module('UserApp.controllers',['UserApp.services']) 
UserApp.controller('UserListController',function($scope,Users){
    // get user list by ajax
    $scope.Users=Users.query();  

}).
controller('UserAddController',function($scope,Users){ 
    // create sample users  
    $scope.Users=new Users();  
    // add new user
    // $scope.createUser=function(){ 
    //     // send ajax request to add the user
    //      $scope.Users.$create(function(){
    //         // list updated user list
    //         redirectTo('/user/')
    //     });
    // }

}).
controller('UserViewController',function($scope,User,$routeParams){
    // get user by ajax
    $scope.User = User.get({id:$routeParams.id});

}).
controller('UserUpdateController',function($scope,User,$routeParams){
    // get user by ajax
    $scope.User = User.get({id:$routeParams.id});  

    // add new user
    $scope.updateUser=function(){ 
        // send ajax request to add the user
         $scope.User.$put(function(){
            // list updated user list
            redirectTo('/user/view/'+$scope.User.id)
        });
    }
})
 


MeetingApp =  angular.module('MeetingApp.controllers',['MeetingApp.services','MeetingGoalApp.services','MeetingTagApp.services']) 
MeetingApp.
controller('MeetingListController',function($scope,Meetings){
    // get meeting list by ajax
    $scope.Meetings=Meetings.query();   

}).
controller('MeetingAddController',function($scope,Meeting,Meetings){ 
    // create sample meetings  
    $scope.Meetings = new Meetings(); 

    // add new meeting
    $scope.addMeeting=function(){ 
        // send ajax request to add the meeting
         $scope.Meetings.$create(function(){
            // list updated meeting list
            redirectTo('/meeting/')
        });
    }

}).
controller('MeetingViewController',function($scope,Meeting,$routeParams){
    // get meeting by ajax 
    $scope.Meeting = Meeting.get({id:$routeParams.id});  
}). 
controller('MeetingUpdateController',function($scope,Meeting,Goal,Goals,Tag,Tags,$routeParams){
    // get Meeting by ajax
    $scope.Meeting = Meeting.get({id:$routeParams.id});  
    $scope.new_goal  = new Goals();
    $scope.new_tag  = new Tags();

    $scope.updateMeeting=function(){ 
        console.log($scope.Meeting);
        // send ajax request to add the Meeting
        $scope.Meeting.$update(function(){
            $scope.Meeting = Meeting.get({id:$routeParams.id});  
            // list updated Meeting list
            // redirectTo('/Meeting/view/'+$scope.Meeting.id)
        });
    }

    // add goals
    $scope.addGoal = function()
    {  
        // set meeting id
        $scope.new_goal.meeting_id = $routeParams.id;
        $scope.new_goal.$create(function()
        {
            // get updated goals query
            $scope.Meeting.meeting_goals_array = Goals.query();
        }); 
    }
    $scope.deleteGoal = function(goal){  
        // send ajax request to add the Meeting
        Goal_t = new Goal();
        Goal_t.id = goal.id;
        Goal_t.$delete(function(){
            $scope.Meeting.meeting_goals_array = Goals.query();
        });
    }

    // add goals
    $scope.addTag = function()
    {  
        // set meeting id
        $scope.new_tag.meeting_id = $routeParams.id;  
        $scope.new_tag.$create(function()
        {
            //::TODO load the tag list 
            $scope.Meeting.tags_array = Tags.query();
             
        }); 
    }
    $scope.deleteTag = function(tag){  
        // send ajax request to add the Meeting
        Tag_t = new Tag();
        Tag_t.id = tag.id;
        Tag_t.$delete(function(){
            $scope.Meeting.tags_array = Tags.query();
        });
    }

    $scope.getExisting_tag = function(){  
        // send ajax request to add the Meeting
        
    }


    // tas add
})