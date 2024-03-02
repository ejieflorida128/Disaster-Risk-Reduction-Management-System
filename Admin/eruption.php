<?php
include('../connection/conn.php');
include('../includes/admin_header.php');
include('../includes/footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsunami</title>
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="eruption.css">
</head>
<body>

    <div class="container">
        <input type="text" id = "searchBar" class = "form-control" style = "position: absolute; width: 300px; top: 23px;right: 100px; border: 2px solid black;">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" style = "position: absolute; top: 28px; right: 110px;" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        
        <a href="manage.php" class = "btn btn-primary"  style = "margin-top: 70px; margin-left: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);  "  >
        Register Volcano Eruption Disaster
        </a>

         <!-- Notification Modal for  Credentials reation -->
         <div class="modal" tabindex="-1" id="SuccessfullyEditedInformation" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <p>You have Successfully Edited a Disaster Information!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
                    </div>
                </div>
            </div>
        </div>


          <!-- Notification Modal for  Credentials reation -->
          <div class="modal" tabindex="-1" id="SuccessfullyDeltedFromDb" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <p>You have Successfully Deleted the selected Disaster Information!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal for Edit Details -->
<div class="modal fade" id="viewDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="margin-top: 90px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Disaster Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-group">
                            <label for="disaster_name">Disaster Name:</label><br>
                            <input type="text" class="form-control" id="disaster_name" required>
                            <label for="disaster_location">Disaster Location:</label><br>
                            <input type="text" class="form-control" id="disaster_location" required>
                            <label for="disaster_date">Disaster Date:</label><br>
                            <input type="text" class="form-control" id="disaster_date" required>
                            <select name="disaster_type" id = "disaster_type" class = "btn btn-warning" style = "margin-top: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                                <option value="Earthquake">Earthquake</option>
                                <option value="Eruption">Volcano Eruption</option>
                                <option value="Tsunami">Tsunami</option>
                            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        <button onclick = "proceedToEditDetails()" class = "btn btn-success" data-bs-dismiss="modal">CONFIRM EDIT</button>
        <input type = "hidden" id = "hiddenID">
      </div>
    </div>
  </div>
</div>


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
                            <select name="Vdisaster_type" id = "Vdisaster_type" class = "btn btn-warning" style = "margin-top: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" disabled>
                                <option value="Earthquake">Earthquake</option>
                                <option value="Eruption">Volcano Eruption</option>
                                <option value="Tsunami">Tsunami</option>
                            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>








            <div class="tableForEruption" id = "tableForEruption">
                <!-- table created for register disaster -->
            </div>
    </div>
    
    
    
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        DisplayTableForEruptions(null);

        // Bind refresh function to modal close event
        $('.modal').on('hidden.bs.modal', function () {
            DisplayTableForEruptions(null);
        });

        $("#searchBar").on('input', function () {
            var value = $(this).val();
            DisplayTableForEruptions(value);
        });         
    });

    function DisplayTableForEruptions(value) {
        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                tableForEruption: true,
                value:value
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console
                $('#tableForEruption').html(data);                       
            }
        });
    }


    function DeleteforVolcanoEruptionDisaster(id){
        var id = id;
        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                DeleteEruptionDisaster: true,
                id:id
           
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console     
                $('#SuccessfullyDeltedFromDb').modal('show');      
            }
        });
    }

    function ViewDetails(id){


        $.post("ajax.php", { EruptionId: id }, function(data, status) {
                                console.log(data); // Log the raw response to the console

                                var details = JSON.parse(data);
                                
                                $('#hiddenID').val(details.id);
                                $('#disaster_name').val(details.name);
                                $('#disaster_location').val(details.location);                              
                                $('#disaster_date').val(details.date);
                                $('#disaster_type').val(details.type);
                              
                               
                                
                            });

                            $('#viewDetails').modal('show');

    }

     function ViewDetailsoforView(id){


        $.post("ajax.php", { EruptionId: id }, function(data, status) {
                                console.log(data); // Log the raw response to the console

                                var details = JSON.parse(data);
                                
                              
                                $('#Vdisaster_name').val(details.name);
                                $('#Vdisaster_location').val(details.location);                              
                                $('#Vdisaster_date').val(details.date);
                                $('#Vdisaster_type').val(details.type);
                              
                               
                                
                            });

                            $('#viewDetailsForView').modal('show');

    }

    function proceedToEditDetails(){
        var id = $('#hiddenID').val();

        var disaster_name = $('#disaster_name').val();
        var disaster_location = $('#disaster_location').val();
        var disaster_date = $('#disaster_date').val();
        var disaster_type = $('#disaster_type').val();

        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                EditEruption: true,
                id:id,
                disaster_name:disaster_name,
                disaster_location:disaster_location,
                disaster_date:disaster_date,
                disaster_type:disaster_type
           
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console     
                $('#SuccessfullyEditedInformation').modal('show');      
            }
        });

    }
</script>

</body>
</html>