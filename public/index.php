<?php

$request = $_SERVER['REQUEST_URI'];

function show404() {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}

if ($request !== '/') {
    //echo file_get_contents('https://fiw.fhws.de/fileadmin/share/vlplan/iCal' . $request;

    if (!preg_match('/^\/[^\/]+?\.ics$/', $request)) {
        show404();
     }

    $url = 'https://fiw.fhws.de/fileadmin/share/vlplan/iCal' . $request;
    $content = file_get_contents($url);

    if ($content === false) {
        show404();
    }

    header('Content-Type: text/calendar');

    echo iconv('iso-8859-1', 'utf-8', $content);

    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>FHWS iCal encoding fixer</title>

    <link rel="stylesheet" href="/assets/bootstrap/bootstrap.min.css" />

    <script src="/assets/vue/vue.min.js"></script>
    <script src="/assets/jquery/jquery-3.2.1.slim.min.js"></script>
    <script src="/assets/popper.js/popper.min.js"></script>
    <script src="/assets/bootstrap/bootstrap.min.js"></script>

</head>
<body>
    <div id="app">
      <header style="background-color: #FF6633 !important;" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="color: white !important">FHWS iCal encoding fixer</a>
      </header>
      <main>
        <div class="container" style="margin-top: 50px;">
          <h1 class="display-4" style="font-size: 250%">Generate iCal Link</h1>
          <div style="margin-left: 2px;">
            <form>
              <div class="form-group">
                <label for="form-target">iCal URL from <a href="https://fiw.fhws.de/" target="_blank">fwi.fhws.de</a></label>
                <input type="text" v-model="target" id="form-target" class="form-control" />
              </div>
              <div class="form-group">
                <label for="form-url">iCal URL with fixed encoding</label>
                <input type="text" :value="url" id="form-url" class="form-control" readonly />
                <small class="form-text text-muted"><a :href="url">Open</a></small>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>

    <script src="/app.js"></script>
</body>
</html>

