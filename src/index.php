<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Tools</title>
    <meta name="description" content="Web Tools by Berkan Ümütlü">
    <meta name="keywords" content="php, web, web tools, php web tools">
    <meta name="author" content="Berkan Ümütlü">
    <meta name="copyright" content="Berkan Ümütlü">
    <meta name="owner" content="Berkan Ümütlü">
    <meta name="url" content="https://github.com/berkanumutlu">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/highlight.js/styles/default.min.css" rel="stylesheet">
    <link href="assets/web/css/style.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card my-5">
                <div class="card-header d-flex align-items-center">
                    <img src="assets/web/images/www.png" class="me-2" width="32" height="32" alt="Web Tools Logo">
                    <h1 class="mb-0 fs-4 fw-semibold">Web Tools</h1>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-ping-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-ping" type="button" role="tab"
                                    aria-controls="pills-ping"
                                    aria-selected="true">Ping
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-ping" role="tabpanel"
                             aria-labelledby="pills-ping-tab" tabindex="0">
                            <form action="ajax.php" method="POST" class="form-ping input-group-form">
                                <input type="hidden" name="ping_form" value="1">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="hostname">Hostname</label>
                                            <input type="text" id="hostname" name="hostname" class="form-control"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="ttl">TTL (ms)</label>
                                            <input type="text" id="ttl" name="ttl" class="form-control" value="255"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="timeout">Timeout (ms)</label>
                                            <input type="text" id="timeout" name="timeout" class="form-control"
                                                   value="10" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="parameters">Parameters (optional)</label>
                                            <input type="text" id="parameters" name="parameters" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <?php include 'components/_button_form_submit.html'; ?>
                            </form>
                            <?php include 'components/_alert.html'; ?>
                            <?php include 'components/_code_block.html'; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    <p class="mb-0">Copyright © 2023
                        <a href="https://github.com/berkanumutlu" target="_blank">Berkan Ümütlü</a>. All Right Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/plugins/jquery/jquery-3.7.1.min.js"></script>
<script src="assets/plugins/popperjs/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/highlight.js/highlight.min.js"></script>
<script src="assets/web/js/main.js"></script>
</body>
</html>
