<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

/**
 * Class TestCommand.
 */
class TestCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'test';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['t'];

    /**
     * @var string Command Description
     */
    protected $description = 'Test command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $text = 'This is TEST!';

        $keyboard = [
            [
                ['text' => '👈','callback_data' => 'previous'],
                ['text' => '👉','callback_data' => 'next'],
            ],
        ];

        $reply_markup = Keyboard::make([
            'inline_keyboard' => $keyboard,
        ]);

        $response = $this->replyWithMessage([
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]);
    }
}
