Структура Базы Данных

create table articles
(
    id          int auto_increment
        primary key,
    user_id     int unsigned      not null,
    title       varchar(255)      not null,
    content     text              not null,
    createdAt   datetime          null,
    img         varchar(255)      null,
    categoryId  int               null,
    isPublished tinyint default 1 null
);

create table categories
(
    name      varchar(255) not null,
    id        int auto_increment
        primary key,
    createdAt datetime     null
);

create table comments
(
    userId    int unsigned                 null,
    articleId int unsigned                 not null,
    comment   text                         not null,
    isActive  tinyint unsigned default '0' null,
    createdAt datetime                     null,
    id        int unsigned auto_increment
        primary key
);

create table users
(
    id       int unsigned auto_increment
        primary key,
    email    varchar(255) not null,
    password varchar(255) not null,
    name     varchar(255) null,
    surname  varchar(255) null,
    about    varchar(255) null,
    phone    varchar(255) null,
    login    varchar(20)  null,
    isAdmin  tinyint      null,
    constraint id_UNIQUE
        unique (id)
);
