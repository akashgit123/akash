<?php
    // session_start();
    include 'dbconnect.php';
?>

<div class="containor mt-4 ">
    <?php
    include 'message.php';
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Stats
                        <!-- <a href="add_admin.php" class="btn btn-primary float-end">Add Admin</a> -->
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Number of Users</th>
                            <th> Total Number of Posts</th>
                            <th>Total Number of Comments</th>
                            <th>Today's Posts</th>
                            <th>Weekly Posts</th>
                            <th>Monthly Posts</th>
                            
                        </tr>

                        
                            <?php
                                $sql1="SELECT * FROM user";
                                $result1 =mysqli_query($con,$sql1);
                                $row1 = mysqli_num_rows($result1);

                                $sql2="SELECT * FROM threads";
                                $result2 =mysqli_query($con,$sql2);
                                $row2 = mysqli_num_rows($result2);

                                $sql3="SELECT * FROM comments";
                                $result3 =mysqli_query($con,$sql3);
                                $row3 = mysqli_num_rows($result3);

                                $sql4="SELECT * FROM threads WHERE `time_stamp`>curdate()";
                                $result4 =mysqli_query($con,$sql4);
                                $row4 = mysqli_num_rows($result4);

                                $sql5="SELECT * FROM threads WHERE `time_stamp`>now() - interval 7 day";
                                $result5 =mysqli_query($con,$sql5);
                                $row5 = mysqli_num_rows($result5);

                                $sql6="SELECT * FROM threads WHERE `time_stamp`>now() - interval 30 day";
                                $result6 =mysqli_query($con,$sql6);
                                $row6 = mysqli_num_rows($result6);

                            ?>
                            <tr>
                                <td><?= $row1; ?> </td>
                                <td><?= $row2; ?> </td>
                                <td><?= $row3; ?> </td>
                                <td><?= $row4; ?> </td>
                                <td><?= $row5; ?> </td>
                                <td><?= $row6; ?> </td>
                            </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>