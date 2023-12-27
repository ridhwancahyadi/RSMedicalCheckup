# RSMedicalCheckup

## Overview

RSMedicalCheckup adalah website sederhana dalam pengelolaan medical checkup. Situs web sederhana ini memungkinkan pengguna untuk mengelola data pasien, dokter, dan pemeriksaan medis secara efisien. Harap diperhatikan bahwa proyek ini merupakan bagian dari tugas proyek kampus dalam mata kuliah Pemrograman Server Side.

## Website Akses

Kunjungi situs web [disini](http://rsmedicalcheckup.free.nf/)

## Nama Databases: medicalcheckup

Jelajahi tabel-tabel berikut di dalam database medicalcheckup:
| Tabel |
| -------------- |
| user |
| dokter |
| pasien |
| medicalcheckup |

## User Authentication

Pada versi saat ini, situs web ini tidak memiliki fitur login, sehingga dapat diakses oleh siapa saja. n. Sehingga siapapun dapat masuk ke dalam website ini sehingga data
sangat kerentanan

## Tabel Details

### Tabel User

| Nama     | Jenis       | Kunci         |
| -------- | ----------- | ------------- |
| id_user  | int(11)     | _primary key_ |
| username | varchar(50) |
| password | varchar(50) |

### Tabel Dokter

| Nama          | Jenis       | Kunci         |
| ------------- | ----------- | ------------- |
| id_dokter     | int(11)     | _primary key_ |
| sip_dokter    | varchar(50) |
| nama_dokter   | varchar(50) |
| alamat        | text        |
| nomor_telepon | varchar(15) |
| email         | varchar(50) |
| spesialisasi  | varchar(50) |

### Tabel Pasien

| Nama            | Jenis       | Kunci         |
| --------------- | ----------- | ------------- |
| id_pasien       | int(11)     | _primary key_ |
| nomor_identitas | varchar(50) |
| nama_pasien     | varchar(50) |
| tanggal_lahir   | date        |
| alamat          | text        |
| nomor_telepon   | varchar(15) |
| email           | varchar(50) |

### Tabel MedicalCheckup

| Nama            | Jenis       | Kunci         |
| --------------- | ----------- | ------------- |
| id_checkup      | int(11)     | _primary key_ |
| id_pasien       | int(11)     | _foreign key_ |
| id_dokter       | int(11)     | _foreign key_ |
| tanggal_checkup | date        |
| hasil_checkup   | varchar(50) |

Feel free to use and modify this project as needed for your academic requirements. Your feedback is valuable, and we appreciate your engagement with RSMedicalCheckup 🚀
