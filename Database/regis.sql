CREATE TABLE registrasi(
    username VARCHAR (20) NOT NULL,
    email VARCHAR (50) NOT NULL,
    passwordd VARCHAR(100) NOT NULL,
    confrimed VARCHAR(100) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    tgl int(2) NOT NULL,
    bln VARCHAR(10) NOT NULL,
    tahun int(4) NOT NULL, 
    kota VARCHAR(20) NOT NULL,
    province VARCHAR(10) NOT NULL,
    no_phone int(13) NOT NULL,
    pekerjaan VARCHAR(20) NOT NULL,
    twitter VARCHAR(20) NOT NULL,
    PRIMARY KEY (username)
);