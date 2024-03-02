<?php
include('../connection/conn.php');
include('../includes/user_header.php');
include('../includes/footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Updates Log</title>
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="update.css">

</head>
<body>


   <div class="container" style = "display: flex;">
   <div class="tableForUpdates" id = "tableForUpdates" style = "position: absolute; top: 20px; "></div>
   <div class="counts">
            <div class="section1">
                        <div class="title" style = "font-size: 30px; display: flex; justify-content: center;">
                                LOGS COUNT
                        </div>
                        <div class="count">
                                <?php
                                        $sql = "SELECT * FROM updates";
                                        $query = mysqli_query($conn,$sql);

                                        $count = 0;

                                        while($test = mysqli_fetch_assoc($query)){

                                            $count++;
                                         
                                        }

                                        echo '
                                            
                                        <h6 style = "font-size: 30px; display: flex; justify-content: center;">'.$count.'</h6>
                                
                                     ';
                                ?>
                        </div>
                        <div class="icon" style = "font-size: 30px; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                        </svg>
                        </div>
            </div>
            <div class="section2">

            </div>
   </div>
 
   </div>
    
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
         $(document).ready(function () {
       
            DisplayAllUpdates();
              
    });



    function DisplayAllUpdates(){
        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                DisplayAllUpdates: true
               
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console
                $('#tableForUpdates').html(data);                       
            }
        });
    }
    </script>
</body>
</html>