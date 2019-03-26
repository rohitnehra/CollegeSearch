const fs = require("fs");
let allColleges = {}
const stringKeys = ["INSTNM", "CITY", "STABBR", "INSTURL", "NPCURL", "NUMBRANCH", "ALIAS"]

const numberKeys = ["ZIP", "PREDDEG", "HIGHDEG", "CONTROL", "REGION", "LOCALE", "CCBASIC", "CCUGPROF", "CCSIZSET", "RELAFFIL", "SATVR25", "SATVR75", "SATMT25", "SATMT75", "SATVRMID", "SATMTMID", "ACTCM25", "ACTCM75", "ACTEN25", "ACTEN75", "ACTMT25", "ACTMT75", "ACTCMMID", "ACTENMID", "ACTMTMID", "SAT_AVG", "UGDS", "UG", "NPT4_PUB", "NPT4_PRIV", "NPT41_PUB", "NPT42_PUB", "NPT43_PUB", "NPT44_PUB", "NPT45_PUB", "NPT41_PRIV", "NPT42_PRIV", "NPT43_PRIV", "NPT44_PRIV", "NPT45_PRIV", "NPT4_048_PUB", "NPT4_048_PRIV", "NPT4_3075_PUB", "NPT4_3075_PRIV", "NPT4_75UP_PUB", "NPT4_75UP_PRIV", "NUM4_PUB", "NUM4_PRIV", "NUM42_PUB", "NUM43_PUB", "NUM44_PUB", "NUM45_PUB", "NUM41_PRIV", "NUM42_PRIV", "NUM43_PRIV", "NUM44_PRIV", "NUM45_PRIV", "COSTT4_A", "COSTT4_P", "TUITIONFEE_IN", "TUITIONFEE_OUT", "TUITFTE", "D150_4", "D150_L4", "D200_4", "D200_L4", "LATITUDE", "LONGITUDE", "ADM_RATE", "PCIP01", "PCIP03", "PCIP04", "PCIP05", "PCIP09", "PCIP10", "PCIP11", "PCIP12", "PCIP13", "PCIP14", "PCIP15", "PCIP16", "PCIP19", "PCIP22", "PCIP23", "PCIP24", "PCIP25", "PCIP26", "PCIP27", "PCIP29", "PCIP30", "PCIP31", "PCIP38", "PCIP39", "PCIP40", "PCIP41", "PCIP42", "PCIP43", "PCIP44", "PCIP45", "PCIP46", "PCIP47", "PCIP48", "PCIP49", "PCIP50", "PCIP51", "PCIP52", "PCIP54", "UGDS_WHITE", "UGDS_BLACK", "UGDS_HISP", "UGDS_ASIAN", "UGDS_AIAN", "UGDS_NHPI", "UGDS_2MOR", "UGDS_NRA", "UGDS_UNKN", "PPTUG_EF", "PFTFAC", "PCTPELL", "C150_4", "C150_L4", "PFTFTUG1_EF", "C150_4_WHITE", "C150_4_BLACK", "C150_4_HISP", "C150_4_ASIAN", "C150_4_AIAN", "C150_4_NHPI", "C150_4_2MOR", "C150_4_NRA", "C150_4_UNKN", "C150_L4_WHITE", "C150_L4_BLACK", "C150_L4_HISP", "C150_L4_ASIAN", "C150_L4_AIAN", "C150_L4_NHPI", "C150_L4_2MOR", "C150_L4_NRA", "C150_L4_UNKN", "C200_4", "C200_L4", "RET_FT4", "RET_FTL4", "RET_PT4", "RET_PTL4", "PCTFLOAN", "RPY_3YR_RT", "COMPL_RPY_3YR_RT", "NONCOM_RPY_3YR_RT", "LO_INC_RPY_3YR_RT", "MD_INC_RPY_3YR_RT", "HI_INC_RPY_3YR_RT", "DEP_RPY_3YR_RT", "IND_RPY_3YR_RT", "PELL_RPY_3YR_RT", "NOPELL_RPY_3YR_RT", "FEMALE_RPY_3YR_RT", "MALE_RPY_3YR_RT", "FIRSTGEN_RPY_3YR_RT", "NOTFIRSTGEN_RPY_3YR_RT", "RPY_5YR_RT", "COMPL_RPY_5YR_RT", "NONCOM_RPY_5YR_RT", "LO_INC_RPY_5YR_RT", "MD_INC_RPY_5YR_RT", "HI_INC_RPY_5YR_RT", "DEP_RPY_5YR_RT", "IND_RPY_5YR_RT", "PELL_RPY_5YR_RT", "NOPELL_RPY_5YR_RT", "FEMALE_RPY_5YR_RT", "MALE_RPY_5YR_RT", "FIRSTGEN_RPY_5YR_RT", "NOTFIRSTGEN_RPY_5YR_RT", "RPY_7YR_RT", "COMPL_RPY_7YR_RT", "NONCOM_RPY_7YR_RT", "LO_INC_RPY_7YR_RT", "MD_INC_RPY_7YR_RT", "HI_INC_RPY_7YR_RT", "DEP_RPY_7YR_RT", "IND_RPY_7YR_RT", "PELL_RPY_7YR_RT", "NOPELL_RPY_7YR_RT", "FEMALE_RPY_7YR_RT", "MALE_RPY_7YR_RT", "FIRSTGEN_RPY_7YR_RT", "NOTFIRSTGEN_RPY_7YR_RT", "INC_PCT_LO", "DEP_STAT_PCT_IND", "IND_INC_PCT_LO", "DEP_INC_PCT_LO", "PAR_ED_PCT_1STGEN", "PAR_ED_PCT_MS", "PAR_ED_PCT_HS", "PAR_ED_PCT_PS", "CDR3", "INC_PCT_M1", "INC_PCT_M2", "INC_PCT_H1", "INC_PCT_H2", "DEP_INC_PCT_M1", "DEP_INC_PCT_M2", "DEP_INC_PCT_H1", "DEP_INC_PCT_H2", "IND_INC_PCT_M1", "IND_INC_PCT_M2", "IND_INC_PCT_H1", "IND_INC_PCT_H2", "APPL_SCH_PCT_GE2", "APPL_SCH_PCT_GE3", "APPL_SCH_PCT_GE4", "APPL_SCH_PCT_GE5", "DEP_INC_AVG", "IND_INC_AVG", "DEBT_MDN", "GRAD_DEBT_MDN", "WDRAW_DEBT_MDN", "LO_INC_DEBT_MDN", "MD_INC_DEBT_MDN", "HI_INC_DEBT_MDN", "DEP_DEBT_MDN", "IND_DEBT_MDN", "PELL_DEBT_MDN", "NOPELL_DEBT_MDN", "FEMALE_DEBT_MDN", "MALE_DEBT_MDN", "FIRSTGEN_DEBT_MDN", "NOTFIRSTGEN_DEBT_MDN", "DEBT_N", "GRAD_DEBT_N", "WDRAW_DEBT_N", "LO_INC_DEBT_N", "MD_INC_DEBT_N", "HI_INC_DEBT_N", "DEP_DEBT_N", "IND_DEBT_N", "PELL_DEBT_N", "NOPELL_DEBT_N", "MALE_DEBT_N", "FEMALE_DEBT_N", "FIRSTGEN_DEBT_N", "NOTFIRSTGEN_DEBT_N", "GRAD_DEBT_MDN10YR", "CUML_DEBT_N", "CUML_DEBT_P90", "CUML_DEBT_P75", "CUML_DEBT_P25", "CUML_DEBT_P10", "INC_N", "DEP_INC_N", "IND_INC_N", "DEP_STAT_N", "PAR_ED_N", "APPL_SCH_N", "RPY_3YR_N", "COMPL_RPY_3YR_N", "NONCOM_RPY_3YR_N", "LO_INC_RPY_3YR_N", "MD_INC_RPY_3YR_N", "HI_INC_RPY_3YR_N", "DEP_RPY_3YR_N", "IND_RPY_3YR_N", "PELL_RPY_3YR_N", "NOPELL_RPY_3YR_N", "MALE_RPY_3YR_N", "FEMALE_RPY_3YR_N", "FIRSTGEN_RPY_3YR_N", "NOTFIRSTGEN_RPY_3YR_N", "RPY_5YR_N", "COMPL_RPY_5YR_N", "NONCOM_RPY_5YR_N", "LO_INC_RPY_5YR_N", "MD_INC_RPY_5YR_N", "HI_INC_RPY_5YR_N", "DEP_RPY_5YR_N", "IND_RPY_5YR_N", "PELL_RPY_5YR_N", "NOPELL_RPY_5YR_N", "MALE_RPY_5YR_N", "FEMALE_RPY_5YR_N", "FIRSTGEN_RPY_5YR_N", "NOTFIRSTGEN_RPY_5YR_N", "RPY_7YR_N", "COMPL_RPY_7YR_N", "NONCOM_RPY_7YR_N", "LO_INC_RPY_7YR_N", "MD_INC_RPY_7YR_N", "HI_INC_RPY_7YR_N", "DEP_RPY_7YR_N", "IND_RPY_7YR_N", "PELL_RPY_7YR_N", "NOPELL_RPY_7YR_N", "MALE_RPY_7YR_N", "FEMALE_RPY_7YR_N", "FIRSTGEN_RPY_7YR_N", "NOTFIRSTGEN_RPY_7YR_N", "COUNT_ED", "LOAN_EVER", "PELL_EVER", "AGE_ENTRY", "FEMALE", "MARRIED", "DEPENDENT", "VETERAN", "FIRST_GEN", "FAMINC", "MD_FAMINC", "FAMINC_IND", "C100_4", "D100_4", "C100_L4", "D100_L4", "TRANS_4", "DTRANS_4", "TRANS_L4", "DTRANS_L4", "ICLEVEL", "UGDS_MEN", "UGDS_WOMEN", "CDR3_DENOM", "D_PCTPELL_PCTFLOAN", "UGNONDS", "GRADS", "D150_4_WHITE", "D150_4_BLACK", "D150_4_HISP", "D150_4_ASIAN", "D150_4_AIAN", "D150_4_NHPI", "D150_4_2MOR", "D150_4_NRA", "D150_4_UNKN", "D150_L4_WHITE", "D150_L4_BLACK", "D150_L4_HISP", "D150_L4_ASIAN", "D150_L4_AIAN", "D150_L4_NHPI", "D150_L4_2MOR", "D150_L4_NRA", "D150_L4_UNKN", "OMACHT6_FTFT", "OMAWDP6_FTFT", "OMACHT8_FTFT", "OMAWDP8_FTFT", "OMENRYP8_FTFT", "OMENRAP8_FTFT", "OMENRUP8_FTFT", "OMACHT6_PTFT", "OMAWDP6_PTFT", "OMACHT8_PTFT", "OMAWDP8_PTFT", "OMENRYP8_PTFT", "OMENRAP8_PTFT", "OMENRUP8_PTFT", "OMACHT6_FTNFT", "OMAWDP6_FTNFT", "OMACHT8_FTNFT", "OMAWDP8_FTNFT", "OMENRYP8_FTNFT", "OMENRAP8_FTNFT", "OMENRUP8_FTNFT", "OMACHT6_PTNFT", "OMAWDP6_PTNFT", "OMACHT8_PTNFT", "OMAWDP8_PTNFT", "OMENRYP8_PTNFT", "OMENRAP8_PTNFT", "OMENRUP8_PTNFT", "C150_4_PELL", "D150_4_PELL", "C150_L4_PELL", "D150_L4_PELL", "C150_4_LOANNOPELL", "D150_4_LOANNOPELL", "C150_L4_LOANNOPELL", "D150_L4_LOANNOPELL", "C150_4_NOLOANNOPELL", "D150_4_NOLOANNOPELL", "C150_L4_NOLOANNOPELL", "D150_L4_NOLOANNOPELL"]

