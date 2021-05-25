<?php
// required files to work
require_once 'header.php';
use Phppot\DataSource;
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
// check weather file is set or not 
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            // indicates column(format) of CSV 
            $author = "";
            if (isset($column[0])) {
                $author = mysqli_real_escape_string($conn, $column[0]);
            }
            $title = "";
            if (isset($column[1])) {
                $title = mysqli_real_escape_string($conn, $column[1]);
            }
            $journal = "";
            if (isset($column[2])) {
                $journal= mysqli_real_escape_string($conn, $column[2]);
            }
            $month = "";
            if (isset($column[3])) {
                $month = mysqli_real_escape_string($conn, $column[3]);
            }
            $year = "";
            if (isset($column[4])) {
                $year = mysqli_real_escape_string($conn, $column[4]);
            }
            $volume = "";
            if (isset($column[5])) {
                $volume = mysqli_real_escape_string($conn, $column[5]);
            }
            $number = "";
            if (isset($column[6])) {
                $number = mysqli_real_escape_string($conn, $column[6]);
            }
            $publisher = "";
            if (isset($column[7])) {
                $publisher = mysqli_real_escape_string($conn, $column[7]);
            }
            $pages = "";
            if (isset($column[8])) {
                $pages = mysqli_real_escape_string($conn, $column[8]);
            }
            $annote ="";
            if (isset($column[9])) {
                $annote = mysqli_real_escape_string($conn, $column[9]);
            }
            $status= 'pending';
            // getting NZ standrad timezone
            date_default_timezone_set('NZ');
            $regisTime= date('H:i d:m:Y');            
            // inserting values 
            $sqlInsert = "INSERT into artical (author,title,journal,year,month,volume,number,pages,annote,publisher,status,registerDate)
                   values (?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "sssissisisss";
            $paramArray = array(
                $author,
                $title,
                $journal,
                $year,
                $month,
                $volume,
                $number,
                $pages,
                $annote,
                $publisher,
                $status,
                $regisTime
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>

<script type="text/javascript">
// on submit check weather files is valid or not 
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function() {
        $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
            $("#response").addClass("error");
            $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>

<div class="container">
    <div class="row h-50 m-4 ">
        <div class="col-12">
            <h2 class="h4 text-center m-4">Import CSV file into Mysql using PHP</h2>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
                <?php if(!empty($message)) { echo $message; } ?>
            </div>
            <div class="">
                <div class="row h-50 justify-content-center">

                    <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport"
                        enctype="multipart/form-data">
                        <div class="col-8 justify-content-center">
                            <label class="col-12 control-label my-4">Choose CSV
                                File</label> <input type="file" name="file" id="file" accept=".csv" class="col-12">
                            <button type="submit" id="submit" name="import"
                                class="btn-primary text-center col-12 my-4">Import</button>
                            <br />

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once 'footer.php';
?>