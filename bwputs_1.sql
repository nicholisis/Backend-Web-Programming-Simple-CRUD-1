CREATE DATABASE IF NOT EXISTS `bwputs_1`;
USE `bwputs_1`;

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `nip` VARCHAR(9) NOT NULL,
  `nama` VARCHAR(100) DEFAULT NULL,
  `alamat` VARCHAR(150) DEFAULT NULL,
  `departemen` VARCHAR(10) DEFAULT NULL,
  `cabang` VARCHAR(10) DEFAULT NULL,
  PRIMARY KEY (`nip`)
);

INSERT INTO `pegawai` (`nip`, `nama`, `alamat`, `departemen`, `cabang`) VALUES
('101230001', 'Andi Pratama', 'Jl. Pemuda No. 12', 'DP001', 'CB001'),
('101230002', 'Siti Rahma', 'Jl. Diponegoro No. 45', 'DP001', 'CB001'),
('101230003', 'Rian Hidayat', 'Jl. Pahlawan No. 8', 'DP002', 'CB002');

DROP TABLE IF EXISTS `departemen`;
CREATE TABLE `departemen` (
  `dept_kode` VARCHAR(5) NOT NULL,
  `dept_nama` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`dept_kode`)
);

INSERT INTO `departemen` (`dept_kode`, `dept_nama`) VALUES
('DP001', 'Technology & IT'),
('DP002', 'Human Resources'),
('DP003', 'Finance & Accounting');

DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `cabang_kode` VARCHAR(25) NOT NULL,
  `dept_kode` VARCHAR(25) NOT NULL,
  `cabang_nama` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`cabang_kode`)
);

INSERT INTO `cabang` (`cabang_kode`, `dept_kode`, `cabang_nama`) VALUES
('CB001', 'DP001', 'Kantor Pusat Surabaya'),
('CB002', 'DP001', 'Branch Office Jakarta'),
('CB003', 'DP002', 'HR Center Surabaya'),
('CB004', 'DP003', 'Finance Hub Bandung');