$(function () {
	// 現在のページURLのハッシュ部分を取得
	const hash = location.hash;

	// ハッシュ部分がある場合の条件分岐
	if (hash){
		// ページ遷移後のスクロール位置指定
		$("html, body").stop().scrollTop(0);
		// 処理を遅らせる
		setTimeout(function () {
			// リンク先までの距離を取得
			// リンク先の場所までスクロール
			$("html, body").animate({scrollTop:$(hash).offset().top}, 250, "swing");
		});
	}
});
