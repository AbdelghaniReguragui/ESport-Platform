<?php
// Build up DB connection including cofiguration file
require ("config.php");


if(isset($_POST['search'])){
    // Assign the fetched country to a variable and within the HTML tags with Boottrap class; list-group-item
    $response = "<ul class='list-group'><li class='list-group-item'>Game and streamer not found</li></ul>";

    $q = mysqli_real_escape_string($conn,$_POST["q"]);
    // mysql query to fetch the countries
    $query = "SELECT utilisateur.NOM_USER,utilisateur.IMAGE FROM utilisateur INNER JOIN organisateur ON organisateur.ID_USER = utilisateur.ID_USER WHERE utilisateur.NOM_USER LIKE '$q%'";
    $query1 = "SELECT * FROM jeu WHERE jeu.NOM_JEU LIKE '%$q%' ";
    // execution of the query. Output a boolean value
    $res = mysqli_query($conn, $query);
    $res1 = mysqli_query($conn, $query1);
    // Check if there are results matched
    
    if(mysqli_num_rows($res)>0 || mysqli_num_rows($res1)>0){
        $response = "<ul class='list-group'>";
    if(mysqli_num_rows($res)>0){
        // Start the styling for fetch country list
    
        // Display fetched all countries matched with the entered phrase
        while($row = mysqli_fetch_assoc($res)){
            // Concatenate the results to the previously started list
            $response .= "<li  class='list-group-item'>".'<img style="width: 50px; height: 50px;border-radius: 50%; " src="data:image/jpeg;base64,'.base64_encode($row["IMAGE"]) .'" />'.$row['NOM_USER']."</li>";
        }
        // End the styling for fetch country list
        

    }
    if(mysqli_num_rows($res1)>0){
        // Start the styling for fetch country list
        
        // Display fetched all countries matched with the entered phrase
        while($row = mysqli_fetch_assoc($res1)){
            // Concatenate the results to the previously started list
            $response .= "<li  class='list-group-item'>".'<img style="height: 60px;" src="data:image/jpeg;base64,'.base64_encode($row["IMAGE"]) .'" />'.$row['NOM_JEU']."</li>";
   

            
            
        }
        // End the styling for fetch country list
        

    }
    $response .= "</ul>";
}
    // Close results
    exit($response);


}

?>
