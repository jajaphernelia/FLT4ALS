SELECT 
    `Answer ID`
    , `School Year ID`
    , `School Year`
    , `Test Part ID`
    , `Test Part`
    , `Subject ID`
    , `Subject Name`
    , `LRN`
    , `Student Name`
    , SUM(`Checked Score`) as 'Test Score'

FROM vw_test_result
WHERE 
    `School Year ID` = 'SHYR-00001'
    AND `Test Part ID` = 'TPRT-00001'
    AND `LRN` = '102230060002'

GROUP BY `Subject ID`
ORDER BY `School Year` AND `Test Part ID` DESC

-- 
SELECT 
    `Answer ID`
    , `School Year ID`
    , `School Year`
    , `Test Part ID`
    , `Test Part`
    , `Subject ID`
    , `Subject Name`
    , `LRN`
    , `Student Name`
    , `Question Number`
    , `Max Score`
    , `Checked Score`

FROM vw_test_result
WHERE 
    `School Year ID` = 'SHYR-00001'
    AND `Test Part ID` = 'TPRT-00001'
    AND `Subject ID` = 'TSBJ-00002'
    AND `LRN` = '102230060002'

ORDER BY `Question Number`

-- als evaluation
SELECT 
    `School Year ID`
    , `School Year`
    , `Test Part ID`
    , `Test Part`
    , `LRN`
    , `Student Name`
    , SUM(`Test Score`) as 'Total Score'
    , SUM(`Max Score`) as 'Max Score'
    , CASE
        WHEN SUM(`Test Score`) >= 0 AND SUM(`Test Score`) <= 9 THEN 'Basic Level (Grade 1)'
        WHEN SUM(`Test Score`) >= 10 AND SUM(`Test Score`) <= 13 THEN 'Lower Elementrary (Grade 2-3)'
        WHEN SUM(`Test Score`) >= 14 AND SUM(`Test Score`) <= 27 THEN 'Advance Elementrary (Grade 4-6)'
        WHEN SUM(`Test Score`) >= 28 AND SUM(`Test Score`) <= 54 THEN 'Junior High School (Grade 7-10)'
        ELSE 'Error'
    END AS 'Learning Level'

FROM vw_flt_result

GROUP BY `School Year` AND `Test Part ID` AND `LRN`
ORDER BY `Subject Name`