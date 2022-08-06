 <!-- Button trigger modal  -->
 <link rel="stylesheet" href="style.css">

 <button type="button" class="btn btn-primary btn-success ml-1 bg-dark" data-toggle="modal" data-target="#loginModal">
     Login
 </button>


 <!-- Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="loginmodalLabel">Login to Our Website </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div> 
             <div class="modal-body">
                 <form action="/forum/partials/_handleLogin.php" method="POST">
                     <div class="form-group">
                         <label for="loginEmail">Username</label>
                         <input type="text" class="form-control" id="loginUsername" name="loginUsername"
                             aria-describedby="emailHelp" placeholder="Enter Username">
                     </div>
                     <br>
                     <div class="form-group">
                         <label for="loginPassword">Password </label>
                         <input type="password" class="form-control" id="loginPassword" name="loginPassword"
                             placeholder="Password">
                     </div>
                     <br>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="forgot_password.php">Forgot Password?</a>


                     <!-- <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Save changes</button>
                     </div> -->
                 </form>
             </div>
         </div>
     </div>
 </div>