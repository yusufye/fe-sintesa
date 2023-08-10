CREATE 
VIEW `vw_pelamar_pelatihan_summary` AS
    SELECT 
        `td`.`pnddkn` AS `Pendidikan`,
        SUM((CASE
            WHEN (`ts`.`tahun` <= '2014') THEN 1
            ELSE 0
        END)) AS `2005-2014`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2015') THEN 1
            ELSE 0
        END)) AS `2015`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2016') THEN 1
            ELSE 0
        END)) AS `2016`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2017') THEN 1
            ELSE 0
        END)) AS `2017`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2018') THEN 1
            ELSE 0
        END)) AS `2018`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2019') THEN 1
            ELSE 0
        END)) AS `2019`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2020') THEN 1
            ELSE 0
        END)) AS `2020`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2021') THEN 1
            ELSE 0
        END)) AS `2021`,
        SUM((CASE
            WHEN (`ts`.`tahun` = '2022') THEN 1
            ELSE 0
        END)) AS `2022`,
        ((((((((SUM((CASE
            WHEN (`ts`.`tahun` = '2015') THEN 1
            ELSE 0
        END)) + SUM((CASE
            WHEN (`ts`.`tahun` <= '2014') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2016') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2017') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2018') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2019') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2020') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2021') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`ts`.`tahun` = '2022') THEN 1
            ELSE 0
        END))) AS `total`
    FROM
        ((`t_peserta` `tp`
        LEFT JOIN `t_datadiri` `td` ON ((`tp`.`id_datadiri` = `td`.`id_datadiri`)))
        LEFT JOIN `t_seleksi` `ts` ON ((`tp`.`id_seleksi` = `ts`.`id_seleksi`)))
    WHERE `tp`.`delstat` = 'a'
    GROUP BY `td`.`pnddkn`