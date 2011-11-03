create table themebrowser_theme (
	id int not null auto_increment primary key,
	name char(48) not null,
	ts datetime not null,
	link char(72) not null,
	screenshot char(72) not null,
	index (name),
	index (ts)
);
