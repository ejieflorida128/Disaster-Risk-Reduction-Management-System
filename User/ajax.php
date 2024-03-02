<?php
include('../connection/conn.php');

if (isset($_POST['DisplayAllDisasterInDb']) && $_POST['DisplayAllDisasterInDb'] == true) {

    if($_POST['value'] == null){
        $table = '<div style="max-height: 420px; max-width: 1000px; overflow-y: auto;">'; // Added max-height and overflow-y properties
    $table .= '<table class="table table-bordered table-hover" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); ">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">No.</th>
                <th scope="col" class="text-center align-middle">Disaster Name</th>
                <th scope="col" class="text-center align-middle">Disaster Location</th>
                <th scope="col" class="text-center align-middle">Disaster Type</th>
                <th scope="col" class="text-center align-middle">Date</th>
                <th scope="col" class="text-center align-middle">Options</th>
            </tr>
            </thead>
            <tbody>';
            

    $sql = "SELECT * FROM disaster ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
    $number = 1;

    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $disaster_name = $row['name'];
        $disaster_location = $row['location'];
        $disaster_type = $row['type'];
        $disaster_date = $row['date'];
        

        $table .= '<tr>
            <td scope="row" class="text-center align-middle">' . $number . '</td>
            <td scope="row" class="text-center align-middle">' . $disaster_name . '</td>
            <td class="text-center align-middle">' . $disaster_location . '</td>
            <td class="text-center align-middle">' . $disaster_type . '</td>
            <td class="text-center align-middle">' . $disaster_date . '</td>
            <td class="text-center align-middle">
                    
                  <button class = "btn btn-primary" onclick = "ViewInformation('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View Details</button>
                    

            </td>
        </tr>';

        $number++;
    }
}else{
    // If no data, display a row with "No Data Information"
    $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
}

    $table .= '</tbody></table></div>';
    
    // Return the generated table markup as the response
    echo $table;
    }else{
        $value = $_POST['value'];

        $table = '<div style="max-height: 400px; max-width: 1000px; overflow-y: auto;">'; // Added max-height and overflow-y properties
        $table .= '<table class="table table-bordered table-hover" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); ">
                <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
                <tr> 
                <th scope="col" class="text-center align-middle">No.</th>
                <th scope="col" class="text-center align-middle">Disaster Name</th>
                <th scope="col" class="text-center align-middle">Disaster Location</th>
                <th scope="col" class="text-center align-middle">Disaster Type</th>
                <th scope="col" class="text-center align-middle">Date</th>
                <th scope="col" class="text-center align-middle">Options</th>
                </tr>
                </thead>
                <tbody>';
    
        $sql = "SELECT * FROM disaster WHERE name LIKE '%$value%' OR type LIKE '%$value%' OR location LIKE '%$value%' OR date LIKE '%$value%' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
        $number = 1;
    
        if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $disaster_name = $row['name'];
            $disaster_location = $row['location'];
            $disaster_type = $row['type'];
            $disaster_date = $row['date'];
            
    
            $table .= '<tr>
                <td scope="row" class="text-center align-middle">' . $number . '</td>
                <td scope="row" class="text-center align-middle">' . $disaster_name . '</td>
                <td class="text-center align-middle">' . $disaster_location . '</td>
                <td class="text-center align-middle">' . $disaster_type . '</td>
                <td class="text-center align-middle">' . $disaster_date . '</td>
                <td class="text-center align-middle">
                        
                <button class = "btn btn-primary" onclick = "ViewInformation('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View Details</button>
                   
    
                </td>
            </tr>';
    
            $number++;
        }
    }else{
        $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';

        }
    
        $table .= '</tbody></table></div>';
        
        // Return the generated table markup as the response
        echo $table;


    }
}


if(isset($_POST['DisasterId'])){
    $DisasterId = $_POST['DisasterId'];

    $sql = "SELECT * FROM disaster WHERE id = $DisasterId";
    $result = mysqli_query($conn,$sql);
    $response = array();

    while($row = mysqli_fetch_assoc($result)){
        $response = $row;
    }

    echo json_encode($response);
}else{
    $response['status'] =   200;
    $response['message'] = "Invalid or Data Information!";
}

if(isset($_POST['DisplayAllUpdates']) && $_POST['DisplayAllUpdates'] == true){
    $table = '<div style="max-height: 470px; max-width: 1000px; overflow-y: auto;">'; // Added max-height and overflow-y properties
    $table .= '<table class="table table-bordered table-hover" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); ">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">No.</th>
                <th scope="col" class="text-center align-middle">System Message</th>
                <th scope="col" class="text-center align-middle">Date</th>
               
                
            </tr>
            </thead>
            <tbody>';
            

    $sql = "SELECT * FROM updates ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
    $number = 1;

    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $message = $row['message'];
        $date = $row['date'];
       
        

        $table .= '<tr>
            <td scope="row" class="text-center align-middle">' . $number . '</td>
            <td scope="row" class="text-center align-middle">' . $message . '</td>
            <td class="text-center align-middle">' . $date . '</td>
           
           
        </tr>';

        $number++;
    }
    }

    echo $table;
}


    // para ma butangan ug information ang mga inputs sa profile php
    if(isset($_POST['EditInformationOfTheSaidProfileAccount'])){
        $id = $_POST['EditInformationOfTheSaidProfileAccount'];
    
        $sql = "SELECT * FROM user_account WHERE id = '$id' ";
        $result = mysqli_query($conn,$sql);
        $response = array();
    
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
    
        echo json_encode($response);
    }else{
        $response['status'] =   200;
        $response['message'] = "Invalid or Data Information!";
    }


    // mao ne query for editing profile information sa profile.php
if(isset($_POST['EditClicked'])){
      
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $number = $_POST['number'];
    $location = $_POST['location'];
    $gmail = $_POST['gmail'];
    if(empty($_POST['pic']) || $_POST['pic'] == null){
      $pic = "../profile_pictures/default.jpg";
    }else{
      
      $pic = "../profile_pictures/".$_POST['pic'];
    }
    $SelectedIdToBeEdited = $_POST['SelectedIdToBeEdited'];
  
    $sql = "UPDATE user_account SET fullname = '$fullname', age = '$age', location = '$location', img = '$pic' , number = '$number',gmail = '$gmail' WHERE id = '$SelectedIdToBeEdited'";
    mysqli_query($conn, $sql);
  }
?>