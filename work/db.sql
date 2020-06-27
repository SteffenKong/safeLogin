create database if not exists safelogindb charset=utf8;

-- 管理员表
create table if not exists safe_admin(
    id mediumint unsigned not null auto_increment,
    account varchar(191) not null comment '账号',
    password varchar(191) not null comment '密码',
    salt varchar(191) default '!@#$%^&*()$%^&*' comment '盐值',
    status tinyint default 0 comment '状态 0 - 禁用 1 - 启用',
    created_at datetime,
    updated_at datetime,
    primary key (id),
    unique key uk_account(account),
    index idx_status (status)
)charset=utf8,engine=innodb;

insert into `safe_admin` (`account`,`password`)  VALUES('admin','$2y$10$SKz.rDgJLwNcw2YrUcyoR.kyj5vODvIHqigAbR4oav1mmpN57ayje');
insert into `safe_admin` (`account`,`password`)  VALUES('user1','$2y$10$SKz.rDgJLwNcw2YrUcyoR.kyj5vODvIHqigAbR4oav1mmpN57ayje');
insert into `safe_admin` (`account`,`password`)  VALUES('user2','$2y$10$SKz.rDgJLwNcw2YrUcyoR.kyj5vODvIHqigAbR4oav1mmpN57ayje');