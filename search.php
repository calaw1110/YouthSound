<?php
include "include/includeFiles.php";
if (isset($_GET['term'])) {
    //接搜尋字串內容
    //urldecode() 將傳入的網址解碼
    $term = urldecode($_GET['term']);
} else {
    //沒接到設為空值
    $term = "";
}
?>
<div class="searchContainer">
    <h4>搜尋 歌手、歌曲或專輯</h4>
    <input type="text" class="searchInput" value="<?php echo $term; ?>"  placeholder="請輸入心中所想的那..." onfocus="this.value=this.value">
</div>
<script>
$(function(){
    var timer;
    // 觸發時刻     按下鍵盤   按下鍵盤   放開鍵盤
    // 觸發優先順序 keydown → keypress → keyup
    $('.searchInput').keyup(function(){
        clearTimeout(timer);

        timer = setTimeout(function(){
            //接input value
            var val = $(".searchInput").val();
            openPage("search.php?term="+val);
           console.log(val);
        },500)
    })
})
</script>
