<?php
include('../connection/conn.php');

if (isset($_POST['displayTableOfAllDataInDb']) && $_POST['displayTableOfAllDataInDb'] == true) {

    if($_POST['value'] == null){
        $table = '<div style="max-height: 350px; max-width: 1000px; overflow-y: auto;">'; // Added max-height and overflow-y properties
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
            

    $sql = "SELECT * FROM disaster";
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
                    
                  <button class = "btn btn-danger" onclick = "DeleteSaveInformationOfDisasterInDb('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                    

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
    
        $sql = "SELECT * FROM disaster WHERE name LIKE '%$value%' OR type LIKE '%$value%' OR location LIKE '%$value%'";
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
                        
                <button class = "btn btn-danger" onclick = "DeleteSaveInformationOfDisasterInDb('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                  
    
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



if(isset($_POST['SaveDisasterInformationToDb']) && $_POST['SaveDisasterInformationToDb'] == true){
        $D_name = $_POST['D_name'];
        $D_location = $_POST['D_location'];
        $D_type = $_POST['D_type'];
 
        $sql = "INSERT INTO disaster (name,location,type) VALUES ('$D_name','$D_location','$D_type')";
        mysqli_query($conn,$sql);
}

if(isset($_POST['DeleteThisSelectedDisasterInformationInDb']) && $_POST['DeleteThisSelectedDisasterInformationInDb'] == true){
        $id = $_POST['id'];
        $sql = "DELETE FROM disaster WHERE id = $id";
        mysqli_query($conn,$sql);
}
?>