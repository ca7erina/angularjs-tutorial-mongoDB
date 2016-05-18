angular.module('app').controller("MainController",['$http',function($http){
	var vm = this;
	vm.title = "AngularJS Tutorial Example";
	vm.searchInput = "";
	

	vm.shows = "";
	$http.get('getJsonFomMongo.php').success(function(data){
          vm.shows = data.shows;            
        });


	vm.orders = [
	    {
		id: 1,
		title: 'Year Ascending',
		key: 'year',
		reverse: false
	    },
	    {
		id: 2,
		title: 'Year Descending',
		key: 'year',
		reverse: true
	    },
	    {
		id: 3,
		title: 'Title Ascending',
		key: 'title',
		reverse: false
	    },
	    {
		id: 4,
		title: 'Title Descending',
		key: 'title',
		reverse: true
	    }
	];
	vm.order = vm.orders[0];
	vm.new = {};
	vm.addShow = function() {
		vm.shows.push(vm.new);
		vm.new = {};
	};
}]);
