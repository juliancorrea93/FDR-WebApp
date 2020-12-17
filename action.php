<?php  
    $connect = mysqli_connect('fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com', 'jcorrea2016', 'Path%med', 'jcorrea2016');

    $input = filter_input_array(INPUT_POST);

    $item_name = mysqli_real_escape_string($connect, $input["menuitemname"]);
    $item_price = mysqli_real_escape_string($connect, $input["price"]);

    if($input["action"] === 'edit'){
        $query = "
                    UPDATE menuitems 
                    SET menuitemname = '" . $item_name . "', 
                    price = '" . $item_price . "' 
                    WHERE menuitemid = '" . $input["menuitemid"] . "'
                 ";
        mysqli_query($connect, $query);
    }

    if($input["action"] === 'delete'){
        $query = "DELETE FROM menuitems 
                WHERE id = '".$input["menuitemid"]."'
                ";
        mysqli_query($connect, $query);
    }

    echo json_encode($input);

?>