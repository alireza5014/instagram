<?php

namespace App\Http\Controllers\User;

use App\Model\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function list(Request $request)
    {



        $accounts = Account::where('user_id', getUser('id'))->get();

        try {

            $ig = new \InstagramAPI\Instagram(false, false);

            foreach ($accounts as $account) {

                if ($account->pk == '') {
                    $ig->login($account->username, $account->password);
                    $instagram = $ig->account->getCurrentUser()->getUser();

                    Account::where('username', $instagram->getUsername())->update([
                        'pk' => $instagram->getPk(),
                        'full_name' => $instagram->getFullName(),
                        'is_private' => $instagram->getIsPrivate(),
                        'profile_pic_url' => $instagram->getProfilePicUrl(),
                        'biography' => $instagram->getBiography(),
                        'external_url' => $instagram->getExternalLynxUrl(),
                        'phone_number' => $instagram->getPhoneNumber(),
                    ]);
                }

            }
        } catch (\Exception $e) {
            return 'Something went wrong: ' . $e->getMessage() . "\n";

        }

        if ($request->ajax()) {
            try {
                return view('user.account.table', compact('accounts'))->render();
            } catch (\Throwable $e) {
            }
        }

        return view('user.account.list', compact('accounts'));
    }
}
