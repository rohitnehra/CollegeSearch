<html>
<head>
        <meta charset="utf-8" />
        <title>College Search</title>
        <script src="./scripts/jquery-3.3.1.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css" />
        <script src="./scripts/chart.js/dist/Chart.js"></script>
        
    </head>
<body>
    <?php $institutionname = $_GET["INSTNM"]; ?>
    You searched for <?php echo $institutionname; ?><br>
    <div id="Loading">
        <p id="status"></p>
        <div class="loader"></div> 
    </div>
    <div id="Results">

    </div>
    <script>
        var searchedCollege = "<?php echo $institutionname; ?>";
        $(document).ready(function () {
            $("#Results").hide();
            $.getJSON("CollegeFind.json", function (colleges) {    
                $("#Loading").hide();        
                colleges.forEach(college => {
                    if (college.INSTNM.includes(searchedCollege)) {
                        console.log(college)
                        const storeCollege = document.createElement("div")
                        storeCollege
                    }
                });
                $("#Results").show();
            })
        })    
    </script>
<body>
</html>