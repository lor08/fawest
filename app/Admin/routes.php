<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Тут будет тру ла ла.';
		return Admin::view($content, 'Панель управления');
	}
]);
