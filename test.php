<?php 

class Dron{
    function fly()
{
	
}
}

if(method_exists("Dron", "fly")){
	echo "hurray it exist";
} else{
	echo "sorry it does not exist";
}


?>