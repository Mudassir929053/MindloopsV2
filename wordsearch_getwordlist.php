<?php
 include 'config/connection.php';


extract($_GET);
    // echo $category_id;
    // echo $level;

    // exit;
    
// Query the database for the list of words
 $sql = "SELECT wordsearch_words FROM tb_wordsearch ws
 LEFT JOIN game_category AS gc ON ws.cat_id = gc.category_id
  WHERE ws.cat_id = '$category_id' and ws.wordsearch_level='$level'"; // Replace 1 with the ID of the row you want to fetch
// exit;
$result = $mysqli->query($sql);

// Create an empty array to store the words
$wordList = array();

// Loop through the rows and retrieve the words
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $words = explode(',', $row["wordsearch_words"]); // Split the string by comma and return an array of words
        foreach ($words as $word) {
            $wordList[] = strtoupper(trim($word)); // Add each word to the array, trimming any whitespace and converting to uppercase
        }
    }
}

// Return the list of words as a JSON response
$response = array("wordList" => $wordList);
echo json_encode($response);

// Close the database connection
