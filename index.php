<?php
    $connect = mysqli_connect('fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com', 'jcorrea2016', 'Path%med', 'jcorrea2016');
    $query = "SELECT * FROM menuitems ORDER BY menuitemid DESC";
    $result = mysqli_query($connect, $query);
?>

<html>

    <head>  
        <title>FDR - Resturant Portal</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
        <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    </head>  
    <body>
        <div class="container">
            <br>
            <br>
            <br>
            <div class="table-responsive">  
                <h3>Welcome! Your establishment's menu is represented in the editable table below!</h3><br>
                <button id="redirect">Navigate to Order Management Interface</button><br><br> 
                <table id="editable_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($result)) {
                                echo '
                                <tr>
                                    <td>'.$row["menuitemid"].'</td>
                                    <td>'.$row["menuitemname"].'</td>
                                    <td>'.$row["price"].'</td>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

</html> 
 
<script>  
    $(document).ready(function(){  
        $('#editable_table').Tabledit({
        url:'action.php',
        columns:{
        identifier:[0, "menuitemid"],
        editable:[[1, 'menuitemname'], [2, 'price']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
            if(data.action == 'delete')
            {
                $('#'+data.id).remove();
            }
        }
        });
    }); 

    document.getElementById("redirect").onclick = function () {
        location.href = "Orders.html";
    };
 </script>