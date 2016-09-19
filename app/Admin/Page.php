<?php

Admin::model('App\Models\Page')->title('Страницы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название'),
        Column::string('show')->label('Активность'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
//		FormItem::text('category_id', 'Category'),
		FormItem::text('name', 'Название'),
		FormItem::text('slug', 'Символьный код'),
        FormItem::checkbox('show', 'Активность')->defaultValue(true),
        FormItem::checkbox('in_menu', 'Главное меню')->defaultValue(true),
		FormItem::ckeditor('description', 'Контент'),
	]);
	return $form;
});