<?php
    require_once "IGDBWrapper/class.igdb.php";

    $igdb = new IGDB("mhfmsvmgvcho962ooih0ak6lonxcmj", "a2jelkm65eye4em5p7ojl4754a4zz6");

    $builder = new IGDBQueryBuilder();

    try {
        $query = $builder
            ->search("uncharted 4")
            ->fields("id, name")
            ->limit(1)
            ->build();

       
    } catch (IGDBEndpointException $e) {
        // since the query contains a non-existing field, an error occured
        // printing the response code and the error message
        echo "Response code: " . $e->getResponseCode();
        echo "Message: " . $e->getMessage();
    }
    $games = $igdb->game($query);
?>