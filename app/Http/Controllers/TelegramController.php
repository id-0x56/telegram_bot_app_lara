<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Repositories\UserRepository;

class TelegramController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function setWebhook()
    {
        $url = config('telegram.bots.mybot.webhook_url');
        $response = Telegram::setWebhook(['url' => $url]);
    }

    public function removeWebhook()
    {
        $response = Telegram::removeWebhook();
    }

    public function handleWebhook()
    {
        $update = Telegram::commandsHandler(true);

        $isCallBack = $update->isType('callback_query');
        if ($isCallBack) {
            $query = $update->getCallbackQuery();

            $chat_id = $query->getFrom()->getId();
            $callback_query_id = $query->getId();

            // -----------------------------------------------------------------

            if ($query->getData() === 'next') {
                $user_id = 25;
            } elseif ($query->getData() === 'previous') {
                $user_id = 15;
            }

            $user = $this->userRepository->find($user_id);

            $text = 'id: ' . $user->id . PHP_EOL .
                    'name: ' . $user->name . PHP_EOL .
                    'email: ' . $user->email . PHP_EOL .
                    'token: ' . $user->remember_token;

            // -----------------------------------------------------------------

    		Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => $text,
            ]);

    		Telegram::answerCallbackQuery([
                'callback_query_id' => $callback_query_id,
    		]);
        }

        return 'ok';
    }
}
