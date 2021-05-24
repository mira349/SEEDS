<?php 
    require_once 'header.php';
?>
<div class="container-fluid p-0">
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="font-weight-normal py-2 text-truncate text-custom text-left">Artical Submitter
                            Form</h1>
                        <p class="p text-center">
                            <?php 
                                // check for error code if errCode is sucess then if execute else wise else statment execute 
                                    if(isset($_GET['errCode'])){
                                        $errCode = $_GET['errCode'];
                                        if($errCode == 200){
                                            echo '<span class="text-success">'.$_GET['msg'].'</span>';
                                        }else {
                                            echo '<span class="text-danger">'.$_GET['msg'].'</span>';
                                        }
                                    }

                                ?>
                        </p>
                        <div class="px-2">
                            <form action="bkForm.php" class="justify-content-center text-custom" method="POST">
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Author<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="author" id="author" minlength="1"
                                        maxlength="150" placeholder="Author Name: XXXXX XXXXX" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" minlength="1"
                                        maxlength="500" placeholder="Title of the book" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Journal</label>
                                    <input type="text" class="form-control" id="journal" name="journal" minlength="1"
                                        maxlength="500" placeholder="Journal......" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Year<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="year" name="year" minlength="4" maxlength="4"
                                        class="form-control" placeholder="<?php echo date("Y"); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2"> Month</label>
                                    <input type="text" class="form-control" minlength="1" maxlength="50" id="month"
                                        name="month" placeholder="Month......" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Volume<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" minlength="1" maxlength="50" name="volume"
                                        id="volume" placeholder="Voume......." required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Number</label>
                                    <input type="text" class="form-control" minlength="1" maxlength="50" id="number"
                                        name="number" placeholder="Number......" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Pages</label>
                                    <input type="number" class="form-control" minlength="1" maxlength="50" id="pages"
                                        name="pages" placeholder="Number of pages......" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Annote</label>
                                    <input type="text" class="form-control" minlength="1" maxlength="500" id="annote"
                                        name="annote" placeholder="Annote......" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-custom text-left w-100 pb-2">Publisher</label>
                                    <input type="text" class="form-control" minlength="10" maxlength="500"
                                        id="publisher" name="publisher" placeholder="Publication name......" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-custom btn-lg w-100 px-3 py-2"><span
                                        class="float-left">Submit</span><span
                                        class="float-right">&#10140;</span></button>
                            </form>
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