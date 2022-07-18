 <!-- Button trigger modal  -->
 <link rel="stylesheet" href="style.css">

 <button type="button" class="btn btn-primary btn-success mx-1 bg-dark" data-toggle="modal" data-target="#signupmodal">
   SignUp
 </button>


 <!-- Modal -->
 <div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="signupmodalLabel">Signup to Our Website </h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>


       <form action="/forum/partials/_handleSignup.php" method="POST">
         <div class="modal-body">
           <div class="form-group">
             <label for="exampleInputEmail1">Username</label>
             <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" placeholder="Enter Username">
             <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
           </div>
           <br>
           <div class="form-group">
             <label for="exampleInputPassword1">Create Password</label>
             <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password">
           </div>
           <br>
           <div class="form-group">
             <label for="exampleInputPassword1">Confirm Password </label>
             <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Password">
           </div>
           <br>
           <button type="submit" class="btn btn-primary">Submit</button>

         </div>
         </form>

     </div>
   </div>
 </div>