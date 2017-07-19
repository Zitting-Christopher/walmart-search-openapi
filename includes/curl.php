<?php
require('key.php');

$query = filter_input(INPUT_GET,'query',FILTER_SANITIZE_SPECIAL_CHARS);

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://api.walmartlabs.com/v1/search?query=".$query."&format=json&apiKey=".$key."&sort=price");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

// grab URL and pass it to the browser
$output = curl_exec($ch);
$info = curl_getinfo($ch);

$newArr = array();

if ($output === false || $info['http_code'] != 200)
{
    $output = "No cURL data returned";
    if (curl_error($ch))
    {
        $output .= "\n". curl_error($ch);
    }
}
else 
{
  // 'OK' status; format $output data if necessary here:
    
//  echo($output);
}
// then return or display the single string $output

$newArr[] = json_decode($output, true);

//print_r($newArr[0]);
    echo '<br>';
    if ($query != '')
    {
    echo '<div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <btn class="btn btn-info">'.$newArr[0]['totalResults'].' Results total, Showing 10</btn>
                <br><br>
            </div>            
            <div class="col-md-4"></div>
        </div>';
    }
//    echo $newArr[0]['totalResults'];
    $items = $newArr[0]['items'];
    for($i=0; $i<count($items);  $i++)
    {
    
                echo '<div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="card card-outline-info">
                                    <h5 class="card-header alert-info">Item name: '.htmlspecialchars($items[$i]['name']).'</h5>';
                            echo '<div class="card-block"><img src="'.$items[$i]['mediumImage'].'"><br>';
                                echo '<span class="lead">Price: $'.$items[$i]['salePrice'].'</span><br><br>';
                                echo 'Description: '.htmlspecialchars_decode($items[$i]['longDescription']);
                            echo '</div>
                            <div class="card-footer"></div>
                          </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    </div>
                    <br>';
        
    }
    
    echo '<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
</button>
  <div class="collapse navbar-collapse text-muted" id="navbarColor01">Created by Chris Zitting, using Walmart OpenAPI. All rights reserved. &copy 2017</div>';
    
//print_r($newArr[0]);

?>
</body>
</html>
<?php
// close cURL resource, and free up system resources
curl_close($ch);
//$results = json_decode($ch, TRUE);
//print_r($ch);
?>
