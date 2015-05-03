// JavaScript Document

angular.module('app').controller("MainController", function(){
    var vm = this;
	var q = this;
    vm.username = 'Name';
    vm.sayHello = function() {
    vm.greeting = 'Well! Atleast you got a nice name ' + vm.username + '!';
  
  
  
	}
				
});