<?php
    // File required for database connective 
    require_once 'connect.php';
    require_once 'header.php';
?>

<div class="container-fluid p-0">
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 mx-auto text-center form p-4">
                        <h1 class="font-weight-normal py-2 text-truncate text-custom text-left">Search artical</h1>
                        <div class="px-2">
                            <form action="#" class="justify-content-center text-custom" method="GET">
                                <div class="row form-group">
                                    <div class="col-sm-4 col-md-2 px-1 py-1">
                                        <label class="form-label text-custom text-left w-100 py-1 ">Description<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8 col-md-6 px-1 py-1">
                                        <input type="text" class="form-control w-100" name="search" id="search"
                                            minlength="1" maxlength="150" placeholder="Author Name: XXXXX XXXXX"
                                            <?php if(isset($_GET['search'])) echo 'value="'.$_GET['search'].'"'; ?>
                                            required>
                                    </div>
                                    <div class="col-sm-2 col-md-4 px-1">
                                        <button type="submit"
                                            class="btn btn-primary btn-custom btn-lg w-100 py-1">Search</button>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                // check weather search string is entered or not.
                                // if entered this part will execute and search result will displayed
                                    if(isset($_GET['search'])){
                                        // make string to search for results 
                                        $searchString = '%'.$_GET['search'].'%';
                                ?>
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
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // fetching data from 
                                            $stmt = $conn->prepare("SELECT  * FROM `artical` WHERE `author` LIKE :author OR `title` LIKE :title OR `publisher` LIKE :publisher OR `journal` LIKE :journal");
                                            $stmt->bindParam(':author',$searchString);
                                            $stmt->bindParam(':title',$searchString);
                                            $stmt->bindParam(':journal',$searchString);
                                            $stmt->bindParam(':publisher',$searchString);
                                            // try catch block for database statements
                                            try {
                                               $stmt->execute();
                                               $list = [];
                                               $i = 0;
                                               $rank = 1;
                                               // populating data from database
                                               while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                   echo '<tr><td>'.$rank.'</td><td>'.$result['author'].'</td><td>'.$result['title'].'</td><td>'.$result['journal'].'</td><td>'.$result['volume'].'</td><td>'.$result['pages'].'</td><td>'.$result['month'].' / '.$result['year'].'</td><td>'.$result['annote'].'</td><td>'.$result['publisher'].'</td><td>'.$result['status'].'</td></tr>';
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
                            <?php
                                    }
                                ?>
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