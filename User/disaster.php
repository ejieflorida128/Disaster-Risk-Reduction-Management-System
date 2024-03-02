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
    <title>Disaster List</title>
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="disaster.css">
</head>
<body>

<div class="container">
        <input type="text" id = "searchBar" class = "form-control" style = "position: absolute; width: 300px; top: 23px;right: 100px; border: 2px solid black;">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" style = "position: absolute; top: 28px; right: 110px;" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>



        <div class="modal fade" id="viewDetailsForView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style = "margin-top: 100px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View Disaster Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-group">
                            <label for="Vdisaster_name">Disaster Name:</label><br>
                            <input type="text" class="form-control" id="Vdisaster_name" required disabled>
                            <label for="Vdisaster_location">Disaster Location:</label><br>
                            <input type="text" class="form-control" id="Vdisaster_location" required disabled>
                            <label for="Vdisaster_date">Disaster Date:</label><br>
                            <input type="text" class="form-control" id="Vdisaster_date" required disabled>
                            <label for="Vdisaster_type">Disaster Type:</label><br>
                            <input type="text" class="form-control" id="Vdisaster_type" required disabled>
                            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>
       




            <div class="TableForAllDisaster" id = "TableForAllDisaster">
                <!-- table created for register disaster -->
            </div>
    </div>
    
    
    
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        DisplayAllDisasterInDb(null);

        // Bind refresh function to modal close event
        $('.modal').on('hidden.bs.modal', function () {
            DisplayAllDisasterInDb(null);
        });

        $("#searchBar").on('input', function () {
            var value = $(this).val();
            DisplayAllDisasterInDb(value);
        });         
    });

    function DisplayAllDisasterInDb(value) {
        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                DisplayAllDisasterInDb: true,
                value:value
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console
                $('#TableForAllDisaster').html(data);                       
            }
        });
    }


    function ViewInformation(id){
              $.post("ajax.php", { DisasterId: id }, function(data, status) {
                                console.log(data); // Log the raw response to the console

                                var details = JSON.parse(data);
                                
                              
                                $('#Vdisaster_name').val(details.name);
                                $('#Vdisaster_location').val(details.location);                              
                                $('#Vdisaster_date').val(details.date);
                                $('#Vdisaster_type').val(details.type);
                              
                               
                                
                            });

                            $('#viewDetailsForView').modal('show');
    }

   
</script>
    
</body>
</html>