const boolKeys = ["HCM2", "MAIN", "HBCU", "PBI", "ANNHI", "TRIBAL", "AANAPII", "HSI", "NANTI", "MENONLY", "WOMENONLY", "DISTANCEONLY", "CURROPER", "OPENADMP"]
fs.readFile("./MERGED2016_17_PPFIXED.csv", 'utf8', function (err, data) {
    if (err) console.log(err);
    else {
        const colleges = data.split("\n"); //each line
        const key = colleges[0].split(","); //the top line
        for (let i = 1; i < colleges.length; i++) {
            const college = colleges[i].split(","); //college
            const institutionName = college[3]
            if (institutionName) {
                allColleges[institutionName] = {}
                for (let x = 4; x < key.length; x++) {
                    if (college[x] == 'NULL' || college[x] == 'PrivacySuppressed' || !college[x]) college[x] = null;
                    else {
                        if (college[x].includes("*")) {
                            college[x] = college[x].replace(/\*/g, ",");
                        }
                    }
                    if (key[x].includes("ASSOC") || key[x].includes("BACHL")) {
                        if (college[x] == "1") {
                            allColleges[institutionName][key[x]] = true
                        } else {
                            allColleges[institutionName][key[x]] = false
                        } 
                    } else if (numberKeys.includes(key[x])) {
                        if (college[x] == null) {
                            
                        }  else if (college[x].includes("-") || college[x].includes("/") || key[x] == "ZIP") { 
                            allColleges[institutionName][key[x]] = college[x]
                        } else if (college[x].includes(".")) {
                            //parseFloat
                            allColleges[institutionName][key[x]] = parseFloat(college[x])
                            
                        } else {
                            //parseInt
                            allColleges[institutionName][key[x]] = parseInt(college[x])
                            
                        }
                    } else if (boolKeys.includes(key[x])) {
                        if (college[x] == "1" || college[x] == "2") {
                            //true
                            allColleges[institutionName][key[x]] = true;
                        } else {
                            allColleges[institutionName][key[x]] = false;
                        }
                    } else if (stringKeys.includes(key[x])) {
                        allColleges[institutionName][key[x]] = college[x]
                    }
                }
            }
            
        }

        fs.writeFile("CollegeSearch.json", JSON.stringify(allColleges), err => {
            if (err) console.log(err)
            else ("DONE")
        })
    }
})