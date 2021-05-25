<?php
    // File required for database connective 
    require_once 'connect.php';
     require_once 'header.php';
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"
        integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap-grid.min.css"
        integrity="sha512-cKoGpmS4czjv58PNt1YTHxg0wUDlctZyp9KUxQpdbAft+XqnyKvDvcGX0QYCgCohQenOuyGSl8l1f7/+axAqyg=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap-reboot.min.css"
        integrity="sha512-wV3xzHEw4kJUF4G0fyXSefKmUVhwwbOdZinJvOxmysxAXSZBl17porgPOcQBDBQTEwgGevxXGWAAQ/UPaSd0nw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
        integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"
        integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container-fluid p-0">
        <section id="cover" class="min-vh-100">
            <div id="cover-caption">
                <div class="container">
                    <div class="row text-white">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 mx-auto text-center form p-4">
                            <h1 class="font-weight-normal py-2 text-truncate text-custom text-center">Search artical
                            </h1>
                            <div class="px-2">
                                <form action="#" class="justify-content-center text-custom" method="GET">
                                    <div class="row form-group">
                                        <div class="col-sm-4 col-md-2 px-1 py-1">
                                            <label class="form-label text-custom text-left w-100 py-1 ">Description<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-6 col-md-6 px-1 py-1">
                                            <input type="text" class="form-control w-100" name="search" id="search"
                                                minlength="1" maxlength="150"
                                                value="<?php if(isset($_GET['search'])){ echo $_GET['search'];} ?>"
                                                placeholder="Author Name: XXXXX XXXXX" required>

                                        </div>
                                        <div class="col-sm-2 col-md-4 px-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-custom btn-lg w-100 py-1">Search</button>
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <!-- Sort selection -->
                                        <div class="col-sm-8 col-md-6 px-1 py-1 text-left">
                                            <b>Sort:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="author" name="searchSort"
                                                <?php if(isset($_GET['searchSort'])){ if($_GET['searchSort'] == "author"){echo "checked";}} ?>
                                                value="author" required>
                                            <label for="author">Author</label> &nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="year"
                                                <?php if(isset($_GET['searchSort'])){ if($_GET['searchSort'] == "year"){echo "checked";}} ?>
                                                name="searchSort" value="year">
                                            <label for="year">Year</label>
                                        </div>
                                    </div>
                                    <div class="row form-group justify-content-center">
                                        <!-- Sort selection -->
                                        <div class="col-sm-12 col-md-12 px-1 py-1 text-center">
                                            <b>Sort:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="author" name="author"
                                                <?php if(isset($_GET['author'])){ echo "checked";} ?> value="author">
                                            <label for="author">Author</label> &nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="title"
                                                <?php if(isset($_GET['title'])){echo "checked";} ?> name="title"
                                                value="title">
                                            <label for="title">Title</label> &nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="journal"
                                                <?php if(isset($_GET['journal'])){echo "checked";} ?> name="journal"
                                                value="journal">
                                            <label for="journal">Journal</label> &nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="Publisher"
                                                <?php if(isset($_GET['publisher'])){echo "checked";} ?> name="publisher"
                                                value="publisher">
                                            <label for="Publisher">Publisher</label>
                                        </div>
                                    </div>
                                </form>
                                <?php 
                                // check weather search string is entered or not.
                                // if entered this part will execute and search result will displayed
                                    if(isset($_GET['search']) && isset($_GET['searchSort'])){
                                        // make string to search for results 
                                        $searchString = '%'.$_GET['search'].'%';
                                        $searchSort = $_GET['searchSort'];
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <?php
                                                    echo '<th>Sr #</th>';
                                                    if(isset($_GET['author']))
                                                        echo '<th>Author</th>';
                                                    if(isset($_GET['title']))
                                                        echo '<th>Title</th>';
                                                    if(isset($_GET['journal']))
                                                        echo '<th>Journal</th>';
                                                    echo '<th>Volume</th><th>Pages</th><th>Month/Year</th><th>Annote</th>';
                                                    if(isset($_GET['publisher']))
                                                        echo '<th>Publisher</th>';
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // fetching data from 
                                            $stmt = $conn->prepare("SELECT  * FROM `artical` WHERE `author` LIKE :author OR `title` LIKE :title OR `publisher` LIKE :publisher OR `journal` LIKE :journal ORDER BY `".$searchSort."` ASC");
                                            $stmt->bindParam(':author',$searchString);
                                            $stmt->bindParam(':title',$searchString);
                                            $stmt->bindParam(':journal',$searchString);
                                            $stmt->bindParam(':publisher',$searchString);
                                            // $stmt->bindParam(':sort',$searchSort);
                                            // try catch block for database statements
                                            try {
                                               $stmt->execute();
                                               $list = [];
                                               $i = 0;
                                               $rank = 1;
                                               // populating data from database
                                               while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                   echo '<tr><td>'.$rank.'</td>';
                                                   if(isset($_GET['author'])){
                                                    echo '<td>'.$result['author'].'</td>';
                                                   }
                                                   if(isset($_GET['title'])){
                                                    echo '<td>'.$result['title'].'</td>';
                                                   }
                                                   if(isset($_GET['journal'])){
                                                    echo '<td>'.$result['journal'].'</td>';
                                                   }
                                                   echo '<td>'.$result['volume'].'</td>';
                                                   echo '<td>'.$result['pages'].'</td>';
                                                   echo '<td>'.$result['month'].' / '.$result['year'].'</td>';
                                                   echo '<td>'.$result['annote'].'</td>';
                                                   if(isset($_GET['publisher'])){
                                                    echo '<td>'.$result['publisher'].'</td>';
                                                   }
                                                   echo '</tr>';
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
</body>

</html>
