$(function(){
		// 先取得 #abgne-block-20110111
		var $block = $('#abgne-block-20110111');

		// 幫 #abgne-block-20110111 .title ul li 加上 hover() 事件
		$('#abgne-block-20110111 .title ul li').hover(function(){
			// 當滑鼠移上時加上 .over 樣式
			$(this).addClass('over').siblings('.over').removeClass('over');
		}, function(){
			// 當滑鼠移出時移除 .over 樣式
			$(this).removeClass('over');
		}).click(function(){
			// 當滑鼠點擊時, 顯示相對應的 div.info
			// 並加上 .on 樣式
			var $this = $(this);
			$this.add($('.bd div.info', $block).eq($this.index())).addClass('on').siblings('.on').removeClass('on');
		});
	});