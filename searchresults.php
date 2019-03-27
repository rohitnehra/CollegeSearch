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
    $(document).ready(function() {
        $("#Results").hide();
        $.getJSON("CollegeFind.json", function(colleges) {
            $("#Loading").hide();
            colleges.forEach(college => {
                if (college.INSTNM.toLowerCase().includes(searchedCollege.toLowerCase())) {
                    console.log(college)
                    const storeCollege = document.createElement("div")
                    AddTextElement(`Institution Name: ${college.INSTNM}`, storeCollege)
                    if (college.HCM2) {
                        AddTextElement("This insitution is under invenstigation.", storeCollege)
                    }
                    if (college.TRIBAL) AddTextElement("This college is a tribal college",
                        storeCollege)
                    if (college.NANTI) AddTextElement(
                        "This is a Native American non-triabl college", storeCollege)
                    if (college.MENONLY) AddTextElement("This is a men-only college",
                        storeCollege)
                    if (college.WOMENONLY) AddTextElement("This is a women-only college",
                        storeCollege)
                    if (college.MAIN && college.NUMBRANCH) {
                        AddTextElement(
                            `This is their main campus and they have ${college.NUMBRANCH} campus`,
                            storeCollege)
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
                    if (college.ZIP) {
                        AddTextElement(`ZIP: ${college.ZIP}`, storeCollege)
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
                    if (college.NPCURL) {
                        storeCollege.appendChild(document.createTextNode(
                            "Net price calculator: "))
                        const newElement = document.createElement("a");
                        newElement.setAttribute('href', "https://" + college.NPCURL)
                        newElement.setAttribute("target", "_blank")
                        newElement.appendChild(document.createTextNode(college.NPCURL))
                        storeCollege.appendChild(newElement)
                        storeCollege.appendChild(document.createElement("br"))
                    }
                    if (college.PREDDEG) {
                        switch (college.PREDDEG) {
                            case 1:
                                AddTextElement(
                                    "This college is predominantly certificate-degree granting",
                                    storeCollege)
                                break;
                            case 2:
                                AddTextElement(
                                    "This college is predominantly associate's-degree granting",
                                    storeCollege)
                                break;
                            case 3:
                                AddTextElement(
                                    "This college is predominantly bachelor's-degree granting",
                                    storeCollege)
                                break;
                            case 4:
                                AddTextElement(
                                    "This college is entirely gradute-degree granting",
                                    storeCollege)
                                break;
                        }
                    }
                    if (college.HIGHDEG) {
                        switch (college.HIGHDEG) {
                            case 0:
                                AddTextElement("This college is non-degree-granting",
                                    storeCollege)
                                break;
                            case 1:
                                AddTextElement("This college offers up to a certificate degree",
                                    storeCollege)
                                break;
                            case 2:
                                AddTextElement("This college offers up to an associate degree",
                                    storeCollege)
                                break;
                            case 3:
                                AddTextElement("This college offers up to a bachelor's degree",
                                    storeCollege)
                                break;
                            case 4:
                                AddTextElement("This college offers up to a graduate degree",
                                    storeCollege)
                                break;
                            default:
                                break;
                        }
                    }
                    if (college.CONTROL) {
                        switch (college.CONTROL) {
                            case 1:
                                AddTextElement("This is a public college", storeCollege)
                                break;
                            case 2:
                                AddTextElement("This is a private nonprofit college",
                                    storeCollege)
                                break;
                            case 3:
                                AddTextElement("This is a private for-profit college",
                                    storeCollege)
                                break;

                        }
                    }

                    if (college.ST_FIPS) {
                        switch (college.ST_FIPS) {
                            case 11:
                                AddTextElement("Located in the District of Columbia",
                                    storeCollege)
                                break;
                            case 60:
                                AddTextElement("Located in American Samoa", storeCollege)
                                break;
                            case 64:
                                AddTextElement("Located in the Federated States of Micronesia",
                                    scoreCollege)
                                break;
                            case 66:
                                AddTextElement("Located in Guam", storeCollege)
                                break;
                            case 69:
                                AddTextElement("Located in Northern Mariana Islands",
                                    storeCollege)
                                break;
                            case 70:
                                AddTextElement("Located in Palau", storeCollege)
                                break;
                            case 72:
                                AddTextElement("Located in Puerto Rico", storeCollege)
                                break;
                            case 78:
                                AddTextElement("Located in the Virgin Islands", storeCollege)
                        }
                    }
                    if (college.REGION) {
                        switch (college.REGION) {
                            case 1:
                                AddTextElement(
                                    "Located in the region of New England (CT, ME, MA, NH, RI, VT)",
                                    storeCollege)
                                break;
                            case 2:
                                AddTextElement(
                                    "Located in the region of the Mid East (DE, DC, MD, NJ, NY, PA)",
                                    storeCollege)
                                break;
                            case 3:
                                AddTextElement(
                                    "Located in the region of the Great Lakes (IL, IN, MI, OH, WI)",
                                    storeCollege)
                                break;
                            case 4:
                                AddTextElement(
                                    "Located in the region of the Plains (IA, KS, MN, MO, NE, ND, SD)",
                                    storeCollege)
                                break;
                            case 5:
                                AddTextElement(
                                    "Located in the Southeast (AL, AR, FL, GA, KY, LA, MS, NC, SC, TN, VA, WV)",
                                    storeCollege)
                                break;
                            case 6:
                                AddTextElement("Located in the Southwest (AZ, NM, OK, TX)",
                                    storeCollege)
                                break;
                            case 7:
                                AddTextElement(
                                    "Located by the Rocky Mountains (CO, ID, MT, UT, WY)",
                                    storeCollege)
                                break;
                            case 8:
                                AddTextElement(
                                    "Located in the Far West (AK, CA, HI, NV, OR, WA)",
                                    storeCollege)
                                break;
                            case 9:
                                AddTextElement(
                                    "Located in the Outlying Areas (AS, FM, GU, MH, MP, PR, PW, VI)",
                                    storeCollege)
                                break;

                        }
                    }
                    if (college.LOCALE) {
                        switch (college.LOCALE) {
                            case 11:
                                AddTextElement(
                                    "This college is located in a large city (population of 250,000 or more)",
                                    storeCollege)
                                break;
                            case 12:
                                AddTextElement(
                                    "This college is located in a midsized city (population of at least 100,000 but less than 250,000)",
                                    storeCollege)
                                break;
                            case 13:
                                AddTextElement(
                                    "This college is located in a small city (population less than 100,000)",
                                    storeCollege)
                                break;
                            case 21:
                                AddTextElement(
                                    "This college is located in a large suburb (outside principal city, in urbanized area with population of 250,000 or more)",
                                    storeCollege)
                                break;
                            case 22:
                                AddTextElement(
                                    "This college is located in a midsized suburb (outside principal city, in urbanized area with population of at least 100,000 but less than 250,000)",
                                    storeCollege)
                                break;
                            case 23:
                                AddTextElement(
                                    "This college is located in a small suburb (outside principal city, in urbanized area with population less than 100,000)",
                                    storeCollege)
                                break;
                            case 31:
                                AddTextElement(
                                    "This college is located in a frige town (in urban cluster up to 10 miles from an urbanized area)",
                                    storeCollege)
                                break;
                            case 32:
                                AddTextElement(
                                    "This college is located in a distant town (in urban cluster more than 10 miles and up to 35 miles from an urbanized area)",
                                    storeCollege)
                                break;
                            case 33:
                                AddTextElement(
                                    "This college is located in a remote town (in urban cluster more than 35 miles from an urbanized area)",
                                    storeCollege)
                                break;
                            case 41:
                                AddTextElement(
                                    "This college is located in a frige rural area (rural territory up to 5 miles from an urbanized area or up to 2.5 miles from an urban cluster)",
                                    storeCollege)
                                break;
                            case 42:
                                AddTextElement(
                                    "This college is located in a distant rural area (rural territory more than 5 miles but up to 25 miles from an urbanized area or more than 2.5 and up to 10 miles from an urban cluster)",
                                    storeCollege)
                                break;
                            case 43:
                                AddTextElement(
                                    "This college is located in a remote rural area (rural territory more than 25 miles from an urbanized area and more than 10 miles from an urban cluster)",
                                    storeCollege)
                                break;
                        }
                    }

                    if (college.CCBASIC) {
                        switch (college.CCBASIC) {
                            case 1:
                                AddTextElement("High Transfer-High Traditional", storeCollege)
                                break;
                            case 2:
                                AddTextElement("High Transfer-Mixed Traditional/Nontraditional",
                                    storeCollege)
                                break;
                            case 3:
                                AddTextElement("High Transfer-High Nontraditional",
                                    storeCollege)
                                break;
                            case 4:
                                AddTextElement(
                                    "Mixed Transfer/Vocational & Technical-High Traditional",
                                    storeCollege)
                                break;
                            case 5:
                                AddTextElement(
                                    "Mixed Transfer/Vocational & Technical-Mixed Traditional/Nontraditional",
                                    storeCollege)
                                break;
                            case 6:
                                AddTextElement(
                                    "Mixed Transfer/Vocational & Technical-High Nontraditional",
                                    storeCollege)
                                break;
                            case 7:
                                AddTextElement("High Vocational & Technical-High Traditional",
                                    storeCollege)
                                break;
                            case 8:
                                AddTextElement(
                                    "High Vocational & Technical-Mixed Traditional/Nontraditional",
                                    storeCollege)
                                break;
                            case 9:
                                AddTextElement(
                                    "High Vocational & Technical-High Nontraditional",
                                    storeCollege)
                                break;
                            case 10:
                                AddTextElement("Health Professions", storeCollege)
                                break;
                            case 11:
                                AddTextElement("Technical Professions", storeCollege)
                                break;
                            case 12:
                                AddTextElement("Arts & Design", storeCollege)
                                break;
                            case 13:
                                AddTextElement("Other Fields", storeCollege)
                                break;
                            case 14:
                                AddTextElement("Associate's Dominant", storeCollege)
                                break;
                            case 15:
                                AddTextElement("Highest Research Activity", storeCollege)
                                break;
                            case 16:
                                AddTextElement("Higher Research Activity", storeCollege)
                                break;
                            case 17:
                                AddTextElement("Moderate Research Activity", storeCollege)
                                break;
                            case 18:
                                AddTextElement("Larger Programs", storeCollege)
                                break;
                            case 19:
                                AddTextElement("Medium Programs", storeCollege)
                                break;
                            case 20:
                                AddTextElement("Small Programs", storeCollege)
                                break;
                            case 21:
                                AddTextElement("Arts & Sciences Focus", storeCollege)
                                break;
                            case 22:
                                AddTextElement("Diverse Fields", storeCollege)
                                break;
                            case 23:
                                AddTextElement("Mixed Baccalaureate/Associate's", storeCollege)
                                break;
                            case 24:
                                AddTextElement("Faith-Related Institutions", storeCollege)
                                break;
                            case 25:
                                AddTextElement("Medical Schools & Centers", storeCollege)
                                break;
                            case 26:
                                AddTextElement("Other Health Professions Schools", storeCollege)
                                break;
                            case 27:
                                AddTextElement("Engineering Schools", storeCollege)
                                break;
                            case 28:
                                AddTextElement("Other Technology-Related Schools", storeCollege)
                                break;
                            case 29:
                                AddTextElement("Business & Management Schools", storeCollege)
                                break;
                            case 30:
                                AddTextElement("Arts, Music & Design Schools", storeCollege)
                                break;
                            case 31:
                                AddTextElement("Law Schools", storeCollege)
                                break;
                            case 32:
                                AddTextElement("Other Special Focus Institutions", storeCollege)
                                break;
                            case 33:
                                AddTextElement("Tribal Colleges", storeCollege)
                                break;

                        }
                    }

                    if (college.CCUGPROF) {
                        switch (college.CCUGPROF) {
                            case 1:
                                AddTextElement("higher part-time", storeCollege)
                                break;
                            case 2:
                                AddTextElement("mixed part/full-time", storeCollege)
                                break;
                            case 3:
                                AddTextElement("medium full-time", storeCollege)
                                break;
                            case 4:
                                AddTextElement("higher full-time", storeCollege)
                                break;
                            case 5:
                                AddTextElement("higher part-time", storeCollege)
                                break;
                            case 6:
                                AddTextElement("medium full-time, inclusive, lower transfer-in",
                                    storeCollege)
                                break;
                            case 7:
                                AddTextElement(
                                    "medium full-time, inclusive, higher transfer-in",
                                    storeCollege)
                                break;
                            case 8:
                                AddTextElement("medium full-time, selective, lower transfer-in",
                                    storeCollege)
                                break;
                            case 9:
                                AddTextElement(
                                    "medium full-time , selective, higher transfer-in",
                                    storeCollege)
                                break;
                            case 10:
                                AddTextElement("full-time, inclusive, lower transfer-in",
                                    storeCollege)
                                break;
                            case 11:
                                AddTextElement("full-time, inclusive, higher transfer-in",
                                    storeCollege)
                                break;
                            case 12:
                                AddTextElement("full-time, selective, lower transfer-in",
                                    storeCollege)
                                break;
                            case 13:
                                AddTextElement("full-time, selective, higher transfer-in",
                                    storeCollege)
                                break;
                            case 14:
                                AddTextElement("full-time, more selective, lower transfer-in",
                                    storeCollege)
                                break;
                            case 15:
                                AddTextElement("full-time, more selective, higher transfer-in",
                                    storeCollege)
                                break;
                        }
                    }
                    if (college.CCSIZSET) {
                        switch (college.CCSIZSET) {
                            case 1:
                                AddTextElement("very small", storeCollege)
                                break;
                            case 2:
                                AddTextElement("small", storeCollege)
                                break;
                            case 3:
                                AddTextElement("medium", storeCollege)
                                break;
                            case 4:
                                AddTextElement("large", storeCollege)
                                break;
                            case 5:
                                AddTextElement("very large", storeCollege)
                                break;
                            case 6:
                                AddTextElement("very small, primarily nonresidential",
                                    storeCollege)
                                break;
                            case 7:
                                AddTextElement("very small, primarily residential",
                                    storeCollege)
                                break;
                            case 8:
                                AddTextElement("very small, highly residential", storeCollege)
                                break;
                            case 9:
                                AddTextElement("small, primarily nonresidential", storeCollege)
                                break;
                            case 10:
                                AddTextElement("small, primarily residential", storeCollege)
                                break;
                            case 11:
                                AddTextElement("small, highly residential", storeCollege)
                                break;
                            case 12:
                                AddTextElement("medium, primarily nonresidential", storeCollege)
                                break;
                            case 13:
                                AddTextElement("medium, primarily residential", storeCollege)
                                break;
                            case 14:
                                AddTextElement("medium, highly residential", storeCollege)
                                break;
                            case 15:
                                AddTextElement("large, primarily nonresidential", storeCollege)
                                break;
                            case 16:
                                AddTextElement("large, primarily residential", storeCollege)
                                break;
                            case 17:
                                AddTextElement("large, highly residential", storeCollege)
                                break;
                            case 18:
                                AddTextElement("Exclusively graduate/professional",
                                    storeCollege)
                                break;
                        }
                    }
                    if (college.HBCU) AddTextElement(
                        "This college is a historically black college", storeCollege)
                    if (college.PBI) AddTextElement("This college is predominantly black",
                        storeCollege)
                    if (college.ANNHI) AddTextElement(
                        "This college serves Alaska Natives and Native Hawaiians",
                        storeCollege)
                    if (college.AANAPII) AddTextElement(
                        "This college serves Asian American Natives and American Pacific Islanders",
                        storeCollege)
                    if (college.HSI) AddTextElement("This college serves hispanics",
                        storeCollege)

                    if (college.RELAFFIL) {
                        switch (college.RELAFFIL) {
                            case 22:
                                AddTextElement("American Evangelical Lutheran Church",
                                    storeCollege)
                                break;
                            case 24:
                                AddTextElement("African Methodist Episcopal Zion Church",
                                    storeCollege)
                                break;
                            case 27:
                                AddTextElement("Assemblies of God Church", storeCollege)
                                break;
                            case 28:
                                AddTextElement("Brethren Church", storeCollege)
                                break;
                            case 30:
                                AddTextElement("Roman Catholic", storeCollege)
                                break;
                            case 33:
                                AddTextElement("Wisconsin Evangelical Lutheran Synod",
                                    storeCollege)
                                break;
                            case 34:
                                AddTextElement("Christ and Missionary Alliance Church",
                                    storeCollege)
                                break;
                            case 35:
                                AddTextElement("Christian Reformed Church", storeCollege)
                                break;
                            case 36:
                                AddTextElement("Evangelical Congregational Church",
                                    storeCollege)
                                break;
                            case 37:
                                AddTextElement("Evangelical Covenant Church of America",
                                    storeCollege)
                                break;
                            case 38:
                                AddTextElement("Evangelical Free Church of America",
                                    storeCollege)
                                break;
                            case 39:
                                AddTextElement("Evangelical Lutheran Church", storeCollege)
                                break;
                            case 40:
                                AddTextElement("International United Pentecostal Church",
                                    storeCollege)
                                break;
                            case 41:
                                AddTextElement("Free Will Baptist Church", storeCollege)
                                break;
                            case 42:
                                AddTextElement("Interdenominational", storeCollege)
                                break;
                            case 43:
                                AddTextElement("Mennonite Brethren Church", storeCollege)
                                break;
                            case 44:
                                AddTextElement("Moravian Church", storeCollege)
                                break;
                            case 45:
                                AddTextElement("North American Baptist", storeCollege)
                                break;
                            case 47:
                                AddTextElement("Pentecostal Holiness Church", storeCollege)
                                break;
                            case 48:
                                AddTextElement("Christian Churches and Churches of Christ",
                                    storeCollege)
                                break;
                            case 49:
                                AddTextElement("Christian Churches and Churches of Christ",
                                    storeCollege)
                                break;
                            case 50:
                                AddTextElement("Episcopal Church, Reformed", storeCollege)
                                break;
                            case 51:
                                AddTextElement("African Methodist Episcopal", storeCollege)
                                break;
                            case 52:
                                AddTextElement("American Baptist", storeCollege)
                                break;
                            case 53:
                                AddTextElement("American Lutheran", storeCollege)
                                break;
                            case 54:
                                AddTextElement("Baptist", storeCollege)
                                break;
                            case 55:
                                AddTextElement("Christian Methodist Episcopal", storeCollege)
                                break;
                            case 57:
                                AddTextElement("Church of God", storeCollege)
                                break;
                            case 58:
                                AddTextElement("Church of Brethren", storeCollege)
                                break;
                            case 59:
                                AddTextElement("Church of the Nazarene", storeCollege)
                                break;
                            case 60:
                                AddTextElement("Cumberland Presbyterian", storeCollege)
                                break;
                            case 61:
                                AddTextElement("Christian Church (Disciples of Christ)",
                                    storeCollege)
                                break;
                            case 64:
                                AddTextElement("Free Methodist", storeCollege)
                                break;
                            case 65:
                                AddTextElement("Friends", storeCollege)
                                break;
                            case 66:
                                AddTextElement("Presbyterian Church (USA)", storeCollege)
                                break;
                            case 67:
                                AddTextElement("Lutheran Church in America", storeCollege)
                                break;
                            case 68:
                                AddTextElement("Lutheran Church - Missouri Synod", storeCollege)
                                break;
                            case 69:
                                AddTextElement("Mennonite Church", storeCollege)
                                break;
                            case 71:
                                AddTextElement("United Methodist", storeCollege)
                                break;
                            case 73:
                                AddTextElement("Protestant Episcopal", storeCollege)
                                break;
                            case 74:
                                AddTextElement("Churches of Christ", storeCollege)
                                break;
                            case 75:
                                AddTextElement("Southern Baptist", storeCollege)
                                break;
                            case 76:
                                AddTextElement("United Church of Christ", storeCollege)
                                break;
                            case 77:
                                AddTextElement("Protestant, not specified", storeCollege)
                                break;
                            case 78:
                                AddTextElement("Multiple Protestant Denomination", storeCollege)
                                break;
                            case 79:
                                AddTextElement("Other Protestant", storeCollege)
                                break;
                            case 80:
                                AddTextElement("Jewish", storeCollege)
                                break;
                            case 81:
                                AddTextElement("Reformed Presbyterian Church", storeCollege)
                                break;
                            case 84:
                                AddTextElement("United Brethren Church", storeCollege)
                                break;
                            case 87:
                                AddTextElement("Missionary Church Inc", storeCollege)
                                break;
                            case 88:
                                AddTextElement("Undenominational", storeCollege)
                                break;
                            case 89:
                                AddTextElement("Wesleyan", storeCollege)
                                break;
                            case 91:
                                AddTextElement("Greek Orthodox", storeCollege)
                                break;
                            case 92:
                                AddTextElement("Russian Orthodox", storeCollege)
                                break;
                            case 93:
                                AddTextElement("Unitarian Universalist", storeCollege)
                                break;
                            case 94:
                                AddTextElement("Latter Day Saints (Mormon Church)",
                                    storeCollege)
                                break;
                            case 95:
                                AddTextElement("Seventh Day Adventists", storeCollege)
                                break;
                            case 97:
                                AddTextElement("The Presbyterian Church in America",
                                    storeCollege)
                                break;
                            case 99:
                                AddTextElement("Other (none of the above)", storeCollege)
                                break;
                            case 100:
                                AddTextElement("Original Free Will Baptist", storeCollege)
                                break;
                            case 101:
                                AddTextElement("Ecumenical Christian", storeCollege)
                                break;
                            case 102:
                                AddTextElement("Evangelical Christian", storeCollege)
                                break;
                            case 103:
                                AddTextElement("Presbyterian", storeCollege)
                                break;
                            case 105:
                                AddTextElement("General Baptist", storeCollege)
                                break;
                            case 106:
                                AddTextElement("Muslim", storeCollege)
                                break;
                            case 107:
                                AddTextElement("Plymouth Brethren", storeCollege)
                                break;
                        }
                    }

                    if (college.ADM_RATE) AddTextElement(
                        `This college has an admissions rate of ${college.ADM_RATE * 100}%`,
                        storeCollege)

                    if (college.SATVR25 && college.SATVR75 && college.SATMT25 && college
                        .SATMT75 && college.SATVRMID && college.SATMTMID) {
                        const ctx = document.createElement("canvas")
                        ctx.height = "500px"
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["25th Precentile", "Midpoint",
                                    "75th Precentile"
                                ],
                                datasets: [{
                                    label: "Math",
                                    data: [{
                                        y: college.SATMT25,
                                        x: 1
                                    }, {
                                        y: college.SATMTMID,
                                        x: 2
                                    }, {
                                        y: college.SATMT75,
                                        x: 3
                                    }],
                                    backgroundColor: "rgba(241, 169, 160, 1)",
                                    borderColor: "rgba(210, 77, 87, 1)",
                                    fill: false
                                }, {
                                    label: "Critical Reading",
                                    data: [{
                                        y: college.SATVR25,
                                        x: 1
                                    }, {
                                        y: college.SATVRMID,
                                        x: 2
                                    }, {
                                        y: college.SATVR75,
                                        x: 3
                                    }],
                                    backgroundColor: "rgba(129, 207, 224, 1)",
                                    borderColor: "rgba(0, 181, 204, 1)",
                                    fill: false
                                }]
                            },
                            options: {
                                responseive: true,
                                title: {
                                    display: true,
                                    text: "College SAT scores"
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            min: 200,
                                            max: 800
                                        },
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: "Score"
                                        }
                                    }],
                                    xAxes: [{
                                        display: false
                                    }]
                                }
                            }
                        })
                        storeCollege.appendChild(ctx)

                    }

                    if (college.ACTEN25 && college.ACTEN75 && college.ACTMT25 && college.ACTMT75 && college.ACTENMID && college.ACTMTMID) {
                        const ctx = document.createElement("canvas")
                        ctx.height = "500px"
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["25th Precentile", "Midpoint",
                                    "75th Precentile"
                                ],
                                datasets: [{
                                    label: "Math",
                                    data: [{
                                        y: college.ACTMT25,
                                        x: 1
                                    }, {
                                        y: college.ACTMTMID,
                                        x: 2
                                    }, {
                                        y: college.ACTMT75,
                                        x: 3
                                    }],
                                    backgroundColor: "rgba(241, 169, 160, 1)",
                                    borderColor: "rgba(210, 77, 87, 1)",
                                    fill: false
                                }, {
                                    label: "English",
                                    data: [{
                                        y: college.ACTEN25,
                                        x: 1
                                    }, {
                                        y: college.ACTENMID,
                                        x: 2
                                    }, {
                                        y: college.ACTEN75,
                                        x: 3
                                    }],
                                    backgroundColor: "rgba(129, 207, 224, 1)",
                                    borderColor: "rgba(0, 181, 204, 1)",
                                    fill: false
                                }]
                            },
                            options: {
                                responseive: true,
                                title: {
                                    display: true,
                                    text: "College ACT scores"
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            min: 1,
                                            max: 36
                                        },
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: "Score"
                                        }
                                    }],
                                    xAxes: [{
                                        display: false
                                    }]
                                }
                            }
                        })
                        storeCollege.appendChild(ctx)

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