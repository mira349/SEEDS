<?php 
    require_once 'header.php';
?>
<div class="container-fluid p-0">
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white bg-light border-rounded">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="font-weight-normal py-2 text-truncate text-custom text-left">Article Submitter
                            Home Page</h1>

                        <div class="px-2">
                            <div class="row">
                                <div class="col-12">
                                    <a class="nav-link btn btn-primary m-4" href="add.php">Add Article</a>
                                </div>
                                <div class="col-12">
                                    <a class="nav-link btn btn-primary m-4" href="analyze.php">Analyze Article</a>
                                </div>
                                <div class="col-12">
                                    <a class="nav-link btn btn-primary m-4" href="import.php">Import Article</a>
                                </div>
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