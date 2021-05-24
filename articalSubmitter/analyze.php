<?php
    // File required for database connective 
    require_once 'connect.php';
    require_once 'header.php';
?>

<div class="container-fluid p-0">
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white bg-light">
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 mx-auto text-center form p-1">
                        <h1 class="font-weight-normal py-2 text-truncate text-custom text-left">Analyze artical</h1>
                        <div class="px-2">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr #</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Journal</th>
                                            <th>Volume</th>
                                            <th>Pages</th>
                                            <th>Month/Year</th>
                                            <th>Annote</th>
                                            <th>Publisher</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // fetching data from 
                                            $searchString = 'pending';
                                            $stmt = $conn->prepare("SELECT  * FROM `artical` WHERE `status` LIKE :statuss ");
                                            $stmt->bindParam(':statuss',$searchString);
                                            // try catch block for database statements
                                            try {
                                               $stmt->execute();
                                               $list = [];
                                               $i = 0;
                                               $rank = 1;
                                               // populating data from database
                                               while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                   echo '<tr><td>'.$rank.'</td><td>'.$result['author'].'</td><td>'.$result['title'].'</td><td>'.$result['journal'].'</td><td>'.$result['volume'].'</td><td>'.$result['pages'].'</td><td>'.$result['month'].' / '.$result['year'].'</td><td>'.$result['annote'].'</td><td>'.$result['publisher'].'</td><td><button class="btn btn-success w-100 m-1" >Add</button><button class="btn btn-danger w-100 m-1">Reject</button></td></tr>';
                                                    $rank++;
                                                }
                                                if($rank == 1){
                                                // if not record found like the search string
                                                    echo '<tr><td colspan="9">No data Found</td></tr>';
                                                }
                                            } catch(PDOException $e) {
                                                echo '<tr><td colspan="9">'.$e->getMessage().'</td></tr>';
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
    require_once 'footer.php';
?>