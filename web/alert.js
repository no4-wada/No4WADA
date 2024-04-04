window.addEventListener("load", function () {
    const btn_del = document.getElementById("btn_del");
    btn_del.addEventListener("click", () => {
        if (window.confirm("削除しますか？")) {
            location.href = "delete.php"; 
        }
    });
});