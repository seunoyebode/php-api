<?php 

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

    // Headers
    header('Access-Control-Allow-Origin');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //Instantiate Database and Connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate post object
    $post = new Post($db);

    // post query
    $result = $post->read();
    // Get row count
    $num = $result->rowCount();

    //check if any post
    if($num > 0)
    {
        //Post Array
        $posts_arr = array();
        $posts_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $post_item = array(
                'id' => $id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
                'category_id' => $category_id,
                'category_name' => $category_name
            );

            // Push to "data"
            array_push($posts_arr['data'], $post_item);

        }

        // Turn to JSON and output
        json_encode($posts_arr);
        
    }
    else
    {
         echo json_encode(
             array('message' => 'No Posts Found')
         );
    }


?>