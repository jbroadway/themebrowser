create table themebrowser_theme (
	id integer primary key,
	name char(48) not null,
	ts datetime not null,
	link char(72) not null,
	screenshot char(72) not null
);

create index themebrowser_theme_name on themebrowser_theme (name);
create index themebrowser_theme_ts on themebrowser_theme (ts);
