<?php

/*
|--------------------------------------------------------------------------
| Set Webhook
|--------------------------------------------------------------------------
| This route is used to set your webhook with Telegram,
| just request from your browser once and then disable it.
|
| Example: http://domain.com/bot/set-webhook
*/
Route::get('/bot/set-webhook', 'TelegramController@setWebhook')->name('bot-set-webhook');

/*
|--------------------------------------------------------------------------
| Remove Webhook
|--------------------------------------------------------------------------
| This route is used to remove your webhook with Telegram,
| just request from your browser once and then disable it.
|
| Example: http://domain.com/bot/remove-webhook
*/
Route::get('/bot/remove-webhook', 'TelegramController@removeWebhook')->name('bot-remove-webhook');

/*
|--------------------------------------------------------------------------
| Handle Webhook
|--------------------------------------------------------------------------
| This route handles incoming webhook updates.
|
| !! IMPORTANT !!
| THIS IS AN INSECURE ENDPOINT FOR DEMO PURPOSES,
| MAKE SURE TO SECURE THIS ENDPOINT, EXAMPLE: "/bot/<SECRET-KEY>/handler-webhook"
|
| THEN SET THAT WEBHOOK WITH TELEGRAM.
| SO YOU CAN BE SURE THE UPDATES ARE COMING FROM TELEGRAM ONLY.
*/
Route::post('/bot/handle-webhook', 'TelegramController@handleWebhook')->name('bot-handle-webhook');
