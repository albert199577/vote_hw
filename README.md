# 資料庫程式設計作業

## 投票系統
**請建立一個投票系統可以提供投票功能，並能查看投票的結果**

### 動作
1. 功能設計
    * 前台功能
        * 註冊後即可發起投票以及進行投票
        * 主頁附有搜尋投票功能
        * 投票功能主頁具有分頁依照熱門/最新投票/點閱率排序功能
        * 具有廣告輪播功能
        * 投票結果以長條圖作顯示
        * 註冊時判斷是否為重複帳號註冊
        * 投票時判斷是否重複投票，若為重複投票會產生查看投票結果連結
        * 投票時判斷是否尚未登入，若未登入會產生登入連結
    * 後台功能
        * 查看目前會員註冊資料
        * 發起投票, 編輯投票主題選項, 刪除投票
        * 設定投票啟用及關閉
        * 設定廣告圖片啟用及關閉以及更換圖片, 刪除圖片

2. 資料表設計
    * 資料表一( ad )
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |id|int(10)|UNSIGNED|  | AUTO_INCREMENT |   |
        |sh|tinyint(4)  |  |  |  |  |
        |intro|	varchar(64)  |  |  |  |  |
        |name|	varchar(64)  |  |  |  |  |
    * 資料表二( topics )
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |id|int(10)|UNSIGNED|  | AUTO_INCREMENT |   |
        |topic|varchar(128)|  |  |  |  |
        |designer|	varchar(35)  |  |  |  |  |
        |status|int(11)|  | 1 |  |  |
        |viewers|varchar(64)|  | 0 |  |  |
        |vote_sum|int(11)|  | 0 |  |  |
        |img_name|varchar(64)|  | 0 |  |  |
    * 資料表三( options )
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |id|int(10)|UNSIGNED|  | AUTO_INCREMENT |   |
        |opt|varchar(128)|  |  |  |  |
        |topic_id|int(10) | UNSIGNED |  |  |  |
        |count|	varchar(11)  |  |  |  |  |
    * 資料表四( users )
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |id|int(10)|UNSIGNED|  | AUTO_INCREMENT |   |
        |account|varchar(32)|  |  |  |  |
        |password|varchar(32)|  |  |  |  |
        |email|varchar(24)|  |  |  |  |
        |name|varchar(12)|  |  |  |  |
        |gender|varchar(1)|  |  |  |  |
        |birthday|date|  |  |  |  |
        |mobile|varchar(10) | UNSIGNED |  |  |  |
    * 資料五( user_vote )
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |id|int(11)|UNSIGNED|  | AUTO_INCREMENT |   |
        |user_id|varchar(32)  |  |  |  |  |
        |topic_id|	varchar(32)  |  |  |  |  |
3. 上傳至220的伺服器個人空間

    220個人空間網址: http://220.128.133.15/s1100405/vote/
## 評量時間
2021-12-24(星期五)