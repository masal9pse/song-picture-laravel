select *
from songs
 -- inner joinだったら狙い通りを検索結果にならなかった。仮説だがおそらくleftjoinだとjoinしていないカラムも出力できると思う。
 left join comments on songs.id = comments.song_id
where songs.title like '%マリーゴールド%' or comments.comment like '%い%';

-- tagの表示
select *
from tags
 -- joinはinner joinと同じ
 join song_tag on tags.id = song_tag.tag_id
where song_id = 15

INSERT INTO song_tag
 (song_id,tag_id)
VALUES
 (:song_id, :tag_id)

INSERT INTO song_tag
 (song_id,tag_id)
VALUES
 (60, 3)

-- whereHasを使ってカラムの競合を防ぎつつsongsテーブルの値だけ取得。
-- これでpを含んだ歌詞のタイトルで、コメントに'す'が含まれるsongsテーブルのレコードを取得できる
select *
from "songs"
where "title" like '%p%' or exists (select *
 from "comments"
 where "songs"."id" = "comments"."song_id" and "comment" like '%ス%')

-- 投稿の際に紐付けの際にattachを使っている => syncだとin句を使うためよりパフォーマンスの改善が求められる。
-- タグ更新はinが使われていたが、投稿の場合はinが使われなかった。(おそらくリクエストされたバインド値が２つのため)ただ
insert into "song_tag"
 ("song_id", "tag_id")
values
 (?, ?)

-- タグの更新で発行されているSQL
delete from "song_tag" where "song_id" = ? and "tag_id" in (?, ?)

insert into "song_tag"
 ("song_id", "tag_id")
values
 (?, ?)

-- 歌詞に紐づいているタグ紐付けで検索
select *
from "songs"
where "title" like ? or "detail" like ? or exists (select *
 from "comments"
 where "songs"."id" = "comments"."song_id" and "comment" like ?) or exists (select *
 from "tags" inner join "song_tag" on "tags"."id" = "song_tag"."tag_id"
 where "songs"."id" = "song_tag"."song_id" and "title" like ?)
limit 3 offset 0 

bindValue => %アップテンポ%

-- タグと紐づいている歌詞を取得
select *
from songs
where exists(select *
from tags inner join song_tag on tags.id=song_tag.tag_id
where "songs"."id" = "song_tag"."song_id" and tags.title like '%声%')

SELECT count(tag_id)
FROM song_tag
-- join songs.id=song_tag
WHERE songs.id = song_tag.song_id
HAVING count(tag_id) = 2