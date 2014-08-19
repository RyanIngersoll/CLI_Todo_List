<?php


 $items = array();

 // List array items formatted for CLI
 function list_items($list) {
     // Return string of list items separated by newlines.
 	$listString = '';

 	foreach($list as $key => $value) {
		$listString .=  '[' . ++$key . ']' . "$value" . PHP_EOL;		
	}

	return $listString;
}

	
//     Add a (S)ort option to your menu. When it is chosen, it should call a function called sort_menu().
// When sort menu is opened, show the following options "(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered".
// When a sort type is selected, order the TODO list accordingly and display the results.

function sort_menu($items){
	echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered ';
         
         $sortOptions = get_input(TRUE);
         var_dump($sortOptions);

         if ($sortOptions == 'A') {
         	 sort($items);
         
        	} 

        elseif($sortOptions == 'Z') {
         	 rsort($items);
         
        	} 
         
         elseif($sortOptions == 'O') {
          	ksort($items);
         
        	} 

         elseif($sortOptions == 'R') {
         	krsort($items);
         
        	} 
        	return $items;

}


 function get_input($upper = FALSE) {

		$items = trim(fgets(STDIN));

		if ($upper) {
			return strtoupper($items);
		} else { 
			return $items;
		}
 	}
 

 // The loop!
 do {
     // Echo the list produced by the function
     echo list_items($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (S)ort item, (Q)uit : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
     $input = get_input(TRUE);

     // Check for actionable input
     if ($input == 'N') {
         // Ask for entry
         echo 'Enter item: ';
         // Add entry to list array
         $items[] = get_input();
     } 

     elseif ($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = get_input();
         // Remove from array
         
         unset($items[$key-1]);
         
     }

     elseif ($input == 'S') {
     	$items = sort_menu($items);

     }

 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);

?>