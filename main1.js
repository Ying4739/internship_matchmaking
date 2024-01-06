$(document).ready(function () {
    // 當頁面載入完成後執行

    // 監聽 submitBtn 按鈕的點擊事件
    $("#submitBtn").click(function () {
        // 獲取輸入框的值
        var feedbackText = $("input[type='text']").val();

        // 使用 AJAX 向後端發送請求
        $.ajax({
            type: "POST", // 使用 POST 方法
            url: "submit_feedback.php", // 指向處理請求的後端腳本
            data: { comment: feedbackText }, // 傳遞給後端的資料
            success: function (response) {
                // 在成功時執行的函數
                console.log(response); // 可以在控制台查看後端的回應
                // 彈出提示框
                alert('Submit Successfully');
                // 清除輸入框的內容
                $("input[type='text']").val('');
            },
            error: function (error) {
                // 在發生錯誤時執行的函數
                console.error("Error:", error);
                alert('Submit Failed');
            }
        });
    });
});