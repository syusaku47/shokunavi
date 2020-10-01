
<script>
// ************************************
// 削除ボタンを押してすぐにレコードが削除されないようにjavascriptで確認メッセージを流します。
// *************************************
function deleteContent(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
}

</script>