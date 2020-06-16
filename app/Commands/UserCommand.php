<?php

namespace App\Commands;

use App\User;
use Telegram\Bot\Commands\Command;
use Validator;

/**
 * Class UserCommand.
 */
class UserCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'user';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['usr', 'u'];

    /**
     * @var string Command Argument Pattern
     */
    protected $pattern = '{id}';

    /**
     * @var string Command Description
     */
    protected $description = 'Get user from database by id or random';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        // ---------------------------------------------------------------------

        $args = $this->getArguments();

        // ---------------------------------------------------------------------

        $user_id_max = User::count();

        $args_valid = Validator::make($args, [
            'id' => 'required|integer|min:1|max:' . $user_id_max
        ]);

        $user_id = $args_valid->fails() ? rand(1, $user_id_max) : $args['id'];
        $user = User::find($user_id);

        $text = 'id: ' . $user->id . PHP_EOL .
                'name: ' . $user->name . PHP_EOL .
                'email: ' . $user->email . PHP_EOL .
                'token: ' . $user->remember_token;

        $this->replyWithMessage(compact('text'));

        // ---------------------------------------------------------------------
    }
}
