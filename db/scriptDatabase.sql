drop database ws_pos;
create database ws_pos;
use ws_pos;

create table produk(
    id_produk int not null primary key auto_increment,
    nama_produk varchar(50),
    harga_produk int,
    stok_produk int,
    gambar_produk varchar(200),
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE now()
);

create table user(
    id_user int not null primary key auto_increment,
    username_user varchar(50),
    password_user varchar(200),
    token_user varchar(100),
    token_expired_user date,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE now()
);

insert into user(username_user, password_user, token_user, token_expired_user)
values ("admin","$2y$10$q0DrhEnL7nQMBxxwtqxjuunMFiaBgLDfWTKXVc1CJdiQRT/M3L6ta",md5('as'),"2019-09-04");
