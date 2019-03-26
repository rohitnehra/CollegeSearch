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
                        AddTextElement(`Institution Name: ${college.INSTNM}`, storeCollege)
                        if (college.HCM2) {
                            AddTextElement("This insitution is under invenstigation.", storeCollege)
                        }
                        if (college.MAIN && college.NUMBRANCH) {
                            AddTextElement(`This is their main campus and they have ${college.NUMBRANCH} campus`, storeCollege)
                        } else if (college.MAIN) {
                            AddTextElement("This is their main campus", storeCollege)
                        } else if (college.NUMBRANCH) {
                            AddTextElement(`They have ${college.NUMBRANCH} campus'`, storeCollege)
                        }
                        if (college.CITY) {
                            AddTextElement(`City: ${college.CITY}`, storeCollege)
                        }
                        if (college.STABBR) {
                            AddTextElement(`State: ${college.STABBR}`, storeCollege)
                        }
                        if (college.INSTURL) {
                            storeCollege.appendChild(document.createTextNode("URL: "))
                            const newElement = document.createElement("a");
                            newElement.setAttribute('href', "https://" + college.INSTURL)
                            newElement.setAttribute("target", "_blank")
                            newElement.appendChild(document.createTextNode(college.INSTURL))
                            storeCollege.appendChild(newElement)
                            storeCollege.appendChild(document.createElement("br"))
                        }
                        if (college.PREDDEG) {
                            switch (college.PREDDEG) {
                                case 1: 
                                    AddTextElement("This college is predominantly certificate-degree granting", storeCollege)
                                    break;
                                case 2:
                                    AddTextElement("This college is predominantly associate's-degree granting", storeCollege)
                                    break;
                                case 3:
                                    AddTextElement("This college is predominantly bachelor's-degree granting", storeCollege)
                                    break;
                                case 4: 
                                    AddTextElement("This college is entirely gradute-degree granting", storeCollege)
                                    break;
                            }
                        }
                        if (college.HIGHDEG) {
                            switch (college.HIGHDEG) {
                                case 0:
                                    AddTextElement("This college is non-degree-granting", storeCollege)
                                    break;
                                case 1: 
                                    AddTextElement("This college offers up to a certificate degree", storeCollege)
                                    break;
                                case 2: 
                                    AddTextElement("This college offers up to an associate degree", storeCollege)
                                    break;
                                case 3: 
                                    AddTextElement("This college offers up to a bachelor's degree", storeCollege)
                                    break;
                                case 4:
                                    AddTextElement("This college offers up to a graduate degree", storeCollege)
                                    break;
                                default:
                                    break;
                            }
                        }
                        if (college.CONTROL == 2) {
                            AddTextElement("This is a 4 year college",storeCollege)
                        } else if (college.CONTROL == 1) {
                            AddTextElement("This is a 2 year college", storeCollege)
                        } else if (college.CONTROL == 0) {
                            AddTextElement("This is a degree granting institution", storeCollege)
                        }

                        //Figure out what region numbers relate too

                        if (college.LOCALE) {
                            switch (college.LOCALE) {
                                case 11:
                                    AddTextElement("This college is located in a large city", storeCollege)
                                    break;
                                case 12:
                                    AddTextElement("This college is located in a midsized city", storeCollege)
                                    break;
                                case 13:
                                    AddTextElement("This college is located in a small city", storeCollege)
                                    break;
                                case 21:
                                    AddTextElement("This college is located in a large suburb", storeCollege)
                                    break;
                                case 22:
                                    AddTextElement("This college is located in a midsized suburb", storeCollege)
                                    break;
                                case 23:
                                    AddTextElement("This college is located in a small suburb", storeCollege)
                                    break;
                                case 31:
                                    AddTextElement("This college is located in a frige town", storeCollege)
                                    break;
                                case 32:
                                    AddTextElement("This college is located in a distant town", storeCollege)
                                    break;
                                case 33:
                                    AddTextElement("This college is located in a remote town", storeCollege)
                                    break;
                                case 41:
                                    AddTextElement("This college is located in a frige rural area", storeCollege)
                                    break;
                                case 42:
                                    AddTextElement("This college is located in a distant rural area", storeCollege)
                                    break;
                                case 43: 
                                    AddTextElement("This college is located in a remote rural area", storeCollege)
                                    break;
                            }
                        }
                        document.getElementById("Results").appendChild(storeCollege)
                    }
                });
                $("#Results").show();
            })
        })    
        function AddTextElement(text, div) {
            div.appendChild(document.createTextNode(text))
            div.appendChild(document.createElement("br"))
        }
    </script>
<body>
</html>