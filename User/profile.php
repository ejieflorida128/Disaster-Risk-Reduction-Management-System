<?php
session_start();
  include('../connection/conn.php');
  include('../includes/user_header.php');
include('../includes/footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
  
  <div class="container" style = "display: flex; margin-left:  40px;">
      <div class="section1">
          <div class="profile">
            <img id="profileImage" src="<?php  

                  $id =  $_SESSION['id'];
                  $sql = "SELECT * FROM user_account WHERE id = $id";
                  $query = mysqli_query($conn,$sql);
                  
                  while($test = mysqli_fetch_assoc($query)){
                      echo $test['img'];
                  }


            
            ?>" style  = "width: 400px; height: 400px; margin-top: 40px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
          </div>
      </div>
      <div class="section2" style = "margin-left: 30px; margin-top: 60px;">

              <div class="credentials">
                        <label for="fullname"> Fullname:</label>
                      <input type="text" id="fullname" class="form-control" style="width: 300px">
                      <label for="age">Age:</label>
                      <input type="number" id="age" class="form-control" style="width: 100px">
                      <label for="gmail">Gmail:</label>
                      <input type="gmail" id="gmail" class="form-control" style="width: 400px">
                      <label for="location">Location:</label>
                      <input class="form-control" style="width: 500px" id = "location">
                      <label for="number">Number:</label>
                      <input class="form-control" type = "number" style="width: 200px" id = "number">
              </div>

              <div class = "btns">
                  <label class="btn btn-primary" style="margin-left: 10px; margin-top: 20px;" for="selectProfilePicture" id = "chooseBtnForPic">Choose Profile Pic</label>
                <input type="file" id="selectProfilePicture" hidden onchange="displaySelectedImage(event)">
                <button class="btn btn-success" style="margin-left: 10px; margin-top: 20px;" onclick = "EditDataFromTheProfile()">Save Edit</button>
                </div>

      </div>
  </div>


  <!-- modal -->
<div class="modal" tabindex="-1" id = "SuccesfullEdit" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Edited Successfully!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
   window.onload = function() {
      
      DisplayAllDataOfTheSaidAccount();

     
      setTimeout(function() {
          location.reload();
      }, 1000000); // Refresh the page every 60 seconds
  };

  function refreshIfClose() {
      $(document).ready(function() {
          location.reload();
      });
  }

  function displaySelectedImage(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();
      
      reader.onload = function(event) {
          var imgElement = document.getElementById('profileImage');
          imgElement.src = event.target.result;
      };
      
      reader.readAsDataURL(selectedFile);
  }


  //     para ma display ang current na data sa usa ka seller account 
  function DisplayAllDataOfTheSaidAccount() {
        var id = '<?php echo $_SESSION['id']; ?>';
      
        $.post("ajax.php", { EditInformationOfTheSaidProfileAccount: id }, function(data, status) {
            console.log(data); // Log the raw response to the console

            var SelectedProfileDatas = JSON.parse(data);

            $('#fullname').val(SelectedProfileDatas.fullname);
            $('#age').val(SelectedProfileDatas.age);
            $('#gmail').val(SelectedProfileDatas.gmail);
            $('#location').val(SelectedProfileDatas.location);
            $('#number').val(SelectedProfileDatas.number);
        });
    }


    function EditDataFromTheProfile(){
                var EditClicked = true;
                var fullname = $('#fullname').val();
                var age = $('#age').val();
                var number = $('#number').val();
                var location = $('#location').val();
                var gmail = $('#gmail').val();
                var id = '<?php echo $_SESSION['id']; ?>';
                var SelectedProfilePicture = $('#selectProfilePicture').val();
                var pic = SelectedProfilePicture.replace(/C:\\fakepath\\/i, '');
        

                          $.ajax({
                                        url: "ajax.php",
                                        type: 'post',
                                        data: {
                                           
                                          fullname: fullname,
                                          age: age,
                                          number:number,
                                          location: location,
                                          gmail:gmail,
                                          pic:pic,
                                            EditClicked:EditClicked,
                                            SelectedIdToBeEdited:id
                                        },
                                        success: function (data, status) {
                                                        
                                            $('#SuccesfullEdit').modal('show');
                                        }
                                    });
                      
                }

            
</script>
</body>
</html>