<?php


namespace App\Repositories;
use App\User;
use Laravel\Socialite\Two\User as UserOAuth;

class UserRepository
{
    public function getUserBySocId(UserOAuth $user, string $socName) {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if (is_null($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getNickname())? $user->getNickname(): '',
                'email' => !empty($user->getEmail())? $user->getEmail(): '',
                'password' => '',
                'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $socName,
                'email_verified_at' => now(),
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);
            $userInSystem->save();
        }

        return $userInSystem;
    }
}
