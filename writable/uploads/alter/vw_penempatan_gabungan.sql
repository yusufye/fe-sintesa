CREATE OR REPLACE VIEW `vw_penempatan_gabungan` AS
SELECT 
        `td`.`nama` AS `nama`,
        `td`.`gender` AS `gender`,
        `td`.`wilayah` AS `wilayah`,
        `td`.`prop_inst` AS `prop_rmh`,
        `td`.`kab_inst` AS `kab_inst`,
        `td`.`nama_inst` AS `nama_inst`,
        `td`.`pnddkn` AS `pnddkn`,
        `td`.`jurusan` AS `jurusan`,
        td.email,
        td.prop_inst,
        `tp`.`penempatan` AS `penempatan`,
        `tp`.`pstat` AS `pstat`,
        `ts`.`tahun` AS `tahun`,
        COUNT(`tp`.`id_peserta`) AS `Jumlah`
    FROM
        ((`t_peserta` `tp`
        LEFT JOIN `t_datadiri` `td` ON ((`tp`.`id_datadiri` = `td`.`id_datadiri`)))
        LEFT JOIN `t_seleksi` `ts` ON ((`tp`.`id_seleksi` = `ts`.`id_seleksi`)))
    WHERE
        ((`ts`.`nama` LIKE '%GELAR%')
            AND (`tp`.`delstat` = 'a')
            AND (`tp`.`penempatan` <> ''))
    GROUP BY `tp`.`id_peserta`
    ORDER BY `ts`.`tahun` DESC