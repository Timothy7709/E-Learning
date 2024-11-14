
<!-- navbar and sidebar  -->
<!-- SIDEBAR ada di div container, jadi hati-hati kalo mau edit file  -->
<?php 
//login admun
if(!isset($_SESSION)){
    session_start();
}

//session admin
if(!isset($_SESSION['isLoginAdm'])){
    echo '<script>location.href = "../home.php"</script>';
}else{
    $adminEmail = $_SESSION['admLogEmail'];
}

include('./staticDashboard/sidebar.php');
//ini perlu
include('../query/dbConnection.php');

?>

<div class="container mt-5">

        <div class="contentdashAdmin">

            <div class="wrappercardinfo">

                <div class="carddashadmin" style="background-color: #be3422e8;">
                    <div class="judulcardadmin">
                        <h3>Courses</h3>
                    </div>
                    <p>9</p>                  
                </div>

                <div class="carddashadmin" style="background-color: #22ca2be8;">
                    <div class="judulcardadmin">
                        <h3>Students</h3>
                    </div>
                    <p>9</p>
                </div>

                <div class="carddashadmin" style="background-color: rgba(19, 119, 212, 0.91)">
                    <div class="judulcardadmin" >
                        <h3>Sold</h3>
                    </div>
                    <p>9</p>
                </div>

            <!-- end div for wrappercardinfo -->
            </div>

            <div class="tableTurner mt-4">
                <div class="tableContent">
                    <!-- judul tabel -->
                    <div class="middlelessons">
                        <p>
                            <div class="judulcardtable">Course Ordered</div> 
                        </p>
                    </div>
    
                    <table class="table mb-5">
                        <thead>
                            <tr >
                                <th>Order ID</th>
                                <th>Course ID</th>
                                <th>Student Email</th>
                                <th>Order Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>Jokowi@gmail.com</td>
                                <td>27-02-2023</td>
                                <td>200 <span style="color: green;">$</span></td>
                                <td class>
                                    <button><i class="fa-solid fa-pen-to-square" style="color: #1361e7;"></i></button>
                                    <button><i class="fa-solid fa-trash" style="color: #ff0019;"></i></button> 
                                </td>
                            </tr>
         
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>Jokowi@gmail.com</td>
                                <td>27-02-2023</td>
                                <td>200 <span style="color: green;">$</span></td>
                                <td class>
                                    <button><i class="fa-solid fa-pen-to-square" style="color: #1361e7;"></i></button>
                                    <button><i class="fa-solid fa-trash" style="color: #ff0019;"></i></button> 
                                </td>
                            </tr>
         
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>Jokowi@gmail.com</td>
                                <td>27-02-2023</td>
                                <td>200 <span style="color: green;">$</span></td>
                                <td class>
                                    <button><i class="fa-solid fa-pen-to-square" style="color: #1361e7;"></i></button>
                                    <button><i class="fa-solid fa-trash" style="color: #ff0019;"></i></button> 
                                </td>
                            </tr>
         
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>Jokowi@gmail.com</td>
                                <td>27-02-2023</td>
                                <td>200 <span style="color: green;">$</span></td>
                                <td class>
                                    <button><i class="fa-solid fa-pen-to-square" style="color: #1361e7;"></i></button>
                                    <button><i class="fa-solid fa-trash" style="color: #ff0019;"></i></button> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Akhir Tabel -->
    
            <!-- end contentdashAdmin -->
            </div>
            </div>

<!-- end div for container -->
</div>

    <!-- footer  -->
    <?php include('./staticDashboard/footer.php') ?>