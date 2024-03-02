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

        $txt = "The Admin added a new Information of a recent Disaster Event!";
 
        $sql = "INSERT INTO disaster (name,location,type) VALUES ('$D_name','$D_location','$D_type');
                INSERT INTO updates (message) VALUES ('$txt');
        
        ";
        mysqli_multi_query($conn,$sql);
}

if(isset($_POST['DeleteThisSelectedDisasterInformationInDb']) && $_POST['DeleteThisSelectedDisasterInformationInDb'] == true){
        $id = $_POST['id'];

        $txt = "The Admin deleted an Information of a Disaster Event!";
        $sql = "DELETE FROM disaster WHERE id = $id;
                INSERT INTO updates (message) VALUES ('$txt');
        ";
       mysqli_multi_query($conn,$sql);
}


if (isset($_POST['DisplayEarthquakeTable']) && $_POST['DisplayEarthquakeTable'] == true) {

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
            

    $sql = "SELECT * FROM disaster WHERE type = 'Earthquake' ORDER BY date DESC";
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

                  <button class = "btn btn-success" onclick = "ViewDetails('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Edit </button>
                  <button class = "btn btn-info" onclick = "ViewDetailsoforView('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View</button>             
                  <button class = "btn btn-danger" onclick = "DeleteEarthquakeDisaster('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                    

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
    
                $sql = "SELECT * FROM disaster WHERE (name LIKE '%$value%' OR type LIKE '%$value%' OR location LIKE '%$value%' OR date LIKE '%$value%') AND type = 'Earthquake' ORDER BY date DESC";
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
                        
                <button class = "btn btn-success" onclick = "ViewDetails('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Edit </button>
                <button class = "btn btn-info" onclick = "ViewDetailsoforView('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View</button>             
                <button class = "btn btn-danger" onclick = "DeleteEarthquakeDisaster('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                  

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

if(isset($_POST['DeleteEarthquakeDisaster']) && $_POST['DeleteEarthquakeDisaster'] == true){
    $id = $_POST['id'];

    $txt = "The Admin deleted an Information of an Earthquake Disaster Event!";
    $sql = "DELETE FROM disaster WHERE id = $id;
            INSERT INTO updates (message) VALUES ('$txt');
    ";
    mysqli_multi_query($conn,$sql);
}

if(isset($_POST['EarthquakeId'])){
    $earthquake_id = $_POST['EarthquakeId'];

    $sql = "SELECT * FROM disaster WHERE id = $earthquake_id";
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

if(isset($_POST['EditEarthquake']) && $_POST['EditEarthquake'] == true){
    $id = $_POST['id'];

    $disaster_name = $_POST['disaster_name'];
    $disaster_location = $_POST['disaster_location'];
    $disaster_date = $_POST['disaster_date'];
    $disaster_type = $_POST['disaster_type'];

    $txt = "The Admin Edited an Information of an Earthquake Disaster Event!";

    $sql = "UPDATE disaster SET name = '$disaster_name', location  = '$disaster_location', date = '$disaster_date', type = '$disaster_type' WHERE id = $id;
            INSERT INTO updates (message) VALUES ('$txt');
        ";
    mysqli_multi_query($conn,$sql);
}





if (isset($_POST['DisplayTableForTsunami']) && $_POST['DisplayTableForTsunami'] == true) {

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
            

    $sql = "SELECT * FROM disaster WHERE type = 'Tsunami' ORDER BY date DESC";
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

                  <button class = "btn btn-success" onclick = "ViewDetails('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Edit </button>
                  <button class = "btn btn-info" onclick = "ViewDetailsoforView('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View</button>             
                  <button class = "btn btn-danger" onclick = "DeleteFOrtsunamiDisaster('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                    

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
    
                $sql = "SELECT * FROM disaster WHERE (name LIKE '%$value%' OR type LIKE '%$value%' OR location LIKE '%$value%' OR date LIKE '%$value%') AND type = 'Tsunami' ORDER BY date DESC";

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
                        
                <button class = "btn btn-success" onclick = "ViewDetails('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Edit </button>
                  <button class = "btn btn-info" onclick = "ViewDetailsoforView('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View</button>             
                  <button class = "btn btn-danger" onclick = "DeleteEarthquakeDisaster('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                    
    
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


if(isset($_POST['DeleteTsunamiDisaster']) && $_POST['DeleteTsunamiDisaster'] == true){
    $id = $_POST['id'];

    $txt = "The Admin deleted an Information of an Tsunami Disaster Event!";
    $sql = "DELETE FROM disaster WHERE id = $id;
            INSERT INTO updates (message) VALUES ('$txt');
            ";
    mysqli_multi_query($conn,$sql);
}

if(isset($_POST['TsunamiId'])){
    $TsunamiId = $_POST['TsunamiId'];

    $sql = "SELECT * FROM disaster WHERE id = $TsunamiId";
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

if(isset($_POST['EditTsunami']) && $_POST['EditTsunami'] == true){
    $id = $_POST['id'];

    $disaster_name = $_POST['disaster_name'];
    $disaster_location = $_POST['disaster_location'];
    $disaster_date = $_POST['disaster_date'];
    $disaster_type = $_POST['disaster_type'];

    $txt = "The Admin Edited an Information of a Tsunami Disaster Event!";

    $sql = "UPDATE disaster SET name = '$disaster_name', location  = '$disaster_location', date = '$disaster_date', type = '$disaster_type' WHERE id = $id;
            INSERT INTO updates (message) VALUES ('$txt');
    ";
    mysqli_multi_query($conn,$sql);
}





if (isset($_POST['tableForEruption']) && $_POST['tableForEruption'] == true) {

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
            

    $sql = "SELECT * FROM disaster WHERE type = 'Eruption' ORDER BY date DESC";
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

                  <button class = "btn btn-success" onclick = "ViewDetails('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Edit </button>
                  <button class = "btn btn-info" onclick = "ViewDetailsoforView('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View</button>             
                  <button class = "btn btn-danger" onclick = "DeleteforVolcanoEruptionDisaster('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                    

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
    
                $sql = "SELECT * FROM disaster WHERE (name LIKE '%$value%' OR type LIKE '%$value%' OR location LIKE '%$value%' OR date LIKE '%$value%') AND type = 'Eruption' ORDER BY date DESC";

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
                        
                <button class = "btn btn-success" onclick = "ViewDetails('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Edit </button>
                  <button class = "btn btn-info" onclick = "ViewDetailsoforView('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">View</button>             
                  <button class = "btn btn-danger" onclick = "DeleteforVolcanoEruptionDisaster('.$id.')" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">Delete Information</button>
                    
    
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


if(isset($_POST['DeleteEruptionDisaster']) && $_POST['DeleteEruptionDisaster'] == true){
    $id = $_POST['id'];

    $txt = "The Admin deleted an Information of an Volcano Eruption Disaster Event!";
    $sql = "DELETE FROM disaster WHERE id = $id;
            INSERT INTO updates (message) VALUES ('$txt');
    ";
    mysqli_multi_query($conn,$sql);
}

if(isset($_POST['EruptionId'])){
    $EruptionId = $_POST['EruptionId'];

    $sql = "SELECT * FROM disaster WHERE id = $EruptionId";
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

if(isset($_POST['EditEruption']) && $_POST['EditEruption'] == true){
    $id = $_POST['id'];

    $disaster_name = $_POST['disaster_name'];
    $disaster_location = $_POST['disaster_location'];
    $disaster_date = $_POST['disaster_date'];
    $disaster_type = $_POST['disaster_type'];

    $txt = "The Admin Edited an Information of an Volcano Eruption Disaster Event!";

    $sql = "UPDATE disaster SET name = '$disaster_name', location  = '$disaster_location', date = '$disaster_date', type = '$disaster_type' WHERE id = $id;
            INSERT INTO updates (message) VALUES ('$txt')
        ";
    mysqli_multi_query($conn,$sql);
}
?>