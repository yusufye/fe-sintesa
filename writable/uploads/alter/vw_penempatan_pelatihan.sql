CREATE OR REPLACE
VIEW `vw_penempatan_pelatihan` AS
    SELECT 
        `td`.`nama` AS `nama`,
        `td`.`gender` AS `gender`,
        `td`.`wilayah` AS `wilayah`,
        `td`.`prop_inst` AS `prop_rmh`,
        `td`.`kab_inst` AS `kab_inst`,
        `td`.`nama_inst` AS `nama_inst`,
        `td`.`unit_kerja` AS `unit_kerja`,
        `td`.`pnddkn` AS `pnddkn`,
        `td`.`jurusan` AS `jurusan`,
        `td`.`email` AS `email`,
        `td`.`prop_inst` AS `prop_inst`,
        `tp`.`penempatan` AS `penempatan`,
        `tp`.`pstat` AS `pstat`,
        `ts`.`tahun` AS `tahun`,
        `tp`.`kode_program` AS `kode_program`
    FROM
        ((`t_peserta` `tp`
        LEFT JOIN `t_datadiri` `td` ON ((`tp`.`id_datadiri` = `td`.`id_datadiri`)))
        LEFT JOIN `t_seleksi` `ts` ON ((`tp`.`id_seleksi` = `ts`.`id_seleksi`)))
    WHERE
        ((`tp`.`penempatan` <> '')
            AND (`tp`.`pstat` = 1)
            AND ((`ts`.`nama` LIKE '%NON GELAR%')
            OR (`ts`.`nama` LIKE '%NONGELAR%')))
    ORDER BY `ts`.`tahun` DESC