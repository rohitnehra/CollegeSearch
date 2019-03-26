<html>
<head>
        <meta charset="utf-8" />
        <title>College Search</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
<body>
    You searched for <?php echo $_GET["INSTNM"]; ?><br>
    <script>
            $(document).ready(function () {
                var searchedCollege = <?php echo $_GET["INSTNM"]; ?>
                $.getJSON("CollegeSearch.json", function (colleges) {
                    
                })
            })    
    </script>
<body>
</html>