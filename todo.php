<?php

// Open your todo.php file for editing. Commit changes and push to GitHub for each step.




 $items = array();

 // List array items formatted for CLI
 function list_items($list) {
     
 	$listString = '';
 	//initialize string variable

 	foreach($list as $key => $value) {
		$listString .=  '[' . ++$key . ']' . "$value" . PHP_EOL;
		// Return string of list items separated by newlines.		
	}

	return $listString;
}

	
//     Add a (S)ort option to your menu. When it is chosen, it should call a function called sort_menu().
// When sort menu is opened, show the following options "(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered".
// When a sort type is selected, order the TODO list accordingly and display the results.


// When a new item is added to a TODO list, ask the user if they want to add it to the 
// beginning or end of the list. Default to end if no input is given.
// Allow a user to enter F at the main menu to remove the first item on the list. This 
// feature will not be added to the menu, and will be a special feature that is only 
// available to 
// "power users". Also add a L option that grabs and removes the last item in the list.

function menuOrder($items){
    echo 'do you want to add new item to the (B)eginning or the (E)nd of your list?';

    $begOrEnd = get_input(TRUE);

    echo 'Enter you new item: ';
    $todo_item = get_input();

    if($begOrEnd == 'B'){
        array_unshift($items, $todo_item);
    } else {
        $items[] = $todo_item;
    }
    return $items;

    
}

function sort_menu($items){
	echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered ';
         
         $sortOptions = get_input(TRUE);
         var_dump($sortOptions);

         if ($sortOptions == 'A') {
         	 asort($items);
         // switch (#sortOptions){
         	//  case 'A':
         	//  sort($items);
         	// break;
         	//  }
        	} 

        elseif($sortOptions == 'Z') {
         	 rsort($items);
         // switch (#sortOptions){
         	//  case 'Z':
         	//  rsort($items);
         	// break;
         	//  }
        	} 
         
         elseif($sortOptions == 'O') {
          	ksort($items);
          // switch (#sortOptions){
         	//  case '0':
         	//  ksort($items);
         	// break;
         	//  }
         
        	} 

         elseif($sortOptions == 'R') {
         	krsort($items);
         	// switch (#sortOptions){
         	//  case 'R':
         	//  krsort($items);
         	// break;
         	//  }
         
        	} 
        	
        return $items;

}


 function get_input($upper = FALSE) {

		$items = trim(fgets(STDIN));
		// ternary operator most basic usage 
			//$agestr = ($age < 16) ? 'child' : 'adult';
            // returns child or adult

			// return ($upper ? strtoupper($items) : $items);
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
         $items = menuOrder($items);
         // echo 'Enter item: ';

         // // Add entry to list array
         // $items[] = get_input();
         
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

     elseif ($input == 'F') {
        $deletedItems = array_shift($items);
        echo 'the deleted item = ' . $deletedItems . PHP_EOL;
     }
      elseif ($input == 'L') {
        $deletedItems = array_pop($items);
        echo 'the deleted item = ' . $deletedItems . PHP_EOL;
     }

 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);

?>