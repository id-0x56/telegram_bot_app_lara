<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

/**
 * Class KeyboardCommand.
 */
class KeyboardCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'keyboard';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['key', 'k'];

    /**
     * @var string Command Description
     */
    protected $description = 'Keyboard command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $text = 'Hello World!';

        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
                 ['0'],
        ];

        $reply_markup = Keyboard::make([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
        ]);

        $response = $this->replyWithMessage([
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]);
    }
}
