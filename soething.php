





<!-- 利用form表單送出變數修改,搜尋,新增,編輯databass的table資料 -->
SELECT host,type, zone FROM dns_records limit 1, 10
<搜尋host,type,zone,from table名稱 限制筆數1~10>
INSERT INTO `dns_records`(`ser_no`, `zone`, `host`, `type`, `data`, `ttl`, `mx_priority`, `refresh`, `retry`, `expire`, `minimum`, `serial`, `resp_person`, `primary_ns`)
VALUES (0, 'mytest', 'myhost', 'A', '1.1.1.1', 3600, null, null, null, null, null, null, null, null)
<新增至table名稱(欄位)values(各欄位放入參數)>

UPDATE `dns_records`
   SET host = 'my modify'
WHERE zone = 'mytest'
<編輯`table名稱
set編輯項目='所要修改的名稱'(用and直接加入所需要的編輯項目='所要修改的名稱'以,區隔)
指定符合欄位='指定名稱'>
DELETE FROM `dns_records` WHERE zone = 'mytest'
<刪除來源table`名稱` 指定欄位='所指定的欄位'>


SELECT * FROM `dns_records` WHERE host = "www" and type = "A"