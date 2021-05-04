

<?php

  // Optionally store the parameters in variables
  $name   = $_POST["name"];
  $review    = $_POST["review"];

 
     if ($fh = fopen ("review.txt", "a+"))
{
    fwrite ($fh, "$review - $name \n");
    fclose ($fh);
}
 $content="
        <h2>Review</h2>
            <code>
                <pre>".htmlspecialchars(file_get_contents("review.txt"))."</pre>
            </code>";

    //display
    echo $content;
?>
