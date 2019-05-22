<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/style.css">
    <title>Resume</title>
</head>
<body>
<div class="container">
    <div id="resume-header" class="row">
        <div class="col-3">
            <img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">
        </div>
        <div class="col">
            <h1><?php echo $name; ?></h1>
            <h2>Full Stack Developer</h2>
            <ul>
                <li>Mail: luilliarcec@gmail.com</li>
                <li>Phone: 1234567890</li>
                <li>LinkedIn: https://linkedin.com</li>
                <li>Twitter: @luilliarcec</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2 class="border-bottom-gray">Carrer Summary</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div>
                <h3 class="border-bottom-gray">Work Experience</h3>
                <ul>
                    <?php
                    $len = count($jobs);
                    $totalMonths = 0;

                    for ($idx = 0; $idx < $len; $idx++) {
                        if ($totalMonths > $limitMonths) {
                            break;
                        }
                        printElement($jobs[$idx]);
                    }
                    ?>
                </ul>
            </div>
            <div>
                <h3 class="border-bottom-gray">Projects</h3>
                <ul>
                    <?php
                    $len = count($projects);

                    for ($idx = 0; $idx < $len; $idx++) {
                        printElement($projects[$idx]);
                    }
                    ?>
                </ul>
                <div class="project">
                    <h5>Project X</h5>
                    <div class="row">
                        <div class="col-3">
                            <img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">
                        </div>
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius earum corporis at accusamus
                                quisquam hic quos vel? Tenetur, ullam veniam consequatur esse quod cum, quam cupiditate
                                assumenda natus maiores aperiam.</p>
                            <strong>Technologies used:</strong>
                            <span class="badge badge-secondary">PHP</span>
                            <span class="badge badge-secondary">HTML</span>
                            <span class="badge badge-secondary">CSS</span>
                        </div>
                    </div>
                </div>
                <div class="project">
                    <h5>Project X</h5>
                    <div class="row">
                        <div class="col-3">
                            <img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">
                        </div>
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius earum corporis at accusamus
                                quisquam hic quos vel? Tenetur, ullam veniam consequatur esse quod cum, quam cupiditate
                                assumenda natus maiores aperiam.</p>
                            <strong>Technologies used:</strong>
                            <span class="badge badge-secondary">PHP</span>
                            <span class="badge badge-secondary">HTML</span>
                            <span class="badge badge-secondary">CSS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <h3 class="border-bottom-gray">Skills & Tools</h3>
            <h4>Backend</h4>
            <ul>
                <li>PHP</li>
            </ul>
            <h4>Frontend</h4>
            <ul>
                <li>HTML</li>
                <li>CSS</li>
            </ul>
            <h4>Frameworks</h4>
            <ul>
                <li>Laravel</li>
                <li>Bootstrap</li>
            </ul>
            <h3 class="border-bottom-gray">Languages</h3>
            <ul>
                <li>Spanish</li>
                <li>English</li>
            </ul>
        </div>
    </div>
    <div id="resume-footer" class="row">
        <div class="col">
            Designed by @hectorbenitez
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>