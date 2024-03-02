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
    <title>Manage Disaster</title>
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="manage.css">
</head>
<body>

    <div class="container">
        <input type="text" id = "searchBar" class = "form-control" style = "position: absolute; width: 300px; top: 23px;right: 100px; border: 2px solid black;">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" style = "position: absolute; top: 28px; right: 110px;" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#putDisasterIntoDb" style = "margin-top: 70px; margin-left: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);  ">
            Save Disaster Information
        </button>


            <div class="modal fade" id="putDisasterIntoDb" style="margin-top: 100px;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Save Disaster Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="disaster_name">Disaster Name:</label><br>
                            <input type="text" class="form-control" id="disaster_name" required>
                            <label for="disaster_location">Disaster Location:</label><br>
                            <input type="text" class="form-control" id="disaster_location" required>
                            <select name="disaster_type" id = "disaster_type" class = "btn btn-warning" style = "margin-top: 10px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                                <option value="Earthquake">Earthquake</option>
                                <option value="Eruption">Volcano Eruption</option>
                                <option value="Tsunami">Tsunami</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="refreshIfClose()">Cancel</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick = "SaveDisasterInformationToDb()">Confirm Save</button>
                    </div>
                </div>
            </div>
        </div>



         <!-- Notification Modal for  Credentials reation -->
         <div class="modal" tabindex="-1" id="SuccessulSaveDataDisasterInDb" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick = "refreshIfClose()"></button>
                    </div>
                    <div class="modal-body">
                        <p>You have Successfully Added a new Disaster Information!</p>
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
                        <p>You have Successfully Delted the selected Disaster Information!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
                    </div>
                </div>
            </div>
        </div>








            <div class="tableForDisasterRegister" id = "tableForDisasterRegister">
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
                displayTableOfAllDataInDb: true,
                value:value
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console
                $('#tableForDisasterRegister').html(data);                       
            }
        });
    }

    function SaveDisasterInformationToDb(){
       
        var D_name = $('#disaster_name').val();
        var D_location = $('#disaster_location').val();
        var D_type = $('#disaster_type').val();
        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                SaveDisasterInformationToDb: true,
                D_name:D_name,
                D_location:D_location,
                D_type:D_type
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console     
                $('#SuccessulSaveDataDisasterInDb').modal('show');      
            }
        });
    }

    function DeleteSaveInformationOfDisasterInDb(id){
        var id = id;
        $.ajax({
            url: "ajax.php",
            type: 'post',
            data: {
                DeleteThisSelectedDisasterInformationInDb: true,
                id:id
           
            },
            success: function (data, status) {
                console.log(data); // Check the data in the console     
                $('#SuccessfullyDeltedFromDb').modal('show');      
            }
        });
    }
</script>

</body>
</html>