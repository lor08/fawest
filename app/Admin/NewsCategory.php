<?php

Admin::model(App\Models\NewsCategory::class)->title('Категории новостей')->display(function () {
    $display = AdminDisplay::tree();
    $display->value('name');
    return $display;

})->createAndEdit(function () {
    $form = AdminForm::form();
    $form->items([
        FormItem::text('name', 'Название'),
        FormItem::text('slug', 'Ярлык'),
        FormItem::checkbox('showtop', 'Главное меню')->defaultValue(true),
        FormItem::checkbox('showside', 'Боковое меню')->defaultValue(true),
        FormItem::checkbox('showbottom', 'Меню подвала')->defaultValue(true),
        FormItem::checkbox('showcontent', 'В спсике категорий')->defaultValue(true),
        FormItem::ckeditor('note', 'Аннотация'),
        FormItem::ckeditor('desc', 'Описание'),
        Formitem::multiimages('photos','Фотки'),
    ]);
    return $form;
});