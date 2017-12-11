app.controller('proposeTrajetCtrl', function ($scope) {
	// body...
	//$scope.addVille = false;
	$scope.dataset1 = [false,false,false,false];
	$scope.key1=0;

	$scope.add = function() {
		/* body... */
		$scope.dataset1[$scope.key1]= true;
		$scope.key1++;
		if ($scope.key1>3) {$scope.key1 = 3;}
	}  

	$scope.rmv = function () {
		$scope.dataset1[$scope.key1]= false;
		$scope.key1--;	
		if ($scope.key1<0) {$scope.key1 = 0;}
	}
})