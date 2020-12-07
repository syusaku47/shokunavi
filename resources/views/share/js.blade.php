<script>
    // ************************************
    // 削除ボタンを押してすぐにレコードが削除されないようにjavascriptで確認メッセージを流します。
    // *************************************
    //e = this = aタグ
    'use strict';
    function deleteContent(e) {
        if (confirm('本当に削除していいですか?')) {
            document.getElementById('form_' + e.dataset.id).submit(); //e.datase.id = aタグのdata-id取得
        }
    }

    const btn = document.getElementById('comment-btn');
    const form = document.getElementById('comment-form');
    btn.addEventListener('click', () => {
        form.classList.toggle('d-none');
    });
</script>