CREATE OR REPLACE
VIEW `vw_penilai_daerah_summary` AS
    SELECT 
        (CASE
            WHEN
                ((`u`.`kemcategory` = 0)
                    OR (`u`.`kemcategory` = 1))
            THEN
                'Pusat'
            WHEN
                ((`u`.`kemcategory` = 2)
                    OR (`u`.`kemcategory` = 3))
            THEN
                'Daerah'
        END) AS `Program`,
        SUM((CASE
            WHEN (`u`.`jabatan` = '1') THEN 1
            ELSE 0
        END)) AS `Perencana Ahli Pertama`,
        SUM((CASE
            WHEN (`u`.`jabatan` = '2') THEN 1
            ELSE 0
        END)) AS `Perencana Ahli Muda`,
        SUM((CASE
            WHEN (`u`.`jabatan` = '3') THEN 1
            ELSE 0
        END)) AS `Perencana Ahli Madya`,
        SUM((CASE
            WHEN (`u`.`jabatan` = '4') THEN 1
            ELSE 0
        END)) AS `Perencana Ahli Utama`,
        SUM((CASE
            WHEN (`u`.`jabatan` = '5') THEN 1
            ELSE 0
        END)) AS `Administrator`,
        ((((SUM((CASE
            WHEN (`u`.`jabatan` = '1') THEN 1
            ELSE 0
        END)) + SUM((CASE
            WHEN (`u`.`jabatan` = '2') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`u`.`jabatan` = '3') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`u`.`jabatan` = '4') THEN 1
            ELSE 0
        END))) + SUM((CASE
            WHEN (`u`.`jabatan` = '5') THEN 1
            ELSE 0
        END))) AS `total`
    FROM
        (((`user` `u`
        LEFT JOIN `edupak_periodes` `ep` ON ((`u`.`id` = `ep`.`iduser`)))
        LEFT JOIN `jabatans` `j` ON ((`u`.`jabatan` = `j`.`tingkat_jabatan`)))
        LEFT JOIN `kementrians` `k` ON ((`u`.`id_kementrian` = `k`.`id`)))
    WHERE
        ((`u`.`level` = 'pp')
            AND (`u`.`approved` = 1)
            AND (`u`.`status` = 1)
            AND ((`u`.`kemcategory` = 2)
            OR (`u`.`kemcategory` = 3)))
    GROUP BY `u`.`kemcategory`